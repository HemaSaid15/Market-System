<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


// User Routes
Route::controller(UserController::class)->group( function () {
    // Register
    Route::get('/register' , 'register')->name('User.register');
    Route::post('/handleRegister' , 'handleRegister')->name('User.handleRegister');

    //Login
    Route::get('/login' , 'login')->name('User.login');
    Route::post('/handleLogin' , 'handleLogin')->name('User.handleLogin');

    //LogOut
    Route::get('/Logout' , 'logout')->name('User.logout');

    // All Users
    Route::get('/users' , 'index')->name('users.all');
});

// Product Routes
Route::controller(ProductController::class)->group( function () {
    Route::get('/products' , 'index')->name('products.all');

    Route::post('/product/store' , 'store')->name('product.store');

    Route::get('/product/edit/{id}' , 'edit')->name('product.edit');
    Route::post('/product/update/{id}' , 'update')->name('product.update');


    Route::get('/product/delete/{id}' , 'delete')->name('product.delete');
    
});

// Bill Routes
Route::controller(BillController::class)->group( function () {
    Route::get('/bills' , 'index')->name('bills.all');

    Route::get('/bill/create' , 'create')->name('bill.create');
    Route::post('/bill/store' , 'store')->name('bill.store');

    Route::get('/bill/delete/{id}' , 'delete')->name('bill.delete');

    Route::get('/bill/total/{product}' , 'total')->name('bill.total');
    
});