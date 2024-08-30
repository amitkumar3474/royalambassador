<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\LiquorBrand;
use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiquorBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $liquorBrand = LiquorBrand::when($request->input('liquor_brands_name'), function ($query) use ($request) {
            $query->where('lbrand_name','like', '%' .$request->input('liquor_brands_name').'%');
        });
        $liquorBrand = $liquorBrand->paginate($request->brands_pages??2, ['*'], 'brands_page');
        
        $packageTypes = PackageType::when($request->input('package_name'), function ($query) use ($request) {
            $query->where('package_name', 'like', '%'.$request->input('package_name').'%');
        })
        ->when($request->input('capacity'), function ($query) use ($request) {
            $query->where('capacity','like', '%' .$request->input('capacity').'%');
        });
        $packageTypes = $packageTypes->paginate($request->package_type_pages??30, ['*'], 'package_page');
        return view('admin.liquorProducts.liquor-info', compact('liquorBrand','packageTypes'));
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
            'new_liquor_brand_name' => 'required',
        ]);
        LiquorBrand::create([
            'lbrand_name'     => $request->new_liquor_brand_name,
            'lnk_user_update' => auth()->id()
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $liquorBrand = LiquorBrand::select('id','lbrand_name')->findOrFail($id);

        return response()->json(['liquorBrand' => $liquorBrand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'edit_liquor_brand_name' => 'required'
        ]);
        LiquorBrand::whereId($request->liquor_brand_id)->update([
            'lbrand_name'     => $request->edit_liquor_brand_name,
            'lnk_user_update' => auth()->id()
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LiquorBrand::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Liquor brand deleted successfully.']);
    }
}
