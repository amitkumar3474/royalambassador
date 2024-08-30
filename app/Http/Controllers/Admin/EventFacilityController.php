<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventFacility;
use App\Http\Controllers\Controller;

class EventFacilityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::whereId($request->event_id)->first();
        if ($event) {
            $eventStartDate = $event->start_date_time;
            $eventEndDate = $event->end_date_time;
        }
        if (isset($eventEndDate)) {
            $roomStartDate = $request->date_from . ' ' . $request->hour_from . ':' . $request->min_from . ':00';
            $roomEndDate = $request->date_to . ' ' . $request->hour_to . ':' . $request->min_to . ':00';
            if ($eventStartDate >=($roomStartDate) && $eventEndDate <= ($roomEndDate)) {
                EventFacility::create([
                    'lnk_event'             => $request->event_id,
                    'lnk_facility'          => $request->room,
                    'lnk_pricing'           => $request->pricing,
                    'revenue_percent'       => 100,
                    'max_concurrent_events' => $request->max_shared,
                    'is_main_room'          => $request->max_shared,
                    'sub_total'             => $request->price,
                    'grand_total'           => $request->price,
                    'start_date_time'       => sprintf('%s %02d:%02d:00', $request->date_from, $request->hour_from, $request->min_from),
                    'end_date_time'         => sprintf('%s %02d:%02d:00', $request->date_to, $request->hour_to, $request->min_to),
                    'lnk_user_insert'       => auth()->id(),
                ]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => ' Date and time entered should fall within event start date and time.']);
            }
        }else {
            $roomStartDate = $request->date_from . ' ' . $request->hour_from . ':' . $request->min_from . ':00';
            $roomEndDate = $request->date_to . ' ' . $request->hour_to . ':' . $request->min_to . ':00';
            if ($eventStartDate == ($roomStartDate) && $eventStartDate == ($roomEndDate)) {
                EventFacility::create([
                    'lnk_event'             => $request->event_id,
                    'lnk_facility'          => $request->room,
                    'lnk_pricing'           => $request->pricing,
                    'revenue_percent'       => 100,
                    'max_concurrent_events' => $request->max_shared,
                    'is_main_room'          => $request->max_shared,
                    'sub_total'             => $request->price,
                    'grand_total'           => $request->price,
                    'start_date_time'       => sprintf('%s %02d:%02d:00', $request->date_from, $request->hour_from, $request->min_from),
                    'end_date_time'         => sprintf('%s %02d:%02d:00', $request->date_to, $request->hour_to, $request->min_to),
                    'lnk_user_insert'       => auth()->id(),
                ]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => ' Date and time entered should fall within event start date and time.']);
            }
        }
    }

    /**
     * Get a newly event facility.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getEditFacility($id)
    {
        $eventFacility = EventFacility::findOrFail($id);

        return response()->json(['event_facility' => $eventFacility]);
    }

    /**
     * Get a newly event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getEventDate($id)
    {
        $eventDate = Event::select('start_date_time','end_date_time')->findOrFail($id);

        return response()->json(['eventDate' => $eventDate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $event = Event::select('start_date_time', 'end_date_time')->whereId($request->event_id)->first();
        if ($event) {
            $eventStartDate = $event->start_date_time;
            $eventEndDate = $event->end_date_time;
        }
        // dd($event);
        if (isset($event->end_date_time)) {
            $roomStartDate = $request->date_from . ' ' . $request->hour_from . ':' . $request->min_from . ':00';
            $roomEndDate = $request->date_to . ' ' . $request->hour_to . ':' . $request->min_to . ':00';
            if ($eventStartDate >=($roomStartDate) && $eventEndDate <= ($roomEndDate)) {
                EventFacility::whereId($request->eventFacility_id)->where('lnk_event',$request->event_id)->update([
                    'lnk_facility'          => $request->room,
                    'lnk_pricing'           => $request->pricing,
                    'max_concurrent_events' => $request->max_shared,
                    'is_main_room'          => $request->max_shared,
                    'sub_total'             => $request->price,
                    'grand_total'           => $request->price,
                    'start_date_time'       => sprintf('%s %02d:%02d:00', $request->date_from, $request->hour_from, $request->min_from),
                    'end_date_time'         => sprintf('%s %02d:%02d:00', $request->date_to, $request->hour_to, $request->min_to),
                    'lnk_user_update'       => auth()->id(),
                ]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => ' Date and time entered should fall within event start date and time.']);
            }
        } else {
            $roomStartDate = $request->date_from . ' ' . $request->hour_from . ':' . $request->min_from . ':00';
            $roomEndDate = $request->date_to . ' ' . $request->hour_to . ':' . $request->min_to . ':00';
            if ($eventStartDate == ($roomStartDate) && $eventStartDate == ($roomEndDate)) {
                EventFacility::whereId($request->eventFacility_id)->where('lnk_event',$request->event_id)->update([
                    'lnk_facility'          => $request->room,
                    'lnk_pricing'           => $request->pricing,
                    'max_concurrent_events' => $request->max_shared,
                    'is_main_room'          => $request->max_shared,
                    'sub_total'             => $request->price,
                    'grand_total'           => $request->price,
                    'start_date_time'       => sprintf('%s %02d:%02d:00', $request->date_from, $request->hour_from, $request->min_from),
                    'end_date_time'         => sprintf('%s %02d:%02d:00', $request->date_to, $request->hour_to, $request->min_to),
                    'lnk_user_update'       => auth()->id(),
                ]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => ' Date and time entered should fall within event start date and time.']);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');
        
        EventFacility::whereIn('id', $ids)->delete();
        
        return response()->json(['success' => true]);
    }
}
