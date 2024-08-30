<?php

namespace App\Http\Controllers\Admin;

use auth;
use Illuminate\Http\Request;
use App\Models\CustomerContact;
use App\Models\CustomerDepartment;
use App\Http\Controllers\Controller;

class CustomerDepartmentController extends Controller
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
            'dept_name' => 'required',
            'branch_id' => 'required|numeric'
        ]);
        $customerDep = CustomerDepartment::create([
            'lnk_customer'    => $request->customer_id??0,
            'lnk_branch'      => $request->branch_id,
            'dept_name'       => $request->dept_name,
            'phone'           => $request->phone??null,
            'fax'             => $request->fax??null,
            'dept_notes'      => $request->notes??null,
            'lnk_user_insert' => auth()->id()??0,
        ]);
        return redirect()->back();
    }

}
