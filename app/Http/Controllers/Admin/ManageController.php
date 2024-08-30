<?php

namespace App\Http\Controllers\Admin;

use auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StaffScheduleItem;
use App\Http\Controllers\Controller;
use App\Models\RestHour;
use App\Models\RestSchedule;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scheduleUserStaff(Request $request)
    {
        $currentDate = $request->filled('current_date') ? Carbon::parse($request->current_date)->format('Y-m-d H:i:s') : Carbon::now()->format('Y-m-d H:i:s');
        $startDate = date('Y-m-01', strtotime($currentDate));
        $endDate = date('Y-m-t', strtotime($currentDate));
        $staffSchedules = StaffScheduleItem::where('schedule_date', '>=', $startDate)->where('schedule_date', '<=', $endDate)->get();
        return view('admin.staff_schedule.user_staff_schedule', compact('staffSchedules'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scheduleRestaurant(Request $request)
    {
        $currentDate = $request->filled('current_date') ? Carbon::parse($request->current_date)->format('Y-m-d H:i:s') : Carbon::now()->format('Y-m-d H:i:s');
        $startDate = date('Y-m-01', strtotime($currentDate));
        $endDate = date('Y-m-t', strtotime($currentDate));
        // $hourOperations = RestHour::get();
        $hourOperations = RestHour::where('start_dt', '>=', $startDate)->where('end_dt', '<=', $endDate)->get();
        $weeklySchedules = RestSchedule::where('sch_usage', 'I')->get();
        $weeklySchedulesWebSite = RestSchedule::where('sch_venue', 'R')->get();
        $weeklySchedulesBanquetSide = RestSchedule::where('sch_venue', 'B')->get();
        return view('admin.staff_schedule.manage_restaurant_schedule', compact('hourOperations', 'weeklySchedules','weeklySchedulesWebSite','weeklySchedulesBanquetSide'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurantDailySale()
    {
        return view('admin.staff_schedule.restaurant_daily_sales');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function scheduleStore(Request $request)
    {
        $request->validate([
            'schedule_type'                             => 'required',
            // 'new_staff_schedule_item_sch_start_dt_hour' => 'required',
            // 'new_staff_schedule_item_sch_end_dt_date'   => 'required',
            // 'new_staff_schedule_item_sch_end_dt_hour'   => 'required',
        ]);

        $startDateTime = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $request->input('sch_item_date') . ' ' . 
            str_pad($request->input('new_staff_schedule_item_sch_start_dt_hour'), 2, '0', STR_PAD_LEFT) . ':' . 
            str_pad($request->input('new_staff_schedule_item_sch_start_dt_min'), 2, '0', STR_PAD_LEFT) . ':00'
        );

        $endDateTime = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $request->input('new_staff_schedule_item_sch_end_dt_date') . ' ' . 
            str_pad($request->input('new_staff_schedule_item_sch_end_dt_hour'), 2, '0', STR_PAD_LEFT) . ':' . 
            str_pad($request->input('new_staff_schedule_item_sch_end_dt_min'), 2, '0', STR_PAD_LEFT) . ':00'
        );

        $totalHours = $endDateTime->diffInHours($startDateTime);
        $data = [
            'lnk_staff_schedule' => 1,
            'schedule_type' => $request->schedule_type,
            'schedule_date' => $request->sch_item_date??'',
            'sch_start_dt' => $startDateTime??'',
            'sch_end_dt' => $endDateTime??'',
            'total_hours' => $totalHours??'',
            'lnk_user_insert' => auth()->id(),
        ];
        if (!$request->edit_sch_id) {
            $conflictingSchedule = StaffScheduleItem::where(function ($query) use ($startDateTime, $endDateTime, $request) {
                $query->where(function ($query) use ($startDateTime, $endDateTime) {
                    $query->where('sch_start_dt', '<', $endDateTime)
                          ->where('sch_end_dt', '>', $startDateTime);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('schedule_date', '=', $request->input('new_staff_schedule_item_sch_end_dt_date'))
                          ->whereIn('schedule_type', [3, 5]);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('schedule_date', '=', $request->sch_item_date)
                          ->whereIn('schedule_type', [3, 5]);
                });
            })->exists();
            if (!$conflictingSchedule) {
                if ($request->schedule_type == 3 || $request->schedule_type == 5) {
                    StaffScheduleItem::create([
                        'lnk_staff_schedule' => 1,
                        'schedule_type'      => $request->schedule_type,
                        'lnk_user_insert'    => auth()->id(),
                        'schedule_date' => $request->sch_item_date,
                    ]);
                    return response()->json(['success' => true]);
                } else {
                    StaffScheduleItem::create($data);
                    return response()->json(['success' => true]);
                } 
            } else {
                return response()->json(['message' => "There is a full day off or vacation for this day. No more schedule allowed."]);
            }
        } else {
            // Update operation based on edit_sch_id
            $conflictingSchedule = StaffScheduleItem::where(function ($query) use ($startDateTime, $endDateTime, $request) {
                $query->where('id', '!=', $request->edit_sch_id) // Exclude the current schedule item being edited
                      ->where(function ($query) use ($startDateTime, $endDateTime) {
                          $query->where('sch_start_dt', '<', $endDateTime)
                                ->where('sch_end_dt', '>', $startDateTime);
                      })
                      ->orWhere(function ($query) use ($request) {
                          $query->where('id', '!=', $request->edit_sch_id)->where('schedule_date', '=', $request->input('new_staff_schedule_item_sch_end_dt_date'))
                                ->whereIn('schedule_type', [3, 5]);
                      })
                      ->orWhere(function ($query) use ($request) {
                          $query->where('id', '!=', $request->edit_sch_id)->where('schedule_date', '=', $request->sch_item_date)
                                ->whereIn('schedule_type', [3, 5]);
                      });
            })->exists();
        
            if (!$conflictingSchedule) {
                // No conflicts, proceed with updating the schedule item
                $staffScheduleItem = StaffScheduleItem::findOrFail($request->edit_sch_id);
                // Update the staff schedule item with the new data
                $staffScheduleItem->update($data);
                return response()->json(['success' => true]);
            } else {
                // Conflicting schedules found
                return response()->json(['message' => "There is a conflict of schedules for this day. Please try again."]);
            }
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedulesItem = StaffScheduleItem::findOrFail($id);
        return response()->json(['schedulesItem' => $schedulesItem]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaffScheduleItem::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Schedule Item deleted successfully.']);
    }

}
