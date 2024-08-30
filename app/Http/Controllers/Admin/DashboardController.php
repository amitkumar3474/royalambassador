<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Facility;
use App\Models\FloorPlan;
use Illuminate\Http\Request;
use App\Models\EventFacility;
use App\Models\FloorPlanRoom;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function roomCalendar(Request $request)
    {
        $currentDate = date("Y:m:d H:i:s",strtotime($request->current_date)) ?? date("Y:m:d H:i:s");
     
        $startDate = date('Y-m-01', strtotime($currentDate));
        $endDate = date('Y-m-t', strtotime($currentDate));
        $floorPlan = EventFacility::with('event')
        ->whereHas('event', function ($query) use ($startDate, $endDate) {
            $query->where('start_date_time', '>=', $startDate)
                  ->where('end_date_time', '<=', $endDate);
        })
        ->get();
        // dd($floorPlan);
        $rooms = Facility::select('id', 'facility_name', 'abbreviation')->get();
        return view('admin.room_availability_calendar', compact('floorPlan', 'rooms'));
    }

    public function deposit()
    {
        return view('admin.due_deposits.index');
    }
}

