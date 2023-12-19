<?php

use App\Http\Controllers\User\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DataBaseController;

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

Route::get('User/categories',[ CategoryController::class, 'index']);
Route::get('User/categories/{category_id}', [CategoryController::class, 'getProducts']);


