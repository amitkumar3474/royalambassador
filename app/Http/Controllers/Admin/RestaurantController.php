<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RestHour;
use App\Models\RestSchedule;
use Auth;

class RestaurantController extends Controller
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
        $data = [
            'start_dt' => sprintf('%s %02d:%02d:00', $request->start_dt, $request->start_dt_hour, $request->start_dt_min),
            'end_dt' => sprintf('%s %02d:%02d:00', $request->end_dt, $request->end_dt_hour, $request->end_dt_min),
            'open_for' => $request->open_for,
            'special_notes' => $request->special_notes,
        ];
        
        if(!$request->hour_id){
            $data['lnk_user_insert'] = auth()->id();
            RestHour::create($data);
        }else{
            $data['lnk_user_update'] = auth()->id();
            RestHour::where('id', $request->hour_id)->update($data);
        }
        return redirect()->route('admin.schedule.restaurant');
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
        $scheduleshour = RestHour::findOrFail($id);
        return response()->json(['scheduleshour' => $scheduleshour]);
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
        RestHour::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'This record deleted successfully.']);
    }

    // Add Schedule for Restaurant
    public function weeklyScheduleStore(Request $request)
    {
        $data = [
            'sch_usage'        => $request->sch_usage,
            'day_of_week'      => $request->day_of_week,
            'from_time'        => sprintf('%02d:%02d:00', $request->from_time_hour, $request->from_time_min),
            'to_time'          => sprintf('%02d:%02d:00', $request->to_time_hour, $request->to_time_min),
            'open_for'         => $request->open_for,
        ];

        if($request->sch_usage == 'I'){
            if(!$request->weekly_schedule_id){
                $data['lnk_user_insert']  = auth()->id();
                $data['max_adults']       = $request->max_adults;
                $data['max_reservations'] = $request->max_reservations;
                RestSchedule::create($data);
            }else{
                RestSchedule::where('id', $request->weekly_schedule_id)->update($data);
            }
        }else{
            if(!$request->weekly_schedule_id){
                $data['lnk_user_insert']  = auth()->id();
                $data['sch_venue']        = $request->sch_venue;
                RestSchedule::create($data);
            }else{
                $data['lnk_user_insert']  = auth()->id();
                $data['sch_venue']        = $request->sch_venue;
                RestSchedule::where('id', $request->weekly_schedule_id)->update($data);
            }
        }   
        return redirect()->route('admin.schedule.restaurant'); 
    }

    // Edit Schedule for Restaurant
    public function weeklyScheduleEdit($id)
    {
        $weeklySchedule = RestSchedule::findOrFail($id);
        return response()->json(['weeklySchedule' => $weeklySchedule]);
    }

    // Delete Schedule for Restaurant
    public function weeklyScheduleDestroy($id)
    {
        RestSchedule::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'This record deleted successfully.']);
    }
}
