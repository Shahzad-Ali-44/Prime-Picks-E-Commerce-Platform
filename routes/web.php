<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimePicksController;



// For user

Route::get('/',[PrimePicksController::class,'index']);
Route::get('/productpage',[PrimePicksController::class,'productpage']);
Route::post('/login',[PrimePicksController::class,'login']);
Route::post('/logout',[PrimePicksController::class,'logout']);
Route::post('/signup',[PrimePicksController::class,'signup']);
Route::post('/addToCart',[PrimePicksController::class,'addToCart']);



// For Cart
Route::get('/cart',[PrimePicksController::class,'cart']);
Route::get('/quantityAdd/{item_name}/{item_quantity}',[PrimePicksController::class,'quantityAdd']);
Route::get('/quantityminus/{item_name}/{item_quantity}',[PrimePicksController::class,'quantityminus']);
Route::get('/remove/{item_name}',[PrimePicksController::class,'remove']);
Route::get('/process_order',[PrimePicksController::class,'process_order']);
Route::post('/orderDone',[PrimePicksController::class,'orderDone']);


// For Admin

Route::get('/admin', function () {
    return view('admin-login-page');
});
Route::post('/admin/login',[PrimePicksController::class,'admin_login']);
Route::get('/admin/dashboard',[PrimePicksController::class,'admin_dashboard']);
Route::get('admin/logout', [PrimePicksController::class, 'admin_logout']);
Route::get('/admin/dashboard/productadd', function () {
    return view('addproduct');
});
Route::post('/admin/dashboard/productAdded', [PrimePicksController::class, 'productAdded']);
Route::get('/admin/dashboard/editProduct/{id}',[PrimePicksController::class,'editProduct']);
Route::post('/admin/dashboard/updateproduct',[PrimePicksController::class,'updateProduct']);
Route::get('/admin/dashboard/removeProduct/{id}',[PrimePicksController::class,'removeProduct']);
