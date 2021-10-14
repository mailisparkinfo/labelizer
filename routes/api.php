<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product-listing','api\ProductListingController@GetProduct');
Route::any('create-product','api\CreatedProductsController@SaveProduct');
Route::get('order-listing','api\OrderController@GetOrder');
Route::post('insert-order','api\OrderController@InsertOrder');
Route::post('register','api\UserController@Register');
Route::post('deleteuser/{id}','api\UserController@DeleteUser');
Route::get('user-listing','api\UserController@GetUser');
Route::post('updateuser/{id}','api\UserController@UpdateUser');
Route::get('user-listing','api\UserController@GetUser');
Route::get('get-created-products-all','api\CreatedProductsController@GetAllProducts');
Route::get('get-created-productsbyid/{id}','api\CreatedProductsController@GetProductbyId');
Route::post('payment','api\PaymentController@Payment');


