@extends('admin.layouts.master')
@section('title', 'Edit Event')
@section('content')
<div class="card title_bar">
    @if ($event->catering_type)
    <h1>Edit Catering Event <a href="{{route('admin.event.show',$event->id)}}">{{$event->id}}</a></h1>
    @else
    <h1>Edit Event <a href="{{route('admin.event.show',$event->id)}}">{{$event->id}}</a></h1>
    @endif
</div>
<span id="new_event_from_scratch" class="xmlb_form" style="display: inline;">
    <form method="post" id="frm_new_event_from_scratch" action="{{route('admin.event.update',$event->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="event_id" value="{{$event->id}}">
        <input type="hidden" name="customer_id" value="{{$event->customer->id}}">
        <div class="card " id="regular_event">
            <div class="cus-row ">
                <div class="col-6 main-order-item">
                    <div class="global-form main-form height-100" style="border: 0;box-shadow:none">
                        <div class="cus-row">
                            <div class="col-12">
                                <fieldset>
                                    <legend>Actual Customer</legend>
                                    <div class="cus-row">
                                        <div class="col-4 mb-10">
                                            <label class="align-right">Customer:</label>
                                        </div>
                                        <div class="col-8 mb-10 pl-0">
                                            <input class="customer_id_holder" bill_ship="ship" size="40" name="edit_event_lnk_customer" value="{{$event->customer->customer_name}}" type="text"> *
                                            @error('new_event_lnk_customer')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-4 mb-10">
                                            <div class="form_footer"><button type="button" class="button font-bold radius-0" bill_ship="ship">Select/Change</button></div>
                                        </div>
                                        <div class="col-8 mb-10 pl-0">
                                        </div>

                                        <div class="col-4 mb-10">
                                            <label class="align-right">Contact:</label>
                                        </div>
                                        <div class="col-8 mb-10 pl-0">
                                            <select class="contact_id_holder" bill_ship="ship" name="edit_contact_id">
                                                <option value="">----</option>
                                                @foreach ($event->customer->contacts as $_contact)
                                                <option value="{{$_contact->id}}" {{ old('contact_id',$_contact->id == $event->contact->id)? 'selected' : '' }}>{{$_contact->full_name}}</option>
                                                @endforeach
                                            </select> *
                                            @error('contact_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <fieldset>
                                    <legend>Bill To</legend>
                                    <div class="cus-row">
                                        <div class="col-4 mb-10">
                                            <label class="align-right">Customer:</label>
                                        </div>
                                        <div class="col-8 mb-10 pl-0">
                                            <input class="customer_id_holder" bill_ship="ship" size="40" name="edit_event_bill_to_lnk_customer" value="{{$event->customer->customer_name}}" type="text"> *
                                            @error('new_event_lnk_customer')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-4 mb-10">
                                            <div class="form_footer"><button type="button" class="button font-bold radius-0" bill_ship="ship">Select/Change</button></div>
                                        </div>
                                        <div class="col-8 mb-10 pl-0">
                                        </div>

                                        <div class="col-4 mb-10">
                                            <label class="align-right">Contact:</label>
                                        </div>
                                        <div class="col-8 mb-10 pl-0">
                                            <select class="contact_id_holder" bill_ship="ship" name="edit_bill_to_contact_id">
                                                <option value="">----</option>
                                                @foreach ($event->customer->contacts as $_contact)
                                                <option value="{{$_contact->id}}" {{ old('contact_id',$_contact->id == $event->contact->id) ? 'selected' : '' }}>{{$_contact->full_name}}</option>
                                                @endforeach
                                            </select> *
                                            @error('contact_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-4 mb-10 mt-10">
                                <label class="align-right">Event Title:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0 mt-10">
                                <input id="edit_event_event_title" name="event_title" value="{{old('event_title', $event->event_title)}}" type="text" maxlength="90" size="40" title="Title used for the public page of the event">
                            </div>
                            @if (!empty($event->dining_type))
                                <div class="col-4 mb-10 ">
                                    <label class="align-right">Event Type:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0 ">
                                    <select class="event_type_holder" bill_ship="ship" name="event_type">
                                        <option value="">----</option>
                                        @foreach ($eventTypes as $_eventType)
                                        <option value="{{$_eventType->id}}" {{ old('event_type',$_eventType->id == $event->lnk_event_type)? 'selected' : '' }}>{{$_eventType->type_name}}</option>
                                        @endforeach
                                    </select>*
                                    @error('event_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Sales Persons:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <span class="sales_person_wrap">
                                        @php
                                            $salesPerson = json_decode($event->lnk_sales_person);
                                        @endphp
                                        <span class="mselect_item">
                                            <input type="checkbox" value="1" name="sales_person[]" {{ in_array('1', old('sales_person', $salesPerson)) ? 'checked' : '' }}> Aliyana Bland
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="2" name="sales_person[]" {{ in_array('2', old('sales_person', $salesPerson)) ? 'checked' : '' }}> Ania Howlett
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="3" name="sales_person[]" {{ in_array('3', old('sales_person', $salesPerson)) ? 'checked' : '' }}> Anil india
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="4" name="sales_person[]" {{ in_array('4', old('sales_person', $salesPerson)) ? 'checked' : '' }}> Diana Bonilla
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="5" name="sales_person[]" {{ in_array('5', old('sales_person', $salesPerson)) ? 'checked' : '' }}> John Giancola
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="6" name="sales_person[]" {{ in_array('6', old('sales_person', $salesPerson)) ? 'checked' : '' }}> Nicolas Giancola
                                        </span>
                                    </span> *
                                    @error('sales_person[]')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Event Planner:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <select class="event_planner_holder" bill_ship="ship" name="event_planner">
                                        <option value="">----</option>
                                        <option value="1" {{ old('event_planner',$event->lnk_event_planner) == '1' ? 'selected' : '' }}>Aayush Malhotra</option>
                                        <option value="2" {{ old('event_planner',$event->lnk_event_planner) == '2' ? 'selected' : '' }}>Adnan Ansah</option>
                                        <option value="3" {{ old('event_planner',$event->lnk_event_planner) == '3' ? 'selected' : '' }}>Alana Klein</option>
                                    </select>
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Start Date Time:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input name="event_start_date" id="event_start_date" value="{{old('event_start_date', date('Y-m-d', strtotime($event->start_date_time)))}}" size="10" maxlength="10" title="Event start date and time" type="date" class="event_from_dt hasDatepicker">
                                    @php
                                        $start_time = date('H:i', strtotime($event->start_date_time));
                                        $hour = date('H', strtotime($start_time));
                                        $minute = date('i', strtotime($start_time));
                                    @endphp
                                    <select name="event_start_hour" id="event_start_hour" class="event_from_dt">
                                        <option value="00" {{ old('event_start_hour',$hour) == '00' ? 'selected' : '' }}>12 AM</option>
                                        <option value="01" {{ old('event_start_hour',$hour) == '01' ? 'selected' : '' }}>1 AM</option>
                                        <option value="02" {{ old('event_start_hour',$hour) == '02' ? 'selected' : '' }}>2 AM</option>
                                        <option value="03" {{ old('event_start_hour',$hour) == '03' ? 'selected' : '' }}>3 AM</option>
                                        <option value="04" {{ old('event_start_hour',$hour) == '04' ? 'selected' : '' }}>4 AM</option>
                                        <option value="05" {{ old('event_start_hour',$hour) == '05' ? 'selected' : '' }}>5 AM</option>
                                        <option value="06" {{ old('event_start_hour',$hour) == '06' ? 'selected' : '' }}>6 AM</option>
                                        <option value="07" {{ old('event_start_hour',$hour) == '07' ? 'selected' : '' }}>7 AM</option>
                                        <option value="08" {{ old('event_start_hour',$hour) == '08' ? 'selected' : '' }}>8 AM</option>
                                        <option value="09" {{ old('event_start_hour',$hour) == '09' ? 'selected' : '' }}>9 AM</option>
                                        <option value="10" {{ old('event_start_hour',$hour) == '10' ? 'selected' : '' }}>10 AM</option>
                                        <option value="11" {{ old('event_start_hour',$hour) == '11' ? 'selected' : '' }}>11 AM</option>
                                        <option value="12" {{ old('event_start_hour',$hour) == '12' ? 'selected' : '' }}>12 PM</option>
                                        <option value="13" {{ old('event_start_hour',$hour) == '13' ? 'selected' : '' }}>1 PM</option>
                                        <option value="14" {{ old('event_start_hour',$hour) == '14' ? 'selected' : '' }}>2 PM</option>
                                        <option value="15" {{ old('event_start_hour',$hour) == '15' ? 'selected' : '' }}>3 PM</option>
                                        <option value="16" {{ old('event_start_hour',$hour) == '16' ? 'selected' : '' }}>4 PM</option>
                                        <option value="17" {{ old('event_start_hour',$hour) == '17' ? 'selected' : '' }}>5 PM</option>
                                        <option value="18" {{ old('event_start_hour',$hour) == '18' ? 'selected' : '' }}>6 PM</option>
                                        <option value="19" {{ old('event_start_hour',$hour) == '19' ? 'selected' : '' }}>7 PM</option>
                                        <option value="20" {{ old('event_start_hour',$hour) == '20' ? 'selected' : '' }}>8 PM</option>
                                        <option value="21" {{ old('event_start_hour',$hour) == '21' ? 'selected' : '' }}>9 PM</option>
                                        <option value="22" {{ old('event_start_hour',$hour) == '22' ? 'selected' : '' }}>10 PM</option>
                                        <option value="23" {{ old('event_start_hour',$hour) == '23' ? 'selected' : '' }}>11 PM</option>
                                    </select> :
                                    <select name="event_start_min" id="event_start_min" class="event_from_dt">
                                        <option value="00" {{ old('event_start_min',$minute) == '00' ? 'selected' : '' }}>00</option>
                                        <option value="05" {{ old('event_start_min',$minute) == '05' ? 'selected' : '' }}>05</option>
                                        <option value="10" {{ old('event_start_min',$minute) == '10' ? 'selected' : '' }}>10</option>
                                        <option value="15" {{ old('event_start_min',$minute) == '15' ? 'selected' : '' }}>15</option>
                                        <option value="20" {{ old('event_start_min',$minute) == '20' ? 'selected' : '' }}>20</option>
                                        <option value="25" {{ old('event_start_min',$minute) == '25' ? 'selected' : '' }}>25</option>
                                        <option value="30" {{ old('event_start_min',$minute) == '30' ? 'selected' : '' }}>30</option>
                                        <option value="35" {{ old('event_start_min',$minute) == '35' ? 'selected' : '' }}>35</option>
                                        <option value="40" {{ old('event_start_min',$minute) == '40' ? 'selected' : '' }}>40</option>
                                        <option value="45" {{ old('event_start_min',$minute) == '45' ? 'selected' : '' }}>45</option>
                                        <option value="50" {{ old('event_start_min',$minute) == '50' ? 'selected' : '' }}>50</option>
                                        <option value="55" {{ old('event_start_min',$minute) == '55' ? 'selected' : '' }}>55</option>
                                    </select> *
                                    @error('event_start_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">End Date Time:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input name="event_end_date" id="event_end_date" value="{{old('event_end_date',date('Y-m-d', strtotime($event->end_date_time)))}}" size="10" maxlength="10" title="Event end date and time" type="date" class="event_from_dt hasDatepicker">
                                    @php
                                        $end_time = date('H:i', strtotime($event->end_date_time));
                                        $endhour = date('H', strtotime($end_time));
                                        $endminute = date('i', strtotime($end_time));
                                    @endphp
                                    <select name="event_end_hour" id="event_end_hour" class="event_from_dt">
                                        <option value="00" {{ old('event_end_hour',$endhour) == '00' ? 'selected' : '' }}>12 AM</option>
                                        <option value="01" {{ old('event_end_hour',$endhour) == '01' ? 'selected' : '' }}>1 AM</option>
                                        <option value="02" {{ old('event_end_hour',$endhour) == '02' ? 'selected' : '' }}>2 AM</option>
                                        <option value="03" {{ old('event_end_hour',$endhour) == '03' ? 'selected' : '' }}>3 AM</option>
                                        <option value="04" {{ old('event_end_hour',$endhour) == '04' ? 'selected' : '' }}>4 AM</option>
                                        <option value="05" {{ old('event_end_hour',$endhour) == '05' ? 'selected' : '' }}>5 AM</option>
                                        <option value="06" {{ old('event_end_hour',$endhour) == '06' ? 'selected' : '' }}>6 AM</option>
                                        <option value="07" {{ old('event_end_hour',$endhour) == '07' ? 'selected' : '' }}>7 AM</option>
                                        <option value="08" {{ old('event_end_hour',$endhour) == '08' ? 'selected' : '' }}>8 AM</option>
                                        <option value="09" {{ old('event_end_hour',$endhour) == '09' ? 'selected' : '' }}>9 AM</option>
                                        <option value="10" {{ old('event_end_hour',$endhour) == '10' ? 'selected' : '' }}>10 AM</option>
                                        <option value="11" {{ old('event_end_hour',$endhour) == '11' ? 'selected' : '' }}>11 AM</option>
                                        <option value="12" {{ old('event_end_hour',$endhour) == '12' ? 'selected' : '' }}>12 PM</option>
                                        <option value="13" {{ old('event_end_hour',$endhour) == '13' ? 'selected' : '' }}>1 PM</option>
                                        <option value="14" {{ old('event_end_hour',$endhour) == '14' ? 'selected' : '' }}>2 PM</option>
                                        <option value="15" {{ old('event_end_hour',$endhour) == '15' ? 'selected' : '' }}>3 PM</option>
                                        <option value="16" {{ old('event_end_hour',$endhour) == '16' ? 'selected' : '' }}>4 PM</option>
                                        <option value="17" {{ old('event_end_hour',$endhour) == '17' ? 'selected' : '' }}>5 PM</option>
                                        <option value="18" {{ old('event_end_hour',$endhour) == '18' ? 'selected' : '' }}>6 PM</option>
                                        <option value="19" {{ old('event_end_hour',$endhour) == '19' ? 'selected' : '' }}>7 PM</option>
                                        <option value="20" {{ old('event_end_hour',$endhour) == '20' ? 'selected' : '' }}>8 PM</option>
                                        <option value="21" {{ old('event_end_hour',$endhour) == '21' ? 'selected' : '' }}>9 PM</option>
                                        <option value="22" {{ old('event_end_hour',$endhour) == '22' ? 'selected' : '' }}>10 PM</option>
                                        <option value="23" {{ old('event_end_hour',$endhour) == '23' ? 'selected' : '' }}>11 PM</option>
                                    </select> :
                                    <select name="event_end_min" id="event_end_min" class="event_from_dt">
                                        <option value="00" {{ old('event_end_min',$endminute) == '00' ? 'selected' : '' }}>00</option>
                                        <option value="05" {{ old('event_end_min',$endminute) == '05' ? 'selected' : '' }}>05</option>
                                        <option value="10" {{ old('event_end_min',$endminute) == '10' ? 'selected' : '' }}>10</option>
                                        <option value="15" {{ old('event_end_min',$endminute) == '15' ? 'selected' : '' }}>15</option>
                                        <option value="20" {{ old('event_end_min',$endminute) == '20' ? 'selected' : '' }}>20</option>
                                        <option value="25" {{ old('event_end_min',$endminute) == '25' ? 'selected' : '' }}>25</option>
                                        <option value="30" {{ old('event_end_min',$endminute) == '30' ? 'selected' : '' }}>30</option>
                                        <option value="35" {{ old('event_end_min',$endminute) == '35' ? 'selected' : '' }}>35</option>
                                        <option value="40" {{ old('event_end_min',$endminute) == '40' ? 'selected' : '' }}>40</option>
                                        <option value="45" {{ old('event_end_min',$endminute) == '45' ? 'selected' : '' }}>45</option>
                                        <option value="50" {{ old('event_end_min',$endminute) == '50' ? 'selected' : '' }}>50</option>
                                        <option value="55" {{ old('event_end_min',$endminute) == '55' ? 'selected' : '' }}>55</option>
                                    </select> *
                                    @error('event_end_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Adults:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_adults" name="edit_event_adults" type="text" maxlength="4" value="{{ old('edit_event_adults',$event->adults) }}" size="10" title="Number of adults in the event">
                                    <span class="mand_sign">*</span>
                                    @error('edit_event_adults')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Children:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_kids" name="edit_event_kids" type="text" maxlength="4" size="10" value="{{ old('edit_event_kids', $event->kids) }}" title="Number of kids in this event">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Babies:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_babies" name="edit_event_babies" type="text" maxlength="4" size="10" value="{{ old('edit_event_babies', $event->babies) }}" title="Babies count. For information only">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Pros:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_pros" name="edit_event_pros" type="text" maxlength="4" size="10" value="{{ old('edit_event_pros', $event->pros) }}" title="Number of professionals in the event like music bands or DJs">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Meal Type:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input type="radio" name="dining_type" value="1" {{ old('dining_type',$event->dining_type) == '1' ? 'checked' : '' }}> Sit Down
                                    <input type="radio" name="dining_type" value="2" {{ old('dining_type',$event->dining_type) == '2' ? 'checked' : '' }}> Buffet
                                    <input type="radio" name="dining_type" value="5" {{ old('dining_type',$event->dining_type) == '5' ? 'checked' : '' }}> Family Style
                                    <input type="radio" name="dining_type" value="4" {{ old('dining_type',$event->dining_type) == '4' ? 'checked' : '' }}> No Meal
                                    <span class="mand_sign">*</span>
                                    @error('dining_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Status:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input type="radio" name="event_status" value="1" {{ old('event_status',$event->event_status) == '1' ? 'checked' : '' }}> Tentative
                                    <input type="radio" name="event_status" value="5" {{ old('event_status',$event->event_status) == '5' ? 'checked' : '' }}> Promised
                                    <input type="radio" name="event_status" value="2" {{ old('event_status',$event->event_status) == '2' ? 'checked' : '' }}> Booked
                                    <input type="radio" name="event_status" value="4" {{ old('event_status',$event->event_status) == '4' ? 'checked' : '' }}> Archived
                                    <span class="mand_sign">*</span>
                                    @error('event_status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Contract Type:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input type="radio" name="contract_type" value="CER" {{ old('contract_type',$event->contract_type) == 'CER' ? 'checked' : '' }}>
                                    Ceremony Only

                                    <input type="radio" name="contract_type" value="RHS" {{ old('contract_type',$event->contract_type) == 'RHS' ? 'checked' : '' }}>
                                    Rehearsal

                                    <input type="radio" name="contract_type" value="INS" {{ old('contract_type',$event->contract_type) == 'INS' ? 'checked' : '' }}>
                                    Catered by RA

                                    <input type="radio" name="contract_type" value="MRN" {{ old('contract_type',$event->contract_type) == 'MRN' ? 'checked' : '' }}>
                                    Morning Event

                                    <input type="radio" name="contract_type" value="OLD" {{ old('contract_type',$event->contract_type) == 'OLD' ? 'checked' : '' }}>
                                    Old Event

                                    <span class="mand_sign">*</span>
                                    @error('contract_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            @else
                                <div class="col-4 mb-10">
                                    <label class="align-right">Sales Persons:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    @php
                                        $salesPerson = json_decode($event->lnk_sales_person);
                                    @endphp
                                    <span class="sales_person_wrap">
                                        <span class="mselect_item">
                                            <input type="checkbox" value="1" name="cat_sales_person[]" {{ in_array('1', old('cat_sales_person', $salesPerson)) ? 'checked' : '' }}> Aliyana Bland
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="2" name="cat_sales_person[]" {{ in_array('2', old('cat_sales_person', $salesPerson)) ? 'checked' : '' }}> Ania Howlett
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="3" name="cat_sales_person[]" {{ in_array('3', old('cat_sales_person', $salesPerson)) ? 'checked' : '' }}> Anil india
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="4" name="cat_sales_person[]" {{ in_array('4', old('cat_sales_person', $salesPerson)) ? 'checked' : '' }}> Diana Bonilla
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="5" name="cat_sales_person[]" {{ in_array('5', old('cat_sales_person', $salesPerson)) ? 'checked' : '' }}> John Giancola
                                        </span>
                                        <span class="mselect_item">
                                            <input type="checkbox" value="6" name="cat_sales_person[]" {{ in_array('6', old('cat_sales_person', $salesPerson)) ? 'checked' : '' }}> Nicolas Giancola
                                        </span>
                                    </span> *
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Catering Type:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input type="radio" name="catering_type" value="B" {{ old('catering_type',$event->catering_type) == 'B' ? 'checked' : '' }}> Banquet
                                    <input type="radio" name="catering_type" value="R" {{ old('catering_type',$event->catering_type) == 'R' ? 'checked' : '' }}> Consulate Order
                                    <span class="mand_sign">*</span>
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Status:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input type="radio" name="cat_event_status" value="1" {{ old('cat_event_status',$event->event_status) == '1' ? 'checked' : '' }}> Tentative
                                    <input type="radio" name="cat_event_status" value="5" {{ old('cat_event_status',$event->event_status) == '5' ? 'checked' : '' }}> Promised
                                    <input type="radio" name="cat_event_status" value="2" {{ old('cat_event_status',$event->event_status) == '2' ? 'checked' : '' }}> Booked
                                    <input type="radio" name="cat_event_status" value="4" {{ old('cat_event_status',$event->event_status) == '4' ? 'checked' : '' }}> Archived
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Delivery Type:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input type="radio" name="delivery_type" value="2" {{ old('delivery_type',$event->delivery_type) == '2' ? 'checked' : '' }}> Customer Pickup
                                    <input type="radio" name="delivery_type" value="1" {{ old('delivery_type',$event->delivery_type) == '1' ? 'checked' : '' }}> Delivery
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right pickup_on">Pickup/Delivery:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input name="cat_event_start_date" id="cat_event_start_date_time_date" value="{{old('cat_event_start_date',date('Y-m-d', strtotime($event->start_date_time)))}}" size="10" maxlength="10" title="Event start date and time" type="date" class="event_from_dt hasDatepicker">
                                    @php
                                        $start_time = date('H:i', strtotime($event->start_date_time));
                                        $hour = date('H', strtotime($start_time));
                                        $minute = date('i', strtotime($start_time));
                                    @endphp
                                    <select name="cat_event_start_hour" id="cat_event_start_hour" class="event_from_dt">
                                        <option value="00" {{ old('cat_event_start_hour',$hour) == '00' ? 'selected' : '' }}>12 AM</option>
                                        <option value="01" {{ old('cat_event_start_hour',$hour) == '01' ? 'selected' : '' }}>1 AM</option>
                                        <option value="02" {{ old('cat_event_start_hour',$hour) == '02' ? 'selected' : '' }}>2 AM</option>
                                        <option value="03" {{ old('cat_event_start_hour',$hour) == '03' ? 'selected' : '' }}>3 AM</option>
                                        <option value="04" {{ old('cat_event_start_hour',$hour) == '04' ? 'selected' : '' }}>4 AM</option>
                                        <option value="05" {{ old('cat_event_start_hour',$hour) == '05' ? 'selected' : '' }}>5 AM</option>
                                        <option value="06" {{ old('cat_event_start_hour',$hour) == '06' ? 'selected' : '' }}>6 AM</option>
                                        <option value="07" {{ old('cat_event_start_hour',$hour) == '07' ? 'selected' : '' }}>7 AM</option>
                                        <option value="08" {{ old('cat_event_start_hour',$hour) == '08' ? 'selected' : '' }}>8 AM</option>
                                        <option value="09" {{ old('cat_event_start_hour',$hour) == '09' ? 'selected' : '' }}>9 AM</option>
                                        <option value="10" {{ old('cat_event_start_hour',$hour) == '10' ? 'selected' : '' }}>10 AM</option>
                                        <option value="11" {{ old('cat_event_start_hour',$hour) == '11' ? 'selected' : '' }}>11 AM</option>
                                        <option value="12" {{ old('cat_event_start_hour',$hour) == '12' ? 'selected' : '' }}>12 PM</option>
                                        <option value="13" {{ old('cat_event_start_hour',$hour) == '13' ? 'selected' : '' }}>1 PM</option>
                                        <option value="14" {{ old('cat_event_start_hour',$hour) == '14' ? 'selected' : '' }}>2 PM</option>
                                        <option value="15" {{ old('cat_event_start_hour',$hour) == '15' ? 'selected' : '' }}>3 PM</option>
                                        <option value="16" {{ old('cat_event_start_hour',$hour) == '16' ? 'selected' : '' }}>4 PM</option>
                                        <option value="17" {{ old('cat_event_start_hour',$hour) == '17' ? 'selected' : '' }}>5 PM</option>
                                        <option value="18" {{ old('cat_event_start_hour',$hour) == '18' ? 'selected' : '' }}>6 PM</option>
                                        <option value="19" {{ old('cat_event_start_hour',$hour) == '19' ? 'selected' : '' }}>7 PM</option>
                                        <option value="20" {{ old('cat_event_start_hour',$hour) == '20' ? 'selected' : '' }}>8 PM</option>
                                        <option value="21" {{ old('cat_event_start_hour',$hour) == '21' ? 'selected' : '' }}>9 PM</option>
                                        <option value="22" {{ old('cat_event_start_hour',$hour) == '22' ? 'selected' : '' }}>10 PM</option>
                                        <option value="23" {{ old('cat_event_start_hour',$hour) == '23' ? 'selected' : '' }}>11 PM</option>
                                    </select> :
                                    <select name="cat_event_start_min" id="cat_event_start_min" class="event_from_dt">
                                        <option value="00" {{ old('cat_event_start_min',$minute) == '00' ? 'selected' : '' }}>00</option>
                                        <option value="05" {{ old('cat_event_start_min',$minute) == '05' ? 'selected' : '' }}>05</option>
                                        <option value="10" {{ old('cat_event_start_min',$minute) == '10' ? 'selected' : '' }}>10</option>
                                        <option value="15" {{ old('cat_event_start_min',$minute) == '15' ? 'selected' : '' }}>15</option>
                                        <option value="20" {{ old('cat_event_start_min',$minute) == '20' ? 'selected' : '' }}>20</option>
                                        <option value="25" {{ old('cat_event_start_min',$minute) == '25' ? 'selected' : '' }}>25</option>
                                        <option value="30" {{ old('cat_event_start_min',$minute) == '30' ? 'selected' : '' }}>30</option>
                                        <option value="35" {{ old('cat_event_start_min',$minute) == '35' ? 'selected' : '' }}>35</option>
                                        <option value="40" {{ old('cat_event_start_min',$minute) == '40' ? 'selected' : '' }}>40</option>
                                        <option value="45" {{ old('cat_event_start_min',$minute) == '45' ? 'selected' : '' }}>45</option>
                                        <option value="50" {{ old('cat_event_start_min',$minute) == '50' ? 'selected' : '' }}>50</option>
                                        <option value="55" {{ old('cat_event_start_min',$minute) == '55' ? 'selected' : '' }}>55</option>
                                    </select> *
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Adults:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_adults" name="edit_event_adults" type="text" maxlength="4" value="{{ old('edit_event_adults',$event->adults) }}" size="10" title="Number of adults in the event">
                                    <span class="mand_sign">*</span>
                                    @error('edit_event_adults')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Children:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_kids" name="edit_event_kids" type="text" maxlength="4" size="10" value="{{ old('edit_event_kids', $event->kids) }}" title="Number of kids in this event">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Babies:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_babies" name="edit_event_babies" type="text" maxlength="4" size="10" value="{{ old('edit_event_babies', $event->babies) }}" title="Babies count. For information only">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Pros:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input id="new_event_pros" name="edit_event_pros" type="text" maxlength="4" size="10" value="{{ old('edit_event_pros', $event->pros) }}" title="Number of professionals in the event like music bands or DJs">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="cus-row">
                        <div class="col-3 mb-10">
                            <label class="align-right">Function Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea id="new_event_special_notes" name="edit_event_special_notes" cols="52" rows="3" title="Special notes for this event if any" maxlength="4000">{{old('edit_event_special_notes',$event->special_notes)}}</textarea>
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col-3 mb-10">
                            <label class="align-right">Contract Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea id="new_event_contract_notes" name="edit_event_contract_notes" cols="52" rows="3" title="Notes that should appear on the contract only" maxlength="4000">{{old('edit_event_contract_notes',$event->contract_notes)}}</textarea>
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col-3 mb-10">
                            <label class="align-right">Invoice Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea id="new_event_invoice_notes" name="edit_event_invoice_notes" cols="52" rows="3" title="Notes that appear on the invoice" maxlength="2000">{{old('edit_event_invoice_notes',$event->invoice_notes)}}</textarea>
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col-3 mb-10">
                            <label class="align-right">Office Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea id="new_event_office_notes" name="edit_event_office_notes" cols="52" rows="3" title="Notes that are related to staff only and not customer" maxlength="4000">{{old('edit_event_office_notes',$event->office_notes)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            @if (!empty($event->dining_type))
                <hr>
                <h2>Rooms <span class="btn_add_room btn"><svg style="width: 10px;cursor: pointer;" class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                        </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com --></span></h2>
                <div class="cus-row rooms_wrap" id="room-section">
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($event->eventFacilities as $_eventFacil)
                        <div class="col-6 main-order-item event_room" room_counter="{{$count}}">
                            <input type="hidden" name="facility_ids[]" value="{{$_eventFacil->id}}">
                            <div class="global-form main-form height-100">
                                <div class="room_buttons_wrap" style="text-align: end;">
                                    <span class="btn_room_same_timing btn green" title="room same timing">
                                    <input type="checkbox" class="same_timing_checkbox" name="same_timing_as_event[]" value="1"{{$_eventFacil->same_timing_as_event == 1 ? 'checked':''}}>
                                    </span>
                                    <span class="btn_room_is_main btn " title="Is main room"><input type="checkbox" class="is_main_room" name="is_main_room[]" value="1"{{$_eventFacil->is_main_room == 1 ? 'checked':''}}></span>
                                    <span class="btn_delete_room btn">
                                    <svg style="width: 15px;cursor: pointer;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>
                                    </svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></span>
                                </div>
                                <div class="cus-row">
                                    <div class="col-3 mb-10">
                                        <label class="align-right">Room {{$count}}:</label>
                                    </div>
                                    <div class="col-9 mb-10 pl-0">
                                        <select class="room_select" data-id="{{$count}}" name="rooms[]">
                                            <option value="">----</option>
                                            @foreach ($facilities as $_facility)  
                                                <option value="{{$_facility->id}}" {{ old('rooms',$_eventFacil->facility->id) == $_facility->id ? 'selected' : '' }}>{{$_facility->facility_name}}</option>
                                            @endforeach
                                        </select> *
                                        @error('rooms.*')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-3 mb-10">
                                        <label class="align-right">Pricing:</label>
                                    </div>
                                    <div class="col-9 mb-10 pl-0">
                                        <select class="price_select" name="pricing[]">
                                            @foreach ($facilityPricing as $_facilityPric)  
                                                <option value="{{$_facilityPric->id}}" price="{{$_facilityPric->price}}" {{ old('pricing',$_eventFacil->facilityPricing->id) == $_facilityPric->id ? 'selected' : '' }}>{{$_facilityPric->pricing_title.' | '.$_facilityPric->price}}</option>
                                            @endforeach
                                        </select>
                                        @error('pricing.*')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-3 mb-10">
                                        <label class="align-right">Price:</label>
                                    </div>
                                    <div class="col-9 mb-10 pl-0">
                                        <input type="number" class="price" name="price[]" value="{{old('price.0',$_eventFacil->sub_total)}}">
                                        @error('price.0')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-3 mb-10">
                                        <label class="align-right">Max Shared:</label>
                                    </div>
                                    <div class="col-9 mb-10 pl-0">
                                        <input type="number" class="max_shared" name="max_shared[]" value="{{old('max_shared.0',$_eventFacil->max_concurrent_events)}}">
                                        @error('max_shared.0')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-3 mb-10">
                                        <label class="align-right">From:</label>
                                    </div>
                                    <div class="col-9 mb-10 pl-0">
                                        <input type="date" class="date from_dt hasDatepicker room_from_date" name="date_from[]" value="{{ old('date_from.0',date('Y-m-d', strtotime($_eventFacil->start_date_time))) }}">
                                        @php
                                            $start_time_facility = date('H:i', strtotime($_eventFacil->start_date_time));
                                            $hour = date('H', strtotime($start_time_facility));
                                            $minute = date('i', strtotime($start_time_facility));
                                        @endphp
                                        <select class="hour from_dt" name="hour_from[]">
                                            <option value="00" {{ old('hour_from',$hour) == '00' ? 'selected' : '' }}>12 am</option>
                                            <option value="01" {{ old('hour_from',$hour) == '01' ? 'selected' : '' }}>1 am</option>
                                            <option value="02" {{ old('hour_from',$hour) == '02' ? 'selected' : '' }}>2 am</option>
                                            <option value="03" {{ old('hour_from',$hour) == '03' ? 'selected' : '' }}>3 am</option>
                                            <option value="04" {{ old('hour_from',$hour) == '04' ? 'selected' : '' }}>4 am</option>
                                            <option value="05" {{ old('hour_from',$hour) == '05' ? 'selected' : '' }}>5 am</option>
                                            <option value="06" {{ old('hour_from',$hour) == '06' ? 'selected' : '' }}>6 am</option>
                                            <option value="07" {{ old('hour_from',$hour) == '07' ? 'selected' : '' }}>7 am</option>
                                            <option value="08" {{ old('hour_from',$hour) == '08' ? 'selected' : '' }}>8 am</option>
                                            <option value="09" {{ old('hour_from',$hour) == '09' ? 'selected' : '' }}>9 am</option>
                                            <option value="10" {{ old('hour_from',$hour) == '10' ? 'selected' : '' }}>10 am</option>
                                            <option value="11" {{ old('hour_from',$hour) == '11' ? 'selected' : '' }}>11 am</option>
                                            <option value="12" {{ old('hour_from',$hour) == '12' ? 'selected' : '' }}>12 pm</option>
                                            <option value="13" {{ old('hour_from',$hour) == '13' ? 'selected' : '' }}>1 pm</option>
                                            <option value="14" {{ old('hour_from',$hour) == '14' ? 'selected' : '' }}>2 pm</option>
                                            <option value="15" {{ old('hour_from',$hour) == '15' ? 'selected' : '' }}>3 pm</option>
                                            <option value="16" {{ old('hour_from',$hour) == '16' ? 'selected' : '' }}>4 pm</option>
                                            <option value="17" {{ old('hour_from',$hour) == '17' ? 'selected' : '' }}>5 pm</option>
                                            <option value="18" {{ old('hour_from',$hour) == '18' ? 'selected' : '' }}>6 pm</option>
                                            <option value="19" {{ old('hour_from',$hour) == '19' ? 'selected' : '' }}>7 pm</option>
                                            <option value="20" {{ old('hour_from',$hour) == '20' ? 'selected' : '' }}>8 pm</option>
                                            <option value="21" {{ old('hour_from',$hour) == '21' ? 'selected' : '' }}>9 pm</option>
                                            <option value="22" {{ old('hour_from',$hour) == '22' ? 'selected' : '' }}>10 pm</option>
                                            <option value="23" {{ old('hour_from',$hour) == '23' ? 'selected' : '' }}>11 pm</option>
                                        </select>:
                                        <select class="minute from_dt" name="min_from[]">
                                            <option value="00" {{ old('min_from',$minute) == '00' ? 'selected' : '' }}>00</option>
                                            <option value="05" {{ old('min_from',$minute) == '05' ? 'selected' : '' }}>05</option>
                                            <option value="10" {{ old('min_from',$minute) == '10' ? 'selected' : '' }}>10</option>
                                            <option value="15" {{ old('min_from',$minute) == '15' ? 'selected' : '' }}>15</option>
                                            <option value="20" {{ old('min_from',$minute) == '20' ? 'selected' : '' }}>20</option>
                                            <option value="25" {{ old('min_from',$minute) == '25' ? 'selected' : '' }}>25</option>
                                            <option value="30" {{ old('min_from',$minute) == '30' ? 'selected' : '' }}>30</option>
                                            <option value="35" {{ old('min_from',$minute) == '35' ? 'selected' : '' }}>35</option>
                                            <option value="40" {{ old('min_from',$minute) == '40' ? 'selected' : '' }}>40</option>
                                            <option value="45" {{ old('min_from',$minute) == '45' ? 'selected' : '' }}>45</option>
                                            <option value="50" {{ old('min_from',$minute) == '50' ? 'selected' : '' }}>50</option>
                                            <option value="55" {{ old('min_from',$minute) == '55' ? 'selected' : '' }}>55</option>
                                        </select>
                                    </div>
                                    <div class="col-3 mb-10">
                                        <label class="align-right">To:</label>
                                    </div>
                                    <div class="col-9 mb-10 pl-0">
                                        <input type="date" class="date to_dt hasDatepicker room_to_date" name="date_to[]" value="{{ old('date_to.0',date('Y-m-d', strtotime($_eventFacil->end_date_time))) }}">
                                        @php
                                            $end_time_facility = date('H:i', strtotime($_eventFacil->end_date_time));
                                            $end_hour = date('H', strtotime($end_time_facility));
                                            $end_minute = date('i', strtotime($end_time_facility));
                                        @endphp
                                        <select class="hour to_dt" name="hour_to[]">
                                            <option value="00" {{ old('hour_to',$end_hour) == '00' ? 'selected' : '' }}>12 am</option>
                                            <option value="01" {{ old('hour_to',$end_hour) == '01' ? 'selected' : '' }}>1 am</option>
                                            <option value="02" {{ old('hour_to',$end_hour) == '02' ? 'selected' : '' }}>2 am</option>
                                            <option value="03" {{ old('hour_to',$end_hour) == '03' ? 'selected' : '' }}>3 am</option>
                                            <option value="04" {{ old('hour_to',$end_hour) == '04' ? 'selected' : '' }}>4 am</option>
                                            <option value="05" {{ old('hour_to',$end_hour) == '05' ? 'selected' : '' }}>5 am</option>
                                            <option value="06" {{ old('hour_to',$end_hour) == '06' ? 'selected' : '' }}>6 am</option>
                                            <option value="07" {{ old('hour_to',$end_hour) == '07' ? 'selected' : '' }}>7 am</option>
                                            <option value="08" {{ old('hour_to',$end_hour) == '08' ? 'selected' : '' }}>8 am</option>
                                            <option value="09" {{ old('hour_to',$end_hour) == '09' ? 'selected' : '' }}>9 am</option>
                                            <option value="10" {{ old('hour_to',$end_hour) == '10' ? 'selected' : '' }}>10 am</option>
                                            <option value="11" {{ old('hour_to',$end_hour) == '11' ? 'selected' : '' }}>11 am</option>
                                            <option value="12" {{ old('hour_to',$end_hour) == '12' ? 'selected' : '' }}>12 pm</option>
                                            <option value="13" {{ old('hour_to',$end_hour) == '13' ? 'selected' : '' }}>1 pm</option>
                                            <option value="14" {{ old('hour_to',$end_hour) == '14' ? 'selected' : '' }}>2 pm</option>
                                            <option value="15" {{ old('hour_to',$end_hour) == '15' ? 'selected' : '' }}>3 pm</option>
                                            <option value="16" {{ old('hour_to',$end_hour) == '16' ? 'selected' : '' }}>4 pm</option>
                                            <option value="17" {{ old('hour_to',$end_hour) == '17' ? 'selected' : '' }}>5 pm</option>
                                            <option value="18" {{ old('hour_to',$end_hour) == '18' ? 'selected' : '' }}>6 pm</option>
                                            <option value="19" {{ old('hour_to',$end_hour) == '19' ? 'selected' : '' }}>7 pm</option>
                                            <option value="20" {{ old('hour_to',$end_hour) == '20' ? 'selected' : '' }}>8 pm</option>
                                            <option value="21" {{ old('hour_to',$end_hour) == '21' ? 'selected' : '' }}>9 pm</option>
                                            <option value="22" {{ old('hour_to',$end_hour) == '22' ? 'selected' : '' }}>10 pm</option>
                                            <option value="23" {{ old('hour_to',$end_hour) == '23' ? 'selected' : '' }}>11 pm</option>
                                        </select>:
                                        <select class="minute to_dt" name="min_to[]">
                                            <option value="00" {{ old('min_to',$end_minute) == '00' ? 'selected' : '' }}>00</option>
                                            <option value="05" {{ old('min_to',$end_minute) == '05' ? 'selected' : '' }}>05</option>
                                            <option value="10" {{ old('min_to',$end_minute) == '10' ? 'selected' : '' }}>10</option>
                                            <option value="15" {{ old('min_to',$end_minute) == '15' ? 'selected' : '' }}>15</option>
                                            <option value="20" {{ old('min_to',$end_minute) == '20' ? 'selected' : '' }}>20</option>
                                            <option value="25" {{ old('min_to',$end_minute) == '25' ? 'selected' : '' }}>25</option>
                                            <option value="30" {{ old('min_to',$end_minute) == '30' ? 'selected' : '' }}>30</option>
                                            <option value="35" {{ old('min_to',$end_minute) == '35' ? 'selected' : '' }}>35</option>
                                            <option value="40" {{ old('min_to',$end_minute) == '40' ? 'selected' : '' }}>40</option>
                                            <option value="45" {{ old('min_to',$end_minute) == '45' ? 'selected' : '' }}>45</option>
                                            <option value="50" {{ old('min_to',$end_minute) == '50' ? 'selected' : '' }}>50</option>
                                            <option value="55" {{ old('min_to',$end_minute) == '55' ? 'selected' : '' }}>55</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </div>
            @endif
        </div>
        
        <br>
        <div class="form_footer"><button type="submit" class="button font-bold radius-0">Save</button></div>
    </form>
</span>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $.validator.addMethod("roomDatesWithinEvent", function(value, element) {
                var eventStartDate = new Date($("#event_start_date").val());
                var eventEndDate = new Date($("#event_end_date").val());

                var roomStartDate = new Date($(element).closest(".cus-row").find(".date.from_dt").val());
                var roomEndDate = new Date($(element).closest(".cus-row").find(".date.to_dt").val());

                return roomStartDate >= eventStartDate && roomEndDate <= eventEndDate;
            }, "Room dates must fall within the event dates.");
            $.validator.addMethod("roomsSelected", function(value, element) {
                var valid = true; 
                $('[name^="rooms"]').each(function() {
                    var roomSelect = $(this);
                    var roomId = roomSelect.attr('data-id');
                    if ($(this).val() === '') {
                        valid = false; 
                        return false; 
                    }
                });
                return valid;
            }, "Please select a room for each entry.");
            $.validator.addMethod("maxSelected", function(value, element) {
                var valid = true; 
                $('[name^="max_shared"]').each(function() {
                    var max_shared_select = $(this);
                    if ($(this).val() === '') {
                        valid = false; 
                        return false; 
                    }
                });
                return valid;
            }, "Please enter a room max shared.");
            $.validator.addMethod("paricingSelected", function(value, element) {
                var valid = true; 
                $('[name^="pricing"]').each(function() {
                    if ($(this).val() === '') {
                        valid = false; 
                        return false; 
                    }
                });
                return valid;
            }, "Please select a pricing for each entry." );
            $.validator.addMethod("priceSelected", function(value, element) {
                var valid = true; 
                $('[name^="price"]').each(function() {
                    if ($(this).val() === '') {
                        valid = false; 
                        return false; 
                    }
                });
                return valid;
            }, "Please select a price for each entry." );
            $("#frm_new_event_from_scratch").validate({
                rules: {
                    'edit_event_lnk_customer': 'required',
                    'edit_event_bill_to_lnk_customer': 'required',
                    'edit_contact_id': {
                        number: true,
                        required: true
                    }, 
                    'edit_bill_to_contact_id': {
                        number: true,
                        required: true
                    },
                    'event_type': {
                        number: true,
                        required: true
                    },
                    'sales_person[]': 'required',
                    'event_start_date': {
                        required: true
                    },
                    'event_end_date': {
                        required: true
                    },
                    'is_main_room[]': 'required',
                    'new_event_adults': 'required',
                    'edit_event_adults': 'required',
                    'edit_event_kids': 'required',
                    'edit_event_babies': 'required',
                    'edit_event_pros': 'required',
                    'dining_type': 'required',
                    'event_status': 'required',
                    'contract_type': 'required',
                    'max_shared[]': {
                        maxSelected:true
                    },
                    'rooms[]': {
                        roomsSelected: true
                    }, 
                    'price[]': {
                        priceSelected: true
                    }, 
                    'date_to[]': {
                        required: true,
                        roomDatesWithinEvent: true
                    },
                    'date_from[]': {
                        required: true,
                        roomDatesWithinEvent: true
                    },
                    'pricing[]': {
                        paricingSelected: true
                    },
                    'cat_sales_person[]': 'required',
                    'cat_event_lnk_customer': 'required',
                    'cat_contact_id': {
                        number: true,
                        required: true
                    },
                    'catering_type': 'required',
                    'cat_event_status': 'required',
                    'delivery_type': 'required',
                    'cat_event_start_date': {
                        required: true,
                    },

                }
                , messages: {
                    'is_main_room[]': 'The main room needs to be selected!',
                    'edit_event_lnk_customer': 'Please select the Customer',
                    'edit_event_bill_to_lnk_customer': 'Please select the bill to Customer',
                    'edit_contact_id': 'The contact id must be a number.',
                    'edit_bill_to_contact_id': 'The bill to contact id must be a number.',
                    'event_type': 'The event type must be a number.',
                    'sales_person[]': 'sales person is required.',
                    'event_start_date': {
                        required: 'Event start date is required.',
                    },
                    'event_end_date': {
                        required: 'Event end date is required.',
                    },
                    'date_to[]': {
                        required: 'Room to date is required.',
                        roomDatesWithinEvent: "Adding room to event Date and time entered should fall within event start date and time."
                    },
                    'date_from[]': {
                        required: 'Room from date is required.',
                        roomDatesWithinEvent: "Adding room to event Date and time entered should fall within event start date and time."
                    },
                    'new_event_adults': 'new event adults is required.',
                    'edit_event_adults': 'edit event adults is required.',
                    'edit_event_kids': 'edit event kids is required.',
                    'edit_event_babies': 'edit event babies is required.',
                    'edit_event_pros': 'edit event pros is required.',
                    'dining_type': 'Please select the meal type!.',
                    'event_status': 'Please select the event status!.',
                    'contract_type': 'Please select the contract type!.',
                    // , 'rooms[]': {
                    //     roomsSelected: "Please select a room for each entry."
                    // }
                    // , 'pricing[]': {
                    //     paricingSelected: "Please select a pricing for each entry."
                    // }
                    'cat_sales_person[]': 'Please select the catering sales person!.',
                    'cat_event_lnk_customer': 'Please select the catering Customer!.',
                    'cat_contact_id': 'The catering contact id must be a number!.',
                    'catering_type': 'Please select the catering type!.',
                    'cat_event_start_date': {
                        required: 'catering event start date is required.',
                    },
                    'cat_event_status': 'Please select the catering event status!.',
                    'delivery_type': 'Please select the catering delivery type!.',

                }
            });
            
            
        });
        $(document).ready(function() {
            var rooms_arr = JSON.parse('[{"facility_id": "4", "facility_name": "CONSERVATORY", "abbreviation": "CNV.", "lnk_child_facilities": null},{"facility_id": "5", "facility_name": "CONSULATE", "abbreviation": "CON.", "lnk_child_facilities": null},{"facility_id": "8", "facility_name": "EMBASSY", "abbreviation": "E.", "lnk_child_facilities": "facid[]=1&facid[]=2"},{"facility_id": "1", "facility_name": "EMBASSY EAST", "abbreviation": "EE.", "lnk_child_facilities": null},{"facility_id": "2", "facility_name": "EMBASSY WEST", "abbreviation": "EW.", "lnk_child_facilities": null},{"facility_id": "3", "facility_name": "GREENHOUSE", "abbreviation": "GH.", "lnk_child_facilities": null},{"facility_id": "9", "facility_name": "GROUNDS", "abbreviation": "GRDS.", "lnk_child_facilities": null},{"facility_id": "11", "facility_name": "LAKESIDE GAZEBO", "abbreviation": "LG.", "lnk_child_facilities": null},{"facility_id": "13", "facility_name": "Lawn Area (South of Greenhouse parking lot)", "abbreviation": "LAGP", "lnk_child_facilities": "facid[]=13"},{"facility_id": "6", "facility_name": "LIBRARY", "abbreviation": "LBRY.", "lnk_child_facilities": null},{"facility_id": "7", "facility_name": "TERRACE GAZEBO", "abbreviation": "TG", "lnk_child_facilities": null}]');
            var room_pricings_arr = JSON.parse('[{"fpricing_id": "1", "facility_id": "1", "pricing_title": "Embassy East (Saturday)", "price": "7500.00"},{"fpricing_id": "2", "facility_id": "1", "pricing_title": "Embassy East (Friday or Sunday)", "price": "5500.00"},{"fpricing_id": "3", "facility_id": "1", "pricing_title": "Embassy East (Mon. - Fri. 8:00 am - 3:00 pm)", "price": "850.00"},{"fpricing_id": "4", "facility_id": "4", "pricing_title": "Conservatory (Mon. - Fri. 8:00 am - 3:00 pm)", "price": "500.00"},{"fpricing_id": "5", "facility_id": "4", "pricing_title": "Conservatory (Saturday)", "price": "3250.00"},{"fpricing_id": "6", "facility_id": "5", "pricing_title": "Consulate (Mon.)", "price": "350.00"},{"fpricing_id": "7", "facility_id": "5", "pricing_title": "Consulate (Sun.)", "price": "1000.00"},{"fpricing_id": "9", "facility_id": "8", "pricing_title": "Embassy (Friday or Sunday)", "price": "11000.00"},{"fpricing_id": "10", "facility_id": "8", "pricing_title": "Embassy (Mon. - Fri. 8:00 am - 3:00 pm)", "price": "1250.00"},{"fpricing_id": "11", "facility_id": "8", "pricing_title": "Embassy (Saturday)", "price": "16500.00"},{"fpricing_id": "12", "facility_id": "2", "pricing_title": "Embassy West (Friday or Sunday)", "price": "5000.00"},{"fpricing_id": "13", "facility_id": "2", "pricing_title": "Embassy West (Mon. - Fri. 8:00 am - 3:00 pm)", "price": "650.00"},{"fpricing_id": "14", "facility_id": "2", "pricing_title": "Embassy West (rehearsal)", "price": "0.00"},{"fpricing_id": "15", "facility_id": "2", "pricing_title": "Embassy West (Saturday)", "price": "7000.00"},{"fpricing_id": "16", "facility_id": "7", "pricing_title": "Terrace Gazebo (Ceremony with no reception at RA)", "price": "1800.00"},{"fpricing_id": "17", "facility_id": "7", "pricing_title": "Terrace Gazebo (Ceremony with reception at RA)", "price": "1050.00"},{"fpricing_id": "18", "facility_id": "7", "pricing_title": "Terrace Gazebo (rehearsal)", "price": "150.00"},{"fpricing_id": "19", "facility_id": "3", "pricing_title": "Greenhouse (Friday or Sunday)", "price": "7500.00"},{"fpricing_id": "20", "facility_id": "3", "pricing_title": "Greenhouse (Mon. - Fri. 9:00 am - 3:00 pm)", "price": "1000.00"},{"fpricing_id": "21", "facility_id": "3", "pricing_title": "Greenhouse (Saturday)", "price": "10000.00"},{"fpricing_id": "22", "facility_id": "11", "pricing_title": "Lakeside Gazebo (Ceremony with no reception at RA)", "price": "1800.00"},{"fpricing_id": "23", "facility_id": "11", "pricing_title": "Lakeside Gazebo (Ceremony with reception at RA)", "price": "1050.00"},{"fpricing_id": "24", "facility_id": "11", "pricing_title": "Lakeside Gazebo (Rehearsal)", "price": "150.00"},{"fpricing_id": "25", "facility_id": "6", "pricing_title": "Library (Mon. - Fri. 9:00 am - 3:00 pm)", "price": "300.00"},{"fpricing_id": "26", "facility_id": "6", "pricing_title": "Library (Weekend)", "price": "1000.00"},{"fpricing_id": "27", "facility_id": "9", "pricing_title": "Photos on grounds", "price": "300.00"},{"fpricing_id": "28", "facility_id": "1", "pricing_title": "Embassy East (Rehearsal)", "price": "0.00"},{"fpricing_id": "29", "facility_id": "4", "pricing_title": "Conservatory (Sunday)", "price": "1000.00"},{"fpricing_id": "31", "facility_id": "5", "pricing_title": "Consulate (Sat.)", "price": "2500.00"},{"fpricing_id": "34", "facility_id": "13", "pricing_title": "LAGP", "price": "8500.00"},{"fpricing_id": "36", "facility_id": "11", "pricing_title": "Lakeside Gazebo (Proposal Only)", "price": "300.00"},{"fpricing_id": "37", "facility_id": "3", "pricing_title": "Greenhouse", "price": "0.00"}]');
            $(document).on("click", ".btn_add_room", function() {
                addNewRoom();
                doAfterEventEndDateChanged();
                
            });

            setTimeout(function()
            {
            // Add empty room only if default rooms not already added
            if ($(".event_room").length == 0)
            {
                if (! isNaN('%room_id%')) // User coming from calendar so room already selected
                {
                // Set the timing on event so when we add the room, it will use that as default
                var event_given_dt = moment('%event_dt%') ;
                $("#event_start_date").val(event_given_dt.format("YYYY-MM-DD")) ;
                $("#event_start_hour").val(event_given_dt.format("HH")) ;
                $("#event_start_min").val(event_given_dt.format("mm")) ;
                
                // Also put the same for end date to make it easier 
                $("#event_end_date").val(event_given_dt.format("YYYY-MM-DD")) ;
                
                // Now add the room
                var room_info = {facility_id: '%room_id%'} ;
                addNewRoom(room_info) ;
                }
                else{
                addNewRoom() ;
                }
            }
            },500) ;
            $(document).on("click",".btn_delete_room",function()
            {
            if (! confirm("Remove this room?"))
                return ;
                
            $(this).closest(".event_room").remove() ;
            }) ;

            $(document).on("change",".room_select",function()
            {
            populateRoomPricing($(this)) ;
            }) ;
            $(document).on("click",".btn_full_embassy",function()
            {
            var room_select = $(this).closest('.event_room').find(".room_select") ;
            room_select.val(8) ;
            populateRoomPricing(room_select) ;
            }) ;
            $(document).on("click",".btn_room_same_timing",function()
            {
            if ($(this).hasClass("green"))
            {
                $(this).removeClass("green") ;
            }
            else if ($(this).hasClass("btn_room_same_timing"))
            {
                $(this).addClass("green") ;
                doAfterEventEndDateChanged() ; // Also sync the current timing in case user selects after
            }
            }) ;

            $(document).on("change",".price_select",function()
            {
            $(this).closest(".event_room").find(".price").val($(this).find(":selected").attr("price")) ;
            }) ;

            function populateRoomPricing(room_select , fpricing_id)
            {
                var facility_id = room_select.val() ;
                
                // Populate pricing options based on the selected room
                var pricing_options = '<option value="">----</option>' ;
                for (var i in room_pricings_arr)
                {
                var cur_pricing = room_pricings_arr[i] ;
                if (cur_pricing.facility_id != facility_id)
                    continue ; // Only show related options
                
                var title = cur_pricing.pricing_title + ' | $' + cur_pricing.price ;
                pricing_options += '<option value="' + cur_pricing.fpricing_id + '"'
                                        + ' price="' + cur_pricing.price + '"' ;
                if (fpricing_id && cur_pricing.fpricing_id == fpricing_id)
                    pricing_options += ' selected="selected"' ;
                pricing_options += '>' + title + '</option>' ;
                }
                room_select.closest(".event_room").find(".price_select").html(pricing_options) ;
            } // populateRoomPricing
            function addNewRoom(room_info) {
                var room_counter = $(".event_room").length + 1;

                // Add room
                var room = '<div class="col-6 main-order-item event_room" room_counter="' + room_counter + '">';
                
                room += '<div class="global-form main-form height-100">';
                room += '<div class="room_buttons_wrap" style="text-align: end;">';
                room += '<span class="btn_room_same_timing btn green" title="room same timing"><input type="checkbox" class="same_timing_checkbox" name="same_timing_as_event[]" value="1"></span><span class="btn_room_is_main" title="Is main room"><input type="checkbox" class="same_timing_checkbox" name="is_main_room[]" value="1"></span><span class="btn_delete_room btn"><svg style="width: 15px;cursor: pointer;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg></span>';
                room += '</div>';
                room += '<div class="cus-row">';

                // Room select
                var room_select = '<div class="col-8 mb-10 pl-0"><select class="room_select" name="rooms[]">' +
                    '<option value="">----</option>';
                for (var i in rooms_arr) {
                    room_select += '<option value="' + rooms_arr[i].facility_id + '"';
                    if (room_info && room_info.facility_id == rooms_arr[i].facility_id)
                        room_select += ' selected="selected"';
                    room_select += '>' + rooms_arr[i].facility_name + '</option>';
                }
                room_select += '</select></div>';

                // Because we show embassy east/west on the calendar, user cannot click on full embassy.
                // So here we add a quick button so user can switch
                full_embassy_btn = '';
                if ($(".event_room").length == 0 &&
                    ('%room_id%' == 1 || '%room_id%' == 2))
                    full_embassy_btn = '<span class="small_button btn_full_embassy">Full Embassy</span>';

                room += '<div class="col-4 mb-10"><label class="align-right">Room ' + room_counter + ':</label> * ' + full_embassy_btn + '</div>'+room_select;

                // Price select. The options of this one changes when user selects the room
                var price_select =
                    '<div class="col-8 mb-10 pl-0"><select class="price_select" name="pricing[]">' +
                    '<option value="">----</option>' +
                    '</select></div>';
                room += '<div class="col-4 mb-10"><label class="align-right">Pricing:</label></div>'+price_select;

                room += '<div class="col-4 mb-10"><label class="align-right">Price:</label></div> <div class="col-8 mb-10 pl-0"><input type="number" name="price[]"  class="price"';
                if (room_info)
                    room += ' value="' + room_info.price + '"';
                room += ' /></div>';

                room += '<div class="col-4 mb-10"><label class="align-right">Max Shared:</label></div> <div class="col-8 mb-10 pl-0"><input type="number"  value="1" name="max_shared[]" class="max_shared" /></div>';

                room += '<div class="col-4 mb-10"><label class="align-right">From:</label></div> <div class="col-8 mb-10 pl-0"><input type="date" class="date from_dt hasDatepicker room_from_date" name="date_from[]"><select class="hour from_dt" name="hour_from[]"><option value="00" >12 am</option><option value="01" >1 am</option><option value="02" >2 am</option><option value="03" >3 am</option><option value="04" >4 am</option><option value="05" >5 am</option><option value="06" >6 am</option> <option value="07" >7 am</option><option value="08" >8 am</option><option value="09" >9 am</option><option value="10" >10 am</option><option value="11" >11 am</option><option value="12" >12 pm</option><option value="13" >1 pm</option><option value="14" >2 pm</option><option value="15" >3 pm</option><option value="16" >4 pm</option><option value="17" >5 pm</option><option value="18" >6 pm</option><option value="19" >7 pm</option><option value="20" >8 pm</option><option value="21" >9 pm</option><option value="22" >10 pm</option><option value="23" >11 pm</option></select>:<select class="minute from_dt" name="min_from[]"><option value="00" >00</option><option value="05" >05</option><option value="10" >10</option><option value="15" >15</option><option value="20" >20</option><option value="25" >25</option><option value="30" >30</option><option value="35" >35</option><option value="40" >40</option><option value="45" >45</option><option value="50" >50</option><option value="55" >55</option></select></div>';
                room += '<div class="col-4 mb-10"><label class="align-right">To:</label></div>  <div class="col-8 mb-10 pl-0"><input type="date" class="date to_dt hasDatepicker room_to_date" name="date_to[]"><select class="hour to_dt" name="hour_to[]"><option value="00" >12 am</option><option value="01" >1 am</option><option value="02" >2 am</option><option value="03" >3 am</option><option value="04" >4 am</option><option value="05" >5 am</option><option value="06" >6 am</option> <option value="07" >7 am</option><option value="08" >8 am</option><option value="09" >9 am</option><option value="10" >10 am</option><option value="11" >11 am</option><option value="12" >12 pm</option><option value="13" >1 pm</option><option value="14" >2 pm</option><option value="15" >3 pm</option><option value="16" >4 pm</option><option value="17" >5 pm</option><option value="18" >6 pm</option><option value="19" >7 pm</option><option value="20" >8 pm</option><option value="21" >9 pm</option><option value="22" >10 pm</option><option value="23" >11 pm</option></select>:<select class="minute to_dt" name="min_to[]"><option value="00" >00</option><option value="05" >05</option><option value="10" >10</option><option value="15" >15</option><option value="20" >20</option><option value="25" >25</option><option value="30" >30</option><option value="35" >35</option><option value="40" >40</option><option value="45" >45</option><option value="50" >50</option><option value="55" >55</option></select></div>';

                room += '</div></div></div>';
                room = $(room);

                $(".rooms_wrap").append(room).show(200);

                // If room already selected, also populate pricing
                if (room_info)
                    populateRoomPricing(room.find(".room_select"), room_info.fpricing_id);

                // Start date and time. Use event timing as default
                var options = {
                    add_time: true
                    , do_replace: true
                    , minute_interval: 5
                };
                var event_dt = $.trim($("#event_start_date").val());
                if (event_dt != "") {
                    event_dt += ' ' + $("#event_start_hour").val() + ':' + $("#event_start_min").val();
                    options.value = event_dt;
                }
                // room.find(".from_dt").azbDateTimePicker(options);

                // End date and time. Use event timing as default
                var options = {
                    add_time: true
                    , do_replace: true
                    , minute_interval: 5
                };
                var event_dt = $.trim($("#event_end_date").val());
                if (event_dt != "") {
                    event_dt += ' ' + $("#event_end_hour").val() + ':' + $("#event_end_min").val();
                    options.value = event_dt;
                }
                // room.find(".to_dt").azbDateTimePicker(options);

                // If this the first room, it should have the same timing as the main event
                var same_timing_btn = room.find(".btn_room_same_timing");
                if ($(".event_room").length == 1)
                    same_timing_btn.addClass("green");
                else
                    same_timing_btn.addClass("grey");
            }
            $(document).on("change","#event_start_date, #event_start_hour, #event_start_min"
                + ", #event_end_date, #event_end_hour, #event_end_min"                        
            ,function()
            {
            if ($("#event_end_date").val() < $("#event_start_date").val())
                $("#event_end_date").val($("#event_start_date").val()) ; 
            doAfterEventEndDateChanged() ;
            }) 
            function doAfterEventEndDateChanged()
            {
                $(".event_room").each(function()
                {
                // Start date should change no matter
                $(this).find(".from_dt.date").val($("#event_start_date").val()) ;
                
                // Also make sure end date is not before start
                if ($(this).find(".to_dt.date").val() < $(this).find(".from_dt.date").val())
                    $(this).find(".to_dt.date").val($(this).find(".from_dt.date").val()) ; 
                
                // Change the end date and timing only if its timing is the same as event
                if ($(this).find(".btn_room_same_timing").hasClass("green"))
                {
                    $(this).find(".to_dt.date").val($("#event_end_date").val()) ;
                    
                    $(this).find(".hour.from_dt").val($("#event_start_hour").val()) ;
                    $(this).find(".minute.from_dt").val($("#event_start_min").val()) ;
                    
                    $(this).find(".hour.to_dt").val($("#event_end_hour").val()) ;
                    $(this).find(".minute.to_dt").val($("#event_end_min").val()) ;
                }
                }) ; 
            } // doAfterEventEndDateChanged
        });
    </script>
@endsection