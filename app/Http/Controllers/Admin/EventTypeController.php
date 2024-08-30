<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventTypes = EventType::orderBy('type_name')->paginate($request->pages??30);
        $allRecords = EventType::count(); 
        return view('admin.baseInfo.event_type_list', compact('eventTypes', 'allRecords'));
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
        $request->validate([
            'type_name' => 'required'
        ]);
        
        if($request->event_type_id == null){
            EventType::create([
                'type_name' => $request->type_name
            ]);
        }else{
            EventType::where('id', $request->event_type_id)->update([
                'type_name' => $request->type_name
            ]);
        }

        return redirect()->route('admin.base-info.event-type-list.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $idsArray = explode(',', $ids);
        EventType::whereIn('id', $idsArray)->delete();
        return response()->json(['success' => 'Selected records deleted successfully']);
    }
}
