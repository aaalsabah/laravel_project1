<?php

namespace App\Http\Controllers;

// Form Requests
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

// Models
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $employees = Employee::with('company')->paginate(10);
      return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('id', 'name')->get();
        return view('admin.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

      $input = [
        'firstName' => $request->input('firstName'),
        'lastName' => $request->input('lastName'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'company' => $request->input('company')
      ];

      Employee::create($input);

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'New employee record created');

      return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
      $companies = Company::select('id', 'name')->get();
      return view('admin.employees.edit', compact(['employee', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $validated = $request->validated();

      $input = [
        'firstName' => $request->input('firstName'),
        'lastName' => $request->input('lastName'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'company' => $request->input('company')
      ];

      // get the old Employee record and update it
      $oldEmployeeRecord = Employee::find($id);
      $oldEmployeeRecord->update($input);

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'Employee record updated');

      return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $employee = Company::find($id);
        $employee = Employee::find($id);
      $employee->delete();

      return redirect()->route('employees.index');
    }
}
