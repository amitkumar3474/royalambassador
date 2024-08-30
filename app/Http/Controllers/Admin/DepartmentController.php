<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::when(($request->input('department_name') != ""), function($query) use ($request){
            $query->where('dept_name', $request->input('department_name'));
        })
        ->get();
        return view('admin.manage.department_list', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->department_edit_id)) {
            Department::whereId($request->department_edit_id)->update([
                'dept_name' => $request->department_name,
                'dept_desc' => $request->department_desc??null,
            ]);
            return response()->json(['success' => true, 'message' => 'Department updated successfully.']);
        } else {
            Department::create([
                'dept_name'        => $request->department_name,
                'dept_desc'        => $request->department_desc??null,
                'lnk_user_insert'  => auth()->id(),
            ]);
            return response()->json(['success' => true, 'message' => 'Department create successfully.']);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return response()->json(['department' => $department]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDepartments(Request $request)
    {
        $departmentIds = $request->input('departmentIds', []);

        // Delete departments from the database
        Department::whereIn('id', $departmentIds)->delete();

        return response()->json(['success' => true, 'message' => 'Department deleted successfully.']);
    }
}
