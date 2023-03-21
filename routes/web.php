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
Route::get('/login',function(){
    return view('login');
});
Route::get('/User_login',function(){
    return view('User_login');
});
Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('/product',[ProductController::class,'product'])->name('product');

Route::get('/contact',[ContactController::class,'index'])->name('index');
Route::post('/upload',[ContactController::class,'upload'])->name('upload');

Route::get('/user_register',function(){
    return view('user_register');
});
Route::post('/registeration',[User::class,'registeration'])->name('registeration');
Route::post('/customer_login',[User::class,'customer_login'])->name('customer_login');
Route::get('/dashboard',[User::class,'dashboard'])->name('dashboard');
Route::get('/logout',[User::class,'logout'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');