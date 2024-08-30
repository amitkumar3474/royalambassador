<?php

namespace App\Http\Controllers\Admin;

use auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\GiftCertificate;
use App\Models\MarketingCampaign;
use App\Http\Controllers\Controller;

class GiftCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marketingCamps = MarketingCampaign::all();
        $giftCertificates = GiftCertificate::with('customer')
        ->when($request->input('gift_certificate_list_serial_no'), function ($query) use ($request) {
            $query->where('serial_no', 'like', '%' . $request->input('gift_certificate_list_serial_no') . '%');
        })
        ->when($request->input('gift_certificate_list_purchase_type'), function ($query) use ($request) {
            $query->where('purchase_type', $request->input('gift_certificate_list_purchase_type'));
        })
        ->when($request->input('gift_certificate_list_lnk_marketing_campaign'), function ($query) use ($request) {
            $query->where('lnk_marketing_campaign', $request->input('gift_certificate_list_lnk_marketing_campaign'));
        })
        ->when($request->input('gift_certificate_list_is_redeemed'), function ($query) use ($request) {
            $query->where('is_redeemed', $request->input('gift_certificate_list_is_redeemed'));
        })
        ->when($request->input('gift_certificate_list_customer_type'), function ($query) use ($request) {
            $query->whereHas('customer', function ($customerQuery) use ($request) {
                $customerQuery->where('customer_type', $request->input('gift_certificate_list_customer_type'));
            });
        })
        ->when($request->input('gift_certificate_list_customer_name'), function ($query) use ($request) {
            $query->whereHas('customer', function ($customerQuery) use ($request) {
                $customerQuery->where('customer_name', 'like', '%' . $request->input('gift_certificate_list_customer_name') . '%');
            });
        })
        ->get();
        return view('admin.gift.gift_certificate_list', compact('marketingCamps', 'giftCertificates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->page_id == 'gift_certificate_edit') {
            GiftCertificate::whereId($request->gc_id)->update([
                'face_value'             => $request->edit_gift_certificate_face_value,
                'cur_balance'            => $request->edit_gift_certificate_face_value,
                'serial_no'              => $request->edit_gift_certificate_serial_no,
                'is_redeemed'            => 0,
                'purchase_date'          => $request->edit_gift_certificate_purchase_date,
                'special_notes'          => $request->edit_gift_certificate_special_notes,
                'lnk_user_update'        => auth()->id(),
            ]);
        } elseif($request->customer_gcs_misc == 'Redeem') {
            $currantDate = Carbon::now();
            GiftCertificate::where('lnk_buyer',$request->customer_id)->whereId($request->gcs_id)->update([
                'is_redeemed'       => 1,
                'date_redeemed'     => $currantDate,
                'lnk_user_update'   => auth()->id(),
            ]);
        } else {
            GiftCertificate::create([
                'lnk_buyer'              => $request->new_gc_lnk_buyer,
                'lnk_buyer_contact'      => $request->new_gc_lnk_buyer_contact,
                'lnk_marketing_campaign' => $request->gc_mcampaign??null,
                'face_value'             => $request->gift_cert_face_value,
                'cur_balance'            => $request->gift_cert_face_value,
                'serial_no'              => $request->serial_no,
                'is_redeemed'            => 0,
                'purchase_type'          => $request->purchase_type,
                'purchase_date'          => $request->new_gift_cert_purchase_date,
                'special_notes'          => $request->new_gift_cert_special_notes,
                'lnk_user_insert'        => auth()->id(),
            ]);
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
        $giftCert = GiftCertificate::findOrFail($id);
        return response()->json(['giftCert' => $giftCert]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GiftCertificate::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Gift Certificate  deleted successfully.']);
    }

    public function getGiftCertificateLists(Request $request)
    {
        $giftCertificatelists = GiftCertificate::with('customer')
        ->where('is_redeemed', '0')
        ->when($request->filled('flt_serial_no'), function ($query) use ($request) {
            return $query->where('serial_no', 'LIKE', '%' . $request->input('flt_serial_no') . '%');
        })
        ->when($request->filled('flt_customer_name'), function ($query) use ($request) {
            return $query->whereHas('customer', function ($q) use ($request) {
                $q->where('customer_name', 'LIKE', '%' . $request->input('flt_customer_name') . '%');
            });
        })
        ->when($request->filled('flt_purchase_type'), function ($query) use ($request) {
            return $query->where('purchase_type', $request->input('flt_purchase_type'));
        })
        ->paginate(3);
        return response()->json($giftCertificatelists);
        
    }


}
