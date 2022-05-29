<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PatientController as AdminPatientController;
use App\Http\Controllers\admin\PatientRegisterController as AdminPatientRegisterController;
use App\Http\Controllers\admin\TestResultController as AdminTestResultControler;
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

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        //Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // json for datatable
        Route::get('data/register-patient', [AdminPatientRegisterController::class, 'getdata'])->name('data.admin-register-patient');
        Route::get('data/test-result', [AdminTestResultControler::class, 'getdata'])->name('data.admin-test-result');

        //Route resources
        Route::resources([
            'patient' => AdminPatientController::class, //Patient
            'register-patient' => AdminPatientRegisterController::class, //Patient Register

            //Test result
            'test-result' => AdminTestResultControler::class,
        ]);

        //Test result
        Route::get('test-result/{test_result}/export/', [AdminTestResultControler::class, 'export'])->name('test-result.export');
    });
});
