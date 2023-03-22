<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User;
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

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/index', function () {
//     return view('index');
// });
Route::get('/about',function(){
    return view('about');
});
// Route::get('/product',function(){
//     return view('product');
// });
Route::get('/service',function(){
    return view('service');
});
Route::get('/gallery',function(){
    return view('gallery');
});

Route::get('/User_login',[User::class,'User_login'])->name('User_login')->middleware('alreadyLoggedIn');
Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('/product',[ProductController::class,'product'])->name('product');

Route::get('/contact',[ContactController::class,'index'])->name('index');
Route::post('/upload',[ContactController::class,'upload'])->name('upload');

Route::get('/register',[User::class,'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/registeration',[User::class,'registeration'])->name('registeration');
Route::post('/customer_login',[User::class,'customer_login'])->name('customer_login');
Route::get('/dashboard',[User::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('/logout',[User::class,'logout'])->name('logout');


