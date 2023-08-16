<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index'])->name('website');// User Section
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
Route::get('/redirect',[HomeController::class,'redirect']);//User or Admin

// Admin Section
Route::get('/category',[AdminController::class,'category']);//View Category
Route::post('/add_category',[AdminController::class,'create']);//Posting Category
Route::get('/delete/{id}',[AdminController::class,'destroy']);//Delete Category
Route::get('/view_product',[AdminController::class,'view_product'])->name('view_product');//View Product
Route::post('/add_product',[AdminController::class,'create_product'])->name('add_product');//Posting Product
Route::get('/show_product',[AdminController::class,'show_product'])->name('show_product');//Show Product
Route::get('/deleteproduct/{id}',[AdminController::class,'delete_product'])->name('delete_product');//Delete Product
Route::get('/editproduct/{id}', [AdminController::class,'edit'])->name('edit_product');
Route::post('/editproduct/{id}', [AdminController::class,'update'])->name('update_product');
// Cart Section
Route::get('/productdetails/{id}', [HomeController::class,'product_details'])->name('product_details');
Route::post('/addtocart/{id}', [HomeController::class,'add_cart'])->name('addcart');
Route::get('/cart', [HomeController::class,'cart_details'])->name('cart');
Route::get('/deletecart/{id}', [HomeController::class,'cart_delete'])->name('deletecart');
// Order Section
Route::get('/cash', [HomeController::class,'cash_order'])->name('cashmode');
Route::get('/stripe/{totalprice}', [HomeController::class,'stripe'])->name('stripe');
Route::post('stripe/{totalprice}', [HomeController::class,'stripePost'])->name('stripe.post');
