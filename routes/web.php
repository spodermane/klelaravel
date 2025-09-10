<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Veritabani;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'mainPage'])->middleware('auth')->name('mainpage');

Route::get('/mainpage', function(){
    return view('mainpage');
})->name('mainpage');


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware("auth");

Route::get('/mainpage', function () {
    return view('mainpage');
})->middleware('auth');


Route::get("/products/create",[ProductController::class,"create"])->name("products.create");
Route::post("/products/create",[ProductController::class,"store"])->name("products.store");
Route::get("/products/{product}/edit",[ProductController::class,"edit"])->name("products.edit");
Route::patch("/products/{product}",[ProductController::class,"update"])->name("products.update");
Route::delete("/products/{product}",[ProductController::class,"destroy"])->name("products.destroy");
Route::get('/products/{id}/description', [ProductController::class, 'showDescription'])->name('products.description');


Route::delete('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/mainpage', [ProductController::class, 'mainPage'])->middleware('auth')->name('mainpage');
