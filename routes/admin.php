<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminVendorProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductimageController;
use App\Http\Controllers\ProductvariantController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\VariantitemController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::post('/admin/updateprofile', [AdminController::class, 'updateprofile']);
Route::post('/admin/updatepassword', [AdminController::class, 'updatepassword']);

Route::resource('/admin/slider',SliderController::class);

Route::resource('/admin/category',CategoryController::class);
Route::post('/admin/update_category_status/{category}', [CategoryController::class, 'updatestatus']);


Route::resource('/admin/subcategory',SubcategoryController::class);
Route::post('/admin/update_subcategory_status/{subcategory}', [SubcategoryController::class, 'updatestatus']);
Route::post('/admin/getsubcategory/{category}', [SubcategoryController::class, 'getsubcategories']);

Route::resource('/admin/childcategory',ChildCategoryController::class);
Route::post('/admin/update_childcategory_status/{childcategory}', [ChildCategoryController::class, 'updatestatus']);
Route::post('/admin/getchildcategory/{subcategory}', [ChildCategoryController::class, 'getchildcategories']);

Route::resource('/admin/brand',BrandController::class);
Route::post('/admin/update_brand_status/{brand}', [BrandController::class, 'updatestatus']);

Route::resource('/admin/vendor-profile',AdminVendorProfileController::class);

Route::resource('/admin/product',ProductController::class);
Route::post('/admin/update_product_status/{product}', [ProductController::class, 'updatestatus']);



Route::get('/admin/productimage/{product}',[ProductimageController::class , 'index']);
Route::post('/admin/productimage/{product}',[ProductimageController::class , 'store']);
Route::delete('/admin/productimage/{productimage}',[ProductimageController::class , 'destroy']);



Route::get('/admin/productvariant/{product}',[ProductvariantController::class , 'index']);
Route::get('/admin/productvariant/create/{product}',[ProductvariantController::class , 'create']);
Route::post('/admin/productvariant/{product}',[ProductvariantController::class , 'store']);
Route::get('/admin/productvariant/{productvariant}/edit',[ProductvariantController::class , 'edit']);
Route::patch('/admin/productvariant/{productvariant}',[ProductvariantController::class , 'update']);
Route::delete('/admin/productvariant/{productvariant}',[ProductvariantController::class , 'destroy']);
Route::post('/admin/update_productvariant_status/{productvariant}', [ProductvariantController::class, 'updatestatus']);



Route::get('/admin/variantitem/{productvariant}',[VariantitemController::class , 'index']);
Route::get('/admin/variantitem/create/{productvariant}',[VariantitemController::class , 'create']);
Route::post('/admin/variantitem/{productvariant}',[VariantitemController::class , 'store']);
Route::get('/admin/variantitem/{variantitem}/edit',[VariantitemController::class , 'edit']);
Route::patch('/admin/variantitem/{variantitem}',[VariantitemController::class , 'update']);
Route::delete('/admin/variantitem/{variantitem}',[VariantitemController::class , 'destroy']);
Route::post('/admin/update_variantitem_status/{variantitem}', [VariantitemController::class, 'updatestatus']);