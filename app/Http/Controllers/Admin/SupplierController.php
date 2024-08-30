<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Supplier;
use App\Models\LiquorSize;
use App\Models\LiquorBrand;
use App\Models\WineCategory;
use Illuminate\Http\Request;
use App\Models\LiquorCategory;
use App\Models\SupplierContact;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::when($request->input('supplier_name'), function ($query) use ($request) {
            $query->where('supplier_name', $request->input('supplier_name'));
        })
        ->when(($request->input('does_liquor')!=""), function ($query) use ($request) {
            $query->where('is_liquor_supplier', $request->input('does_liquor'));
        })
        ->get();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name'  => 'required',
            'does_liquor_is' => 'required|numeric'
        ]);
        if (isset($request->supplier_id)) {
            Supplier::whereId($request->supplier_id)->update([
                'supplier_name'      => $request->supplier_name,
                'is_liquor_supplier' => $request->does_liquor_is,
                'general_email'      => $request->general_email??null,
                'main_phone'         => $request->office_phone??null,
                'addr_line1'         => $request->address_line1??null,
                'addr_line2'         => $request->address_line2??null,
                'city'               => $request->city??null,
                'province'           => $request->province??null,
                'country'            => $request->country??null,
                'postal_code'        => $request->postal_code??null,
                'special_notes'      => $request->special_notes??null,
                'lnk_user_update'    => auth()->id()??0,
            ]);
        }else{
            Supplier::create([
                'supplier_name'      => $request->supplier_name,
                'is_liquor_supplier' => $request->does_liquor_is,
                'general_email'      => $request->general_email??null,
                'main_phone'         => $request->office_phone??null,
                'city'               => $request->city??null,
                'province'           => $request->province??null,
                'lnk_user_insert'    => auth()->id()??0,
            ]);
        }
        return redirect()->route('admin.supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::with('contacts')->find($id);
        $products = $supplier->supplierProducts()
            ->join('product_liquors', 'supplier_products.lnk_product', '=', 'product_liquors.id')
            ->join('product_gens', 'product_liquors.lnk_product_gen', '=', 'product_gens.id')
            ->select('product_liquors.lnk_package_type', 'product_gens.id', 'product_name', 'supplier_products.vendor_part_num', 'vendor_prod_name', 'price')
            ->distinct('product_gens.id')
            ->get();
        return view('admin.suppliers.view', compact('supplier', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return response()->json(['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_name'  => 'required',
            'does_liquor_is' => 'required|numeric'
        ]);

        Supplier::whereId($id)->update([
            'supplier_name'      => $request->supplier_name,
            'is_liquor_supplier' => $request->does_liquor_is,
            'general_email'      => $request->general_email??null,
            'main_phone'         => $request->office_phone??null,
            'addr_line1'         => $request->address_line1??null,
            'addr_line2'         => $request->address_line2??null,
            'city'               => $request->city??null,
            'province'           => $request->province??null,
            'country'            => $request->country??null,
            'postal_code'        => $request->postal_code??null,
            'special_notes'      => $request->special_notes??null,
            'lnk_user_update'    => auth()->id()??0,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasRelatedContacts = SupplierContact::where('lnk_supplier', $id)->exists();

        if ($hasRelatedContacts) {
            return response()->json(['success' => false, 'message' => 'Supplier delete not allowed. Related records exist in Supplier_Contact id lnk_supplier column.']);
        }
        Supplier::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Supplier deleted successfully.']);
    }

    public function winePerSupplier(Request $request){
        $supplierpros = Supplier::when($request->input('wine_list_supplier_name'), function ($query) use ($request) {
            $query->where('supplier_name', 'LIKE', '%' . $request->input('wine_list_supplier_name') . '%');
        })
        ->with('contacts')
        ->whereHas('products', function ($query) use ($request) {
            $query->where('product_name', 'LIKE', '%' . $request->input('wine_list_product_name') . '%');
        })
        ->get();
        $suppliers = Supplier::select('id','supplier_name')->get();
        $wineCategories = WineCategory::select('id','wcat_name')->get();
        $liquorSizes = LiquorSize::select('id','size')->get();
        $liquorCategories = LiquorCategory::select('id','cat_name')->get();
        $liquorBrands = LiquorBrand::select('id','lbrand_name')->get();
        // dd($supplierpros);
        return view('admin.suppliers.wine_list_per_supplier', compact('supplierpros', 'suppliers', 'wineCategories', 'liquorSizes', 'liquorCategories', 'liquorBrands'));
    }
}
