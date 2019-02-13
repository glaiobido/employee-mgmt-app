<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with([ 'department','division',
                                      'country',
                                      'state',
                                      'city',
                                      'salaries'])->get();
        return response()->view('layouts.Employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
      return Employee::create([
          'firstname' => $data['firstname'],
          'lastname' => $data['lastname'],
          'middlename' => $data['middlename'],
          'age' => $data['age'],
          'address' => $data['address'],
          'zip' => $data['zip'],
          'birthdate' => ($data['birthdate']) ?  Carbon::parse($data['birthdate']) : null,
          'picture' => null,
          'date_hired' => ($data['date_hired']) ? Carbon::parse($data['date_hired']) : null
          // 'department' => $data['department'],
          // 'division' => $data['division'],
          // 'company' => $data['company'],
          // 'country' => $data['country'],
          // 'state' => $data['state'],
          // 'city' => $data['city']
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'firstname' => ['required', 'string', 'max:60'],
          'lastname' => ['required', 'string', 'max:60'],
          'middlename' => ['required', 'string', 'max:60']
      ]);

      $employee = $this->create($request->all());
      return response()->json(['data' => $employee, 'status' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $query = $request->query();

      // get user
      $employee = Employee::find($query['employee_id']);
      return response()->view('layouts.Employees.modal-form',
                                ['employee' => $employee, 'action' => $query['action']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
