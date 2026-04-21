<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ControllerBarber;
use App\Http\Controllers\ControllerBooking;
use App\Http\Controllers\ControllerCategory;
use App\Http\Controllers\ControllerService;
use App\Http\Controllers\ControllerTimeSlot;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ── Admin ──────────────────────────────────────────────────────
    Route::middleware('Role:Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/users', [AdminController::class, 'users'])->name('users');

        Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
        Route::post('/category', [ControllerCategory::class, 'store'])->name('category.store');
        Route::get('/category/{id}', [ControllerCategory::class, 'edit'])->name('category.edit');
        Route::put('/category/{id}', [ControllerCategory::class, 'update'])->name('category.update');
        Route::PATCH('/user/{id}', [AdminController::class, 'updateuser'])->name('user.update');
        Route::delete('/category/{id}', [ControllerCategory::class, 'destroy'])->name('category.destroy');
        Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/profil', [AdminController::class, 'updateProfile'])->name('profile.update');

    });


    Route::middleware('Role:Barber')->group(function () {
        Route::get('/barber/dashboard', [ControllerBarber::class, 'dashboard'])
            ->name('barber.dashboard');

        Route::get('/services', [ControllerService::class, 'index'])->name('services.index');
        Route::get('/services/create', [ControllerService::class, 'create'])->name('services.create');
        Route::post('/services', [ControllerService::class, 'store'])->name('services.store');
        Route::get('/services/{id}/edit', [ControllerService::class, 'edit'])->name('services.edit');
        Route::put('/services/{id}', [ControllerService::class, 'update'])->name('services.update');
        Route::delete('/services/{id}', [ControllerService::class, 'destroy'])->name('services.destroy');
        Route::post('/services', [ControllerService::class, 'store'])->name('create.service');
        Route::get('/barber/services', [ControllerService::class, 'create'])->name('create.services');

        Route::get('/barber/planning', [ControllerBooking::class, 'planning'])->name('barber.planning');
        Route::get('/barber/timeslots', [ControllerTimeSlot::class, 'index'])->name('timeslots.index');
        Route::put('/profil', [ControllerBarber::class, 'updateProfile'])->name('barber.profile.update');
        Route::get('/barber/profile', [ControllerBarber::class, 'profile'])->name('barber.profile');
        Route::delete('/account', [ControllerBarber::class, 'destroy'])->name('barber.account.destroy');


    });

    Route::middleware('Role:Client')->prefix('client')->name('client.')->group(function () {
        Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard');
        Route::get('/rdvs', [ClientController::class, 'rdvs'])->name('rdvs');
        Route::patch('/rdvs/{id}/cancel', [ClientController::class, 'cancelBooking'])->name('rdv.cancel');
        Route::get('/services', [ClientController::class, 'services'])->name('services');
        Route::get('/barbers', [ClientController::class, 'barbers'])->name('barbers');
        Route::get('/reservation', [ClientController::class, 'reservation'])->name('reservation');
        Route::post('/reservation', [ClientController::class, 'storeReservation'])->name('reservation.store');
        Route::put('/profil', [ClientController::class, 'updateProfile'])->name('profile.update');
        Route::get('/client/profile', [ClientController::class, 'profile'])->name('profile');
        Route::delete('/account', [ClientController::class, 'destroy'])->name('account.destroy');
    })->name('client.dashboard');
});

