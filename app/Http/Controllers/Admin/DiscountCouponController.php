<?php

namespace App\Http\Controllers\Admin;

use auth;
use Illuminate\Http\Request;
use App\Models\DiscountCoupon;
use App\Http\Controllers\Controller;

class DiscountCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        // $allRecords = DiscountCoupon::count();
        // $discountCoupons = DiscountCoupon::paginate($request->pages??10);

        $discountCoupons = DiscountCoupon::when($request->filled('type_of_discount'), function($query) use ($request) {
            $query->where('type_of_discount', $request->type_of_discount);
        })
        ->when($request->filled('is_used'), function($query) use ($request) {
            $query->where('is_used', $request->is_used);
        })
        ->when($request->filled('is_active'), function($query) use ($request) {
            $query->where('is_active', $request->is_active);
        });
        $allRecords = $discountCoupons->count();
        $discountCoupons = $discountCoupons->paginate($request->pages??10);
        return view('admin.manage.mgr_discount_coupon_list', compact('discountCoupons', 'allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'type_of_discount' => 'required',
            'discount_amount'  => 'nullable|numeric',
            'min_purchase'     => 'required|numeric',
            'coupon_code'      => 'required',
            'start_date'       => 'required'
        ]);
        DiscountCoupon::create([
            'type_of_discount' => $request->type_of_discount,
            'discount_amount'  => $request->discount_amount !==null?$request->discount_amount:NULL,
            'discount_percent' => $request->discount_percent !==null?$request->discount_percent:NULL,
            'min_purchase'     => $request->min_purchase,
            'coupon_code'      => $request->coupon_code,
            'start_date'       => $request->start_date,
            'expiry_date'      => $request->expiry_date,
            'is_active'        => 1,
            'is_used'          => 0,
            'lnk_user_insert'  => auth()->id(),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $discountCoupon = DiscountCoupon::whereId($id)->first();
       return response()->json(['discountCoupon' => $discountCoupon]);
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
        // dd($request->all());
        $validatedData = $request->validate([
            'type_of_discount' => 'required',
            'discount_amount'  => 'nullable|numeric',
            'min_purchase'     => 'required|numeric',
            'start_date'       => 'required',
            'is_active'       => 'required'
        ]);
        DiscountCoupon::whereId($id)->update([
            'type_of_discount' => $request->type_of_discount,
            'discount_amount'  => $request->discount_amount !==null?$request->discount_amount:NULL,
            'discount_percent' => $request->discount_percent !==null?$request->discount_percent:NULL,
            'min_purchase'     => $request->min_purchase,
            'start_date'       => $request->start_date,
            'expiry_date'      => $request->expiry_date,
            'is_active'        => $request->is_active,
            'lnk_user_update'  => auth()->id(),
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
        //
    }
}
