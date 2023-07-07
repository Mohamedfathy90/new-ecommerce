<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/vendor/dashboard', [VendorController::class, 'index']);
Route::get('/vendor/profile', [VendorController::class, 'profile']);
Route::post('/vendor/updateprofile', [VendorController::class, 'updateprofile']);
Route::post('/vendor/updatepassword', [VendorController::class, 'updatepassword']);
Route::get('/vendor/shopprofile', [VendorController::class, 'shopprofile']);
Route::patch('/vendor/update-shop-profile/{vendor_profile}', [VendorController::class, 'updateshop']);


Route::resource('/vendor/product',ProductController::class);