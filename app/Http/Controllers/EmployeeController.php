<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($company)
    {
        
        return Inertia::render('Employee/RegisterEmployee',[
            'company_id' => $company
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Employee::create($validatedData);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return Inertia::render('Employee/EditEmployee',[
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $employee->update($validatedData);

        return redirect(route('company.view',['company' => $employee->company_id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {

        $id = $employee->company_id;
        $employee->delete();

        return redirect(route('company.view',['company' => $id]));
    }
}
