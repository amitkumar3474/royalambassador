<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'package_name' => 'required',
            'capacity'     =>  'required|numeric',
            'unit_of_measure'     =>  'required',
        ]);
        if($request->package_type_id){
            PackageType::whereId($request->package_type_id)->update([
                'package_name' => $request->package_name,
                'capacity' => $request->capacity,
                'unit_of_measure' => $request->unit_of_measure,
                'package_desc' => $request->package_desc,
                'lnk_user_update' => auth()->id(),
            ]);
        }else{
            PackageType::create([
                'package_name' => $request->package_name,
                'capacity' => $request->capacity,
                'unit_of_measure' => $request->unit_of_measure,
                'package_desc' => $request->package_desc,
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
        $packageType = PackageType::whereId($id)->first();
        return response()->json(['packageType' => $packageType]);
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
        PackageType::whereId($id)->delete();
        return response()->json(['success' => true, 'message' => "this record delete successfully"]);
    }
}
