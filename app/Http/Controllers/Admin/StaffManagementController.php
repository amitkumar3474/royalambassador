<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Staff;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $departments = Department::select('id','dept_name')->get();
        $staffs = Staff::when($request->filled('staff_first_name'), function($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->input('staff_first_name') . '%');
        })->when($request->filled('staff_last_name'), function($query) use ($request) {
            $query->where('last_name', 'like', '%' . $request->input('staff_last_name') . '%');
        })->when($request->filled('staff_is_on_calendar'), function($query) use ($request) {
            $query->where('is_on_calendar', $request->input('staff_is_on_calendar'));
        })->when($request->filled('staff_departments'), function($query) use ($request) {
            $query->whereJsonContains('departments', $request->input('staff_departments'));
        })->when($request->filled('staff_status'), function($query) use ($request) {
            $query->where('staff_status', $request->input('staff_status'));
        });
        $allRecords = $staffs->count();
        $staffs = $staffs->paginate($request->input('perPage')??20);
        return view('admin.manage.staff_list', compact('departments', 'staffs', 'allRecords'));
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
        Staff::create([
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'email'            => $request->email,
            'departments'      => $request->departments,
            'staff_status'     => $request->staff_status,
            'is_on_calendar'   => $request->is_on_calendar,
            'is_on_commission' => $request->is_on_commission,
            'lnk_user_insert'  => auth()->id(),
        ]);
        return response()->json(['success' => true, 'message' => 'Staff create successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departments = Department::select('id','dept_name')->get();
        $staff = Staff::find($id);
        return view('admin.manage.staff_view', compact('staff', 'departments'));
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
        Staff::whereId($id)->update([
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'email'            => $request->email,
            'departments'      => $request->departments,
            'staff_status'     => $request->staff_status,
            'is_on_calendar'   => $request->is_on_calendar,
            'is_on_commission' => $request->is_on_commission,
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
        $staffIds = explode(',',$id);
        Staff::whereIn('id',$staffIds)->delete();
        return response()->json(['success' => true, 'message' => 'Staff deleted successfully.']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffSchedule()
    {
        $staffSchedules = Staff::select('id', 'first_name', 'last_name')->get();
        $departments = Department::select('id','dept_name')->get();
        return view('admin.manage.staff_list', compact('staffSchedules', 'departments'));
    }

}
