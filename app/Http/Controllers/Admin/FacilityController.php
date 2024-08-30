<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Models\FacilityPricing;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalFPRecord = FacilityPricing::count();
        $facilities = Facility::orderBy('facility_name')->get(); 
        return view('admin.baseInfo.facility_list', compact('facilities', 'totalFPRecord'));
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
        Facility::create([
            'facility_name'         => $request->facility_name,
            'abbreviation'          => $request->abbreviation,
            'max_capacity'          => $request->max_capacity,
            'max_concurrent_events' => $request->max_concurrent_events
        ]);

        return redirect()->route('admin.base-info.facility-list.index');
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
        $facility = Facility::where('id', $id)->first();
        return response()->json(['facility' => $facility]);
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
        Facility::where('id', $id)->update([
            'facility_name'         => $request->facility_name,
            'abbreviation'          => $request->abbreviation,
            'lnk_child_facilities'  => $request->lnk_child_facilities?json_encode($request->lnk_child_facilities):NULL,
            'max_capacity'          => $request->max_capacity,
            'max_concurrent_events' => $request->max_concurrent_events,
            'lnk_user_update'       => auth()->id()
        ]);

        return redirect()->route('admin.base-info.facility-list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Facility::where('id', $id)->delete();
        FacilityPricing::where('lnk_facility', $id)->delete();
        return response()->json(['success' => 'Selected records deleted successfully']);
    }

    public function pricingStore(Request $request)
    {
        if(!$request->pricing_id){
            FacilityPricing::create([
                'lnk_facility'    => $request->facility_id,
                'pricing_title'   => $request->pricing_title,
                'price'           => $request->price,
                'lnk_tax_group'   => $request->lnk_tax_group,
                'lnk_user_insert' => auth()->id()
            ]);
        }else{
            FacilityPricing::where('id', $request->pricing_id)->update([
                'lnk_facility'    => $request->facility_id,
                'pricing_title'   => $request->pricing_title,
                'price'           => $request->price,
                'lnk_tax_group'   => $request->lnk_tax_group,
                'lnk_user_update' => auth()->id()
            ]);
        }
        
        return redirect()->route('admin.base-info.facility-list.index');
    }

    public function pricingDestroy(Request $request)
    {
        FacilityPricing::where('id', $request->pricing_id)->delete();
        return response()->json(['success' => 'Selected records deleted successfully']);
    }
}
