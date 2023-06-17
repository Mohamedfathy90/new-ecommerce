<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('front.home');
});

Route::get('/user/dashboard', function () {
    return view('front.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/user/updateprofile', [UserController::class, 'updateprofile']);
    Route::post('/user/updatepassword', [UserController::class, 'updatepassword']);
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
