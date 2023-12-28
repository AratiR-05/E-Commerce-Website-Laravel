<?php

use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\backend\colorController;
use App\Http\Controllers\backend\dashController;
use App\Http\Controllers\backend\formController;
use App\Http\Controllers\backend\orderController;
use App\Http\Controllers\backend\productController;
use App\Http\Controllers\backend\sizeController;
use App\Http\Controllers\backend\tableController;
use App\Http\Controllers\backend\typeController;
use App\Http\Controllers\backend\usersController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('master');
// });


// login
Route::get('/', [adminController::class, 'index']);
Route::post('login', [adminController::class, 'login'])->name('login');

// register
Route::get('register', [adminController::class, 'register']);
Route::post('register', [adminController::class, 'insert'])->name('register');



//dashboard
Route::get('dashboard', [dashController::class, 'index']);

//form
Route::get('form', [formController::class, 'index']);

//table
Route::get('table', [tableController::class, 'index']);

//logout
Route::get('logout', function () {
    Session::flush();
    return redirect('admin');
});


// category
Route::get('category', [categoryController::class, 'view']);
Route::get('category/add', [categoryController::class, 'add']);
Route::post('addcategory', [categoryController::class, 'adddata'])->name('addcategory');
Route::get('category/update/{id}', [categoryController::class, 'update']);
Route::post('updatecategory', [categoryController::class, 'updatedata'])->name('updatecategory');
Route::get('category/delete/{id}', [categoryController::class, 'delete']);


// Types
Route::get('type', [typeController::class, 'view']);
Route::get('type/add', [typeController::class, 'add']);
Route::post('addtype', [typeController::class, 'adddata'])->name('addtype');
Route::get('type/update/{id}', [typeController::class, 'update']);
Route::post('updatetype', [typeController::class, 'updatedata'])->name('updatetype');
Route::get('type/delete/{id}', [typeController::class, 'delete']);

// Size
Route::get('size', [sizeController::class, 'view']);
Route::get('size/add', [sizeController::class, 'add']);
Route::post('addsize', [sizeController::class, 'adddata'])->name('addsize');
Route::get('size/update/{id}', [sizeController::class, 'update']);
Route::post('updatesize', [sizeController::class, 'updatedata'])->name('updatesize');
Route::get('size/delete/{id}', [sizeController::class, 'delete']);

//Color
Route::get('color', [colorController::class, 'view']);
Route::get('color/add', [colorController::class, 'add']);
Route::post('addcolor', [colorController::class, 'adddata'])->name('addcolor');
Route::get('color/update/{id}', [colorController::class, 'update']);
Route::post('updatecolor', [colorController::class, 'updatedata'])->name('updatecolor');
Route::get('color/delete/{id}', [colorController::class, 'delete']);

// Product
Route::get('product', [productController::class, 'view']);
Route::get('product/add', [productController::class, 'add']);
Route::post('addproduct', [productController::class, 'adddata'])->name('addproduct');
Route::get('product/update/{id}', [productController::class, 'update']);
Route::post('updateproduct', [productController::class, 'updatedata'])->name('updateproduct');
Route::get('product/delete/{id}', [productController::class, 'delete']);

//users details
Route::get('users', [usersController::class, 'index']);
Route::get('users/status/{id}/{val}', [usersController::class, 'active']);
// Route::get('user/status/{val}', [usersController::class, 'status']);



//order

Route::get('order', [orderController::class, 'index']);
// Route::get('orderview', [orderController::class, 'insert']);