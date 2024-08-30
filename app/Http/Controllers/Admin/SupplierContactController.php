<?php

namespace App\Http\Controllers\Admin;

use auth;
use Illuminate\Http\Request;
use App\Models\SupplierContact;
use App\Http\Controllers\Controller;

class SupplierContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * Update the specified resource in storage
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'  => 'required',
        ]);
        if (isset($request->supplier_cont_id)) {
            SupplierContact::whereId($request->supplier_cont_id)->update([
                'first_name'      => $request->first_name,
                'last_name'       => $request->last_name??null,
                'mr_mrs'       => $request->mr_mrs??null,
                'phone'           => $request->phone??null,
                'cell_phone'      => $request->cell_phone??null,
                'email'           => $request->email??null,
                'alt_phone'       => $request->alt_phone??null,
                'alt_email'       => $request->alt_email??null,
                'fax'             => $request->fax??null,
                'lnk_user_update' => auth()->id()??0,
            ]);
        } else {
            SupplierContact::create([
                'lnk_supplier'    => $request->supplier_id,
                'first_name'      => $request->first_name,
                'last_name'       => $request->last_name??null,
                'phone'           => $request->phone??null,
                'cell_phone'      => $request->cell_phone??null,
                'email'           => $request->email??null,
                'alt_phone'       => $request->alt_phone??null,
                'alt_email'       => $request->alt_email??null,
                'fax'             => $request->fax??null,
                'lnk_user_insert' => auth()->id()??0,
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
        $supplierCont = SupplierContact::findOrFail($id);

        return response()->json(['supplierCont' => $supplierCont]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SupplierContact::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Supplier Contact deleted successfully.']);
    }
}
