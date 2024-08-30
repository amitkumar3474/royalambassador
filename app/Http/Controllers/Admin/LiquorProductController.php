<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Supplier;
use App\Models\LiquorBin;
use App\Models\LiquorSize;
use App\Models\ProductCat;
use App\Models\ProductGen;
use App\Models\LiquorBrand;
use App\Models\PackageType;
use App\Models\WineCategory;
use Illuminate\Http\Request;
use App\Models\ProductLiquor;
use App\Models\LiquorCategory;
use App\Models\SupplierProduct;
use App\Models\AttachedDocument;
use App\Http\Controllers\Controller;

class LiquorProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::select('id','supplier_name')->get();
        $liquorBrands = LiquorBrand::select('id','lbrand_name')->get();
        $liquorSizes = LiquorSize::select('id','size')->get();
        $liquorCategories = ProductCat::where('cat_type', 'L')->get();
        $wineCategories = WineCategory::select('id','wcat_name')->get();
        $packageTypes = PackageType::all();
        $productGens = ProductGen::where('lnk_parent_id', 0)->where('product_type', 'L')->get();
        return view('admin.liquorProducts.index', compact('suppliers', 'wineCategories', 'liquorCategories', 'liquorSizes', 'liquorBrands', 'productGens', 'packageTypes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liquorPurchaseShort()
    {
        return view('admin.liquorProducts.purchase_short_list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function receiveProduct()
    {
        $suppliers = Supplier::all();
        return view('admin.liquorProducts.product_receive_list', compact('suppliers'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function liquorInvList()
    // {
    //     return view('admin.liquorProducts.liquor_inv_list');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liquorBar()
    {
        return view('admin.liquorProducts.liquor_bar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liquorInvReport()
    {
        return view('admin.liquorProducts.liquor_inventory_report');
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
            'product_name'    => 'required',
            'bottle_size'     => 'required',
            'purchased_in'    => 'required',
            'used_at'         => 'required',
            'alcohol_percent' => 'required',
            'unit_of_measure' => 'required',
            'category'        => 'required',
            'liquor_brand'    => 'required',
            'counted_in'      => 'required',
            'supplier_name.*' => 'required',
        ]);
        $productGen = ProductGen::create([
            'product_name'        => $request->product_name,
            'prod_desc'           => $request->description,
            'product_type'        => 'L',
            'product_size'        => $request->bottle_size,
            'favorite_status'     => $request->favorite,
            'sku'                 => $request->part_id,
            'unit_of_measure'     => $request->unit_of_measure,
            'purchase_price'      => $request->purchase_price,
            'purchase_price_case' => $request->purchase_price_case,
            'price_bq_inhouse'    => $request->sell_price_in_house,
            'lnk_def_supplier'    => $request->supplier_name[0],
            'lnk_cat'             => $request->category,
            'prod_status'         => 1,
            'lnk_user_insert'     => auth()->id()
        ]);

        $data = [
            'lnk_product_gen'        => $productGen->id,
            'lnk_liquor_brand'       => $request->liquor_brand,
            'used_at_loc'            => $request->used_at,
            'alcohol_percent'        => $request->alcohol_percent,
            'lnk_bottle_size'        => $request->bottle_size,
            'lnk_package_type'       => $request->purchased_in,
            'lnk_count_package_type' => $request->counted_in,
            'lnk_user_insert'        => auth()->id(),
        ];
        if($request->category == 102){
            if(isset($request->grape_name)){
                $grape_name = array_filter($request->grape_name);
                $grape_percent = array_filter($request->grape_percent);
            }else{
                $grape_name = '';
                $grape_percent = '';
            }
            $data['lnk_wine_cats'] = $request->chk_wine_cat;
            $data['wine_type'] = $request->wine_type;
            $data['lnk_bin_number'] = $request->lnk_bin_number;
            $data['org_country'] = $request->wine_country;
            $data['org_region'] = $request->wine_region;
            $data['org_city'] = $request->wine_city ?? null;
            $data['winery_name'] = $request->winery_name;
            if(!isset($request->vintage_year)){
                $data['grape_variety']  =  json_encode(["name" => $grape_name, "percent" => $grape_percent]);
            }
        }

        $productLiquor = ProductLiquor::create($data);

        foreach($request->supplier_name as $key => $_supplier_name){
            SupplierProduct::create([
                'lnk_product'     => $productGen->id,
                'lnk_supplier'    => $_supplier_name,
                'vendor_part_num' => $request->vpart_num[$key],
                'lnk_user_insert' => auth()->id(),
            ]);
        } 

        $firstProductGenId = $productGen->id;
        if(isset($request->vintage_year)){
            foreach($request->vintage_year as $key => $vintage_year){
                $productGen = ProductGen::create([
                    'product_name'        => $request->product_name,
                    'lnk_parent_id'       => $firstProductGenId,
                    'prod_desc'           => $request->description,
                    // 'product_type'        => $request->used_at,
                    'product_size'        => $request->bottle_size,
                    'favorite_status'     => $request->favorite,
                    'sku'                 => $request->part_id,
                    'unit_of_measure'     => $request->unit_of_measure,
                    'purchase_price'      => $request->vntg_purchase_price[$key],
                    'price_rstn_catering' => $request->vntg_price_ra_catering[$key],
                    'price_rstn_inhouse'    => $request->vntg_price_ra_inhouse[$key],
                    'lnk_def_supplier'    => $request->supplier_name[0],
                    'lnk_cat'             => $request->category,
                    'prod_status'         => 1,
                    'lnk_user_insert'     => auth()->id()
                ]);
                
                if(isset($request->grape_name[$key])){
                    $grape_name = array_filter($request->grape_name[$key]);
                    $grape_percent = array_filter($request->grape_percent[$key]);
                }else{
                    $grape_name = '';
                    $grape_percent = '';
                }
                $productLiquor = ProductLiquor::create([
                    'lnk_product_gen'        => $productGen->id,
                    'lnk_liquor_brand'       => $request->liquor_brand,
                    'used_at_loc'            => $request->used_at,
                    'alcohol_percent'        => $request->alcohol_percent,
                    'lnk_bottle_size'        => $request->bottle_size,
                    'lnk_package_type'       => $request->purchased_in,
                    'lnk_count_package_type' => $request->counted_in,
                    'lnk_user_insert'        => auth()->id(),
                    'vintage'                => $vintage_year,
                    'grape_variety'          =>  json_encode(["name" => $grape_name, "percent" => $grape_percent]),
                ]);
            }  
        }
        return response()->json(['success' => true]);
    }


    /**
     * Display a liquor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suppliers = Supplier::select('id','supplier_name')->get();
        $liquorBrands = LiquorBrand::select('id','lbrand_name')->get();
        $liquorSizes = LiquorSize::select('id','size')->get();
        // $liquorCategories = LiquorCategory::select('id','cat_name')->get();
        $wineCategories = WineCategory::select('id','wcat_name')->get();
        $liquorCategories = ProductCat::where('cat_type', 'L')->get();
        $packageTypes = PackageType::all();
        $productGen = ProductGen::find($id);
        $vintages = ProductGen::where('lnk_parent_id', $id)->get();
        $cover_pic = AttachedDocument::where('usage_type', 'PRT')->where('lnk_related_rec', $id)->first();
        return view('admin.liquorProducts.view', compact('productGen', 'wineCategories', 'suppliers', 'liquorBrands', 'liquorSizes', 'liquorCategories', 'vintages', 'packageTypes', 'cover_pic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productGen = ProductGen::with('productLiquor','suppliers')->findOrFail($id);
        $vintages = ProductGen::where('lnk_parent_id',$productGen->id)->get();
        return response()->json(['productGen' => $productGen, 'vintages' => $vintages]);
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
            'product_name'    => 'required',
            'bottle_size'     => 'required',
            'purchased_in'    => 'required',
            'used_at'         => 'required',
            'alcohol_percent' => 'required',
            'category'        => 'required',
            'liquor_brand'    => 'required',
            'counted_in'      => 'required',
            'supplier_name.*' => 'required',
        ]);
        // dd($request->all());
        $productGen = ProductGen::where('id', $request->gn_pro_id)->update([
            'product_name'        => $request->product_name,
            'prod_desc'           => $request->prod_desc,
            // 'product_type'        => $request->used_at,
            'product_size'        => $request->bottle_size,
            'favorite_status'     => $request->favorite_status,
            'sku'                 => $request->part_id,
            'unit_of_measure'     => $request->unit_of_measure,
            'purchase_price'      => $request->purchase_price,
            'purchase_price_case' => $request->purchase_price_case,
            'price_bq_inhouse'    => $request->price_bq_inhouse,
            'lnk_def_supplier'    => $request->edit_lq_lnk_def_supplier,
            'lnk_cat'             => $request->category,
            'prod_status'         => $request->edit_lq_prod_status,
            'lnk_user_update'     => auth()->id(),
            'price_bq_catering'   => $request->price_bq_catering,
            'price_rstn_inhouse'  => $request->price_rstn_inhouse,
            'price_rstn_catering' => $request->price_rstn_catering,
            'max_in_stock'        => $request->max_in_stock,
            'min_in_stock'        => $request->min_in_stock,
        ]);
        $productLiquor = ProductLiquor::where('lnk_product_gen', $request->gn_pro_id)->update([
            'lnk_liquor_brand'       => $request->liquor_brand,
            'used_at_loc'            => $request->used_at,
            'alcohol_percent'        => $request->alcohol_percent,
            'lnk_bottle_size'        => $request->bottle_size,
            'lnk_package_type'       => $request->purchased_in,
            'lnk_count_package_type' => $request->counted_in,
            'wine_type'              => $request->edit_wine_type??null,
            'winery_name'            => $request->edit_winery_name??null,
            'lnk_bin_number'         => $request->edi_bin_number??null,
            'lnk_wine_cats'          => $request->chk_wine_cat??null,
            'lnk_user_update'        => auth()->id(),
            'price_half_bottle'      => $request->price_half_bottle,
            'price_by_glass'         => $request->price_by_glass,
            'price_others'           => $request->price_others,
            'price_others_unit'      => $request->price_others_unit,
            'org_country'            => $request->org_country,
            'org_region'             => $request->org_region,
            'org_city'               => $request->org_city,
        ]);
        $s_p_ids = array_filter($request->s_p_id);
        SupplierProduct::whereNotIn('id', $s_p_ids)->where('lnk_product', $request->gn_pro_id)->delete();
        foreach($request->supplier_name as $key => $_supplier_name){
            $_id = isset($s_p_ids[$key]) ? $s_p_ids[$key] : null;
            if($_id){
                SupplierProduct::where('id', $_id)->update([
                    'lnk_supplier'    => $_supplier_name,
                    'vendor_part_num' => $request->vpart_num[$key],
                    'lnk_user_update' => auth()->id(),
                ]);
            }elseif($_supplier_name){
                SupplierProduct::create([
                    'lnk_product'     => $request->gn_pro_id,
                    'lnk_supplier'    => $_supplier_name,
                    'vendor_part_num' => $request->vpart_num[$key],
                    'lnk_user_insert' => auth()->id(),
                ]);
            }
        }
        
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
        ProductGen::whereId($id)->delete();
        $product = ProductLiquor::where('lnk_product_gen', $id)->first();
        $supplierProducts = SupplierProduct::where('lnk_product',$product->id)->pluck('id')->toarray();
        ProductLiquor::where('lnk_product_gen', $id)->delete();
        SupplierProduct::whereIn('id', $supplierProducts)->delete();
        return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
    }

    /**
     * Store a newly created new Vintage.
     */
    public function addVintage(Request $request)
    {
        
        $productGenData = ProductGen::where('id', $request->p_gn_id)->first();

        $productGen = ProductGen::create([
            'product_name'        => $productGenData->product_name,
            'lnk_parent_id'       => $request->p_gn_id,
            'prod_desc'           => $request->vintage_prod_desc,
            // 'product_type'        => $productGenData->product_type,
            'favorite_status'     => $productGenData->favorite_status,
            'unit_of_measure'     => $productGenData->unit_of_measure,
            'purchase_price'      => $request->vintage_purchase_price,
            'price_bq_inhouse'    => $request->vintage_price_bq_inhouse,
            'price_bq_catering'   => $request->vintage_price_bq_catering,
            'lnk_def_supplier'    => $productGenData->lnk_def_supplier,
            'lnk_cat'             => $productGenData->lnk_cat,
            'prod_status'         => 1,
            'lnk_user_insert'     => auth()->id()
        ]);
        $productLiquorData = ProductLiquor::where('lnk_product_gen', $request->p_gn_id)->first();

        if(isset($request->grape_name)){
            $grape_name = array_filter($request->grape_name);
            $grape_percent = array_filter($request->grape_percent);
        }else{
            $grape_name = '';
            $grape_percent = '';
        }

        $productLiquor = ProductLiquor::create([
        'lnk_product_gen'        => $productGen->id,
        'lnk_liquor_brand'       => $productLiquorData->lnk_liquor_brand,
        'used_at_loc'            => $productLiquorData->used_at_loc,
        'alcohol_percent'        => $productLiquorData->alcohol_percent,
        'lnk_bottle_size'        => $productLiquorData->lnk_bottle_size,
        'lnk_package_type'       => $productLiquorData->lnk_package_type,
        'lnk_count_package_type' => $productLiquorData->lnk_count_package_type,
        'lnk_user_insert'        => auth()->id(),
        'lnk_wine_cats'          => $productLiquorData->$request->chk_wine_cat,
        'wine_type'              => $productLiquorData->wine_type,
        'lnk_bin_number'         => $productLiquorData->lnk_bin_number,
        'org_country'            => $productLiquorData->org_country,
        'org_region'             => $productLiquorData->org_region,
        'org_city'               => $productLiquorData->org_city,
        'winery_name'            => $productLiquorData->winery_name,
        'vintage'                => $request->vintage,
        'price_half_bottle'      => $request->vintage_price_half_bottle,
        'price_by_glass'         => $request->vintage_price_by_glass,
        'grape_variety'          => json_encode(["name" => $grape_name, "percent" => $grape_percent]),
        ]);

        return redirect()->route('admin.liquor-product.view', $request->p_gn_id);
    }

    public function editVintage($id)
    {
        $productGenVintage = ProductGen::with('productLiquor')->findOrFail($id);
        // dd($productGenVintage);
        return response()->json(['productGenVintage' => $productGenVintage]);
    }

    public function updateVintage(Request $request)
    {
        
        if(isset($request->grape_name)){
            $grape_name = array_filter($request->grape_name);
            $grape_percent = array_filter($request->grape_percent);
        }else{
            $grape_name = '';
            $grape_percent = '';
        }
        $productGen = ProductGen::where('id', $request->vintage_pro_id)->update([
            'sku'                 => $request->vintage_part_id,
            'purchase_price'      => $request->vintage_purchase_price,
            'purchase_price_case' => $request->vintage_purchase_price_case,
            'price_bq_inhouse'    => $request->vintage_price_bq_inhouse,
            'price_bq_catering'   => $request->vintage_price_bq_catering,
            'price_rstn_inhouse'  => $request->vintage_price_rstn_inhouse,
            'prod_status'         => $request->vintage_prod_status,
            'prod_desc'           => $request->vintage_prod_desc,
            'price_rstn_catering' => $request->vintage_price_rstn_catering,
            'lnk_user_update'     => auth()->id(),
        ]);
        $productLiquor = ProductLiquor::where('lnk_product_gen', $request->vintage_pro_id)->update([
            'vintage'           =>  $request->vintage,
            'price_half_bottle' => $request->vintage_price_half_bottle,
            'price_by_glass'    => $request->vintage_price_by_glass,
            'price_others'      => $request->vintage_price_others,
            'price_others_unit' => $request->vintage_price_others_unit,
            'grape_variety'     => json_encode(["name" => $grape_name, "percent" => $grape_percent]),
            'lnk_user_update'   => auth()->id(),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the Vintage from storage.
     */
    public function destroyVintage($id)
    {
        $product = ProductLiquor::where('lnk_product_gen', $id)->delete();
        ProductGen::whereId($id)->delete();
        return response()->json(['success' => true, 'message' => 'Vintage deleted successfully.']);
    }

    // Categories base get liquor Bins 
    public function getBins(Request $request)
    {
        // dd($request->all());
        $liquorBins = LiquorBin::whereIn('id', $request->data)->where('is_active', 1)->get();
        // dd($liquorBins);
        return response()->json(['liquorBins' => $liquorBins]);
    }
}
