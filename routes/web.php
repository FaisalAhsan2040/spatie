<?php

use App\Http\Controllers\ProductsContoller;
use App\Http\Controllers\RolesContoller;
use App\Http\Controllers\UsersContoller;
use Illuminate\Support\Facades\Auth;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']],function () {
    Route::resource('roles',RolesContoller::class);
    Route::resource('products',ProductsContoller::class);
    Route::resource('users',UsersContoller::class);
});
