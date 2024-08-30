<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerContact;
use App\Http\Controllers\Controller;

class CustomerContactController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'relation'     => 'required|numeric',
            'main_email'        => 'required|email',
            'cell_phone'   => 'required',
        ]);
        if (isset($request->contact_id)) {
            CustomerContact::whereId($request->contact_id)->update([
                'relation'        => $request->relation,
                'mr_mrs'          => $request->mr_mrs,
                'first_name'      => $request->first_name,
                'last_name'       => $request->last_name,
                'full_name'       => $request->first_name.' '.$request->last_name,
                'main_email'      => $request->main_email,
                'alt_email'       => $request->alt_email??null,
                'fax'             => $request->fax??null,
                'phone'           => $request->phone??null,
                'cell_phone'      => $request->cell_phone,
                'street_addr'     => $request->street_addr??null,
                'city'            => $request->city??null,
                'postal_code'     => $request->postal_code??null,
                'province'        => $request->province??null,
                'country'         => $request->country??null,
                'contact_notes'   => $request->notes??null,
                'allow_email'     => $request->allow_email,
                'lnk_user_update' => auth()->id()??0,
            ]);
            $contacts = CustomerContact::where('lnk_customer',$request->customerId)->pluck('full_name')->toarray();
            $contactData = implode(' - ', $contacts);
            Customer::whereId($request->customerId)->update(['customer_name' => $contactData]);
        } else {
            CustomerContact::create([
                'lnk_customer'    => $request->customer_id,
                'customer_name'   => $request->customer_name,
                'relation'        => $request->relation,
                'mr_mrs'          => $request->mr_mrs,
                'first_name'      => $request->first_name,
                'last_name'       => $request->last_name,
                'full_name'       => $request->first_name.' '.$request->last_name,
                'main_email'      => $request->main_email,
                'alt_email'       => $request->alt_email??null,
                'fax'             => $request->fax??null,
                'lnk_user'        => auth()->id()??0,
                'phone'           => $request->phone??null,
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
            $contacts = CustomerContact::where('lnk_customer',$request->customer_id)->pluck('full_name')->toarray();
            $contactData = implode(' - ', $contacts);
            Customer::whereId($request->customer_id)->update(['customer_name' => $contactData]);
        }
        
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = CustomerContact::findOrFail($id);

        return response()->json(['contact' => $contact]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = CustomerContact::whereId($id)->first();
        CustomerContact::whereId($id)->delete();
        $contacts = CustomerContact::where('lnk_customer',$contact->lnk_customer)->pluck('full_name')->toarray();
        $updateCustomer = implode(' - ', $contacts);
        Customer::whereId($contact->lnk_customer)->update(['customer_name' => $updateCustomer]);
        return response()->json(['success' => true, 'message' => 'Customer Contact deleted successfully.']);
    }
}
