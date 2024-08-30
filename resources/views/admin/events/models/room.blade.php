<span id="event_facility_list" class="xmlb_form">
   <h1>Event Rooms
      <span class="special_action">
            <a href="javascript:void(0)" class="new_add_room" data-id="{{$event->id??''}}"><button class="button font-bold radius-0">Add Room</button></a>
      </span>
   </h1>
   <div class="global-form main-form">
      <table class="product-list table ">
         <tbody>
            <tr>
               <th></th>
               <th>
                  <a href="#">Facility</a> 
               </th>
               <th>
                  <a href="#">Time</a> 
               </th>
               <th>
                  <a href="#">Pricing</a>
               </th>
               <th>
                  <a href="#">Price</a> 
               </th>
               <th>
                  <a href="#">HST</a> 
               </th>
               <th>
                  <a href="#">Grand Total</a> 
               </th>
            </tr>
            @if ($event->eventFacilities->isNotEmpty())
               @foreach ($event->eventFacilities as $_eventFaci)
               <tr class="supplier-row">
                  <td><input value="{{$_eventFaci->id}}" type="checkbox" name="facility_id" form_name="event_facility_list" title="Click or Shift/Click to select sinlge or in a group" row_no="1"></td>
                  <td><button type="button" class="button font-bold radius-0 edit_facility_pricing" data-id="{{$_eventFaci->id}}">Edit</button><a href="javascript:void(0)" class="edit_facility_pricing" data-id="{{$_eventFaci->id}}">{{$_eventFaci->facility->facility_name}}</a></td>
                  <td>{{ \Carbon\Carbon::parse($_eventFaci->start_date_time)->format('D, M j - Y - h:ia') }} to {{ \Carbon\Carbon::parse($_eventFaci->end_date_time)->format('h:ia') }}</td>
                  <td>{{$_eventFaci->facilityPricing->pricing_title}}</td>
                  <td>{{number_format($_eventFaci->facilityPricing->price,2)}}</td>
                  <td></td>
                  <td>{{number_format($_eventFaci->grand_total,2)}}</td>
               </tr>
               @endforeach
            @endif
            <tr class="supplier-row">

            </tr>
         </tbody>
      </table>
   </div>
   <div class="line_break"></div>
   <p><input type="submit" value="Remove" id="event_facility_list_delete" class="button font-bold radius-0" onclick="return presubmitListForm('event_facility_list','event_facility_list_submit','Do you really want to remove the selected facility?')"></p>
</span>

