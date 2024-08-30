<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FloorPlanRoom;
use App\Http\Controllers\Controller;

class FloorPlanRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floorPlanRooms = FloorPlanRoom::orderby('room_name')->get();
        return view('admin.baseInfo.floor_plan_settings', compact('floorPlanRooms'));
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
        if(!$request->floor_plan_room_id){
            FloorPlanRoom::create([
                'room_name' => $request->room_name,
                'room_legend' => $request->room_legend,
                'room_length' => $request->room_length,
                'room_width' => $request->room_width,
                'toolbar_width' => $request->toolbar_width,
                'image_scale' => $request->image_scale,
                'lnk_user_insert' => auth()->id()
            ]);
        }else{
            FloorPlanRoom::where('id', $request->floor_plan_room_id)->update([
                'room_name' => $request->room_name,
                'room_legend' => $request->room_legend,
                'room_length' => $request->room_length,
                'room_width' => $request->room_width,
                'toolbar_width' => $request->toolbar_width,
                'image_scale' => $request->image_scale,
                'lnk_user_update' => auth()->id()
            ]);
        }
        return redirect()->route('admin.base-info.floor-plan-settings.index');
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
        $floorplanroom = FloorPlanRoom::where('id', $id)->first();
        // dd($floorplanroom);
        return response()->json(['floorplanroom' => $floorplanroom]);
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
        FloorPlanRoom::where('id', $id)->delete();
        return response()->json(['success' => 'Selected records deleted successfully']);
    }
}
