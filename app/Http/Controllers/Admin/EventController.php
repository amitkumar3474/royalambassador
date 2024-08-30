<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Customer;
use App\Models\Facility;
use App\Models\EventType;
use App\Models\FloorPlan;
use Illuminate\Http\Request;
use App\Models\EventFacility;
use App\Models\FloorPlanRoom;
use App\Models\CustomerContact;
use App\Models\FacilityPricing;
use App\Models\ItineraryTemplate;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $events = Event::with('customer', 'eventType', 'eventFacilities.facility')->get();
        $events = Event::with('customer', 'eventType', 'eventFacilities.facility')
        ->when($request->input('event_id'), function ($query) use ($request) {
            $query->where('id', $request->input('event_id'));
        })
        ->when(($request->input('event_catering_type') != ""), function ($query) use ($request) {
            $query->where('catering_type', $request->input('event_catering_type'));
        })
        ->when(($request->input('event_contract_type') != ""), function ($query) use ($request) {
            $query->where('contract_type', $request->input('event_contract_type'));
        })
        ->when($request->filled('event_type'), function ($query) use ($request) {
            $query->whereIn('lnk_event_type', $request->input('event_type'));
        })
        ->when($request->input('event_status'), function ($query) use ($request) {
            $query->where('event_status', $request->input('event_status'));
        })
        ->when($request->filled('event_start_date') && $request->filled('event_end_date'), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('start_date_time', '>=', $request->input('event_start_date'))
                      ->where('end_date_time', '<=', $request->input('event_end_date'));
            });
        })
        ->when($request->input('event_customer_name'), function ($query) use ($request) {
            $query->whereHas('customer', function ($subQuery) use ($request) {
                $subQuery->where('customer_name', $request->input('event_customer_name'));
            });
        })
        ->orderByDesc('id')
        ->get();
        $users = User::select('name', 'id')->get();
        $eventTypes = EventType::select('type_name', 'id')->get();
        return view('admin.events.index', compact('events', 'users', 'eventTypes'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivEvent(Request $request)
    {
        // $events = Event::with('customer', 'eventType', 'eventFacilities.facility')->get();
        $events = Event::with('customer', 'eventType', 'eventFacilities.facility')
        ->when($request->input('events_archive_id'), function ($query) use ($request) {
            $query->where('id', $request->input('events_archive_id'));
        })
        ->when($request->filled('events_archive_event_type'), function ($query) use ($request) {
            $query->whereIn('lnk_event_type', $request->input('events_archive_event_type'));
        })
        ->when($request->input('events_archive_status'), function ($query) use ($request) {
            $query->where('event_status', $request->input('events_archive_status'));
        })
        ->when($request->filled('event_archive_start_date') && $request->filled('event_archive_end_date'), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('start_date_time', '>=', $request->input('event_archive_start_date'))
                      ->where('end_date_time', '<=', $request->input('event_archive_end_date'));
            });
        })
        ->when($request->input('events_archive_customer_name'), function ($query) use ($request) {
            $query->whereHas('customer', function ($subQuery) use ($request) {
                $subQuery->where('customer_name', $request->input('events_archive_customer_name'));
            });
        })
        ->orderByDesc('id')
        ->whereIn('event_status',[3,4])
        ->get();
        $users = User::select('name', 'id')->get();
        $eventTypes = EventType::select('type_name', 'id')->get();
        return view('admin.events.archive', compact('events', 'users', 'eventTypes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tentativEvent(Request $request)
    {
        // $events = Event::with('customer', 'eventType', 'eventFacilities.facility')->get();
        $events = Event::with('customer', 'eventType')
        ->when($request->input('event_status'), function ($query) use ($request) {
            $query->where('event_status', $request->input('event_status'));
        })
        ->when($request->input('event_customer_name'), function ($query) use ($request) {
            $query->whereHas('customer', function ($subQuery) use ($request) {
                $subQuery->where('customer_name', $request->input('event_customer_name'));
            });
        })
        ->orderByDesc('id')
        ->where('event_status',$request->event_status??1)
        ->get();
        $users = User::select('name', 'id')->get();
        return view('admin.events.tentative', compact('events', 'users'));
    }

    /**
     * Display a listing of the floor plans.
     *
     * @return \Illuminate\Http\Response
     */
    public function floorPlans(Request $request)
    {
        $floorplans = FloorPlan::with('event.customer', 'floorPlanRoom')
        ->when($request->input('floor_plans_lnk_fplan_room'), function ($query) use ($request) {
            $query->where('lnk_fplan_room', $request->input('floor_plans_lnk_fplan_room'));
        })
        ->when($request->input('floor_plans_fplan_status'), function ($query) use ($request) {
            $query->where('fplan_status', $request->input('floor_plans_fplan_status'));
        })
        ->when($request->input('floor_plans_id'), function ($query) use ($request) {
            $query->whereHas('event', function ($subQuery) use ($request) {
                $subQuery->where('id', $request->input('floor_plans_id'));
            });
        })
        ->when($request->input('floor_plans_event_status'), function ($query) use ($request) {
            $query->whereHas('event', function ($subQuery) use ($request) {
                $subQuery->where('event_status', $request->input('floor_plans_event_status'));
            });
        })
        ->when($request->filled('floor_plans_start_date'), function ($query) use ($request) {
            $query->whereHas('event', function ($subQuery) use ($request) {
                $subQuery->where('start_date_time', '>=', $request->input('floor_plans_start_date'));
            });
        })
        ->when($request->filled('floor_plans_customer_name'), function ($query) use ($request) {
            $query->whereHas('event.customer', function ($subQuery) use ($request) {
                $subQuery->where('customer_name', $request->input('floor_plans_customer_name'));
            });
        })
        ->get();
        $floorPlanRooms = FloorPlanRoom::select('room_name', 'id')->get();
        return view('admin.events.floor-plan', compact('floorplans', 'floorPlanRooms'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $customerId = $request->input('customer_id')?? '';
        $room_id = $request->input('room_id')?? '';
        $event_dt = $request->input('event_dt')?? '';
        $customer = Customer::select('customer_name', 'id')->find($customerId);
        $contacts = CustomerContact::select('full_name', 'id')->get();
        $users = User::select('name', 'id')->get();
        $eventTypes = EventType::select('type_name','id')->get();
        $facilities = Facility::select('facility_name','id')->get();
        // $customers = Customer::with('Contacts','events')->get();
        return view('admin.events.create', compact('room_id', 'contacts', 'users', 'event_dt', 'customer', 'eventTypes', 'facilities'));
        // }else {
        //     $room_id = $request->input('room_id');
        //     $event_dt = $request->input('event_dt');

        //     $eventTypes = EventType::select('type_name','id')->get();
        //     $facilities = Facility::select('facility_name','id')->get();
        //     return view('admin.events.create', compact('room_id', 'event_dt', 'eventTypes', 'facilities'));
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (isset($request->cat_contact_id)) {
        //     $request->validate([
        //         'cat_event_lnk_customer' => 'required',
        //         'cat_contact_id' => 'required|numeric',
        //         'cat_sales_person.0' => 'required',
        //         'catering_type' => 'required',
        //         'cat_event_status' => 'required',
        //         'delivery_type' => 'required',
        //         'cat_event_start_date' => 'required',
        //         'cat_event_adults' => 'required',
        //      ]);
        // } else {
        //     $request->validate([
        //         'new_event_lnk_customer' => 'required',
        //         'contact_id' => 'required|numeric',
        //         'event_type' => 'required|numeric',
        //         'sales_person.0' => 'required',
        //         'event_start_date' => 'required',
        //         'event_end_date' => 'required',
        //         'new_event_adults' => 'required',
        //         'dining_type' => 'required',
        //         'event_status' => 'required|numeric',
        //         'contract_type' => 'required',
        //         'rooms.*' => 'required|numeric',
        //     ]);
        // }
        
        // dd($request->all());
        if (isset($request->cat_contact_id)) {
           $event = Event::create([
                'lnk_customer'                 => $request->customer_id,
                'lnk_customer_contact'         => $request->cat_contact_id,
                'lnk_marketing_campaign'       => 0,
                'lnk_bill_to_customer'         => $request->customer_id,
                'lnk_bill_to_customer_contact' => $request->cat_contact_id,
                'lnk_event_type'               => 23,
                'lnk_sales_person'             => $request->input('cat_sales_person'),
                'catering_type'                => $request->catering_type,
                'event_status'                 => $request->cat_event_status??null,
                'delivery_type'                => $request->delivery_type??null,
                'start_date_time'              => sprintf('%s %02d:%02d:00', $request->cat_event_start_date, $request->cat_event_start_hour, $request->cat_event_start_min),
                'adults'                       => $request->cat_event_adults,
                'min_adults'                   => $request->cat_event_adults,
                'kids'                         => 0,
                'babies'                       => 0,
                'pros'                         => 0,
                'adults_actual'                => $request->cat_event_adults,
                'kids_actual'                  => 0,
                'babies_actual'                => 0,
                'pros_actual'                  => 0,
                'lnk_user_insert'              => auth()->id()??0,
            ]);
        }else{
            $prices = $request->input('price', []);
            $priceSum = array_sum($prices);
            $event = Event::create([
                'lnk_customer'                 => $request->customer_id,
                'lnk_event_planner'            => $request->event_planner??null,
                'lnk_customer_contact'         => $request->contact_id,
                'lnk_marketing_campaign'       => 0,
                'lnk_bill_to_customer'         => $request->customer_id,
                'lnk_bill_to_customer_contact' => $request->contact_id,
                'event_status'                 => $request->event_status,
                'contract_type'                => $request->contract_type,
                'lnk_event_type'               => $request->event_type,
                'lnk_sales_person'             => $request->input('sales_person'),
                'start_date_time'              => sprintf('%s %02d:%02d:00', $request->event_start_date, $request->event_start_hour, $request->event_start_min),
                'end_date_time'                => sprintf('%s %02d:%02d:00', $request->event_end_date, $request->event_end_hour, $request->event_end_min),
                'dining_type'                  => $request->dining_type,
                'adults'                       => $request->new_event_adults,
                'min_adults'                   => $request->new_event_adults,
                'kids'                         => $request->new_event_kids??0,
                'babies'                       => $request->new_event_babies??0,
                'pros'                         => $request->new_event_pros??0,
                'total_room_rental'            => $priceSum??0,
                'sub_total'                    => $priceSum??0,
                'gratuity_percent'             => 10,
                'gratuity_amount'              => $priceSum/10,
                'grand_total'                  => $priceSum + $priceSum/10  + ($priceSum/10 + $priceSum)*13/100,
                'tax1_amount'                  => ($priceSum/10 + $priceSum)*13/100,
                'balance'                      => $priceSum + $priceSum/10  + ($priceSum/10 + $priceSum)*13/100,
                'adults_actual'                => $request->new_event_adults,
                'kids_actual'                  => $request->new_event_kids??0,
                'babies_actual'                => $request->new_event_babies??0,
                'pros_actual'                  => $request->new_event_pros??0,
                'special_notes'                => $request->new_event_special_notes??null,
                'invoice_notes'                => $request->new_event_invoice_notes??null,
                'contract_notes'               => $request->new_event_contract_notes??null,
                'office_notes'                 => $request->new_event_office_notes??null,
                'lnk_user_insert'              => auth()->id()??0,
            ]);
            $rooms = $request->input('rooms',[]);
            $same_timing = $request->input('same_timing_as_event') ?? []; 
            if (!empty($rooms)) {
                foreach ($rooms as $key => $room) {
                    $pricing    = $request->input('pricing')[$key];
                    $price      = $request->input('price')[$key];
                    $max_shared = $request->input('max_shared')[$key];
                    $date_from  = $request->input('date_from')[$key];
                    $hour_from  = $request->input('hour_from')[$key];
                    $min_from   = $request->input('min_from')[$key];
                    $date_to    = $request->input('date_to')[$key];
                    $hour_to    = $request->input('hour_to')[$key];
                    $min_to     = $request->input('min_to')[$key];
                    $same_tim_e = isset($same_timing[$key]) ? $same_timing[$key] : 0;
                    EventFacility::create([
                        'lnk_event'             => $event->id,
                        'lnk_facility'          => $room,
                        'max_concurrent_events' => $max_shared,
                        'lnk_pricing'           => $pricing,
                        'sub_total'             => $price,
                        'grand_total'           => $price,
                        'revenue_percent'       => 100,
                        'start_date_time'       => sprintf('%s %02d:%02d:00', $date_from, $hour_from, $min_from),
                        'end_date_time'         => sprintf('%s %02d:%02d:00', $date_to, $hour_to, $min_to),
                        'same_timing_as_event'  => $same_tim_e??0,
                        'lnk_user_insert'       => auth()->id()??0,
                    ]);
                }
            } 
        }
        return redirect()->route('admin.event.show',$event->id);
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with('customer', 'eventType', 'eventFacilities.facility')->whereId($id)->first();
        // dd($event);
        $eventTypes = EventType::select('type_name','id')->get();
        $facilities = Facility::select('facility_name','id')->get();
        $facilityPricing = FacilityPricing::select('lnk_facility', 'pricing_title', 'price', 'id')->get();
        $floorPlans = FloorPlanRoom::select('id', 'room_name')->get();
        $itineraryTemp = ItineraryTemplate::select('id', 'tmpl_title')->get();
        if ($event->lnk_event_type === 29) {
            return redirect()->route('admin.special-event.index',['event_id' =>$event->id]);
        } else {
            return view('admin.events.view', compact('event', 'eventTypes', 'facilities', 'facilityPricing', 'floorPlans', 'itineraryTemp'));
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
        $event = Event::with('customer', 'eventType', 'eventFacilities.facility')->whereId($id)->first();
        $eventTypes = EventType::select('type_name','id')->get();
        $facilities = Facility::select('facility_name','id')->get();
        $users = User::select('name', 'id')->get();
        $facilityPricing = FacilityPricing::select('lnk_facility', 'pricing_title', 'price', 'id')->get();
        return view('admin.events.edit', compact('event', 'users', 'eventTypes', 'facilities', 'facilityPricing'));
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
        if (isset($request->update_guest)) {
            $request->validate([
                'event_update_guests_adults' => 'required|numeric',
                'event_update_guests_kids'   => 'required|numeric',
                'event_update_guests_babies' => 'required|numeric',
                'event_update_guests_pros'   => 'required|numeric',
                'event_adults_actual'        => 'required|numeric',
                'event_kids_actual'          => 'required|numeric',
                'event_babies_actual'        => 'required|numeric',
                'event_pros_actual'          => 'required|numeric',
            ]);
        }
        if (isset($request->catering_type)) {
            $event = Event::whereId($id)->update([
                'lnk_customer'                 => $request->customer_id,
                'lnk_customer_contact'         => $request->edit_contact_id,
                'lnk_marketing_campaign'       => 0,
                'lnk_bill_to_customer'         => $request->customer_id,
                'lnk_bill_to_customer_contact' => $request->edit_bill_to_contact_id,
                'event_title'                  => $request->event_title??null,
                'lnk_event_type'               => 23,
                'lnk_sales_person'             => $request->input('cat_sales_person'),
                'catering_type'                => $request->catering_type,
                'event_status'                 => $request->cat_event_status??null,
                'delivery_type'                => $request->delivery_type??null,
                'start_date_time'              => sprintf('%s %02d:%02d:00', $request->cat_event_start_date, $request->cat_event_start_hour, $request->cat_event_start_min),
                'adults'                       => $request->edit_event_adults,
                'min_adults'                   => $request->edit_event_adults,
                'kids'                         => $request->edit_event_kids,
                'babies'                       => $request->edit_event_babies,
                'pros'                         => $request->edit_event_pros,
                'special_notes'                => $request->edit_event_special_notes,
                'invoice_notes'                => $request->edit_event_invoice_notes,
                'contract_notes'               => $request->edit_event_contract_notes,
                'office_notes'                 => $request->edit_event_office_notes,
                'lnk_user_update'              => auth()->id()??0,
            ]);
        } elseif(isset($request->quick_edit)) {
            $event = Event::whereId($request->event_id)->first();
            $adultsPrice = $event->adults * $request->price_contract_adult;
            $adultsPrice = $adultsPrice - ($adultsPrice*11.5)/100;
            $kidsPrice = $event->kids * $request->price_contract_child;
            $kidsPrice = $kidsPrice - ($kidsPrice*11.5)/100;
            $babiesPrice = $event->babies * $request->event_edit_price_per_baby;
            $babiesPrice = $babiesPrice - ($babiesPrice*11.5)/100;
            $prosPrice = $event->pros * $request->price_contract_pros;
            $prosPrice = $prosPrice - ($prosPrice*11.5)/100;
            $priceSum = ($event->total_room_rental == 0)?0:($event->total_room_rental+$adultsPrice+$kidsPrice+$babiesPrice+$prosPrice);
            $gtotal = ($priceSum == 0)?0:($priceSum + $priceSum/$request->gratuity_percent  + ($priceSum/$request->gratuity_percent + $priceSum)*13/100);
            $tamount = ($priceSum == 0)?0:(($priceSum/$request->gratuity_percent + $priceSum)*13/100);
            $gamount = ($priceSum == 0)?0:(($priceSum*$request->gratuity_percent)/100);
            $event = Event::whereId($request->event_id)->update([
                'event_title'                  => $request->edit_event_title??null,
                'lnk_event_type'               => $request->event_edit_lnk_event_type,
                'catering_type'                => $request->event_edit_catering_type??null,
                'no_of_tables'                 => $request->event_edit_no_of_tables??null,
                'event_status'                 => $request->edit_event_status,
                'price_per_person'             => $request->price_contract_adult??0,
                'price_per_kid'                => $request->price_contract_child??0,
                'price_per_baby'               => $request->event_edit_price_per_baby??0,
                'price_per_pro'                => $request->price_contract_pros??0,
                'price_per_person_contract'    => $request->price_contract_adult??0,
                'price_per_kid_contract'       => $request->price_contract_child??0,
                'price_per_pro_contract'       => $request->price_contract_pros??0,
                'gratuity_percent'             => $request->gratuity_percent??0,
                'gratuity_amount'              => $gamount,
                'total_menu_items'             => $adultsPrice??0,
                'total_children'               => $kidsPrice??0,
                'total_babies'                 => $babiesPrice??0,
                'total_pros'                   => $prosPrice??0,
                'sub_total'                    => $priceSum,
                'lnk_user_update'              => auth()->id()??0,
                'grand_total'                  => $gtotal,
                'tax1_amount'                  => $tamount,
                'balance'                      => $gtotal,
            ]);
        } elseif(isset($request->update_guest)) {
            $event = Event::whereId($request->event_id)->update([
                'adults'           => $request->event_update_guests_adults,
                'kids'             => $request->event_update_guests_kids,
                'babies'           => $request->event_update_guests_babies,
                'pros'             => $request->event_update_guests_pros,
                'adults_actual'    => $request->event_adults_actual,
                'kids_actual'      => $request->event_kids_actual,
                'babies_actual'    => $request->event_babies_actual,
                'pros_actual'      => $request->event_pros_actual,
                'lnk_user_update'  => auth()->id()??0,
            ]);
        } elseif(isset($request->function_notes)) {
            $event = Event::whereId($request->event_id)->update([
                'special_notes'    => $request->event_special_notes??null,
                'invoice_notes'    => $request->event_invoice_notes??null,
                'contract_notes'   => $request->event_contract_notes??null,
                'office_notes'     => $request->event_office_notes??null,
                'lnk_user_update'  => auth()->id()??0,
            ]);
        } else {
            $prices = $request->input('price', []);
            $room_rental = array_sum($prices);
            $event = Event::select('price_per_person', 'price_per_kid', 'price_per_baby', 'price_per_pro', 'gratuity_percent')->whereId($request->event_id)->first();
            $adultsPrice = $event->price_per_person * $request->edit_event_adults;
            $adultsPrice = $adultsPrice - ($adultsPrice*11.5)/100;
            $kidsPrice = $event->price_per_kid * $request->edit_event_kids;
            $kidsPrice = $kidsPrice - ($kidsPrice*11.5)/100;
            $babiesPrice = $event->price_per_baby * $request->edit_event_babies;
            $babiesPrice = $babiesPrice - ($babiesPrice*11.5)/100;
            $prosPrice = $event->price_per_pro * $request->edit_event_pros;
            $prosPrice = $prosPrice - ($prosPrice*11.5)/100;
            $priceSum = $room_rental+$adultsPrice+$kidsPrice+$babiesPrice+$prosPrice;
            $event = Event::whereId($id)->update([
                'lnk_customer'                 => $request->customer_id,
                'lnk_customer_contact'         => $request->edit_contact_id,
                'lnk_marketing_campaign'       => 0,
                'lnk_bill_to_customer'         => $request->customer_id,
                'lnk_bill_to_customer_contact' => $request->edit_bill_to_contact_id,
                'event_title'                  => $request->event_title??null,
                'lnk_event_planner'            => $request->event_planner??null,
                'event_status'                 => $request->event_status,
                'contract_type'                => $request->contract_type,
                'lnk_event_type'               => $request->event_type,
                'lnk_sales_person'             => $request->input('sales_person'),
                'start_date_time'              => sprintf('%s %02d:%02d:00', $request->event_start_date, $request->event_start_hour, $request->event_start_min),
                'end_date_time'                => sprintf('%s %02d:%02d:00', $request->event_end_date, $request->event_end_hour, $request->event_end_min),
                'dining_type'                  => $request->dining_type,
                'adults'                       => $request->edit_event_adults,
                'min_adults'                   => $request->edit_event_adults,
                'kids'                         => $request->edit_event_kids??0,
                'babies'                       => $request->edit_event_babies??0,
                'pros'                         => $request->edit_event_pros??0,
                'total_menu_items'             => $adultsPrice??0,
                'total_children'               => $kidsPrice??0,
                'total_babies'                 => $babiesPrice??0,
                'total_pros'                   => $prosPrice??0,
                'total_room_rental'            => $room_rental??0,
                'sub_total'                    => $priceSum??0,
                'gratuity_amount'              => ($priceSum*$event->gratuity_percent)/100,
                'grand_total'                  => $priceSum + $priceSum/$event->gratuity_percent  + ($priceSum/$event->gratuity_percent + $priceSum)*13/100,
                'tax1_amount'                  => ($priceSum/$event->gratuity_percent + $priceSum)*13/100,
                'balance'                      => $priceSum + $priceSum/$event->gratuity_percent  + ($priceSum/$event->gratuity_percent + $priceSum)*13/100,
                'special_notes'                => $request->edit_event_special_notes??null,
                'invoice_notes'                => $request->edit_event_invoice_notes??null,
                'contract_notes'               => $request->edit_event_contract_notes??null,
                'office_notes'                 => $request->edit_event_office_notes??null,
                'lnk_user_update'              => auth()->id()??0,
            ]);
            $rooms = $request->input('rooms', []);
            $facilityIds = $request->input('facility_ids', []);
            $same_timing = $request->input('same_timing_as_event') ?? []; 
            $main_room = $request->input('is_main_room') ?? []; 
            EventFacility::whereNotIn('id',$facilityIds)->where('lnk_event',$id)->delete();
            if (!empty($rooms)) {
                foreach ($rooms as $key => $room) {
                    $facility_Id = $facilityIds[$key] ?? 0;
                    $pricing    = $request->input('pricing')[$key];
                    $price      = $request->input('price')[$key];
                    $max_shared = $request->input('max_shared')[$key];
                    $date_from  = $request->input('date_from')[$key];
                    $hour_from  = $request->input('hour_from')[$key];
                    $min_from   = $request->input('min_from')[$key];
                    $date_to    = $request->input('date_to')[$key];
                    $hour_to    = $request->input('hour_to')[$key];
                    $min_to     = $request->input('min_to')[$key];
                    $same_tim_e = isset($same_timing[$key]) ? $same_timing[$key] : 0;
                    $is_main_ro = isset($main_room[$key]) ? $main_room[$key] : 0;
                    if ($facility_Id) {
                        EventFacility::where('id',$facility_Id)->update([
                            'lnk_event'             => $id,
                            'lnk_facility'          => $room,
                            'max_concurrent_events' => $max_shared,
                            'lnk_pricing'           => $pricing,
                            'is_main_room'          => $is_main_ro??0,
                            'sub_total'             => $price,
                            'grand_total'           => $price,
                            'revenue_percent'       => 100,
                            'start_date_time'       => sprintf('%s %02d:%02d:00', $date_from, $hour_from, $min_from),
                            'end_date_time'         => sprintf('%s %02d:%02d:00', $date_to, $hour_to, $min_to),
                            'same_timing_as_event'  => $same_tim_e??0,
                            'lnk_user_update'       => auth()->id()??0,
                        ]);
                    } else {
                        EventFacility::create([
                            'lnk_event'             => $id,
                            'lnk_facility'          => $room,
                            'max_concurrent_events' => $max_shared,
                            'lnk_pricing'           => $pricing,
                            'sub_total'             => $price,
                            'grand_total'           => $price,
                            'revenue_percent'       => 100,
                            'start_date_time'       => sprintf('%s %02d:%02d:00', $date_from, $hour_from, $min_from),
                            'end_date_time'         => sprintf('%s %02d:%02d:00', $date_to, $hour_to, $min_to),
                            'same_timing_as_event'  => $same_tim_e??0,
                            'lnk_user_insert'       => auth()->id()??0,
                        ]);
                    }
                }
            } 
        }
        if (isset($request->quick_edit) || isset($request->update_guest) || isset($request->function_notes)) {
            return redirect()->back();
        } else {
            return redirect()->route('admin.event.index');
        }
        
    }

    /**
     * Update the ship address resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateShipAddress(Request $request)
    {
        if (isset($request->event_id)) {
            Event::whereId($request->event_id)->update([
                'ship_to_first_name'  => $request->ship_to_first_name??null,
                'ship_to_last_name'   => $request->ship_to_last_name??null,
                'ship_to_street'      => $request->ship_to_street??null,
                'ship_to_city'        => $request->ship_to_city??null,
                'ship_to_province'    => $request->ship_to_province??null,
                'ship_to_postal_code' => $request->ship_to_postal_code??null,
                'ship_to_phone'       => $request->ship_to_phone??null,
                'lnk_user_update'     => auth()->id(),
            ]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => ' Event ship address not updated .']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        EventFacility::where('lnk_event',$id)->delete();
        return response()->json(['success' => true, 'message' => 'Event deleted successfully.']);
    }

    public function selectCustomer(Request $request){
        // $customers = Customer::with('Contacts','user', 'events')->paginate(10);
        $customers = Customer::with('Contacts','user', 'events')
        ->when($request->input('custome_id'), function ($query) use ($request) {
            $query->where('id', $request->input('custome_id'));
        })
        ->when(($request->input('customer_type') != ""), function ($query) use ($request) {
            $query->where('customer_type', $request->input('customer_type'));
        })
        ->when($request->input('flt_by_text'), function ($query) use ($request) {
            $query->whereHas('contacts', function ($subQuery) use ($request) {
                $subQuery->where('full_name', 'like', '%' . $request->input('flt_by_text') . '%')
                ->orWhere('phone', 'like', '%' . $request->input('flt_by_text') . '%')
                ->orWhere('cell_phone', 'like', '%' . $request->input('flt_by_text') . '%')
                ->orWhere('main_email', 'like', '%' . $request->input('flt_by_text') . '%');
            });
        })
        ->paginate(10);
        return response()->json($customers);
    }
}
