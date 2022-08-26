<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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
Route::get('/', [ProductController::class, 'fakeStoreApier']);
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/admin', function () {
//         return view('admin');
//     })->name('dashboard');
// });
Route::get('/admin', [AdminController::class, 'admin'])->middleware('isAdmin');
Route::get('/admin/mail', [MailController::class, 'index'])->middleware('isAdmin');

Route::get('/shipping', [ProductController::class, 'shipping'])->middleware('auth');

Route::post('/review/{order}', [OrderController::class, 'reviewPost'])->middleware('auth'); 
Route::get('/review', [OrderController::class,'review'])->name('order')->middleware('auth');;
Route::get('/savenpay', [OrderController::class, 'savenpay'])->middleware('auth');;
//review post after clicking submit on shipping screen, order allready created
//Route::get('/review/{order_id}', [OrderController::class, 'review'])->middleware('auth');

//this creates order on shipping submit



Route::get('/fakeStore', [ProductController::class, 'fakeStoreApier']);
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');