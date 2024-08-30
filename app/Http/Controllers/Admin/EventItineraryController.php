<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventItineraryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $floorPlan = Itinerary::create([
            'lnk_event'       => $request->event_id,
            'lnk_itin_tmpl'  => $request->new_itinerary_lnk_itin_tmpl,
            'itin_status'    => 2,
            'lnk_user_insert' => auth()->id()
        ]);
        return redirect()->route('admin.event.itinerary.show',$floorPlan->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $itinerary = Itinerary::with('event.customer')->find($id);
        return view('admin.events.view-itinerary', compact('itinerary'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Itinerary::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Event Itinerary deleted successfully.']);
    }
}
