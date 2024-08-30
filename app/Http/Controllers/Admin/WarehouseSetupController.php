<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\InvLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarehouseSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invLevels = InvLevel::all();
        return view('admin.inventory.warehouse_setup', compact('invLevels'));
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
        InvLevel::create([
            'level_code'      => $request->level_code,
            'level_desc'      => $request->level_desc,
            'lnk_user_insert' => auth()->id()
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
        $invLevel = InvLevel::where('id', $id)->first();
        return response()->json(['invLevel' => $invLevel]);
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
        InvLevel::whereId($id)->update([
            'level_code'      => $request->level_code,
            'level_desc'      => $request->level_desc,
            'lnk_user_update' => auth()->id()
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
        InvLevel::whereId($id)->delete();
        return response()->json(['success' => "This InvLevel delete Successfully"]);
    }
}
