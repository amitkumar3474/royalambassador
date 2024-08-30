<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\ProductCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productcats = ProductCat::where('lnk_top_cat', 0)->when(($request->input('cat_type') != ""), function($query) use ($request){
            $query->where('cat_type', $request->input('cat_type'));
        })
        ->when(($request->input('is_active') != ""), function($query) use ($request){
            $query->where('is_active', $request->input('is_active'));
        })
        ->get();
        return view('admin.baseInfo.all_products', compact('productcats'));
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
        if(!$request->lnk_top_cat && !$request->product_cat_id){
            ProductCat::create([
                'cat_type'       => $request->cat_type,
                'cat_name'       => $request->cat_name,
                'show_order'     => $request->show_order,
                'extra_notes'    => $request->extra_notes,
                'is_active'      => 1,
                'lnk_user_insert'=> auth()->id(),
                'lnk_top_cat'    => 0,
            ]);
        }elseif($request->product_cat_id){
            ProductCat::where('id', $request->product_cat_id)->update([
                'cat_name'       => $request->cat_name,
                'show_order'     => $request->show_order,
                'extra_notes'    => $request->extra_notes,
                'is_active'      => $request->is_active,
                'lnk_user_update'=> auth()->id(),
            ]);
        }
        else{
            ProductCat::create([
                'cat_type'       => $request->cat_type,
                'cat_name'       => $request->cat_name,
                'lnk_top_cat'    => $request->lnk_top_cat,
                'show_order'     => $request->show_order,
                'is_active'      => $request->is_active,
                'lnk_user_insert'=> auth()->id(),
            ]);
        }
        return redirect()->route('admin.base-info.product-cat-list.index', ['cat_type'=>'M', 'is_active'=>1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCat = ProductCat::where('id', $id)->first();
        return response()->json(['productCat' => $productCat]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCat::where('id', $id)->delete();
        ProductCat::where('lnk_top_cat', $id)->delete();
        return response()->json(['success' => 'Selected records deleted successfully']);
    }
}
