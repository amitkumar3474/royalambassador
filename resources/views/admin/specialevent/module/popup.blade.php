{{-- create new event  --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-new-event d-none"
    tabindex="-1" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Special Event</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-new-event"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form id="frm_new_special_event" action="{{ route('admin.special-event.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Event Title:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input id="event_new_event_title" name="event_title" size="34" type="text"
                            title="Title used for the public page of the event">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Start Date Time:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="start_date_time" id="event_new_start_date" size="10" maxlength="10"
                            title="Event start date and time" type="date" class="hasDatepicker">
                            <select class="contact_relation" name="start_date_time_hour" id="start_date_time_hour">
                                @foreach (range(0, 23) as $hour)
                                    <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ $hour == 0 ? 'selected' : '' }}>
                                        {{ $hour == 0 ? '12 AM' : ($hour < 12 ? $hour . ' AM' : ($hour == 12 ? '12 PM' : ($hour - 12) . ' PM')) }}
                                    </option>
                                @endforeach
                            </select>
                            :
                            <select name="start_date_time_min" id="start_date_time_min">
                                @foreach (range(0, 55, 5) as $minute)
                                    <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ $minute == 0 ? 'selected' : '' }}>
                                        {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endforeach
                            </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">End Date Time:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="end_date_time" id="event_new_end_date" size="10" maxlength="10"
                            title="Event end date and time" type="date" class="hasDatepicker">
                            <select class="contact_relation" name="end_date_time_hour" id="end_date_time_hour">
                                @foreach (range(0, 23) as $hour)
                                    <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ $hour == 17 ? 'selected' : '' }}>
                                        {{ $hour == 0 ? '12 AM' : ($hour < 12 ? $hour . ' AM' : ($hour == 12 ? '12 PM' : ($hour - 12) . ' PM')) }}
                                    </option>
                                @endforeach
                            </select>
                            :
                            <select name="end_date_time_min" id="end_date_time_min">
                                @foreach (range(0, 55, 5) as $minute)
                                    <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ $minute == 0 ? 'selected' : '' }}>
                                        {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endforeach
                            </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">No of Tables:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="no-of-tables" name="no_of_tables" type="number" maxlength="4" size="8"
                            title="No of tables for this event">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Max Capacity:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="max-capacity" name="max_capacity" type="text" maxlength="6" size="8"
                            title="Max capacity for this event">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Price Per Adult:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="price-per-adult" name="price_per_adult" type="number" step="0.01"
                            maxlength="10" title="Total price per person before taxes">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Price Per Child:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="price-per-child" name="price_per_child" type="number" step="0.01"
                            maxlength="10" title="Total price per kid before taxes">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Price Per Senior:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="price-per-senior" name="price_per_senior" type="number" step="0.01"
                            maxlength="10" title="Price per senior before taxes. Used only on sepcial events.">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Meal Type:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="meal_type" name="meal_type">
                            <option value="" selected="selected">----</option>
                            <option value="1">Sit Down</option>
                            <option value="2">Buffet</option>
                            <option value="3">Catering</option>
                            <option value="5">Family Style</option>
                            <option value="4">No Meal</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Special Label:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input class="special_label" name="special_label" type="text" maxlength="30" size="20"
                            title="Label for special count for this event. This is only used in special events. Say on Mother's day they want to give rose to each mom. Then basically they want to count how many mom are there and this field will say: 'Moms'. This way on screen and on print user will see count of Moms that they use to buy roses.">
                    </div>
                    <div style="clear: both; margin-left: 190px;">
                        This label should be like: 'Moms' which we are counting number of Moms to know how many
                        roses needed. Leave it empty if there is not such a thing for this event.
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Special Notes:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea class="event_new_special_notes" name="special_notes" cols="40" rows="3"
                            title="Special notes for this event if any" maxlength="4000"></textarea>
                    </div>
                </div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- create new event end --}}
{{-- add facility form --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-facility d-none"
    tabindex="-1" style="top: 166px;width: 670px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Special Event</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-add-facility"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content edit-form-content">
        <span id="event_facility_new" class="xmlb_form">
            <form action="" id="frm_event_facility_new" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{$speventCurrent->id??''}}">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Facility:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="room">
                            <option value="" selected="selected">----</option>
                            @foreach ($facilities as $facilit)
                                <option value="{{$facilit->id}}">{{$facilit->facility_name}}</option>
                            @endforeach
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Pricing:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="price_select" name="pricing">
                            <option value="" selected="selected">----</option>
                            @foreach ($facilityPrices as $facilityPrice)
                                <option value="{{$facilityPrice->id}}" price="{{$facilityPrice->price}}">{{$facilityPrice->pricing_title}} | $ {{$facilityPrice->price}}</option>
                            @endforeach
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Max Shared:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="15" class="no-of-tables" name="max_shared" value="1" type="text"
                            title="Max number of events that can run in this facility at the same time. This is by default the same as FACILITY record, however user can change it at will to any number which is bigger than default. All the facility usages that have overlapping time have to have the same value for this column.">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Price:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="20" class="no-of-tables price" name="price" type="number"
                            title="Sub-total before the taxes">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">From:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="date_from" value="{{date('Y-m-d',strtotime($speventCurrent->start_date_time??date('Y-m-d')))}}" id="event_new_start_date_time_date" size="10" maxlength="10"
                            title="Event start date and time" type="text" class="hasDatepicker">
                            <select class="contact_relation" name="hour_from">
                                @foreach (range(0, 23) as $hour)
                                    <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ $hour == date('H',strtotime($speventCurrent->start_date_time??date('H'))) ? 'selected' : '' }}>
                                        {{ $hour == 0 ? '12 AM' : ($hour < 12 ? $hour . ' AM' : ($hour == 12 ? '12 PM' : ($hour - 12) . ' PM')) }}
                                    </option>
                                @endforeach
                            </select>
                            :
                            <select name="min_from" id="start_date_time_min">
                                @foreach (range(0, 55, 5) as $minute)
                                    <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ $minute == date('M',strtotime($speventCurrent->start_date_time??date('M'))) ? 'selected' : '' }}>
                                        {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endforeach
                            </select>
                            
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">To:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="date_to" value="{{date('Y-m-d',strtotime($speventCurrent->end_date_time??date('Y-m-d')))}}" id="event_new_end_date_time_date" size="10" maxlength="10"
                            title="Event end date and time" type="text" class="hasDatepicker">
                            <select class="contact_relation" name="hour_to">
                                @foreach (range(0, 23) as $hour)
                                    <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ $hour == date('H',strtotime($speventCurrent->end_date_time??date('H'))) ? 'selected' : '' }}>
                                        {{ $hour == 0 ? '12 AM' : ($hour < 12 ? $hour . ' AM' : ($hour == 12 ? '12 PM' : ($hour - 12) . ' PM')) }}
                                    </option>
                                @endforeach
                            </select>
                            :
                            <select name="min_to" id="event_new_end_date_time_min">
                                @foreach (range(0, 55, 5) as $minute)
                                    <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ $minute == date('M',strtotime($speventCurrent->end_date_time??date('M'))) ? 'selected' : '' }}>
                                        {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endforeach
                            </select>
                            
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <button type="submit" class="button font-bold radius-0">Add</button>
            </form>
        </span>
    </div>
</div>

<!-- Edit Special Event Module -->
@if($speventCurrent !=null)
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-special-event d-none"
    tabindex="-1" style="top: 166px;width: 670px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Special Event</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-edit-current_event"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content"
        style="width: auto; min-height: 103px; max-height: none; height: auto;"><span id="event_edit" class="xmlb_form">
            <form method="post" id="frm_edit_special_event"
                action="{{ route('admin.special-event.update',$speventCurrent->id ) }}" accept-charset="utf-8"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <p><label>Event Title:</label><span class="element">
                        <input type="hidden" value="{{ $speventCurrent->id }}" name="id">
                        <input id="event_edit_event_title" name="event_title" type="text" maxlength="90" size="40"
                            value="{{ $speventCurrent->event_title }}"
                            title="Title used for the public page of the event" fdprocessedid="b556o5">
                    </span><span class="mand_sign">*</span>@error('event_title'){{$message}};@enderror</p>
                <div class="line_break"></div>
                <p><label>Title For Email:</label><span class="element">
                        <input id="event_edit_event_title_for_email" name="event_title_for_email" type="text"
                            maxlength="60" size="40" value="{{ $speventCurrent->event_title_for_email }}"
                            title="The title of the event used when sending out confirmation email"
                            fdprocessedid="c2ayyn">
                    </span><span class="mand_sign">*</span>@error('event_title_for_email')<span
                        class="text-danger">{{$message}}</span>;@enderror</p>
                <div class="line_break"></div>
                <p><label>Start Date Time:</label><span class="short_help"></span><span class="element">
                        <input name="start_date_time" id="event_edit_start_date" size="10" maxlength="10"
                            value="{{ Carbon\Carbon::parse($speventCurrent->start_date_time)->format('Y-m-d'); }}"
                            title="Event start date and time" type="date" class="hasDatepicker"
                            fdprocessedid="wr99k9">
                            @php
                            $startDateTime = new DateTime($speventCurrent->start_date_time);
                            $hour = $startDateTime->format('H'); // Hour in 24-hour format
                            $minute = $startDateTime->format('i'); // Minute
                            @endphp
                            <select name="end_date_time_hour" id="event_edit_start_date_time_hour">
                                @for ($i = 0; $i < 24; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ ($hour == str_pad($i, 2, '0', STR_PAD_LEFT)) ? 'selected' : '' }}>
                                        {{ ($i == 0) ? '12 AM' : (($i < 12) ? $i . ' AM' : (($i == 12) ? '12 PM' : ($i - 12) . ' PM')) }}
                                    </option>
                                @endfor
                            </select>
                            :
                            <select name="start_date_time_min" id="event_edit_start_date_time_min">
                                @for ($i = 0; $i < 60; $i += 5)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ ($minute == str_pad($i, 2, '0', STR_PAD_LEFT)) ? 'selected' : '' }}>
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endfor
                            </select>
                    </span><span class="mand_sign">*</span></p>
                <div class="line_break"></div>
                <p><label>End Date Time:</label><span class="element">
                        <input name="end_date_time" id="event_edit_end_date_time_date" size="10" maxlength="10"
                            value="{{ Carbon\Carbon::parse($speventCurrent->end_date_time)->format('Y-m-d'); }}"
                            title="Event end date and time" type="date" class="hasDatepicker"
                            fdprocessedid="bnlelf">
                        @php
                        $endDateTime = new DateTime($speventCurrent->end_date_time);
                        $endHour = $endDateTime->format('H'); // Hour in 24-hour format
                        $endMinute = $endDateTime->format('i'); // Minute
                        @endphp

                        <select name="end_date_time_hour" id="event_edit_end_date_time_hour">
                            @for ($i = 0; $i < 24; $i++) <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{
                                ($endHour==str_pad($i, 2, '0' , STR_PAD_LEFT)) ? 'selected' : '' }}>
                                {{ ($i == 0) ? '12 AM' : (($i < 12) ? $i . ' AM' : (($i==12) ? '12 PM' : ($i - 12)
                                    . ' PM' )) }} </option>
                            @endfor
                        </select>
                        :
                        <select name="end_date_time_min" id="event_edit_end_date_time_min">
                            @for ($i = 0; $i < 60; $i +=5) <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{
                                ($endMinute==str_pad($i, 2, '0' , STR_PAD_LEFT)) ? 'selected' : '' }}>
                                {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                </option>
                             @endfor
                        </select>
                    </span><span class="mand_sign">*</span></p>
                <div class="line_break"></div>
                <p><label>No of Tables:</label><span class="element"><input id="event_edit_no_of_tables"
                            name="no_of_tables" type="text" value="{{ $speventCurrent->no_of_tables }}" maxlength="4"
                            size="8" title="No of tables for this event" fdprocessedid="4pbnt">
                    </span><span class="mand_sign"></span></p>
                <div class="line_break"></div>
                <p><label>Max Capacity:</label><span class="element"><input id="event_edit_max_capacity"
                            name="max_capacity" type="text" maxlength="6" size="8"
                            value="{{ $speventCurrent->max_capacity }}" title="Max capacity for this event"
                            fdprocessedid="cq79z">
                    </span><span class="mand_sign"></span></p>
                <div class="line_break"></div><label>Special Label:</label><span class="element"><input
                        id="event_edit_special_count_label" name="special_count_label" type="text" maxlength="30"
                        size="20" value="{{ $speventCurrent->special_count_label }}"
                        title="Label for special count for this event. This is only used in special events. Say on Mother's day they want to give rose to each mom. Then basically they want to count how many mom are there and this field will say: 'Moms'. This way on screen and on print user will see count of Moms that they use to buy roses."
                        fdprocessedid="3hyxu">
                </span><span class="mand_sign"></span>
                <div style="clear: both; margin-left: 130px;">
                    This label should be like: 'Moms' which we are counting number of Moms to know how many
                    roses needed. Leave it empty if there is not such a thing for this event.
                </div>
                <fieldset>
                    <legend>Prices</legend>
                    <p><label>Per Adult:</label><span class="element"><input id="event_edit_price_per_person"
                                name="price_per_adult" type="number" step="0.01" maxlength="7"
                                value="{{ $speventCurrent->price_per_person??0 }}"
                                title="Total price per person after taxes" fdprocessedid="9v59thv">
                        </span><span class="mand_sign">*</span></p>
                    <div class="line_break"></div>
                    <p><label>Per Child:</label><span class="element"><input id="event_edit_price_per_kid"
                                name="price_per_child" type="number" step="0.01" maxlength="9"
                                value="{{ $speventCurrent->price_per_kid??0 }}" title="Total price per kid after taxes"
                                fdprocessedid="m3gq6p">
                        </span><span class="mand_sign">*</span></p>
                    <div class="line_break"></div><label>Per Senior:</label><span class="element"><input
                            id="price_per_senior" name="price_per_senior" type="number" step="0.01" maxlength="9"
                            value="{{ $speventCurrent->price_per_senior??0 }}"
                            title="Total price per senior after taxes" fdprocessedid="lj187h">
                    </span><span class="mand_sign">*</span>
                </fieldset>
                <fieldset>
                    <legend>Prices (Before Tax)</legend><label>Per Adult:</label><span class="short_help"></span><span
                        class="element"><input id="event_edit_price_per_person_bt" name="price_per_person_bt"
                            type="number" step="0.01" maxlength="10" value="{{ $speventCurrent->price_per_person_bt }}"
                            title="Total price per person before taxes" fdprocessedid="kulzxo">
                    </span><span class="mand_sign">*</span>
                    <div class="line_break"></div><label>Per Child:</label><span class="short_help"></span><span
                        class="element"><input id="event_edit_price_per_kid_bt" name="price_per_kid_bt" type="number"
                            step="0.01" maxlength="10" value="{{ $speventCurrent->price_per_kid_bt }}"
                            title="Total price per kid before taxes" fdprocessedid="lfos3o">
                    </span><span class="mand_sign">*</span>
                    <div class="line_break"></div><label>Per Senior:</label><span class="short_help"></span><span
                        class="element"><input id="event_edit_price_per_senior_bt" name="price_per_senior_bt"
                            type="number" step="0.01" maxlength="10" value="{{ $speventCurrent->price_per_senior_bt }}"
                            title="Price per senior before taxes. Used only on sepcial events." fdprocessedid="x1b69">
                    </span><span class="mand_sign">*</span>
                </fieldset>
                <div class="line_break"></div>
                <p><label>Service %:</label><span class="element"><input id="event_edit_gratuity_percent"
                            name="gratuity_percent" type="text" maxlength="5" size="8"
                            value="{{ $speventCurrent->gratuity_percent??0.00 }}" title="Gratuity percent"
                            fdprocessedid="nqeb3">
                    </span><span class="mand_sign">*</span></p>
                <div class="line_break"></div>
                <p><label>Meal Type:</label><span class="element"><select id="event_edit_dining_type" name="meal_type"
                            fdprocessedid="o8i1fm">
                            <option value="1" {{($speventCurrent->dining_type == 1) ? 'selected' : ''}}>Sit Down
                            </option>
                            <option value="2" {{($speventCurrent->dining_type == 2) ? 'selected' : ''}}>Buffet</option>
                            <option value="3" {{($speventCurrent->dining_type == 3) ? 'selected' : ''}}>Catering
                            </option>
                            <option value="5" {{($speventCurrent->dining_type == 5) ? 'selected' : ''}}>Family Style
                            </option>
                            <option value="4" {{($speventCurrent->dining_type == 4) ? 'selected' : ''}}">No Meal
                            </option>
                        </select></span><span class="mand_sign">*</span></p>
                <div class="line_break"></div><label>Special Notes:</label><span class="short_help"></span><span
                    class="element"><textarea id="event_edit_special_notes" name="special_notes" cols="52" rows="3"
                        title="Special notes for this event if any"
                        maxlength="4000">{{ $speventCurrent->special_notes }}</textarea>
                </span><span class="mand_sign"></span>
                <div class="line_break"></div>
                <div class="form_footer"><input type="submit" value="Save" id="event_edit_save" name="event_edit_save"
                        class="button" onclick="return preSubmitevent_edit() ;" fdprocessedid="gvf0b8"></div>
            </form>
        </span>
    </div>
</div>
@endif

<!-- add booking -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-select-the-customer-to-book d-none"
    tabindex="-1" style="top: 290px; width:1100px; top: 288px; left: 103px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Select the Customer to Book</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-select-customer-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content customer-list" style="width: auto">
        
    </div>
    <div id="pagination-links" class="pagination">
                
    </div>
    <br>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content new_booking d-none" style="width: auto;">
        <span id="new_booking" class="xmlb_form" >
            <form action="{{ route('admin.special-booking') }}" id="esp_booking_new" method="post">
                @csrf
                <input type="hidden" name="new_booking_lnk_customer" id="new_booking_lnk_customer" value="">
                <input type="hidden" name="new_booking_lnk_customer_contact" id="new_booking_lnk_customer_contact" value="">
                <input type="hidden" name="new_booking_lnk_event" id="new_booking_lnk_event" value="{{$speventCurrent->id??''}}">
                <h1 id="booking_title">New Booking for <span class="contact-name"></span></h1>
                <div class="new_gc_body_wrap card">
                    <div>
                        <p>
                            <label>No. Adults:</label>
                            <span class="element">
                                <input id="new_booking_no_adults" name="new_booking_no_adults" type="text" maxlength="3" size="2" title="No of adults booked">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>No. Kids:</label>
                            <span class="element">
                                <input id="new_booking_no_kids" name="new_booking_no_kids" type="text" maxlength="3" size="2" value="0" title="No of kids booked">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>No. Seniors:</label>
                            <span class="element">
                                <input id="new_booking_no_seniors" name="new_booking_no_seniors" type="text" maxlength="3" size="2" value="0" title="No of seniors booked">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <label>Seat With:</label>
                        <span class="element">
                            <select id="new_booking_lnk_seat_with" name="new_booking_lnk_seat_with">
                                <option value="" selected="selected">----</option>
                            </select> This customer wants to sit with the given customer
                        </span>
                        <p>
                            <label>Extra Options ($):</label>
                            <span class="element">
                                <input id="new_booking_total_extra_options" name="new_booking_total_extra_options" type="number" step="0.01" maxlength="10" value="0" title="Total extra options for this customer if they select any">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Extra Options<br>Please explain.:</label>
                            <span class="element">
                                <textarea id="new_booking_extra_options_desc" name="new_booking_extra_options_desc" cols="60" rows="3" title="Description of extra options for this booking if any" maxlength="4000"></textarea>
                            </span>
                        </p>
                        <p>
                            <label>Gratuity %:</label>
                            <span class="element">
                                <input id="new_booking_gratuity_percent" name="new_booking_gratuity_percent" type="text" maxlength="5" size="8" value="{{ number_format(10,2) }}" title="Gratuity percent applied to sub_total of the event">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Notes:</label>
                            <span class="element">
                                <textarea id="new_booking_special_notes" name="new_booking_special_notes" cols="60" rows="3" title="Special notes if any" maxlength="4000"></textarea>
                            </span>
                        </p>
                        <p>
                            <label>Dietary Notes: <br>Goes on the<br> assigned table</label>
                            <span class="element">
                                <textarea id="new_booking_dietary_notes" name="new_booking_dietary_notes" cols="60" rows="3" title="Dietary notes for this booking that should on the table or tables where this customer has been assigned to. This is important to be seen on the table and not booking so event manager can easily spot it" maxlength="1024"></textarea>
                            </span>
                        </p>
                    </div>
                    <div class="form_footer"><button type="submit" class="button font-bold radius-0 small_button">Continue</button></div>
                </div>
            </form>
        </span>
    </div>
    <div class="new_customer_wrap d-none">
        <div class="page-title-bar d-flex">
            <h1 class="mr-10">Add a New Customer</h1>
            <div class="customer_type_select">
                <button type="button" class="button checked" data-id="1">
                    <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                    </svg>
                    Personal</button>
                <button type="button" class="button" data-id="2">
                    <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                    </svg>
                    Corporate</button>
                <button type="button" class="button" data-id="3">
                    <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                    </svg>
                    Event Planner</button>
            </div>
        </div>
        <form action="{{ route('admin.customer.store') }}" method="post" id=customer_form>
            @csrf
            <div class="cus-row ">
                <div class="col-6 main-order-item">
                    <div class="global-form main-form height-100">
                        <h2>Main</h2>
                        <hr>
                        <div class="cus-row">
                            <div class="col-4 mb-10">
                                <label class="align-right">Title:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="mr_mrs" name="mr_mrs">
                                    <option value="">----</option>
                                    <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                    <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                    <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                                    <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                </select>                            
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Relation:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="contact_relation" name="relation">
                                    <option value="1" {{ old('relation') == '1' ? 'selected' : '' }}>Single Person</option>
                                    <option value="2" {{ old('relation') == '2' ? 'selected' : '' }}>Bride</option>
                                    <option value="3" {{ old('relation') == '3' ? 'selected' : '' }}>Groom</option>
                                    <option value="4" {{ old('relation') == '4' ? 'selected' : '' }}>Wife</option>
                                    <option value="5" {{ old('relation') == '5' ? 'selected' : '' }}>Husband</option>
                                    <option value="6" {{ old('relation') == '6' ? 'selected' : '' }}>Child</option>
                                    <option value="99" {{ old('relation') == '99' ? 'selected' : '' }}>Others</option>
                                </select>
                                <br>
                                @error('relation')
                                    <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">First Name:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="first_name" name="first_name" value="{{ old('first_name') }}" type="text"><br>
                                @error('first_name')
                                    <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Last Name:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="last_name" name="last_name" value="{{ old('last_name') }}" type="text"><br>
                                @error('last_name')
                                    <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Main Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="main_email" type="email" name="main_email" value="{{ old('main_email') }}">
                                <button class="button add" data-id="1">
                                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                                </button><br>
                                @error('main_email')
                                    <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                @enderror
                            </div>
    
                            <div class="alt_email row d-none">
                                <div class="col-4 mb-10" style="float: left;">
                                    <label class="align-right">Alt Email:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0" style="float:right;">
                                    <input size="34" class="alt_email" type="email" name="alt_email" value="{{ old('alt_email') }}">
                                </div>
                            </div>
    
                            <div class="col-4 mb-10">
                                <label class="align-right">Cell Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input class="phone cell" type="text" name="cell_phone" value="{{ old('cell_phone') }}">
                                <button class="button add" data-id="2">
                                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                                </button><br>
                                @error('cell_phone')
                                    <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="alt_phone row d-none">
                                <div class="col-4 mb-10" style="float: left;">
                                    <label class="align-right">Alt Phone:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input class="phone cell" type="text" name="alt_phone" value="{{ old('alt_phone') }}">
                                </div>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Ad Campaign:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="customer_ad_campaign" name="ad_campaign">
                                    <option >----</option>
                                    @foreach ($marketingCamps as $_marketingCamp)
                                        <option value="{{$_marketingCamp->id}}">{{$_marketingCamp->campaign_name}}</option>
                                    @endforeach
                                </select><br>
                                @error('ad_campaign')
                                    <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Street Addr:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="street_addr" type="text" name="street_addr" value="{{ old('street_addr') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">City:</label>
                            </div>
                            <div class="col-2 mb-10 p-0">
                                <input class="city w-100" type="text" name="city" value="{{ old('city') }}">
                            </div>
                            <div class="col-2 mb-10 p-0">
                                <label class="align-right">Postal Code:</label>
                            </div>
                            <div class="col-3 mb-10">
                                <input class="postal_code w-100" type="text" name="postal_code" value="{{ old('postal_code') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Country:</label>
                            </div>
                            <div class="col-3 mb-10 pl-0">
                                <select class="country w-100" name="country">
                                    <option value="">----</option>
                                    <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                    <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                    <option value="AF" {{ old('country') == 'AF' ? 'selected' : '' }}>Afghanistan</option>
                                    <option value="AL" {{ old('country') == 'AL' ? 'selected' : '' }}>Albania</option>
                                    <option value="DZ" {{ old('country') == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                    <option value="AS" {{ old('country') == 'AS' ? 'selected' : '' }}>American Samoa</option>
                                    <option value="AD" {{ old('country') == 'AD' ? 'selected' : '' }}>Andorra</option>
                                    <option value="AO" {{ old('country') == 'AO' ? 'selected' : '' }}>Angola</option>
                                    <option value="AI" {{ old('country') == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                    <option value="AQ" {{ old('country') == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                    <option value="AG" {{ old('country') == 'AG' ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                    <option value="AR" {{ old('country') == 'AR' ? 'selected' : '' }}>Argentina</option>
                                    <option value="AM" {{ old('country') == 'AM' ? 'selected' : '' }}>Armenia</option>
                                </select>
                            </div>
                            <div class="col-2 mb-10 pr-0">
                                <label class="align-right">Province:</label>
                            </div>
                            <div class="col-3 mb-10">
                                <select class="province w-100" name="province">
                                    <option >----</option>
                                    <option value="1" {{ old('province') == '1' ? 'selected' : '' }}>Alberta</option>
                                    <option value="2" {{ old('province') == '2' ? 'selected' : '' }}>British Columbia</option>
                                    <option value="3" {{ old('province') == '3' ? 'selected' : '' }}>Manitoba</option>
                                    <option value="4" {{ old('province') == '4' ? 'selected' : '' }}>New Brunswick</option>
                                    <option value="5" {{ old('province') == '5' ? 'selected' : '' }}>Newfoundland</option>
                                    <option value="6" {{ old('province') == '6' ? 'selected' : '' }}>Northwest Territories</option>
                                    <option value="7" {{ old('province') == '7' ? 'selected' : '' }}>Nova Scotia</option>
                                    <option value="8" {{ old('province') == '8' ? 'selected' : '' }}>Nunavut</option>
                                    <option value="9" {{ old('province') == '9' ? 'selected' : '' }}>Ontario</option>
                                    <option value="10" {{ old('province') == '10' ? 'selected' : '' }}>Prince Edward Island</option>
                                    <option value="11" {{ old('province') == '11' ? 'selected' : '' }}>Quebec</option>
                                    <option value="12" {{ old('province') == '12' ? 'selected' : '' }}>Saskatchewan</option>
                                </select>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Contact Notes:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <textarea class="contact_notes" rows="3" cols="45" name="contact_notes">{{ old('contact_notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 second_contact second_contact_validete d-none mt-5">
                    <div class="global-form main-form height-100 ">
                        <h2>Second Contact </h2>
                        <hr>
                        <div class="cus-row">
                            <div class="col-4 mb-10">
                                <label class="align-right">Title:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="mr_mrs" name="second_mr_mrs">
                                    <option value="">----</option>
                                    <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                    <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                    <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                                    <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                </select>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Relation:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="contact_relation" name="second_relation">
                                    <option value="1" {{ old('relation') == '1' ? 'selected' : '' }}>Single Person</option>
                                    <option value="2" {{ old('relation') == '2' ? 'selected' : '' }}>Bride</option>
                                    <option value="3" {{ old('relation') == '3' ? 'selected' : '' }}>Groom</option>
                                    <option value="4" {{ old('relation') == '4' ? 'selected' : '' }}>Wife</option>
                                    <option value="5" {{ old('relation') == '5' ? 'selected' : '' }}>Husband</option>
                                    <option value="6" {{ old('relation') == '6' ? 'selected' : '' }}>Child</option>
                                    <option value="99" {{ old('relation') == '99' ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">First Name:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="first_name" type="text" name="second_first_name" value="{{ old('second_first_name') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Last Name:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="last_name" type="text" name="second_last_name" value="{{ old('second_last_name') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Main Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="main_email" type="email" name="second_main_email" value="{{ old('second_main_email') }}">
                                <button class="button add" data-id="1">
                                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                                </button>
                            </div>
    
                            <div class="alt_email row d-none">
                                <div class="col-4 mb-10" style="float: left;">
                                    <label class="align-right">Alt Email:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0" style="float:right;">
                                    <input size="34" class="alt_email" type="email" name="second_alt_email" value="{{ old('second_alt_email') }}">
                                </div>
                            </div>
    
                            <div class="col-4 mb-10">
                                <label class="align-right">Cell Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input class="phone cell" type="text" name="second_cell_phone" value="{{ old('second_cell_phone') }}">
                                <button class="button add" data-id="2">
                                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                                </button>
                            </div>
                            <div class="alt_phone row d-none">
                                <div class="col-4 mb-10" style="float: left;">
                                    <label class="align-right">Alt Phone:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input class="phone cell" type="text" name="second_alt_phone" value="{{ old('second_alt_phone') }}">
                                </div>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Street Addr:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="street_addr" type="text" name="second_street_addr" value="{{ old('second_street_addr') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">City:</label>
                            </div>
                            <div class="col-2 mb-10 p-0">
                                <input class="city w-100" type="text" name="second_city" value="{{ old('second_city') }}">
                            </div>
                            <div class="col-2 mb-10 p-0">
                                <label class="align-right">Postal Code:</label>
                            </div>
                            <div class="col-3 mb-10">
                                <input class="postal_code w-100" type="text" name="second_postal_code" value="{{ old('second_postal_code') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Country:</label>
                            </div>
                            <div class="col-3 mb-10 pl-0">
                                <select class="country w-100" name="second_country">
                                    <option value="">----</option>
                                    <option value="CA" {{ old('second_country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                    <option value="US" {{ old('second_country') == 'US' ? 'selected' : '' }}>United States</option>
                                    <option value="AF" {{ old('second_country') == 'AF' ? 'selected' : '' }}>Afghanistan</option>
                                    <option value="AL" {{ old('second_country') == 'AL' ? 'selected' : '' }}>Albania</option>
                                    <option value="DZ" {{ old('second_country') == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                    <option value="AS" {{ old('second_country') == 'AS' ? 'selected' : '' }}>American Samoa</option>
                                    <option value="AD" {{ old('second_country') == 'AD' ? 'selected' : '' }}>Andorra</option>
                                    <option value="AO" {{ old('second_country') == 'AO' ? 'selected' : '' }}>Angola</option>
                                    <option value="AI" {{ old('second_country') == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                    <option value="AQ" {{ old('second_country') == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                    <option value="AG" {{ old('second_country') == 'AG' ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                    <option value="AR" {{ old('second_country') == 'AR' ? 'selected' : '' }}>Argentina</option>
                                    <option value="AM" {{ old('second_country') == 'AM' ? 'selected' : '' }}>Armenia</option>
                                </select>
                            </div>
                            <div class="col-2 mb-10 pr-0">
                                <label class="align-right">Province:</label>
                            </div>
                            <div class="col-3 mb-10">
                                <select class="province w-100" name="second_province">
                                    <option value="">----</option>
                                    <option value="1" {{ old('second_province') == '1' ? 'selected' : '' }}>Alberta</option>
                                    <option value="2" {{ old('second_province') == '2' ? 'selected' : '' }}>British Columbia</option>
                                    <option value="3" {{ old('second_province') == '3' ? 'selected' : '' }}>Manitoba</option>
                                    <option value="4" {{ old('second_province') == '4' ? 'selected' : '' }}>New Brunswick</option>
                                    <option value="5" {{ old('second_province') == '5' ? 'selected' : '' }}>Newfoundland</option>
                                    <option value="6" {{ old('second_province') == '6' ? 'selected' : '' }}>Northwest Territories</option>
                                    <option value="7" {{ old('second_province') == '7' ? 'selected' : '' }}>Nova Scotia</option>
                                    <option value="8" {{ old('second_province') == '8' ? 'selected' : '' }}>Nunavut</option>
                                    <option value="9" {{ old('second_province') == '9' ? 'selected' : '' }}>Ontario</option>
                                    <option value="10" {{ old('second_province') == '10' ? 'selected' : '' }}>Prince Edward Island</option>
                                    <option value="11" {{ old('second_province') == '11' ? 'selected' : '' }}>Quebec</option>
                                    <option value="12" {{ old('second_province') == '12' ? 'selected' : '' }}>Saskatchewan</option>
                                </select>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Contact Notes:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <textarea class="contact_notes" rows="3" cols="45" name="second_contact_notes">{{ old('second_contact_notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 corporate_info">
                    <div class="global-form corporate-form height-100 d-none">
                        <h2>Corporate Info.</h2>
                        <hr>
                        <div class="cus-row">
                            <div class="col-4 mb-10">
                                <label class="align-right">Customer Name:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="customer_name" name="customer_name" value="{{ old('customer_name') }}"><br>
                                @error('customer_name')
                                    <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">General Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input type="email" size="34" name="general_email" value="{{ old('general_email') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Num. Employees:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="customer_num_emps" name="no_of_emps">
                                    <option value="">----</option>
                                    <option value="1" {{ old('employee_count') == '1' ? 'selected' : '' }}>1 to 10</option>
                                    <option value="2" {{ old('employee_count') == '2' ? 'selected' : '' }}>11 to 50</option>
                                    <option value="3" {{ old('employee_count') == '3' ? 'selected' : '' }}>51 to 100</option>
                                    <option value="4" {{ old('employee_count') == '4' ? 'selected' : '' }}>101 to 500</option>
                                    <option value="5" {{ old('employee_count') == '5' ? 'selected' : '' }}>501 to 5,000</option>
                                    <option value="6" {{ old('employee_count') == '6' ? 'selected' : '' }}>More than 5,000</option>
                                </select>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Web:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input size="34" class="customer_web" type="text" name="web_url" value="{{ old('web_url') }}">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Special Notes:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <textarea class="customer_notes" rows="3" cols="45" name="special_notes">{{ old('special_notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="form_footer mt-20">
                <button class="button submit-form font-bold radius-0" type="submit">Save</button>
                <button class="button btn_toggle_second_contact font-bold radius-0">Add Second Contact</button>
            </div>
        </form>
    </div>
</div>
{{-- edit facility/pricing --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-facility d-none" tabindex="-1" style="top: 166px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit facility/pricing</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-editfacility-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="" id="event_facility_edit_form" method="POST" class="event_facility_validate" novalidate="novalidate">
                @csrf
                <input type="hidden" name="event_id" value="{{$speventCurrent->id??''}}">
                <input type="hidden" name="eventFacility_id" value="">
                <div class="row event_room">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Facility:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="room_select" name="room">
                            <option value="">----</option>
                            @foreach ($facilities as $_facility)
                                <option value="{{$_facility->id}}" {{ old('room') == $_facility->id ? 'selected' : '' }}>{{$_facility->facility_name}}</option>
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
                            @foreach ($facilityPrices as $facilityPrice)
                                <option value="{{$facilityPrice->id}}" price="{{$facilityPrice->price}}">{{$facilityPrice->pricing_title}} | $ {{$facilityPrice->price}}</option>
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
                        <input type="date" class="date from_dt hasDatepicker room_from_date" name="date_from" value="{{ old('date_from') }}">
                        <select class="hour from_dt" name="hour_from">
                            @foreach (range(0, 23) as $hour)
                                <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ old('hour_from') == str_pad($hour, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ $hour == 0 ? '12 am' : ($hour < 12 ? $hour . ' am' : ($hour == 12 ? '12 pm' : ($hour - 12) . ' pm')) }}
                                </option>
                            @endforeach
                        </select>:
                        <select class="minute from_dt" name="min_from">
                            @foreach (range(0, 55, 5) as $minute)
                                <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ old('min_from') == str_pad($minute, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                                </option>
                            @endforeach
                        </select>                        
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">To:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="date" class="date to_dt hasDatepicker room_to_date" name="date_to" value="{{ old('date_to') }}">
                        <select class="hour to_dt" name="hour_to">
                            @foreach (range(0, 23) as $hour)
                                <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ old('hour_to') == str_pad($hour, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ $hour == 0 ? '12 am' : ($hour < 12 ? $hour . ' am' : ($hour == 12 ? '12 pm' : ($hour - 12) . ' pm')) }}
                                </option>
                            @endforeach
                        </select>:
                        <select class="minute to_dt" name="min_to">
                            @foreach (range(0, 55, 5) as $minute)
                                <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ old('min_to') == str_pad($minute, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                                </option>
                            @endforeach
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