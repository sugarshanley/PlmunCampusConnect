<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/profile', [AuthController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

/*
|--------------------------------------------------------------------------
| Organizations Directory
|--------------------------------------------------------------------------
*/

Route::get('/organizations', [OrganizationController::class, 'index'])
    ->name('organizations.index');

/*
|--------------------------------------------------------------------------
| Events Directory
|--------------------------------------------------------------------------
*/

Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');

/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', AdminMiddleware::class])->group(function () {

    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Manage Student Accounts
    Route::get('/admin/students', [AdminStudentController::class, 'index'])
        ->name('admin.students.index');

    // Create Organization
    Route::get('/organizations/create', [OrganizationController::class, 'create'])
        ->name('organizations.create');

    Route::post('/organizations', [OrganizationController::class, 'store'])
        ->name('organizations.store');

    // Edit Organization
    Route::get('/organizations/{organization}/edit', [OrganizationController::class, 'edit'])
        ->name('organizations.edit');

    Route::put('/organizations/{organization}', [OrganizationController::class, 'update'])
        ->name('organizations.update');

    // Delete Organization
    Route::delete('/organizations/{organization}', [OrganizationController::class, 'destroy'])
        ->name('organizations.destroy');

    // Create Event
    Route::get('/events/create', [EventController::class, 'create'])
        ->name('events.create');

    Route::post('/events', [EventController::class, 'store'])
        ->name('events.store');

    // Edit Event
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])
        ->name('events.edit');

    Route::put('/events/{event}', [EventController::class, 'update'])
        ->name('events.update');

    // Delete Event
    Route::delete('/events/{event}', [EventController::class, 'destroy'])
        ->name('events.destroy');

});
