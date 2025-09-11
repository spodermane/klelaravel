<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Veritabani;
use App\Http\Controllers\ProductController;



/* Register Route*/
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

/* Login Route */
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

/* Mainpage Route */
Route::get('/mainpage', [ProductController::class, 'mainPage'])->middleware('auth')->name('mainpage');

/* Product Create Route*/
Route::get("/products/create",[ProductController::class,"create"])->name("products.create");
Route::post("/products/create",[ProductController::class,"store"])->name("products.store");

/* Product Edit Route*/
Route::get("/products/{product}/edit",[ProductController::class,"edit"])->name("products.edit");

/* Product Update Route*/
Route::patch("/products/{product}",[ProductController::class,"update"])->name("products.update");

/* Product Destroy Route*/
Route::delete("/products/{product}",[ProductController::class,"destroy"])->name("products.destroy");

/* Product Description Route */
Route::get('/products/{id}/description', [ProductController::class, 'showDescription'])->name('products.description');

/* Logout Route*/
Route::delete('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



