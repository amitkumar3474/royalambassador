<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\ProductGen;
use Illuminate\Http\Request;
use App\Models\ServeTitleMaster;
use App\Http\Controllers\Controller;

class ServeTitleMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serveTitleMasters = ServeTitleMaster::all();
        return view('admin.baseInfo.serve_title_masters', compact('serveTitleMasters'));
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
        ServeTitleMaster::create([
            'stitle_heading' => $request->stitle_heading,
            'lnk_user_insert'=> auth()->id()
        ]);
        return redirect()->back();
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
        $serveTitleMaster = ServeTitleMaster::where('id', $id)->first();
        $vegetarianProducts = ProductGen::with('category')->whereJsonContains('specialty_options', 'VT')->get();
        $veganProducts = ProductGen::with('category')->whereJsonContains('specialty_options', 'VN')->get();
        $glutenFreeProducts = ProductGen::with('category')->whereJsonContains('specialty_options', 'GF')->get();
        $nutFreeProducts = ProductGen::with('category')->whereJsonContains('specialty_options', 'NF')->get();
        $dairyAllergyProducts = ProductGen::with('category')->whereJsonContains('specialty_options', 'DA')->get();
        return response()->json(['serveTitleMaster' => $serveTitleMaster, 'vegetarianProducts' => $vegetarianProducts, 'veganProducts' => $veganProducts, 'glutenFreeProducts' => $glutenFreeProducts, 'nutFreeProducts' => $nutFreeProducts, 'dairyAllergyProducts' => $dairyAllergyProducts]);
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
        ServeTitleMaster::whereId($id)->update([
            'stitle_heading' => $request->stitle_heading,
            'specialty_options' => json_encode([
                'vt' => $request->specialty_options_vt,
                'vn' => $request->specialty_options_vn,
                'gf' => $request->specialty_options_gf,
                'nf' => $request->specialty_options_nf,
                'da' => $request->specialty_options_da,
            ]),
            'lnk_user_update'=> auth()->id(),
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
        ServeTitleMaster::whereId($id)->delete();
        return response()->json(['success'=> true, 'message'=> "This Item Delete Successfully"]);
    }
}
