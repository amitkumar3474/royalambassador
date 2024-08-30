<?php

namespace App\Http\Controllers\Admin;

use auth;
use Illuminate\Http\Request;
use App\Models\StoredPayMethod;
use App\Http\Controllers\Controller;

class StoredPayMethodController extends Controller
{
    /**
     * Store a payment method resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Store(Request $request)
    {
        $request->validate([
            'card_method_type'  => 'required',
            'card_name'         => 'required',
            'card_number'       => 'required|min:16',
            'card_cvd'          => 'required|min:3|max:3',
            'card_expiry_year'  => 'required',
            'card_expiry_month' => 'required',
        ]);
        StoredPayMethod::updateOrCreate(
            ['lnk_customer' => $request->customer_id],
            [
                'cc_number'        => $request->card_number,
                'cc_type'          => $request->card_method_type,
                'cc_expiry'        => $request->card_expiry_year.'/'.$request->card_expiry_month,
                'cc_security'      => $request->card_cvd,
                'acct_holder_name' => $request->card_name,
                'lnk_user_insert'  => auth()->id() ?? 0,
            ]
        );
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
        StoredPayMethod::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Payment Method deleted successfully.', 'redirect' => route('admin.customer.index')]);
    }
}
