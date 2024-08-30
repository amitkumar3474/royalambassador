{{-- quick edit event --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form d-none ui-draggable-event-edit @if($errors->any()) error @endif"
    tabindex="-1" style="top: 167px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Quick Edit Event</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-event-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content frm_edit_customer">
        <span id="event_edit" class="xmlb_form">
            <form id="quick_edit_event_form" action="" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <input type="hidden" name="quick_edit" value="quick_edit">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Event Title:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input id="event_edit_event_title" name="edit_event_title"
                            value="{{old('edit_event_title', $event->event_title)}}" type="text" maxlength="90"
                            size="40" title="Title used for the public page of the event">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Status:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select id="event_edit_event_status" name="edit_event_status">
                            <option value="1" {{old('edit_event_status',$event->event_status) == 1? 'selected':''}}>
                                Tentative</option>
                            <option value="5" {{old('edit_event_status',$event->event_status) == 5? 'selected':''}}>
                                Promised</option>
                            <option value="2" {{old('edit_event_status',$event->event_status) == 2? 'selected':''}}>
                                Booked</option>
                            <option value="3" {{old('edit_event_status',$event->event_status) == 3? 'selected':''}}>
                                Cancelled</option>
                            <option value="4" {{old('edit_event_status',$event->event_status) == 4? 'selected':''}}>
                                Archived</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                @if (!empty($event->catering_type))
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Catering Type:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select id="event_edit_catering_type" name="event_edit_catering_type">
                            <option value="B" {{old('',$event->catering_type) == 'B'? 'selected':''}}>Banquet</option>
                            <option value="R" {{old('',$event->catering_type) == 'R'? 'selected':''}}>Consulate Order
                            </option>
                        </select>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Event Type:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select id="event_edit_lnk_event_type" name="event_edit_lnk_event_type">
                            @foreach ($eventTypes as $_eventType)
                            <option value="{{$_eventType->id}}"
                                {{old('event_edit_lnk_event_type',$event->lnk_event_type) == $_eventType->id? 'selected':''}}>
                                {{$_eventType->type_name}}</option>
                            @endforeach
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">No of Tables:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <input id="event_edit_no_of_tables" name="event_edit_no_of_tables"
                            {{old('event_edit_no_of_tables',$event->no_of_tables)}} type="text" maxlength="4" size="8"
                            title="No of tables for this event">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Price Per Baby:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <input id="event_edit_price_per_baby" name="event_edit_price_per_baby" type="number" step="0.01"
                            size="8" maxlength="9"
                            value="{{old('event_edit_price_per_baby', $event->price_per_baby??0)}}"
                            title="Price per baby after taxes">
                    </div>
                </div>
                <div class="line_break"></div>
                <fieldset id="contract_prices">
                    <legend>Contract Pricing</legend>
                    <div class="row">
                        <div class="col-2 mb-10">
                            <label class="align-right">Adult:</label>
                        </div>
                        <div class="col-4 mb-10 pl-0">
                            <input id="price_contract_adult" name="price_contract_adult" type="number" step="0.01"
                                maxlength="9"
                                value="{{old('price_contract_adult', $event->price_per_person_contract??0)}}"
                                title="Total price per person after taxes">
                        </div>
                        <div class="col-2 mb-10">
                            <label class="align-right d-block">Child:</label>
                        </div>
                        <div class="col-4 mb-10 pl-0">
                            <input id="price_contract_child" name="price_contract_child" type="number" step="0.01"
                                maxlength="9" value="{{old('price_contract_child', $event->price_per_kid_contract??0)}}"
                                title="Total price per kid after taxes">
                        </div>
                        <div class="col-2 mb-10">
                            <label class="align-right d-block">Professional:</label>
                        </div>
                        <div class="col-4 mb-10 pl-0">
                            <input id="price_contract_pros" name="price_contract_pros" type="number" step="0.01"
                                maxlength="9" value="{{old('price_contract_pros', $event->price_per_pro_contract??0)}}"
                                title="Total price per pro after taxes">
                        </div>
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <fieldset id="contract_prices">
                    <legend>Setup</legend>
                    <div class="row">
                        <div class="col-2 mb-10">
                            <label class="align-right">Percent:</label>
                        </div>
                        <div class="col-4 mb-10 pl-0">
                            <input id="gratuity_percent" name="gratuity_percent" type="text" maxlength="5" size="8"
                                value="{{old('gratuity_percent', number_format($event->gratuity_percent, 2))}}"
                                title="Gratuity percent">
                        </div>
                        <div class="col-2 mb-10">
                            <label class="align-right d-block">Amount:</label>
                        </div>
                        <div class="col-4 mb-10 pl-0">
                            <input id="gratuity_amount" name="gratuity_amount" type="number" step="0.01" maxlength="10"
                                value="{{old('gratuity_amount', number_format($event->gratuity_amount, 2))}}"
                                title="Gratuity amount">
                        </div>
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- update guests --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form d-none ui-draggable-update-guest @if($errors->any()) error @endif"
    tabindex="-1" style="top: 167px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Update Guests</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-guest-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content frm_edit_customer">
        <span id="event_update" class="xmlb_form">
            <form id="guest_update_event_form" action="" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <input type="hidden" name="update_guest" value="update_guests">
                <div class="line_break"></div>
                <fieldset id="guests">
                    <legend>Guests</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Adults:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_adults" name="event_update_guests_adults" type="text" maxlength="4"
                                size="4" value="{{old('event_update_guests_adults', $event->adults??0)}}"
                                title="Number of adults in the event">
                        </div>
                        @error('event_update_guests_adults')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Children:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_update_guests_kids" name="event_update_guests_kids" type="text"
                                maxlength="4" size="4" value="{{old('event_update_guests_kids', $event->kids??0)}}"
                                title="Number of kids in this event">
                        </div>
                        @error('event_update_guests_kids')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Babies:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_update_guests_babies" name="event_update_guests_babies" type="text"
                                maxlength="4" size="4" value="{{old('event_update_guests_babies', $event->babies??0)}}"
                                title="Babies count. For information only">
                        </div>
                        @error('event_update_guests_babies')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Pros:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_update_guests_pros" name="event_update_guests_pros" type="text"
                                maxlength="4" size="4" value="{{old('event_update_guests_pros', $event->pros??0)}}"
                                title="Number of professionals in the event like music bands or DJs">
                        </div>
                        @error('event_update_guests_pros')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <fieldset id="guests_actual">
                    <legend>Actual Numbers</legend>
                    <p>Unlike other numbers that are used for invoicing and pricing,
                        actual numbers are updated via floor plan and are used for menu qtys
                    </p>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Adults:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_adults_actual" name="event_adults_actual" type="text" maxlength="4"
                                size="4" value="{{old('event_adults_actual', $event->adults_actual??0)}}"
                                title="Actual number of adults in the event which is used in Kitchen and Event Sheet">
                        </div>
                        @error('event_adults_actual')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Children:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_kids_actual" name="event_kids_actual" type="text" maxlength="4" size="4"
                                value="{{old('event_kids_actual', $event->kids_actual??0)}}"
                                title="Actual number of children in the event which is used in Kitchen and Event Sheet">
                        </div>
                        @error('event_kids_actual')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Babies:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_babies_actual" name="event_babies_actual" type="text" maxlength="4"
                                size="3" value="{{old('event_babies_actual', $event->babies_actual??0)}}"
                                title="Actual number of babies that is sourced from floor plan">
                        </div>
                        @error('event_babies_actual')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Pros:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="event_pros_actual" name="event_pros_actual" type="text" maxlength="4" size="3"
                                value="{{old('event_pros_actual', $event->pros_actual??0)}}"
                                title="The actual number of professionals a sourced by floor plan. We need this info for invoicing">
                        </div>
                        @error('event_pros_actual')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
                <button type="button" class="button font-bold radius-0 closethick-guest-close">Cancel</button>
            </form>
        </span>
    </div>
</div>
{{-- edit event facility --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-facility d-none"
    tabindex="-1" style="top: 166px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit facility/pricing</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-editfacility-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="" id="event_facility_edit_form" method="POST" class="event_facility_validate"
                novalidate="novalidate">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <input type="hidden" name="eventFacility_id" value="">
                <div class="row event_room">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Facility:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="room_select" name="room">
                            <option value="">----</option>
                            @foreach ($facilities as $_facility)
                            <option value="{{$_facility->id}}" {{ old('room') == $_facility->id ? 'selected' : '' }}>
                                {{$_facility->facility_name}}</option>
                            @endforeach
                        </select> *
                        @error('rooms')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Pricing:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="price_select" name="pricing">
                            <option value="">----</option>
                            @foreach ($facilityPricing as $_facilityPric)
                            <option value="{{$_facilityPric->id}}" price="{{$_facilityPric->price}}"
                                {{ old('pricing') == $_facilityPric->id ? 'selected' : '' }}>
                                {{$_facilityPric->pricing_title.' | '.$_facilityPric->price}}</option>
                            @endforeach
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Price:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="number" class="price" name="price" value="{{old('price')}}">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Max Shared:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="number" class="max_shared" name="max_shared" value="{{old('max_shared',1)}}">
                        <span class="mand_sign">*</span>
                    </div>

                    <div class="col-4 mb-10">
                        <label class="align-right d-block">From:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="date" class="date from_dt hasDatepicker room_from_date" name="date_from"
                            value="{{ old('date_from') }}">
                        <select class="hour from_dt" name="hour_from">
                            <option value="00" {{ old('hour_from') == '00' ? 'selected' : '' }}>12 am</option>
                            <option value="01" {{ old('hour_from') == '01' ? 'selected' : '' }}>1 am</option>
                            <option value="02" {{ old('hour_from') == '02' ? 'selected' : '' }}>2 am</option>
                            <option value="03" {{ old('hour_from') == '03' ? 'selected' : '' }}>3 am</option>
                            <option value="04" {{ old('hour_from') == '04' ? 'selected' : '' }}>4 am</option>
                            <option value="05" {{ old('hour_from') == '05' ? 'selected' : '' }}>5 am</option>
                            <option value="06" {{ old('hour_from') == '06' ? 'selected' : '' }}>6 am</option>
                            <option value="07" {{ old('hour_from') == '07' ? 'selected' : '' }}>7 am</option>
                            <option value="08" {{ old('hour_from') == '08' ? 'selected' : '' }}>8 am</option>
                            <option value="09" {{ old('hour_from') == '09' ? 'selected' : '' }}>9 am</option>
                            <option value="10" {{ old('hour_from') == '10' ? 'selected' : '' }}>10 am</option>
                            <option value="11" {{ old('hour_from') == '11' ? 'selected' : '' }}>11 am</option>
                            <option value="12" {{ old('hour_from') == '12' ? 'selected' : '' }}>12 pm</option>
                            <option value="13" {{ old('hour_from') == '13' ? 'selected' : '' }}>1 pm</option>
                            <option value="14" {{ old('hour_from') == '14' ? 'selected' : '' }}>2 pm</option>
                            <option value="15" {{ old('hour_from') == '15' ? 'selected' : '' }}>3 pm</option>
                            <option value="16" {{ old('hour_from') == '16' ? 'selected' : '' }}>4 pm</option>
                            <option value="17" {{ old('hour_from') == '17' ? 'selected' : '' }}>5 pm</option>
                            <option value="18" {{ old('hour_from') == '18' ? 'selected' : '' }}>6 pm</option>
                            <option value="19" {{ old('hour_from') == '19' ? 'selected' : '' }}>7 pm</option>
                            <option value="20" {{ old('hour_from') == '20' ? 'selected' : '' }}>8 pm</option>
                            <option value="21" {{ old('hour_from') == '21' ? 'selected' : '' }}>9 pm</option>
                            <option value="22" {{ old('hour_from') == '22' ? 'selected' : '' }}>10 pm</option>
                            <option value="23" {{ old('hour_from') == '23' ? 'selected' : '' }}>11 pm</option>
                        </select>:
                        <select class="minute from_dt" name="min_from">
                            <option value="00" {{ old('min_from') == '00' ? 'selected' : '' }}>00</option>
                            <option value="05" {{ old('min_from') == '05' ? 'selected' : '' }}>05</option>
                            <option value="10" {{ old('min_from') == '10' ? 'selected' : '' }}>10</option>
                            <option value="15" {{ old('min_from') == '15' ? 'selected' : '' }}>15</option>
                            <option value="20" {{ old('min_from') == '20' ? 'selected' : '' }}>20</option>
                            <option value="25" {{ old('min_from') == '25' ? 'selected' : '' }}>25</option>
                            <option value="30" {{ old('min_from') == '30' ? 'selected' : '' }}>30</option>
                            <option value="35" {{ old('min_from') == '35' ? 'selected' : '' }}>35</option>
                            <option value="40" {{ old('min_from') == '40' ? 'selected' : '' }}>40</option>
                            <option value="45" {{ old('min_from') == '45' ? 'selected' : '' }}>45</option>
                            <option value="50" {{ old('min_from') == '50' ? 'selected' : '' }}>50</option>
                            <option value="55" {{ old('min_from') == '55' ? 'selected' : '' }}>55</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">To:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="date" class="date to_dt hasDatepicker room_to_date" name="date_to"
                            value="{{ old('date_to') }}">
                        <select class="hour to_dt" name="hour_to">
                            <option value="00" {{ old('hour_to') == '00' ? 'selected' : '' }}>12 am</option>
                            <option value="01" {{ old('hour_to') == '01' ? 'selected' : '' }}>1 am</option>
                            <option value="02" {{ old('hour_to') == '02' ? 'selected' : '' }}>2 am</option>
                            <option value="03" {{ old('hour_to') == '03' ? 'selected' : '' }}>3 am</option>
                            <option value="04" {{ old('hour_to') == '04' ? 'selected' : '' }}>4 am</option>
                            <option value="05" {{ old('hour_to') == '05' ? 'selected' : '' }}>5 am</option>
                            <option value="06" {{ old('hour_to') == '06' ? 'selected' : '' }}>6 am</option>
                            <option value="07" {{ old('hour_to') == '07' ? 'selected' : '' }}>7 am</option>
                            <option value="08" {{ old('hour_to') == '08' ? 'selected' : '' }}>8 am</option>
                            <option value="09" {{ old('hour_to') == '09' ? 'selected' : '' }}>9 am</option>
                            <option value="10" {{ old('hour_to') == '10' ? 'selected' : '' }}>10 am</option>
                            <option value="11" {{ old('hour_to') == '11' ? 'selected' : '' }}>11 am</option>
                            <option value="12" {{ old('hour_to') == '12' ? 'selected' : '' }}>12 pm</option>
                            <option value="13" {{ old('hour_to') == '13' ? 'selected' : '' }}>1 pm</option>
                            <option value="14" {{ old('hour_to') == '14' ? 'selected' : '' }}>2 pm</option>
                            <option value="15" {{ old('hour_to') == '15' ? 'selected' : '' }}>3 pm</option>
                            <option value="16" {{ old('hour_to') == '16' ? 'selected' : '' }}>4 pm</option>
                            <option value="17" {{ old('hour_to') == '17' ? 'selected' : '' }}>5 pm</option>
                            <option value="18" {{ old('hour_to') == '18' ? 'selected' : '' }}>6 pm</option>
                            <option value="19" {{ old('hour_to') == '19' ? 'selected' : '' }}>7 pm</option>
                            <option value="20" {{ old('hour_to') == '20' ? 'selected' : '' }}>8 pm</option>
                            <option value="21" {{ old('hour_to') == '21' ? 'selected' : '' }}>9 pm</option>
                            <option value="22" {{ old('hour_to') == '22' ? 'selected' : '' }}>10 pm</option>
                            <option value="23" {{ old('hour_to') == '23' ? 'selected' : '' }}>11 pm</option>
                        </select>:
                        <select class="minute to_dt" name="min_to">
                            <option value="00" {{ old('min_to') == '00' ? 'selected' : '' }}>00</option>
                            <option value="05" {{ old('min_to') == '05' ? 'selected' : '' }}>05</option>
                            <option value="10" {{ old('min_to') == '10' ? 'selected' : '' }}>10</option>
                            <option value="15" {{ old('min_to') == '15' ? 'selected' : '' }}>15</option>
                            <option value="20" {{ old('min_to') == '20' ? 'selected' : '' }}>20</option>
                            <option value="25" {{ old('min_to') == '25' ? 'selected' : '' }}>25</option>
                            <option value="30" {{ old('min_to') == '30' ? 'selected' : '' }}>30</option>
                            <option value="35" {{ old('min_to') == '35' ? 'selected' : '' }}>35</option>
                            <option value="40" {{ old('min_to') == '40' ? 'selected' : '' }}>40</option>
                            <option value="45" {{ old('min_to') == '45' ? 'selected' : '' }}>45</option>
                            <option value="50" {{ old('min_to') == '50' ? 'selected' : '' }}>50</option>
                            <option value="55" {{ old('min_to') == '55' ? 'selected' : '' }}>55</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 event_facility_update_form">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- add event facility --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-facility d-none"
    tabindex="-1" style="top: 166px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add Facility/Pricing</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-addfacility-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="" id="event_facility_add_form" method="POST" class="event_facility_validate"
                novalidate="novalidate">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <div class="row event_room">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Facility:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="room_select" name="room">
                            <option value="">----</option>
                            @foreach ($facilities as $_facility)
                            <option value="{{$_facility->id}}" {{ old('room') == $_facility->id ? 'selected' : '' }}>
                                {{$_facility->facility_name}}</option>
                            @endforeach
                        </select> *
                        @error('rooms')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Pricing:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="price_select" name="pricing">
                            <option value="">----</option>
                            @foreach ($facilityPricing as $_facilityPric)
                            <option value="{{$_facilityPric->id}}" price="{{$_facilityPric->price}}"
                                {{ old('pricing') == $_facilityPric->id ? 'selected' : '' }}>
                                {{$_facilityPric->pricing_title.' | '.$_facilityPric->price}}</option>
                            @endforeach
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Price:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="number" class="price" name="price" value="{{old('price')}}">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Max Shared:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="number" class="max_shared" name="max_shared" value="{{old('max_shared',1)}}">
                        <span class="mand_sign">*</span>
                    </div>

                    <div class="col-4 mb-10">
                        <label class="align-right d-block">From:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="date" class="date from_dt hasDatepicker room_from_date" name="date_from"
                            value="{{ old('date_from') }}">
                        <select class="hour from_dt" name="hour_from">
                            <option value="00" {{ old('hour_from') == '00' ? 'selected' : '' }}>12 am</option>
                            <option value="01" {{ old('hour_from') == '01' ? 'selected' : '' }}>1 am</option>
                            <option value="02" {{ old('hour_from') == '02' ? 'selected' : '' }}>2 am</option>
                            <option value="03" {{ old('hour_from') == '03' ? 'selected' : '' }}>3 am</option>
                            <option value="04" {{ old('hour_from') == '04' ? 'selected' : '' }}>4 am</option>
                            <option value="05" {{ old('hour_from') == '05' ? 'selected' : '' }}>5 am</option>
                            <option value="06" {{ old('hour_from') == '06' ? 'selected' : '' }}>6 am</option>
                            <option value="07" {{ old('hour_from') == '07' ? 'selected' : '' }}>7 am</option>
                            <option value="08" {{ old('hour_from') == '08' ? 'selected' : '' }}>8 am</option>
                            <option value="09" {{ old('hour_from') == '09' ? 'selected' : '' }}>9 am</option>
                            <option value="10" {{ old('hour_from') == '10' ? 'selected' : '' }}>10 am</option>
                            <option value="11" {{ old('hour_from') == '11' ? 'selected' : '' }}>11 am</option>
                            <option value="12" {{ old('hour_from') == '12' ? 'selected' : '' }}>12 pm</option>
                            <option value="13" {{ old('hour_from') == '13' ? 'selected' : '' }}>1 pm</option>
                            <option value="14" {{ old('hour_from') == '14' ? 'selected' : '' }}>2 pm</option>
                            <option value="15" {{ old('hour_from') == '15' ? 'selected' : '' }}>3 pm</option>
                            <option value="16" {{ old('hour_from') == '16' ? 'selected' : '' }}>4 pm</option>
                            <option value="17" {{ old('hour_from') == '17' ? 'selected' : '' }}>5 pm</option>
                            <option value="18" {{ old('hour_from') == '18' ? 'selected' : '' }}>6 pm</option>
                            <option value="19" {{ old('hour_from') == '19' ? 'selected' : '' }}>7 pm</option>
                            <option value="20" {{ old('hour_from') == '20' ? 'selected' : '' }}>8 pm</option>
                            <option value="21" {{ old('hour_from') == '21' ? 'selected' : '' }}>9 pm</option>
                            <option value="22" {{ old('hour_from') == '22' ? 'selected' : '' }}>10 pm</option>
                            <option value="23" {{ old('hour_from') == '23' ? 'selected' : '' }}>11 pm</option>
                        </select>:
                        <select class="minute from_dt" name="min_from">
                            <option value="00" {{ old('min_from') == '00' ? 'selected' : '' }}>00</option>
                            <option value="05" {{ old('min_from') == '05' ? 'selected' : '' }}>05</option>
                            <option value="10" {{ old('min_from') == '10' ? 'selected' : '' }}>10</option>
                            <option value="15" {{ old('min_from') == '15' ? 'selected' : '' }}>15</option>
                            <option value="20" {{ old('min_from') == '20' ? 'selected' : '' }}>20</option>
                            <option value="25" {{ old('min_from') == '25' ? 'selected' : '' }}>25</option>
                            <option value="30" {{ old('min_from') == '30' ? 'selected' : '' }}>30</option>
                            <option value="35" {{ old('min_from') == '35' ? 'selected' : '' }}>35</option>
                            <option value="40" {{ old('min_from') == '40' ? 'selected' : '' }}>40</option>
                            <option value="45" {{ old('min_from') == '45' ? 'selected' : '' }}>45</option>
                            <option value="50" {{ old('min_from') == '50' ? 'selected' : '' }}>50</option>
                            <option value="55" {{ old('min_from') == '55' ? 'selected' : '' }}>55</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">To:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="date" class="date to_dt hasDatepicker room_to_date" name="date_to"
                            value="{{ old('date_to') }}">
                        <select class="hour to_dt" name="hour_to">
                            <option value="00" {{ old('hour_to') == '00' ? 'selected' : '' }}>12 am</option>
                            <option value="01" {{ old('hour_to') == '01' ? 'selected' : '' }}>1 am</option>
                            <option value="02" {{ old('hour_to') == '02' ? 'selected' : '' }}>2 am</option>
                            <option value="03" {{ old('hour_to') == '03' ? 'selected' : '' }}>3 am</option>
                            <option value="04" {{ old('hour_to') == '04' ? 'selected' : '' }}>4 am</option>
                            <option value="05" {{ old('hour_to') == '05' ? 'selected' : '' }}>5 am</option>
                            <option value="06" {{ old('hour_to') == '06' ? 'selected' : '' }}>6 am</option>
                            <option value="07" {{ old('hour_to') == '07' ? 'selected' : '' }}>7 am</option>
                            <option value="08" {{ old('hour_to') == '08' ? 'selected' : '' }}>8 am</option>
                            <option value="09" {{ old('hour_to') == '09' ? 'selected' : '' }}>9 am</option>
                            <option value="10" {{ old('hour_to') == '10' ? 'selected' : '' }}>10 am</option>
                            <option value="11" {{ old('hour_to') == '11' ? 'selected' : '' }}>11 am</option>
                            <option value="12" {{ old('hour_to') == '12' ? 'selected' : '' }}>12 pm</option>
                            <option value="13" {{ old('hour_to') == '13' ? 'selected' : '' }}>1 pm</option>
                            <option value="14" {{ old('hour_to') == '14' ? 'selected' : '' }}>2 pm</option>
                            <option value="15" {{ old('hour_to') == '15' ? 'selected' : '' }}>3 pm</option>
                            <option value="16" {{ old('hour_to') == '16' ? 'selected' : '' }}>4 pm</option>
                            <option value="17" {{ old('hour_to') == '17' ? 'selected' : '' }}>5 pm</option>
                            <option value="18" {{ old('hour_to') == '18' ? 'selected' : '' }}>6 pm</option>
                            <option value="19" {{ old('hour_to') == '19' ? 'selected' : '' }}>7 pm</option>
                            <option value="20" {{ old('hour_to') == '20' ? 'selected' : '' }}>8 pm</option>
                            <option value="21" {{ old('hour_to') == '21' ? 'selected' : '' }}>9 pm</option>
                            <option value="22" {{ old('hour_to') == '22' ? 'selected' : '' }}>10 pm</option>
                            <option value="23" {{ old('hour_to') == '23' ? 'selected' : '' }}>11 pm</option>
                        </select>:
                        <select class="minute to_dt" name="min_to">
                            <option value="00" {{ old('min_to') == '00' ? 'selected' : '' }}>00</option>
                            <option value="05" {{ old('min_to') == '05' ? 'selected' : '' }}>05</option>
                            <option value="10" {{ old('min_to') == '10' ? 'selected' : '' }}>10</option>
                            <option value="15" {{ old('min_to') == '15' ? 'selected' : '' }}>15</option>
                            <option value="20" {{ old('min_to') == '20' ? 'selected' : '' }}>20</option>
                            <option value="25" {{ old('min_to') == '25' ? 'selected' : '' }}>25</option>
                            <option value="30" {{ old('min_to') == '30' ? 'selected' : '' }}>30</option>
                            <option value="35" {{ old('min_to') == '35' ? 'selected' : '' }}>35</option>
                            <option value="40" {{ old('min_to') == '40' ? 'selected' : '' }}>40</option>
                            <option value="45" {{ old('min_to') == '45' ? 'selected' : '' }}>45</option>
                            <option value="50" {{ old('min_to') == '50' ? 'selected' : '' }}>50</option>
                            <option value="55" {{ old('min_to') == '55' ? 'selected' : '' }}>55</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 event_facility_update_form">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- edit ship to address --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-ship-address d-none"
    tabindex="-1" style="top: 290px; width:800px; top: 159px; left: 257.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Ship to Address</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-shipaddress-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <div class="row">
                <div class="col-4 edit_event_address" style="border-right: 1px solid #999;">
                    <h2>Edit Ship to Address</h2>
                    <div class="line_break"></div>
                    <button id="use_contact_addr_for_ship" class="button font-bold radius-0">Use Customer
                        Address</button>
                    <div class="line_break"></div>
                    <div class="row">
                        <div class="col-6"><label>First Name:</label></div>
                        <div class="col-6"><span class="cur_fname">{{$event->contact->first_name}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label>Last Name:</label></div>
                        <div class="col-6"><span class="cur_lname">{{$event->contact->last_name}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label>Street Addr:</label></div>
                        <div class="col-6"><span class="cur_street">{{$event->contact->street_addr}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label>City:</label></div>
                        <div class="col-6"><span class="cur_city">{{$event->contact->city}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label>Province:</label></div>
                        <div class="col-6"><span class="cur_province">{{province($event->contact->province)}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label>Postal Code:</label></div>
                        <div class="col-6"><span class="cur_postal">{{province($event->contact->postal_code)}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label>Phone:</label></div>
                        <div class="col-6"><span class="cur_phone">{{$event->contact->phone}}</span></div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="line_break"></div>
                    <form action="" id="frm_edit_event_ship_address" method="POST" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <div class="row">
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">First Name:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="ship_to_first_name" name="ship_to_first_name"
                                    value="{{old('ship_to_first_name',$event->ship_to_first_name)}}" type="text"
                                    maxlength="40" size="27"
                                    title="First name of the person to which this order should be shipped to. For catering orders only">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Last Name:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="ship_to_last_name" name="ship_to_last_name"
                                    value="{{old('ship_to_last_name',$event->ship_to_last_name)}}" type="text"
                                    maxlength="40" size="27"
                                    title="Last name of the person to which this order should be shipped to. For catering orders only">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Street:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="ship_to_street" name="ship_to_street"
                                    value="{{old('ship_to_street',$event->ship_to_street)}}" type="text" maxlength="120"
                                    size="40"
                                    title="Street address where this order should be shipped to. For catering only">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">City:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="ship_to_city" name="ship_to_city"
                                    value="{{old('ship_to_city',$event->ship_to_city)}}" type="text" maxlength="50"
                                    size="34"
                                    title="City to where this order should be shipped. For catering orders only">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Province:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select id="ship_to_province" name="ship_to_province">
                                    <option value="">----</option>
                                    <option value="1"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 1? 'selected':''}}>
                                        Alberta</option>
                                    <option value="2"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 2? 'selected':''}}>
                                        British Columbia</option>
                                    <option value="3"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 3? 'selected':''}}>
                                        Manitoba</option>
                                    <option value="4"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 4? 'selected':''}}>
                                        New Brunswick</option>
                                    <option value="5"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 5? 'selected':''}}>
                                        Newfoundland</option>
                                    <option value="6"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 6? 'selected':''}}>
                                        Northwest Territorie</option>
                                    <option value="7"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 7? 'selected':''}}>
                                        Nova Scotia</option>
                                    <option value="8"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 8? 'selected':''}}>
                                        Nunavut</option>
                                    <option value="9"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 9? 'selected':''}}>
                                        Ontario</option>
                                    <option value="10"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 10? 'selected':''}}>
                                        Prince Edward Island</option>
                                    <option value="11"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 11? 'selected':''}}>
                                        Quebec</option>
                                    <option value="12"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 12? 'selected':''}}>
                                        Saskatchewan</option>
                                    <option value="13"
                                        {{old('ship_to_province',$event->ship_to_province??$event->contact->province) == 13? 'selected':''}}>
                                        Yukon</option>
                                </select>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Postal Code:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="ship_to_postal_code" name="ship_to_postal_code"
                                    value="{{old('ship_to_postal_code',$event->ship_to_postal_code)}}" type="text"
                                    maxlength="10" size="7"
                                    title="Postal code of the address to where this order should be shipped. For catering orders only">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="ship_to_phone" name="ship_to_phone"
                                    value="{{old('ship_to_phone',$event->ship_to_phone)}}" type="text" maxlength="20"
                                    size="14"
                                    title="Phone no of the place where this order should be shipped to. For catering orders only">
                            </div>
                        </div>
                        <div class="line_break"></div>
                        <button type="submit" class="button font-bold radius-0 event_facility_update_form">Save</button>
                    </form>
                </div>
            </div>
        </span>
    </div>
