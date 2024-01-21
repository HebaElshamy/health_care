<?php
use App\Http\Controllers\Controller;
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

Route::controller(AuthPatientController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        // Route::get('/patient/search', 'search')->name('patient.search');
        Route::get('/', 'search')->name('patient.search');
        Route::post('/patient/search', 'search_no_id')->name('patient.search.id');
        Route::get('/patient/login', 'login_form')->name('patient.login_form');
        Route::post('/patient/login', 'login')->name('patient.login');
        Route::get('/patient/register', 'register_form')->name('patient.register_form');
        Route::post('/patient/store', 'store')->name('patient.store');

    });
    Route::middleware(['check.patient'])->group(function () {
        // Route::get('/patient/dashboard', 'index')->name('patient.home');
        Route::get('/patient/new_booking', 'new_booking')->name('patient.new.booking');
        Route::post('/patient/add_data', 'add_data')->name('patient.add.data');
        Route::get('/patient/confirm', 'confirm')->name('patient.confirm');
        Route::get('/patient/done', 'done')->name('patient.done');
        Route::get('/patient/done_bye', 'done_bye')->name('patient.done.bye');
        Route::post('/patient/heart', 'heart')->name('patient.heart');
        Route::post('/patient/temp', 'temp')->name('patient.temp');
        Route::post('/patient/logout', 'logout')->name('patient.logout');

    });
});
