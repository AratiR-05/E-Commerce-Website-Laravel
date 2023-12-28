<?php

use App\Http\Controllers\frontend\cartController;
use App\Http\Controllers\frontend\categoriesController;
use App\Http\Controllers\frontend\checkoutController;
use App\Http\Controllers\frontend\contactController;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\frontend\orderController;
use App\Http\Controllers\frontend\pro_detailsController;
use App\Http\Controllers\frontend\registerController;

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


// Route::get('/', [dashController::class, 'index']);
// Route::get('form', [formController::class, 'index']);
// Route::get('table', [tableController::class, 'index']);
// Route::get('login', [loginController::class, 'index']);

Route::get('/', [homeController::class, 'index']);
Route::get('home', [homeController::class, 'index']);
Route::get('contact', [contactController::class, 'index']);
Route::get('categories/{name}', [categoriesController::class, 'index']);
Route::get('pro_details/{proid}/{userid}', [pro_detailsController::class, 'index']);

//checkout
Route::get('checkout', [checkoutController::class, 'index']);
Route::post('address', [checkoutController::class, 'insert'])->name('user.address');




//cart
Route::get('cart', [cartController::class, 'index']);
Route::get('addcart/{proid}/{userid?}', [cartController::class, 'addcart']);
Route::get('delete/{cartid}', [cartController::class, 'delete']);
Route::get('subtotal', [cartController::class, 'subtotal']);
Route::get('cartvalue/{num}/{proid}/{cartid}', [cartController::class, 'cartvalue']);




// register
Route::get('register', [registerController::class, 'register']);
Route::post('register', [registerController::class, 'insert'])->name('user.register');

// login
Route::get('login', [registerController::class, 'index']);
Route::post('session', [registerController::class, 'login'])->name('user.login');

//logout

Route::get('user/logout', function () {
    Session::flush();
    return redirect("/home");
});


//Clear route cache
Route::get('/route-cache', function () {
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache
Route::get('/config-cache', function () {
    \Artisan::call('config:cache');
    return 'Config cache cleared';
});

// Clear application cache
Route::get('/clear-cache', function () {
    \Artisan::call('cache:clear');
    return 'Application cache cleared';
});


// Clear view cache
Route::get('/view-clear', function () {
    \Artisan::call('view:clear');
    return 'View cache cleared';
});

// Clear cache using reoptimized class
Route::get('/optimize-clear', function () {
    \Artisan::call('optimize:clear');
    return 'View cache cleared';
});