<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\EventType;
use App\Models\ProductCat;
use App\Models\ProductGen;
use App\Models\ProductMenu;
use App\Models\WineCategory;
use Illuminate\Http\Request;
use App\Models\ProductLiquor;
use App\Models\ProdPreparation;
use App\Models\ServeTitleMaster;
use App\Http\Controllers\Controller;

class AllProductController extends Controller
{
    public function index(Request $request)
    {
        $productMenus = ProductCat::where('cat_type', 'M')->whereHas('productGens');
        $productMenus->when($request->input('lnk_cat'), function ($query) use ($request) {
            $query->where('id', $request->input('lnk_cat'));
        })
        ->when($request->input('product_name'), function ($query) use ($request) {
            $query->whereHas('productGens', function ($subQuery) use ($request) {
                $subQuery->where('product_name', 'like', '%' . $request->input('product_name'). '%');
            });
        });
        
        $allRecords = $productMenus->orderBy('cat_name')->count();
        $productMenus = $productMenus->orderBy('cat_name')->paginate($request->pages??50);
        $productCats = ProductCat::where('cat_type', 'M')->where('lnk_top_cat', 0)->orderBy('cat_name')->get();
        return view('admin.baseInfo.all_products', compact('productMenus', 'productCats', 'allRecords'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $productGen = ProductGen::create([
            'product_name'        => $request->product_name,
            'prod_name_catering'  => $request->prod_name_catering,
            'numbers_served'      => $request->numbers_served,
            'pieces_per_serving'  => $request->pieces_per_serving,
            'product_size'        => $request->product_size,
            'specialty_options'   => json_encode($request->specialty_options),
            'lnk_cat'             => $request->lnk_cat,
            'is_combo'            => $request->is_combo?1:0,
            'unit_of_measure'     => $request->unit_of_measure,
            'favorite_status'     => $request->favorite_status,
            'prod_desc'           => $request->prod_desc,
            'price_bq_inhouse'    => $request->price_bq_inhouse,
            'price_bq_catering'   => $request->price_bq_catering,
            'price_rstn_inhouse'  => $request->price_rstn_inhouse,
            'price_rstn_catering' => $request->price_rstn_catering,
            'prod_status'         => 1,
            'product_type'        => $request->product_type,
            'lnk_user_insert' => auth()->id()
        ]);

        ProductMenu::create([
            'lnk_product_gen' => $productGen->id,
            'is_line_item'    => $request->is_line_item?1:0,
            'combo_use_only'  => $request->combo_use_only?1:0,
            'usage_type'      => json_encode($request->usage_type),
            'lnk_user_insert' => auth()->id()
        ]);

        return redirect()->route('admin.base-info.product-menu-view', $productGen->id);
        // return redirect()->back();
    }

    public function menuShow($id)
    {
        $menuItemDetails = ProductGen::whereId($id)->first();
        $prodPreparations = ProdPreparation::where('lnk_main_product', $id)->get();
        return view('admin.baseInfo.product_menu_view', compact('menuItemDetails', 'prodPreparations'));
    }

    public function edit(Request $request, $id)
    {
        if($request->cat_type){
            $productCats = ProductCat::where('cat_type', $request->cat_type)->where('lnk_top_cat', 0)->with('subCategories')->orderBy('cat_name')->get();
            $productMenu = ProductGen::where('id', $id)->with('productMenus')->first();
            return response()->json(['productMenu' => $productMenu, 'productCats' => $productCats]);
        }else{
            $productMenu = ProductGen::where('id', $id)->with('productMenus')->first();
            return response()->json(['productMenu' => $productMenu]);
        }
    }

    public function update(Request $request)
    {
        $productGen = ProductGen::where('id', $request->gn_prod_id)->update([
            'product_name'        => $request->product_name,
            'prod_name_catering'  => $request->prod_name_catering,
            'numbers_served'      => $request->numbers_served,
            'pieces_per_serving'  => $request->pieces_per_serving,
            'product_size'        => $request->product_size,
            'specialty_options'   => json_encode($request->specialty_options),
            'lnk_cat'             => $request->lnk_cat,
            'is_combo'            => $request->is_combo?1:0,
            'unit_of_measure'     => $request->unit_of_measure,
            'favorite_status'     => $request->favorite_status,
            'prod_desc'           => $request->prod_desc,
            'avg_cost'            => $request->avg_cost,
            'price_bq_inhouse'    => $request->price_bq_inhouse,
            'price_bq_catering'   => $request->price_bq_catering,
            'price_rstn_inhouse'  => $request->price_rstn_inhouse,
            'price_rstn_catering' => $request->price_rstn_catering,
            'prod_status'         => $request->prod_status,
            'lnk_user_update' => auth()->id()
        ]);

        ProductMenu::where('lnk_product_gen', $request->gn_prod_id)->update([
            'show_order'      => $request->show_order,
            'is_line_item'    => $request->is_line_item?1:0,
            'combo_use_only'  => $request->combo_use_only?1:0,
            'usage_type'      => json_encode($request->usage_type),
            'lnk_user_update' => auth()->id()
        ]);

        return redirect()->back();
    }

    // public function serveTitleMasters()
    // {
    //     return view('admin.baseInfo.serve_title_masters');
    // }

    public function sysSettingList()
    {
        return view('admin.baseInfo.sys_setting_list');
    }

    public function cityLookupList()
    {
        return view('admin.baseInfo.city_lookup_list');
    }

    public function mgrEmailTemplateList()
    {
        return view('admin.baseInfo.mgr_email_template_list');
    }

    public function ProductArchiveList(Request $request)
    {
        $productArchiveMenus = ProductCat::where('cat_type', 'M')
        ->whereHas('productGens', function ($query) use ($request) {
            $query->where('prod_status', 2);
        })
        ->paginate(50);
        $allRecords = $productArchiveMenus->count();
        $productCats = ProductCat::where('cat_type', 'M')->where('lnk_top_cat', 0)->orderBy('cat_name')->get();
        return view('admin.baseInfo.all_products', compact('productArchiveMenus', 'productCats', 'allRecords'));
    }

    public function drinkList(Request $request)
    {
        $drinksQuery = ProductCat::where('cat_type', 'D')->where('lnk_top_cat', 0);
            // ->whereHas('productGens')
            // ->orWhereHas('subCategories.productGens')
            // ->with('subcategories');
        // $drinksQuery = ProductCat::where('cat_type', 'D')->whereHas('productGens');
        if ($request->filled('cat_name')) {
            $drinksQuery->where('cat_name', 'like', '%' . $request->input('cat_name') . '%');
        }
        $drinks = $drinksQuery->get();
        $productCats = ProductCat::where('cat_type', 'D')->where('lnk_top_cat', 0)->orderBy('cat_name')->get();
        return view('admin.baseInfo.all_products', compact('drinks', 'productCats'));
    }

    public function destroy(Request $request) 
    {
       $serveTitleMaster =  ServeTitleMaster::where(function ($query) use ($request) {
            $query->whereJsonContains('specialty_options->vt', $request->gn_prod_id)
                  ->orWhereJsonContains('specialty_options->vn', $request->gn_prod_id)
                  ->orWhereJsonContains('specialty_options->gf', $request->gn_prod_id)
                  ->orWhereJsonContains('specialty_options->nf', $request->gn_prod_id)
                  ->orWhereJsonContains('specialty_options->da', $request->gn_prod_id);
        })->exists();
        if(!$serveTitleMaster){
            ProductGen::where('id', $request->gn_prod_id)->delete();
            ProductMenu::where('lnk_product_gen', $request->gn_prod_id)->delete();
            return response()->json(['success'=> true, 'message'=> "This Item Delete Successfully"]);
        }else{
            return response()->json(['success'=> false, 'message'=> "first Serve Title Master Delete"]);
        }

    }

    public function wineCategoryList()
    {
        $wineCategories = WineCategory::all();
        return view('admin.baseInfo.all_products', compact('wineCategories'));
    }

    public function wineCategoryStore(Request $request)
    {
        if(!$request->wine_cat_id){
            WineCategory::create([
                'wcat_name'       => $request->wcat_name,
                'show_order'      => $request->show_order,
                'extra_notes'     => $request->extra_notes,
                'lnk_user_insert' => auth()->id(),
            ]);
        }else{
            WineCategory::where('id', $request->wine_cat_id)->update([
                'wcat_name'       => $request->wcat_name,
                'show_order'      => $request->show_order,
                'extra_notes'     => $request->extra_notes,
                'lnk_user_update' => auth()->id(),
            ]);
        }
        return redirect()->back();
    }

    public function wineCategoryEdit($id)
    {
        $wineCategory = WineCategory::where('id', $id)->first();
        return response()->json(['wineCategory' => $wineCategory]);
    }

    public function wineCategoryDestroy(Request $request)
    {
        WineCategory::where('id', $request->wine_cat_id)->delete();
        return response()->json(['success'=> true, 'message'=> "This Item Delete Successfully"]);
    }
    
    // public function wineList(Request $request)
    // {
    //     $wcat_id = $request->wcat_id;
    //     $wine_type = $request->wine_type;

    //     $wineProducts = ProductLiquor::whereNotNull('lnk_wine_cats')
    //     ->with('productGens', 'liquorSize')
    //     ->get();
    //     return response()->json(['wineProducts' => $wineProducts]);
    // }

    public function wineList(Request $request)
    {
        $wcat_id = $request->wcat_id;
        $wine_type = $request->wine_type;
        $org_country = $request->org_country;
        $org_region = $request->org_region;
        $region = '';
        $query = ProductLiquor::whereNotNull('lnk_wine_cats');
        if ($wcat_id) {
            $query->WhereJsonContains('lnk_wine_cats', $wcat_id);
        }

        if ($wine_type) {
            $query->where('wine_type', $wine_type);
        }

        if ($org_country) {
            $query->where('org_country', $org_country);
            $region = $query->distinct()->pluck('org_region');
        }

        if ($org_region) {
            $query->where('org_region', $org_region);
        }
        $wineProducts = $query->with('productGens', 'liquorSize')->get();
        return response()->json(['wineProducts' => $wineProducts, 'region' => $region]);
    }

    public function preparationStore(Request $request)
    {
        // dd($request->all());
        if($request->preparation_id == null){
            ProdPreparation:: where('lnk_main_product', $request->lnk_main_product)->delete();
            $request->validate([
                'prep_desc' => 'required'
            ]);
        }else{
            $preparation_id = array_filter($request->preparation_id);
            ProdPreparation::whereNotIn('id', $preparation_id)->where('lnk_main_product', $request->lnk_main_product)->delete();
        }
        $prep_desc = array_filter($request->prep_desc);
        if($prep_desc){
            foreach($prep_desc as $key => $_prep_desc){
                $_id = isset($preparation_id[$key]) ? $preparation_id[$key] : null;
                if($_id){
                    ProdPreparation::where('id', $_id)->update([
                        'lnk_main_product' => $request->lnk_main_product,
                        'prep_desc' => $_prep_desc,
                        'numbers_served' => $request->numbers_served[$key],
                        'pieces_per_serving' => $request->pieces_per_serving[$key],
                        'price_bq_inhouse' => $request->price_bq_inhouse[$key],
                        'price_bq_catering' => $request->price_bq_catering[$key],
                        'price_rstn_inhouse' => $request->price_rstn_inhouse[$key],
                        'price_rstn_catering' => $request->price_rstn_catering[$key],
                        'usage_type' => json_encode($request->{"usage_type_${key}"}),
                        'is_active' => 1,
                        'unit_of_measure' => $request->{"unit_of_measure_${key}"}??0,
                        'lnk_user_update' => auth()->id(),
                        'combo_use_only' => $request->{"combo_use_only_${key}"}??0,
                    ]);
                }else{
                    ProdPreparation::create([
                        'lnk_main_product' => $request->lnk_main_product,
                        'prep_desc' => $_prep_desc,
                        'numbers_served' => $request->numbers_served[$key],
                        'pieces_per_serving' => $request->pieces_per_serving[$key],
                        'price_bq_inhouse' => $request->price_bq_inhouse[$key],
                        'price_bq_catering' => $request->price_bq_catering[$key],
                        'price_rstn_inhouse' => $request->price_rstn_inhouse[$key],
                        'price_rstn_catering' => $request->price_rstn_catering[$key],
                        'usage_type' => json_encode($request->{"usage_type_${key}"}),
                        'is_active' => 1,
                        'unit_of_measure' => $request->{"unit_of_measure_${key}"}??0,
                        'lnk_user_insert' => auth()->id(),
                        'combo_use_only' => $request->{"combo_use_only_${key}"}??0,
                    ]);
                }
            }
        }
        return redirect()->back();
    }

    public function preparationEdit($id)
    {
        // dd($id);
        $prodPreparations = ProdPreparation::where('lnk_main_product', $id)->get();
        // dd($prodPreparations);
        return response()->json(['prodPreparations' => $prodPreparations]);
    }
}
