<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\LiquorList;
use Illuminate\Http\Request;
use App\Models\LiquorListItem;
use App\Http\Controllers\Controller;

class LiquorListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liquorLists = LiquorList::all();
        return view('admin.liquorProducts.liquor_inv_list', compact('liquorLists'));
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
        // dd($request->all());
        $request->validate([
            'lq_list_name' => 'required'
        ]);
        if($request->lq_list_id){
            LiquorList::whereId($request->lq_list_id)->update([
                'lq_list_name' => $request->lq_list_name,
                'lq_list_desc' => $request->lq_list_name,
                'lnk_user_update' => auth()->id(),
            ]);
        }else{
            LiquorList::create([
                'lq_list_name' => $request->lq_list_name,
                'lq_list_desc' => $request->lq_list_name,
                'lnk_user_insert' => auth()->id(),
            ]);
        }
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
        $liquorList = LiquorList::whereId($id)->first();
        return response()->json(['liquorList' => $liquorList]);
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
        $liquorListItem = LiquorListItem::where('lnk_liquor_list', $id)->exists();
        if($liquorListItem){
            return response()->json(['error' => true]);
        }else{
            LiquorList::whereId($id)->delete();
            return response()->json(['success' => true]);
        }
    }

    public function liquorListItemStore(Request $request)
    {
        LiquorListItem::create([
            'lnk_liquor_list' => $request->lq_list_id,
            'lnk_product'     => $request->product_id,
            'qty'             => $request->qty,
            'lnk_user_insert' => auth()->id()
        ]);
        return response()->json(['success' => true]);
    }

    public function liquorListItemDestroy(Request $request)
    {
        LiquorListItem::whereId($request->id)->delete();
        return response()->json(['success' => true]);
    }

}
