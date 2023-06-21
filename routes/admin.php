<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::post('/admin/updateprofile', [AdminController::class, 'updateprofile']);
Route::post('/admin/updatepassword', [AdminController::class, 'updatepassword']);

Route::resource('/admin/slider',SliderController::class);
Route::resource('/admin/category',CategoryController::class);
Route::post('/admin/update_status/{category}', [CategoryController::class, 'updatestatus']);



