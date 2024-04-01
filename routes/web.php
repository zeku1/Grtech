<?php

use Inertia\Inertia;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $companies = Company::all();
    return Inertia::render('Dashboard',[
        'companies' => $companies
        ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','roles'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::resource('company',CompanyController::class)
    ->only([ 'create' ,'store','edit','update','destroy'])
    ->middleware(['auth' , 'roles']);

Route::get('/company/{company}', [CompanyController::class, 'view'])->name('company.view');

Route::resource('employee',EmployeeController::class)
    ->only(['store','edit','update' , 'destroy'])
    ->middleware(['auth' , 'roles']);


Route::get('/employee/create/{company}',[EmployeeController::class,'create'])->name('employee.create');

require __DIR__.'/auth.php';
