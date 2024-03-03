<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/get_users',[UserController::class,'get_users'])->name('get_users');
    Route::PUT('/give_permission/{item}',[UserController::class,'give_permission'])->name('give_permission');
    Route::PUT('/refiouse_permission/{item}',[UserController::class,'refiouse_permission'])->name('refiouse_permission');
    Route::resource('/Categories',CategoryController::class);
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', function () {
        return view('client');
    })->name('client');
    Route::get('/asck_permission/{user}',[UserController::class,'asckPermission'])->name('asckPermission');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
