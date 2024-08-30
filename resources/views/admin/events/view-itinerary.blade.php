@extends('admin.layouts.master')
@section('title', 'Itinerary')
@section('content')
<span id="fplan_top" class="xmlb_form">
    <div class="title_bar card">
        <h1 style="text-align: center;font-size: 1.7em;display: block;">Itinerary: {{$itinerary->itineraryTemplate->tmpl_title}} <a href="{{route('admin.event.show',$itinerary->event->id)}}">{{$itinerary->event->id}}</a></h1>
        <div class="row">
            <div class="col-5" style="border-right: 1px solid #999;">
                <div class="line_break"></div>
                <h3>Customer: <a href="{{route('admin.customer.show',$itinerary->event->customer->id)}}">{{$itinerary->event->customer->customer_name}}</a> - Facilities:
                    @if (!empty($itinerary->event->eventFacilities))
                        @foreach ($itinerary->event->eventFacilities as $_eventFaci)
                            {{$_eventFaci->facility->facility_name}} |
                        @endforeach
                    @endif
                </h3>

                <p><strong>Status:</strong> {{($itinerary->itin_status == 2)?'Preparation':''}} **** Login Account for User not Created ****<br><br></p>
                <div class="line_break"></div>
                <p><a href="#" onclick="loadAjaxObject('obj=page&amp;page_id=customer_contact_account_create?cu_contact_id=51975') ; return false;">Create Login Account</a></p>
                <div class="line_break"></div>
                <p><strong>Last Updated:</strong> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itinerary->updated_at)->format('D, M j Y \a\t g:ia') }} by Anil india (Staff)</p>
    
            </div>
            <div class="col-7">
                <p><strong>Note:</strong> Before Sending Itinerary to customer please make
                    sure to fill in the info like additional rooms that needs be completed by staff.</p>
            </div>
        </div>
    </div>
</span>

@endsection
