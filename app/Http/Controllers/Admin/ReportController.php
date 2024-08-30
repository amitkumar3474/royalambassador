<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Staff;
use App\Models\Facility;
use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function salesDetails(Request $request)
    {
        // dd($request->event_status);
        $events = Event::when(($request->lnk_event_type), function($query) use ($request){
            $query->where('lnk_event_type', $request->lnk_event_type);
        })
        ->when(($request->lnk_sales_person), function($query) use ($request){
            $query->whereJsonContains('lnk_sales_person', $request->lnk_sales_person);
        })
        ->when(($request->event_status), function($query) use ($request){
            $query->where('event_status', $request->event_status);
        })
        ->when(($request->ed_more), function($query) use ($request){
            $query->where('start_date_time' ,'>=', $request->ed_more);
        })
        ->when(($request->ed_less), function($query) use ($request){
            $query->where('end_date_time', '<=', $request->ed_less);
        });
        
        $allRecords = $events->count();
        $subTotal = $events->sum('sub_total');
        $tax1_amount = $events->sum('tax1_amount');
        $grand_total = $events->sum('grand_total');
        $deposit = $events->sum('deposit');
        $balance = $events->sum('balance');
        $salesPersons = Staff::orderBy('first_name')->get();
        $eventTypes = EventType::orderBy('type_name')->get();
        $events = $events->paginate($request->pages??20); 
        return view('admin.reports.report_sales_detail', compact('salesPersons','eventTypes', 'events', 'allRecords', 'subTotal', 'tax1_amount', 'grand_total', 'deposit', 'balance'));
    }

    public function reportActualPayments()
    {
        return view('admin.reports.report_actual_payments');
    }

    public function reportEventList(Request $request)
    {
        $events = Event::where('event_status', 2)
        ->when(($request->lnk_event_type), function($query) use ($request){
            $query->where('lnk_event_type', $request->lnk_event_type);
        })
        ->when(($request->lnk_sales_person), function($query) use ($request){
            $query->whereJsonContains('lnk_sales_person', $request->lnk_sales_person);
        })
        ->when(($request->ed_more), function($query) use ($request){
            $query->where('start_date_time' ,'>=', $request->ed_more);
        })
        ->when(($request->ed_less), function($query) use ($request){
            $query->where('end_date_time', '<=', $request->ed_less);
        })
        ->when($request->lnk_facility, function($query) use ($request) {
            $query->whereHas('eventFacilities.facility', function($q) use ($request) {
                $q->where('id',$request->lnk_facility);
            });
        });
        
        $allRecords = $events->count();
        $totalAdults = $events->sum('adults');
        $salesPersons = Staff::orderBy('first_name')->get();
        $eventTypes = EventType::orderBy('type_name')->get();
        $facilities =  Facility ::orderBy('facility_name')->where('lnk_child_facilities', null)->get();
        $events = $events->paginate($request->pages??20); 
        return view('admin.reports.report_event_list', compact('salesPersons', 'eventTypes', 'facilities', 'events', 'allRecords','totalAdults'));

    }

    public function reportBookingDetails(Request $request)
    {
        $events = Event::when(($request->lnk_event_type), function($query) use ($request){
            $query->where('lnk_event_type', $request->lnk_event_type);
        })
        ->when(($request->lnk_sales_person), function($query) use ($request){
            $query->whereJsonContains('lnk_sales_person', $request->lnk_sales_person);
        })
        ->when(($request->event_status), function($query) use ($request){
            $query->where('event_status', $request->event_status);
        })
        ->when(($request->ed_more), function($query) use ($request){
            $query->where('booking_date' ,'>=', $request->ed_more);
        })
        ->when(($request->ed_less), function($query) use ($request){
            $query->where('booking_date', '<=', $request->ed_less);
        });
        
        $allRecords = $events->count();
        $averageAllPages = 0;
        if($allRecords > 0){
            $subTotal = $events->sum('price_per_person');
            $averageAllPages = $subTotal/$allRecords;
        }
        $subTotal = $events->sum('sub_total');
        $deposit = $events->sum('deposit');
        $salesPersons = Staff::orderBy('first_name')->get();
        $eventTypes = EventType::orderBy('type_name')->get();
        $events = $events->paginate($request->pages??30); 
        return view('admin.reports.report_booking_details', compact('salesPersons','eventTypes', 'events', 'allRecords', 'subTotal', 'deposit'));
    }

    public function reportAvgPricePerPerson(Request $request)
    {
        $events = Event::when(($request->lnk_event_type), function($query) use ($request){
            $query->where('lnk_event_type', $request->lnk_event_type);
        })
        ->when(($request->lnk_sales_person), function($query) use ($request){
            $query->whereJsonContains('lnk_sales_person', $request->lnk_sales_person);
        })
        ->when(($request->event_status), function($query) use ($request){
            $query->where('event_status', $request->event_status);
        })
        ->when(($request->ed_more), function($query) use ($request){
            $query->where('start_date_time' ,'>=', $request->ed_more);
        })
        ->when(($request->ed_less), function($query) use ($request){
            $query->where('end_date_time', '<=', $request->ed_less);
        });
        
        $allRecords = $events->count();
        $averageAllPages = 0;
        if($allRecords > 0){
            $subTotal = $events->sum('price_per_person');
            $averageAllPages = $subTotal/$allRecords;
        }
        $salesPersons = Staff::orderBy('first_name')->get();
        $eventTypes = EventType::orderBy('type_name')->get();
        $events = $events->paginate($request->pages??30); 
        return view('admin.reports.report_avg_price_per_person', compact('salesPersons','eventTypes', 'events', 'allRecords', 'averageAllPages'));
    }

    public function reportSalesDrilling(Request $request)
    {
        $events = Event::when(($request->lnk_event_type), function($query) use ($request){
            $query->where('lnk_event_type', $request->lnk_event_type);
        })
        ->when(($request->lnk_sales_person), function($query) use ($request){
            $query->whereJsonContains('lnk_sales_person', $request->lnk_sales_person);
        })
        ->when(($request->event_status), function($query) use ($request){
            $query->where('event_status', $request->event_status);
        })
        ->when(($request->ed_more), function($query) use ($request){
            $query->where('start_date_time' ,'>=', $request->ed_more);
        })
        ->when(($request->ed_less), function($query) use ($request){
            $query->where('end_date_time', '<=', $request->ed_less);
        })
        ->when(($request->ea_more), function($query) use ($request){
            $query->where('adults', '>=', $request->ea_more);
        })
        ->when(($request->ea_less), function($query) use ($request){
            $query->where('adults', '>=', $request->ea_less);
        })
        ->when(($request->pp_more), function($query) use ($request){
            $query->where('price_per_person', '>=', $request->pp_more);
        })
        ->when(($request->pp_less), function($query) use ($request){
            $query->where('price_per_person', '<=', $request->pp_less);
        });
        
        $allRecords = $events->count();
        $averageAllPages = 0;
        if($allRecords > 0){
            $subTotal = $events->sum('price_per_person');
            $averageAllPages = $subTotal/$allRecords;
        }
        $salesPersons = Staff::orderBy('first_name')->get();
        $eventTypes = EventType::orderBy('type_name')->get();
        $events = $events->paginate($request->pages??30); 
        return view('admin.reports.report_sales_drilling', compact('salesPersons','eventTypes', 'events', 'allRecords', 'averageAllPages'));
    }

    public function reportLineItemSales()
    {
        return view('admin.reports.report_line_item_sales');
    }

    public function reportSalesByEventType()
    {
        return view('admin.reports.report_sales_by_event_type');
    }
}
