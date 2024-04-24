<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ManagerController;
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

Route::post('/publishMagazine/{id}', [CoordinatorController::class, 'publish'])->name('publishMagazine');
Route::post('/magazines/{magazine}/comments', [CoordinatorController::class, 'postComment'])->name('coordinator.comment.post');
Route::get('/student/preview/{magazine}', [StudentController::class, 'preview'])->name('student.preview');
Route::get('/dashboard', [CoordinatorController::class, 'index'])->name('coordinator.dashboard');
Route::get('/coordinator-guests', [CoordinatorController::class, 'guestListCoordinator'])->name('coordinator.guests');
Route::get('/terms', function () {
    return view('partials.terms');
});
Route::controller(AuthenticationController::class)->group(function() {
    Route::get('/login', 'loginView')->name('login.view');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'registerView')->name('register');
    Route::post('/register', 'register')->name('register');
    Route::get('/guestLogin', 'guestLoginView');
    Route::post('/guest-login', 'guestLogin')->name('guest-login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/guestLogout', 'guestLogout')->name('guestLogout');
});

Route::controller(AdminController::class)->group(function() {
    Route::post('/edit', 'editClosureDate')->name('edit');
    Route::get('/accounts', 'accountList')->name('accounts');
    Route::get('/create-account', 'createAccountForm')->name('create-account');
    Route::post('/create-account', 'createAccount')->name('create-account');

    Route::get('/events', 'eventList')->name('events');
    Route::get('/magazines', 'magazineList')->name('magazines');
    Route::get('/guests', 'guestList')->name('guests');
    Route::get('/events/create-event', 'createMagazineForm')->name('create-event');
    Route::post('/create-event', 'createMagazine')->name('create-event');
    Route::get('/events/{event}/edit', 'editMagazineForm')->name('edit-event');
    Route::post('/edit-event', 'editMagazine')->name('edit-event');
    Route::get('/admin-report', 'report');
});

// Student routes
Route::controller(StudentController::class)->group(function() {
    Route::post('/upload', 'uploadMagazine')->name('upload');
    Route::post('/update', 'updateMagazine')->name('update');
    Route::get('/download/{filename}', 'download')->name('download');
    Route::get('/student-magazines', 'getMagazinesByUserId')->name('student-magazines');
    Route::get('/magazine-preview', 'getMagazinesByUserId')->name('student-magazines');
});

// Coordinator routes
Route::middleware(['auth'])->prefix('coordinator')->name('coordinator.')->group(function () {
    Route::get('/dashboard', [CoordinatorController::class, 'index'])->name('coordinator.dashboard');

    Route::get('/magazine/preview/{magazine}', [CoordinatorController::class, 'previewMagazine'])->name('magazine.preview');
    Route::get('/unpublished', [CoordinatorController::class, 'showUnpublished'])->name('unpublished');
    Route::post('/publishMagazine/{id}', [CoordinatorController::class, 'publish'])->name('publishMagazine');
    Route::get('/student-detail/{magazineId}', [CoordinatorController::class, 'showDetail'])->name('student.detail');
    //comment
    Route::post('/magazines/{magazine}/comments', [CoordinatorController::class, 'postComment'])->name('coordinator.comment.post');
    // filter
    Route::get('/contributions', [CoordinatorController::class, 'showContributions'])->name('coordinator.showContributions');

});



Route::controller(StudentController::class)->group(function() {
    Route::get('/publish', 'publishedList')->name('publish');
    //Route::get('/preview', 'preview')->name('preview');
    Route::get('/preview/{id}', 'preview')->name('preview');
});

Route::controller(GuestController::class)->group(function() {
    Route::get('/guest-dashboard', 'publishedList')->name('guest-dashboard');
    Route::get('/guest/{department_id}', 'publishedList');
});

Route::controller(ManagerController::class)->group(function() {
    Route::get('/manager-magazines', 'getMagazinesByManager')->name('manager-magazines');
    Route::get('/manager-report', 'report');
    Route::get('/download-final-submissions', 'downloadFinalSubmissions')->name('manager.downloadFinalSubmissions');
});

