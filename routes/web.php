<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('products', ProductController::class);
Route::resource('dishes', DishController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('orders', OrderController::class);
