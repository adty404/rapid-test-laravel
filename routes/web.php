<?php

use App\Http\Controllers\front\PatientController;
use App\Http\Controllers\front\PatientRegisterCheckController;
use App\Http\Controllers\front\PatientRegisterController;
use App\Models\PatientRegister;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/patient-register');

//Patient
Route::resource('patient', PatientController::class);
Route::post('patient', [PatientController::class, 'check'])->name('patient.check');
Route::get('patient/register/{nik}', [PatientController::class, 'register'])->name('patient.register');
Route::post('patient/register', [PatientController::class, 'register_store'])->name('patient.register.store');

//Patient Register
Route::resource('patient-register', PatientRegisterController::class);
Route::get('patient-register/success/{register_number}', [PatientRegisterController::class, 'success'])->name('patient-register.success');

//Check Patient Register
Route::get('check-patient-register', [PatientRegisterCheckController::class, 'index'])
    ->name('check-patient-register.index');
Route::post('check-patient-register', [PatientRegisterCheckController::class, 'check'])
    ->name('check-patient-register.check');
Route::get('check-patient-register/{registerNumber}', [PatientRegisterCheckController::class, 'show'])
    ->name('check-patient-register.show');
