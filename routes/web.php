<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;

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

Route::get('/',[HomeController::class,'index'])->name('/');
Route::get('search',[HomeController::class,'search'])->name('search');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/get_users',[UserController::class,'get_users'])->name('get_users');
    Route::get('/validate_event',[UserController::class,'validate_event'])->name('validate_event');
    Route::get('/event_swhow/{item}',[UserController::class,'event_swhow'])->name('event_swhow');
    Route::PUT('/give_permission/{item}',[UserController::class,'give_permission'])->name('give_permission');
    Route::PUT('/confrime_event/{item}',[UserController::class,'confrime_event'])->name('confrime_event');
    Route::delete('/delete_event/{item}',[UserController::class,'delete_event'])->name('delete_event');
    Route::PUT('/refiouse_permission/{item}',[UserController::class,'refiouse_permission'])->name('refiouse_permission');
    Route::resource('/Categories',CategoryController::class);
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', function () {
        return view('client');
    })->name('client');
    Route::get('/asck_permission/{user}',[UserController::class,'asckPermission'])->name('asckPermission');
    Route::post('/get_tiket_byEmail/{item}',[ReservationController::class,'get_tiket_byEmail'])->name('get_tiket_byEmail');
    Route::post('/generate_pdf/{item}',[ReservationController::class,'generate_pdf'])->name('generate_pdf');
    Route::get('/get_reservations',[ReservationController::class,'get_reservations'])->name('get_reservations');
    Route::resource('/Reservations',ReservationController::class);
});
Route::middleware(['auth', 'role:organosator'])->group(function () {
    Route::get('/organisator', function () {
        return view('organisator');
    })->name('organisator');
    Route::resource('/Events',EventController::class);
    Route::resource('/Reservation',ReservationController::class);
   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
