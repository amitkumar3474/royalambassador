<?php

namespace App\Http\Controllers\Admin;

use auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use App\Models\RestHour;
use Illuminate\Http\Request;
use App\Models\CustomerBranch;
use App\Models\CustomerContact;
use App\Models\GiftCertificate;
use App\Models\MarketingCampaign;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $customerConts = CustomerContact::whereIn('id', function ($query) {
        //     $query->selectRaw('MIN(id)')
        //         ->from('customer_contacts')
        //         ->groupBy('lnk_customer');
        // })->orderByDesc('id')->get(); Contacts
        // $customers = Customer::with('Contacts')->orderByDesc('id')->get();
        $customers = Customer::with('Contacts','events')
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
        ->orderByDesc('id')
        ->paginate(20);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marketingCamps = MarketingCampaign::all();
        return view('admin.customers.create', compact('marketingCamps'));
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
            'first_name'   => 'required|string|regex:/^[^\d]+$/',
            'last_name'    => 'required|string|regex:/^[^\d]+$/',
            'relation'     => 'required|numeric',
            'main_email'   => 'required|email',
            'cell_phone'   => 'required',
            'ad_campaign'  => 'required|numeric',
        ]);
        $customerName = $request->first_name . ' ' . $request->last_name;

        if (isset($request->second_first_name)) {
            $customerName .= ' - ' . $request->second_first_name . ' ' . $request->second_last_name;
        }
        if (!empty($request->customer_name)) {
            $customer = Customer::create([
                'customer_name'             => $request->customer_name,
                'lnk_marketing_campaign'    => $request->ad_campaign,
                'general_email'             => $request->general_email,
                'no_of_emps'                => $request->no_of_emps,
                'web_url'                   => $request->web_url,
                'special_notes'             => $request->special_notes,
                'lnk_org_account_owner'     => auth()->id()??0,
                'lnk_cur_account_owner'     => auth()->id()??0,
                'allow_commission'          => 1,
                'customer_type'             => 2,
                'lnk_user_insert'           => auth()->id()??0,
            ]);
        }else{
            $customer = Customer::create([
                'customer_name'             => $customerName,
                'lnk_marketing_campaign'    => $request->ad_campaign,
                'lnk_org_account_owner'     => auth()->id()??0,
                'lnk_cur_account_owner'     => auth()->id()??0,
                'allow_commission'          => 1,
                'lnk_user_insert'           => auth()->id()??0,
            ]);
        }
        $contact = CustomerContact::create([
            'lnk_customer'    => $customer->id,
            'customer_name'   => $customer->customer_name,
            'relation'        => $request->relation,
            'mr_mrs'          => $request->mr_mrs,
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'full_name'       => $request->first_name.' '.$request->last_name,
            'main_email'      => $request->main_email,
            'alt_email'       => $request->alt_email??null,
            'lnk_user'        => auth()->id()??0,
            'phone'           => $request->alt_phone??null,
            'cell_phone'      => $request->cell_phone,
            'street_addr'     => $request->street_addr??null,
            'city'            => $request->city??null,
            'postal_code'     => $request->postal_code??null,
            'province'        => $request->province??null,
            'country'         => $request->country??null,
            'contact_notes'   => $request->contact_notes??null,
            'allow_email'     => 1,
            'lnk_user_insert' => auth()->id()??0,
        ]);
        if (isset($request->second_first_name)) {
           $contact =  CustomerContact::create([
                'lnk_customer'    => $customer->id,
                'customer_name'   => $customer->customer_name,
                'relation'        => $request->second_relation??null,
                'mr_mrs'          => $request->second_mr_mrs,
                'first_name'      => $request->second_first_name,
                'last_name'       => $request->second_last_name,
                'full_name'       => $request->second_first_name.' '.$request->second_last_name,
                'main_email'      => $request->second_main_email,
                'alt_email'       => $request->second_alt_email??null,
                'lnk_user'        => auth()->id()??0,
                'phone'           => $request->second_alt_phone??null,
                'cell_phone'      => $request->second_cell_phone,
                'street_addr'     => $request->second_street_addr??null,
                'city'            => $request->second_city??null,
                'postal_code'     => $request->second_postal_code??null,
                'province'        => $request->second_province??null,
                'country'         => $request->second_country??null,
                'contact_notes'   => $request->second_contact_notes??null,
                'allow_email'     => 1,
                'lnk_user_insert' => auth()->id()??0,
            ]);
        }
        if($request->route == 'first'){
            $id = $customer->id;
            session(["btn" => '']);
            session(["btn1" => 'btn1']); 
            return redirect()->route('admin.customer.show', $id);
        }else if($request->route == 'second'){
            session(["btn1" => 'btn1']);
            session(["customer_id" => $customer->id]); 
            session(["contact_id" => $contact->id]);
            session(["customer_name" => $contact->customer_name]);
            return redirect()->back();
        }else{
            return redirect()->route('admin.customer.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::with('Contacts', 'events', 'giftCertificates')->whereId($id)->first();
        $customerBranchs = CustomerBranch::where('lnk_customer',$id)->get();
        $inactiveGiftCertificates = $customer->giftCertificates->where('is_redeemed', 0);
        $marketingCamps = MarketingCampaign::all();
        return view('admin.customers.view', compact('customer', 'customerBranchs', 'marketingCamps', 'inactiveGiftCertificates'));
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
        $customer = Customer::whereId($id)->update([
            'customer_type'           => $request->customer_type,
            'lnk_marketing_campaign'  => $request->ad_campaign,
            'lnk_user_update'         => auth()->id()??0,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasRelatedContacts = CustomerContact::where('lnk_customer', $id)->exists();

        if ($hasRelatedContacts) {
            return response()->json(['success' => false, 'message' => 'Customer delete not allowed. Related records exist in Customer_Contact id lnk_customer column.']);
        }
        Customer::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Customer deleted successfully.', 'redirect' => route('admin.customer.index')]);
    }

    public function addBookingCustomer(Request $request){
        $id = $request->customer_id;
        $customer = Customer::whereId($id)->with('Contacts')->first();
        return response()->json($customer);
    }

    public function customerNewRestReserve(Request $request)
    {
        $currentDate = $request->filled('current_date') ? Carbon::parse($request->current_date)->format('Y-m-d H:i:s') : Carbon::now()->format('Y-m-d H:i:s');
        $startDate = date('Y-m-01', strtotime($currentDate));
        $endDate = date('Y-m-t', strtotime($currentDate));
        $customer = Customer::select('id', 'customer_name')
        ->with('contacts')
        ->where('id', $request->customer_id)
        ->first();
        $restHours = RestHour::where('start_dt', '>=', $startDate)->where('end_dt', '<=', $endDate)->get();
        return view('admin.customers.customer_new_rest_reserve', compact('customer', 'restHours'));
    }

    public function createCustomerSearch(Request $request)
    {
        // dd($request->last_name);
        // $customerData =  CustomerContact::where('first_name', 'like', '%' . $data . '%')->get();
        $customerData = CustomerContact::when(($request->first_name), function($query) use ($request){
            $query->where('first_name', 'like', '%' . $request->first_name . '%');
        })
        ->when(($request->last_name), function($query) use ($request){
            $query->where('last_name', 'like', '%' . $request->last_name . '%');
        })
        ->when(($request->email), function($query) use ($request){
            $query->where('main_email', 'like', '%' . $request->email . '%');
        })
        ->when(($request->phone_cell), function($query) use ($request){
            $query->where('cell_phone', 'like', '%' . $request->phone_cell . '%');
        })
        ->get();
        return response()->json($customerData);
    }

}
