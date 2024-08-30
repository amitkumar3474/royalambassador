<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\InvCount;
use App\Models\InvLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
        {
            
            $invLevels = InvLevel::select('id', 'level_code')->get();
            // $invCounts = InvCount::paginate(4);
            $invCounts = InvCount::when($request->filled('inv_counts_inv_count_status'), function ($query) use ($request) {
                $query->whereIn('inv_count_status', $request->input('inv_counts_inv_count_status'));
            })
            ->when($request->filled('inv_counts_dt_more') || $request->filled('inv_counts_dt_less'), function ($query) use ($request) {
                if ($request->filled('inv_counts_dt_more') && $request->filled('inv_counts_dt_less')) {
                    $query->where(function ($query) use ($request) {
                        $query->where('count_date', '>=', $request->input('inv_counts_dt_more'))
                            ->where('count_date', '<=', $request->input('inv_counts_dt_less'));
                    });
                } elseif ($request->filled('inv_counts_dt_more')) {
                    $query->where('count_date', '>=', $request->input('inv_counts_dt_more'));
                } elseif ($request->filled('inv_counts_dt_less')) {
                    $query->where('count_date', '<=', $request->input('inv_counts_dt_less'));
                }
            })
            ->when(($request->input('inv_counts_lnk_started_by') != ""), function ($query) use ($request) {
                $query->where('lnk_started_by', $request->input('inv_counts_lnk_started_by'));
            })
            ->when(($request->input('inv_counts_finisn_notes') != ""), function ($query) use ($request) {
                $query->where('count_finish_notes', 'like', '%' . $request->input('inv_counts_finisn_notes'));
            })
            ->orderByDesc('id')
            ->paginate(20);
            return view('admin.inventory.index', compact('invLevels', 'invCounts'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has('id')){
            $request->validate([
                'new_inv_count_date'  => 'required',
            ]);
        }

        if(!$request->has('id')){
            InvCount::create([
                'count_date'       => $request->new_inv_count_date,
                'inv_levels'       => json_encode($request->new_inv_levels)??null,
                'inv_count_status' => 1,
                'lnk_started_by'   => auth()->id(),
                'count_start_notes'=> $request->new_count_start_notes,
                'total_discrep_qty'=> 0,
                'total_discrep_val'=> 0,
                'lnk_user_insert'  => auth()->id(),
            ]);
            $lastInsertedId = InvCount::latest()->first()->id;
            return response()->json(['last_id' => $lastInsertedId, 'success' => true, 'message' => 'Create a New Inventory Count successfully.']);
        }else{
            InvCount::where('id', $request->id)->update(['count_start_notes' => $request->new_count_start_notes]);
            return response()->json(['success'=>'Edit Inventory Count Comment Update successfully.']);
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
        $invLevels = InvLevel::select('id', 'level_code')->get();
        $invCount = InvCount::where('id',$id)->first();
        return view('admin.inventory.view', compact('invCount','invLevels'));
    }

    public function destroy($id)
    {
        InvCount::whereId($id)->delete();
        return response()->json(['success' => true, 'message' => 'inv Count deleted successfully.']);
    }
}
