<?php

use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/vendor/dashboard', [VendorController::class, 'index']);