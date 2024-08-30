<?php

namespace App\Http\Controllers\Admin;

use auth;
use Carbon\Carbon;
use App\Models\RestHour;
use App\Models\RestReserve;
use Illuminate\Http\Request;
use App\Models\MarketingCampaign;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.booking.booking_report');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurantReservation()
    {
        // $currentDate = Carbon::now()->toDateString();
        // $fiveDaysLater = Carbon::now()->addDays(5)->toDateString();
        // $restaurantHours = RestHour::whereBetween('start_dt', [$currentDate, $fiveDaysLater])->get();
        $marketingCamps = MarketingCampaign::all();
        return view('admin.booking.restaurant_reservation', compact('marketingCamps'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bookingStore(Request $request)
    {
        $restHour = RestHour::find($request->rest_hour_id);
        $reserve_date_time = Carbon::createFromFormat('Y-m-d H:i', $request->selecte_currant_date . " $request->new_booking_dt_hour:$request->new_booking_dt_min");
        $data = [
            'lnk_rest_hour'        => $request->rest_hour_id,
            'lnk_customer'         => $request->new_booking_lnk_customer,
            'lnk_customer_contact' => $request->new_booking_lnk_customer_contact,
            'reserve_status'       => 1,
            'reserve_type'         => $request->booking_reserve_type,
            'reserve_date_time'    => $reserve_date_time,
            'no_of_guests'         => $request->new_booking_guests,
            'table_no'             => $request->new_booking_table_no??null,
            'reserve_notes'        => $request->new_booking_notes,
        ];

        if (!$request->reserve_edit_id) {
            $data['lnk_user_insert'] = auth()->id();
            $duplicateReservation = RestReserve::whereDate('reserve_date_time', $request->selecte_currant_date)
                                ->where('lnk_customer_contact', $request->new_booking_lnk_customer_contact)
                                ->exists();
            if ($duplicateReservation) {
                return response()->json(['error' => 'Duplicate reservation found. Please contact us to resolve.']);
            }
            if ($reserve_date_time->between($restHour->start_dt, $restHour->end_dt)) {
                RestReserve::create($data);
                return response()->json(['success' => true]);
            } else {
                $food_type = '';
                if ($restHour->open_for == 1) {
                    $food_type = 'LUNCH';
                } else if ($restHour->open_for == 2) {
                    $food_type = 'DINNER';
                } else if ($restHour->open_for == 3) {
                    $food_type = 'Special Events Only';
                } else if ($restHour->open_for == 4) {
                    $food_type = 'CLOSED';
                }
                $errorMessage = "Sorry but the restaurant is open for ".$food_type." only from " . date('h:i a',strtotime($restHour->start_dt)) . " to " . date('h:i a',strtotime($restHour->end_dt)) . " on " . date('l F j, Y',strtotime($reserve_date_time));
                return response()->json(['error' => $errorMessage]);
            }
        } else {
            $data['lnk_user_update'] = auth()->id();
            if ($reserve_date_time->between($restHour->start_dt, $restHour->end_dt)) {
                RestReserve::whereId($request->reserve_edit_id)->update($data);
            } else {
                $food_type = '';
                if ($restHour->open_for == 1) {
                    $food_type = 'LUNCH';
                } else if ($restHour->open_for == 2) {
                    $food_type = 'DINNER';
                } else if ($restHour->open_for == 3) {
                    $food_type = 'Special Events Only';
                } else if ($restHour->open_for == 4) {
                    $food_type = 'CLOSED';
                }
                $errorMessage = "Sorry but the restaurant is open for ".$food_type." only from " . date('h:i a',strtotime($restHour->start_dt)) . " to " . date('h:i a',strtotime($restHour->end_dt)) . " on " . date('l F j, Y',strtotime($reserve_date_time));
                return response()->json(['error' => $errorMessage]);
            }
            return response()->json(['success' => true]);
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
        $restReserve = RestReserve::with('customer')->find($id);
        // dd($restReserve->customer->customer_name);
        return response()->json(['restReserve' => $restReserve]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RestReserve::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Booking deleted successfully.']);
    }

    /**
     * Display a listing of the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurantReservationGet(Request $request)
    {
        // dd($request->all());
        // $currentDate = Carbon::now()->toDateString();
        // $fiveDaysLater = Carbon::now()->addDays(5)->toDateString();
        // $restaurantHours = RestHour::with('restaurantReserve')->get();
        $restaurantHours = RestHour::whereBetween('start_dt', [$request->currentDate, $request->fiveDaysLater])->get();
        $htmlData = '';
        // dd($restaurantHours);
        $startDatesArray = $restaurantHours->pluck('start_dt')->toArray();
        $dateOnlyArray = array_map(function($startDatesArray) {
            return explode(' ', $startDatesArray)[0];
        }, $startDatesArray);
        // dd($request->currentDate.'  '.$request->fiveDaysLater);
        $start_date = Carbon::parse($request->currentDate);
        $end_date = Carbon::parse($request->fiveDaysLater);
        for($date= $start_date; $date->lte($end_date); $date->addDay()) {
            $i =  $date->toDateString();
            $htmlData .= '<fieldset class="day_wrap" day="'.$i.'">
                <legend>
                    <svg class="svg-inline--fa fa-calendar" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"></path>
                    </svg><!-- <i class="fas fa-calendar"></i> Font Awesome fontawesome.com --> '.date('D,M d Y',strtotime($i)).'
                </legend>
                <div style="display: block;">';
                if (in_array($i,$dateOnlyArray)) {
                foreach ($restaurantHours as $key => $_restHour) {
                    if (date('Y-m-d',strtotime($_restHour->start_dt)) == $i) {
                        $htmlData .= '<div class="rest_hour_wrap" rest_hour_id="'.$_restHour->id.'">
                        <div>
                            <div class="meal_type_header" reserve_type="'.$_restHour->open_for.'">
                                <h3>';
                                if($_restHour->open_for == 1){
                                    $htmlData .= 'LUNCH';
                                }elseif($_restHour->open_for == 2){
                                    $htmlData .= 'DINNER';
                                }elseif($_restHour->open_for == 3){
                                    $htmlData .= 'Special Events Only';
                                }elseif($_restHour->open_for == 4){
                                    $htmlData .= 'CLOSED';
                                }
                                $htmlData .='<span class="time_open">('.date('g:i a',strtotime($_restHour->start_dt)). ' to ' .date('g:i a',strtotime($_restHour->end_dt)).')</span></h3>
                                <span class="btn_add_reserve btn q_tip" restaurant_hour_id="'.$_restHour->id.'" start_time="'.date('H:i',strtotime($_restHour->start_dt)).'" end_time="'.date('H:i',strtotime($_restHour->end_dt)).'" title="New Reservation">
                                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                                    </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                                </span>
                                <span class="btn_add_print_reserves btn q_tip" title="Print Current">
                                    <a href="#">
                                        <svg class="svg-inline--fa fa-print" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path>
                                        </svg><!-- <i class="fas fa-print"></i> Font Awesome fontawesome.com -->
                                    </a>
                                </span>
                            </div>';
                            if ($_restHour->restaurantReserve != null) {
                                $no_of_guests = $_restHour->restaurantReserve->sum('no_of_guests');
                                foreach ($_restHour->restaurantReserve as $key => $_restReserve) {
                                    $urlCustomer = route('admin.customer.show',$_restReserve->lnk_customer);
                                    $htmlData .= '
                                        <div class="reserve_row actual_body" reserve_id="'.$_restReserve->id.'" contact_id="'.$_restReserve->lnk_customer_contact.'">
                                            <span>
                                                <span class="btn_view_details btn btn_res_action q_tip" data-hasqtip="3" oldtitle="View Details" title="">
                                                    <svg class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="circle-info" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com -->
                                                </span>
                                                <span class="btn_send_email btn btn_res_action q_tip" data-hasqtip="2" oldtitle="Send Email" title="">
                                                    <svg class="svg-inline--fa fa-at" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="at"
                                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256v32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32v80 32c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-at"></i> Font Awesome fontawesome.com -->
                                                </span>
                                                <span class="btn_edit_rest_reserve btn btn_res_action q_tip" edit_reserve_id="'.$_restReserve->id.'" start_time="'.date('H:i',strtotime($_restHour->start_dt)).'" end_time="'.date('H:i',strtotime($_restHour->end_dt)).'" data-hasqtip="10" oldtitle="Edit Reservation"
                                                    title=""><svg class="svg-inline--fa fa-pencil" aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="pencil" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-pencil-alt"></i> Font Awesome fontawesome.com -->
                                                </span>
                                                <span class="btn_redeem_gift_cert btn btn_res_action q_tip" data-hasqtip="1" oldtitle="Redeem Gift Certificate"
                                                    title="" aria-describedby="qtip-1"><svg class="svg-inline--fa fa-gift" aria-hidden="true" focusable="false"
                                                        data-prefix="fas" data-icon="gift" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-gift"></i> Font Awesome fontawesome.com -->
                                                </span>
                                                <span class="btn_cancel_rest_reserve btn btn_res_action q_tip" reseve_delete_id="'.$_restReserve->id.'" data-hasqtip="0" oldtitle="Cancel Reservation"
                                                    title=""><svg class="svg-inline--fa fa-circle-xmark" aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="circle-xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-times-circle"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </span>
                                            <span>'.date('g:i a',strtotime($_restReserve->reserve_date_time)).'</span>
                                            <span>
                                                <a href="'.$urlCustomer.'" target="_blank">'.$_restReserve->customerContact->full_name.'</a>
                                            </span>
                                            <span><strong>Guests:</strong>' .$_restReserve->no_of_guests.'</span>
                                            <span><strong>Table #:</strong>' .$_restReserve->table_no.' </span>
                                            <span><strong>Notes:</strong>' .$_restReserve->reserve_notes.' </span>
                                        </div>
                                    ';
                                }
                            }
                            $htmlData .='<div class="meal_type_footer">';
                            if($_restHour->open_for == 1){
                                $htmlData .= 'LUNCH';
                            }elseif($_restHour->open_for == 2){
                                $htmlData .= 'DINNER';
                            }elseif($_restHour->open_for == 3){
                                $htmlData .= 'Special Events Only';
                            }elseif($_restHour->open_for == 4){
                                $htmlData .= 'CLOSED';
                            }
                            $htmlData .=' Total: '.$no_of_guests.'
                                <span class="btn_add_print_reserves btn q_tip" title="Print Current">
                                    <a href="#">
                                        <svg class="svg-inline--fa fa-print" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path>
                                        </svg><!-- <i class="fas fa-print"></i> Font Awesome fontawesome.com -->
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="date_footer">Total Guests for '.date('l',strtotime($_restHour->start_dt)).': '.$no_of_guests.'</div>';
                    }
                }
                }else{
                    $htmlData .= '<h3>Restaurant Closed</h3>';
                }
            $htmlData .= '</div>
            </fieldset>
        ';}
        return response(['data' => $htmlData]);
    }
}
