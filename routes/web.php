<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DoctorController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Doctor\AuthDoctorController;
use App\Http\Controllers\Patient\AuthPatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//auth
Route::get('/admin/login', [AdminController::class, 'login_form'])->name('admin.login_form');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/doctor/login', [AuthDoctorController::class, 'login_form'])->name('doctor.login_form');
Route::post('/doctor/login', [AuthDoctorController::class, 'login'])->name('doctor.login');

Route::middleware(['auth', 'check.admin.status'])->group(function () {
    Route::get('/admin/doctor', [DoctorController::class, 'index'])->name('admin.doctor');
    Route::post('/admin/doctor/store', [DoctorController::class, 'store'])->name('admin.doctor.store');
    Route::put('/admin/doctor/update{id}', [DoctorController::class, 'update'])->name('admin.doctor.update');
    Route::delete('/admin/doctor/destroy/{id}', [DoctorController::class, 'destroy'])->name('admin.doctor.destroy');
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/admin/patient', [PatientController::class, 'index'])->name('admin.patient');
    Route::get('/admin/admin', [AdminController::class, 'index'])->name('admin.admin');
    Route::post('/admin/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::delete('/admin/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.admin.delete');

});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('admin.home');
    Route::get('/admin/patient', [PatientController::class, 'index'])->name('admin.patient');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

});
//doctor
Route::middleware(['check.doctor'])->group(function () {
    Route::controller(AuthDoctorController::class)->group(function () {
        Route::get('/doctor/dashboard', 'index')->name('doctor.home');
        Route::post('/doctor/password', 'change_password')->name('doctor.change.password');
        Route::post('/doctor/logout', 'logout')->name('doctor.logout');

    });


});
Route::controller(AuthPatientController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/patient/search', 'search')->name('patient.search');
        Route::post('/patient/search', 'search_no_id')->name('patient.search.id');
        Route::get('/patient/login', 'login_form')->name('patient.login_form');
        Route::post('/patient/login', 'login')->name('patient.login');
        Route::get('/patient/register', 'register_form')->name('patient.register_form');
        Route::post('/patient/store', 'store')->name('patient.store');




    });
    Route::middleware(['check.patient'])->group(function () {
        Route::get('/patient/dashboard', 'index')->name('patient.home');
        Route::get('/patient/new_booking', 'new_booking')->name('patient.new.booking');
        Route::post('/patient/descroption', 'add_descroption')->name('patient.descroption');
        Route::post('/patient/logout', 'logout')->name('patient.logout');

    });
});
