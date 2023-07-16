<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Flashsale;
use App\Models\Flashsale_item;
use App\Models\Slider;
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
    return view('front.home',['sliders'=>Slider::where('status','active')->orderby('order')->get() , 
                              'flashsale'=>Flashsale::find(1) , 
                              'flashsaleproducts'=>Flashsale_item::with(['product.productimage' , 'product.category'])->get()
]);
});

Route::get('/product_details/{product}',[ProductController::class , 'show_product_details']);


Route::get('/user/dashboard', function () {
    return view('front.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/user/updateprofile', [UserController::class, 'updateprofile']);
    Route::post('/user/updatepassword', [UserController::class, 'updatepassword']);
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(FacebookController::class)->group(function(){
    Route::get('/auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('/auth/facebook/callback', 'handleFacebookCallback');
});

Route::controller(GithubController::class)->group(function(){
    Route::get('/auth/github', 'redirectToGithub');
    Route::get('auth/github/callback', 'handleGithubCallback');
});

require __DIR__.'/auth.php';
