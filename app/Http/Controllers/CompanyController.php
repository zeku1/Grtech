<?php

namespace App\Http\Controllers;

use Exception;
use Inertia\Inertia;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view(Company $company)
    {
        $employees = Employee::where('company_id',$company->id)->get();
        return Inertia::render('Company/ViewCompany',[
            'company' => $company,
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return Inertia::render('Company/RegisterCompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'required|image',
            'website' => 'required|string' 
        ]);

        try{

            if($request->hasFile('logo'))
            {
                $imagePath = $request->file('logo')->store('','public');
            }

            Company::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'logo' => $imagePath,
                 'website' => $request->website,
            ]);

            return redirect(route('dashboard', absolute: false));

        }catch(Exception $e){
            return redirect()->back()->with('error',$e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return Inertia::render('Company/EditCompany',[
            'company' => $company   
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'website' => 'required|string' 
        ]);

        try{

            if($request->hasFile('logo'))
            {
                $imagePath = $request->file('logo')->store('','public');
            }else{
                $imagePath = $company->logo;
            }

            $company->update([
                 'name' => $request->name,
                 'email' => $request->email,
                 'logo' => $imagePath,
                 'website' => $request->website,
            ]);

            return redirect(route('company.view',['company' => $company->id]));
        }catch(Exception $e){
            return redirect()->back()->with('error',$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $id = $company->id;
        $company->delete();

        return redirect(route('dashboard', absolute: false));
    }
}
