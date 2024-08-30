<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerContact;
use App\Http\Controllers\Controller;

class SpecialEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->event_id){
            $speventCurrent = Event::where('lnk_event_type', 29)->latest()->first();
            $spevents = Event::where('lnk_event_type', 29)->get();
            return view('admin.specialevent.index', compact('speventCurrent','spevents'));
        }else{
            $speventCurrent = Event::where('id', $request->event_id)->first();
            $spevents = Event::where('lnk_event_type', 29)->get();
            return view('admin.specialevent.index', compact('speventCurrent','spevents'));
        }
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
            'event_title'        => 'required',
            'start_date_time'    => 'required',
            'end_date_time_hour' => 'required',
            'start_date_time_min'=> 'required',
            'end_date_time'      => 'required',
            'end_date_time_hour' => 'required',
            'end_date_time_min'  => 'required',
            'price_per_adult'    => 'required',
            'price_per_child'    => 'required',
            'price_per_senior'   => 'required',
            'meal_type'          => 'required'
        ]);

        $customerId = Customer::first()->id;
        $contactId = CustomerContact::first()->id;
        Event::create([
            'event_title'         => $request->event_title,
            'start_date_time'     => sprintf('%s %02d:%02d:00', $request->start_date_time, $request->start_date_time_hour, $request->start_date_time_min),
            'end_date_time'       => sprintf('%s %02d:%02d:00', $request->end_date_time, $request->end_date_time_hour, $request->end_date_time_min),
            'no_of_tables'        => $request->no_of_tables,
            'max_capacity'        => $request->max_capacity,
            'price_per_person_bt' => $request->price_per_adult,
            'price_per_kid_bt'    => $request->price_per_child,
            'price_per_senior_bt' => $request->price_per_senior,
            'dining_type'         => $request->meal_type,
            'special_count_label' => $request->special_label,
            'special_notes'       => $request->special_notes,
            'lnk_customer'        => $customerId,
            'gratuity_percent'    => 10.00,
            'lnk_event_type'      => 29,
            'event_status'        => 2,
            'lnk_customer_contact'=> $contactId
        ]);
        return redirect()->route('admin.special-event.index');
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
        //
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
        $request->validate([
            'event_title'          => 'required',
            'start_date_time'      => 'required',
            'event_title_for_email'=> 'required',
            'end_date_time_hour'   => 'required',
            'start_date_time_min'  => 'required',
            'end_date_time'        => 'required',
            'end_date_time_hour'   => 'required',
            'end_date_time_min'    => 'required',
            'price_per_adult'      => 'required',
            'price_per_child'      => 'required',
            'price_per_senior'     => 'required',
            'price_per_person_bt'  => 'required',
            'price_per_kid_bt'     => 'required',
            'price_per_senior_bt'  => 'required',
            'meal_type'            => 'required'
        ]);
        $customerId = Customer::first()->id;
        $contactId = CustomerContact::first()->id;
        Event::where('id', $id)->update([
            'event_title'         => $request->event_title,
            'event_title_for_email'=>$request->event_title_for_email,
            'start_date_time'     => sprintf('%s %02d:%02d:00', $request->start_date_time, $request->start_date_time_hour, $request->start_date_time_min),
            'end_date_time'       => sprintf('%s %02d:%02d:00', $request->end_date_time, $request->end_date_time_hour, $request->end_date_time_min),
            'no_of_tables'        => $request->no_of_tables,
            'max_capacity'        => $request->max_capacity,
            'price_per_person'    => $request->price_per_adult,
            'price_per_kid'      => $request->price_per_child,
            'price_per_senior'   => $request->price_per_senior,
            'price_per_person_bt' => $request->price_per_person_bt,
            'price_per_kid_bt'    => $request->price_per_kid_bt,
            'price_per_senior_bt' => $request->price_per_senior_bt,
            'dining_type'         => $request->meal_type,
            'special_count_label' => $request->special_count_label,
            'special_notes'       => $request->special_notes,
            'gratuity_percent'    => $request->gratuity_percent,
            'lnk_event_type'      => 29,
            'event_status'        => 2,
            'lnk_customer_contact'=> $contactId
        ]);
        return redirect()->route('admin.special-event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteevent = Event::where('lnk_event_type', 33)->pluck('id');
        if (count($deleteevent) > 1) {
            Event::where('id', $id)->delete();
            return response()->json(['success' => true, 'message' => 'Event deleted successfully.']);
        }
        return response()->json(['success' => true, 'message' => 'Event not deleted.']);
    }
}
