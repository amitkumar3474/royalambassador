<?php

namespace App\Http\Controllers\Admin;

use auth;
use Illuminate\Http\Request;
use App\Models\CustomerBranch;
use App\Models\CustomerContact;
use App\Http\Controllers\Controller;

class CustomerBranchController extends Controller
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
            'branch_name' => 'required'
        ]);
        $customerBra = CustomerBranch::create([
            'lnk_customer'    => $request->customer_id??0,
            'branch_name'     => $request->branch_name,
            'no_of_emps'      => $request->no_of_emps??null,
            'street_addr'     => $request->street_addr??null,
            'city'            => $request->city??null,
            'postal_code'     => $request->postal_code??null,
            'province'        => $request->province??null,
            'country'         => $request->country??null,
            'phone'           => $request->phone??null,
            'fax'             => $request->fax??null,
            'web_url'         => $request->web_url??null,
            'branch_notes'    => $request->branch_notes??null,
            'lnk_user_insert' => auth()->id()??0,
        ]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEditBranch($id)
    {
        $branch = CustomerBranch::findOrFail($id);

        return response()->json(['branch' => $branch]);
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
        $request->validate([
            'branch_name' => 'required'
        ]);
        $customerBra = CustomerBranch::whereId($request->branch_id)->update([
            'branch_name'     => $request->branch_name,
            'no_of_emps'      => $request->no_of_emps??null,
            'street_addr'     => $request->street_addr??null,
            'city'            => $request->city??null,
            'postal_code'     => $request->postal_code??null,
            'province'        => $request->province??null,
            'country'         => $request->country??null,
            'phone'           => $request->phone??null,
            'fax'             => $request->fax??null,
            'web_url'         => $request->web_url??null,
            'branch_notes'    => $request->branch_notes??null,
            'lnk_user_update' => auth()->id()??0,
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
        CustomerBranch::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Branch deleted successfully.']);
    }
}
