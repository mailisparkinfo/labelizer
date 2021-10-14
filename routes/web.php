<?php

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

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('home', 'HomeController@home')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register',function(){
	echo 'dsdddsds';
})->name('register');

Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');

Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');

Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');