<?php

use App\Http\Controllers\front\PatientRegisterCheckController;
use App\Http\Controllers\front\PatientRegisterController;
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

Route::resource('patient-register', PatientRegisterController::class);

Route::get('check-patient-register', [PatientRegisterCheckController::class, 'index'])
    ->name('check-patient-register.index');
Route::get('check-patient-register/{register_number}', [PatientRegisterCheckController::class, 'check'])
    ->name('check-patient-register.check');