</div>
{{-- New Floor Plan for this Event --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-floor-plans d-none"
    tabindex="-1" style="top: 290px; width:650px; top: 159px; left: 290.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Floor Plan for this Event</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-floorplans-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <h3>Add Floor Plan to Event</h3>
            <p>Please pick the room or combination of rooms for the floor plan.</p>
            <form action="{{route('admin.event.floor-plans.store')}}" id="frm_flooe_plans_store" method="POST"
                novalidate="novalidate">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Room:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select id="floor_plan_new_lnk_fplan_room" name="floor_plan_new_lnk_fplan_room" size="8">
                            @foreach ($floorPlans as $_floorPlan)
                            <option value="{{$_floorPlan->id}}"
                                {{old('floor_plan_new_lnk_fplan_room') == $_floorPlan->id ? 'selected': ''}}>
                                {{$_floorPlan->room_name}}</option>
                            @endforeach
                        </select>*
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 floor_plan_new_save">Continue</button>
            </form>
        </span>
    </div>
</div>
{{-- Create Itinerary for this Event --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-create-Itinerary d-none"
    tabindex="-1" style="top: 290px; width:500px; top: 159px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Create Itinerary for this Event</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-Itinerary-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <h2>Create Itinerary for Event {{$event->id}}</h2>
            <form action="{{route('admin.event.itinerary.store')}}" id="frm_itinerary_store" method="POST"
                novalidate="novalidate">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Template:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select id="new_itinerary_lnk_itin_tmpl" name="new_itinerary_lnk_itin_tmpl">
                            <option value="" selected="selected">----</option>
                            @foreach ($itineraryTemp as $_itineraryTemp)
                            <option value="{{$_itineraryTemp->id}}"
                                {{old('new_itinerary_lnk_itin_tmpl') == $_itineraryTemp->id ? 'selected': ''}}>
                                {{$_itineraryTemp->tmpl_title}}</option>
                            @endforeach
                        </select>*
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 floor_plan_new_save">Continue</button>
            </form>
        </span>
    </div>
</div>

