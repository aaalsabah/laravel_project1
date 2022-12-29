<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

// });
  Route::prefix('admin')->middleware(['is-active:1'])->group(function () { 
  // Company routes
      // Route::resource('companies', CompanyController::class);
      Route::get ('companies', [CompanyController::class,'index'])->name('companies.index');
      Route::post ('companies/store', [CompanyController::class,'store'])->name('companies.store');
      Route::get ('companies/create', [CompanyController::class,'create'])->name('companies.create');
      Route::get('companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
      Route::put('companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
      Route::delete('companies/{id}/delete', [CompanyController::class, 'destroy'])->name('companies.destroy');
      Route::get('companies/{id}/edit', [CompanyController::class ,'edit'])->name('companies.edit');
 // Employee routes
    //Route::resource('employees', EmployeeController::class);
      Route::get ('employees', [EmployeeController::class,'index'])->name('employees.index');
      Route::post ('employees/store', [EmployeeController::class,'store'])->name('employees.store');
      Route::get ('employees/create', [EmployeeController::class,'create'])->name('employees.create');
      Route::get('employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
      Route::put('employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
      Route::delete('employees/{id}/delete', [EmployeeController::class, 'destroy'])->name('employees.destroy');
      Route::get('employees/{id}/edit', [EmployeeController::class ,'edit'])->name('employees.edit');
});