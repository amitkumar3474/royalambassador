<?php

namespace App\Http\Controllers\Admin;

use App\Models\LiquorBin;
use App\Models\WineCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiquorBinController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $liquorBins = LiquorBin::when($request->filled('bin_number'), function ($query) use ($request) {
            $query->where('bin_number','like', '%' .$request->bin_number.'%');
        })
        ->when($request->filled('lnk_wine_cats'), function ($query) use ($request) {
            $query->whereJsonContains('lnk_wine_cats',$request->lnk_wine_cats);
        })
        ->when($request->filled('is_active'), function ($query) use ($request) {
            $query->where('is_active',$request->is_active);
        })
        ->paginate($request->show_records??30);
        $wine_catagories = WineCategory::all();
        return view('admin.liquorProducts.liquor_bin_setup', compact('liquorBins', 'wine_catagories'));
    }

    public function store(Request $request)
    {
        if($request->lqbin_id){
            $request->validate([
                'bin_number' => 'required|unique:liquor_bins,bin_number,' . $request->lqbin_id,
            ]);
            LiquorBin::whereId($request->lqbin_id)->update([
                'bin_number'      => $request->bin_number,
                'lnk_wine_cats'   => $request->lnk_wine_cats,
                'is_active'       => $request->is_active,
                'lnk_user_update' => auth()->id(),
            ]);
        }else{
            $request->validate([
                'bin_number' => 'required|unique:liquor_bins,bin_number',
            ]);
            LiquorBin::create([
                'bin_number'      => $request->bin_number,
                'lnk_wine_cats'   => $request->lnk_wine_cats,
                'is_active'       => 1,
                'lnk_user_insert' => auth()->id(),
            ]);
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $liquorBin = LiquorBin::whereId($id)->first();
        return response()->json(['liquorBin' => $liquorBin]);
    }

    public function destroy($id)
    {
        LiquorBin::whereId($id)->delete();
        return response()->json(['success'=> true, 'message'=>"This record delete successfully" ]);
    }
}
