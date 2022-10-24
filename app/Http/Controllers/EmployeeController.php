<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeFormRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('dashboard.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::get();
        return view('dashboard.employee.add', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        $data = $request->validated();
        $employee = new Employee;
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->company_id = $data['company_id'];
        $employee->email = $data['email'];
        $employee->phone = $data['phone'];
        $employee->branch = $data['branch'];
        $employee->department = $data['department'];
        $employee->save();
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employee_id)
    {
        $company = Company::get();
        $employee = Employee::find($employee_id);
        return view('dashboard.employee.edit', compact('employee','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $employee_id)
    {
        $data = $request->validated();
        $employee = Employee::find($employee_id);
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->company_id = $data['company_id'];
        $employee->email = $data['email'];
        $employee->phone = $data['phone'];
        $employee->branch = $data['branch'];
        $employee->department = $data['department'];
        $employee->update();
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {
        $employee = Employee::find($employee_id);
        if ($employee) {
            $employee->delete();
            return redirect('employees');
        } else {
            return redirect('employees')->with('message', 'No employee id found');
        }
    }
}
