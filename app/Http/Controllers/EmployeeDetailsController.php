<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetail;
use Illuminate\Http\Requests;
use App\Http\Requests\StoreEmployeeDetailRequest;
use App\Http\Requests\UpdateEmployeeDetailRequest;
use Illuminate\Support\Facades\Session;



class EmployeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employeedetails.index', ['employeedetails' => EmployeeDetail::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employeedetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeDetailRequest $request)
    {
        EmployeeDetail::create($request->validated());
        Session::flash('success', 'Employee details added successfully');
        return redirect()->route('employeedetails.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeDetail $employeeDetail)
    {
        return view('employeedetails.show', compact('employeedetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeDetail $employeeDetail)
    {
        return view('employeedetails.edit', compact('employeedetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeDetailRequest $request, EmployeeDetail $employeeDetail)
    {
        $employeeDetail->update($request->validated());
    }

    public function trash($id)
    {
        EmployeeDetail::destroy($id);
        Session::Flash('success', 'Student trashed successfully');
        return redirect()->route('employeedetails.index');
    }

    public function restore($id)
    {
        $employeedetail = EmployeeDetail::withTrashed()->findOrFail($id);
        $employeedetail->restore();
        Session::flash('success', 'Employee details restored successfully');
        return redirect()->route('employeedetails.trashed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeDetail $employeeDetail)
    {
        $employeeDetail->delete();
        Session::flash('success', 'Employee details trashed successfully');
        return redirect()->route('employeedetails.index');
    }
}