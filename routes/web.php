<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
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
    return view('login');
});

Route::controller(AuthenticationController::class)->group(function() {
    Route::get('/login', 'loginView')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'registerView')->name('register');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/accounts', 'accountList')->name('accounts');
    Route::get('/accounts/create-account', 'createAccountForm')->name('create-account');
    Route::post('/create-account', 'createAccount')->name('create-account');

    Route::get('/events', 'eventList')->name('events');
    Route::get('/magazines', 'magazineList')->name('magazines');
    Route::get('/events/create-event', 'createMagazineForm')->name('create-event');
    Route::post('/create-event', 'createMagazine')->name('create-event');
    Route::get('/events/{event}/edit', 'editMagazineForm')->name('edit-event');
    Route::post('/edit-event', 'editMagazine')->name('edit-event');
});

Route::controller(StudentController::class)->group(function() {
    Route::post('/upload', 'uploadMagazine')->name('upload');
    Route::get('/download/{filename}', 'download')->name('download');
    Route::get('/student-magazines', 'getMagazinesByUserId')->name('student-magazines');
});
