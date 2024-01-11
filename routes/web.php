<?php

use App\Http\Controllers\User\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DataBaseController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('User/categories',[ CategoryController::class, 'index'])->name('categories');
Route::get('User/categories/{category_id}', [CategoryController::class, 'getProducts'])->name('products');
Route::get('User/categories/{category_id}/{product_id}', [CategoryController::class, 'getPrices'])->name('prices');

//ログイン
Route::get('Controllers/Auth/AuthController', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('home', function(){
    return view('login.home');
})->name('home')->middleware('auth');

//新規登録
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('store', [RegisterController::class, 'store'])->name('store');

//ログアウト
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('userInfo', function(){
    return view('mypage.userInfo');
})->name('userInfo');
