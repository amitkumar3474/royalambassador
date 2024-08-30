<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\FloorPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventFloorPlanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $floorPlan = FloorPlan::create([
            'lnk_event'       => $request->event_id,
            'lnk_fplan_room'  => $request->floor_plan_new_lnk_fplan_room,
            'fplan_status'    => 2,
            'lnk_user_insert' => auth()->id()
        ]);
        return redirect()->route('admin.event.floor-plans.show',$floorPlan->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $floorPlan = FloorPlan::with('event.customer', 'floorPlanRoom')->find($id);
        return view('admin.events.floor-plan-view', compact('floorPlan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FloorPlan::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Event floor plans deleted successfully.']);
    }
}
