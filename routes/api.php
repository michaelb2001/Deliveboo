<?php

use App\Http\Controllers\Admin\PlatesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get("/plates","Api\PlatesController@index");
Route::get("/users","Api\PlatesController@users");
Route::get("/type/{type_id}","Api\PlatesController@users_type");
Route::get("/user/{id}","Api\PlatesController@user");

Route::get("/searcht/{name}","Api\PlatesController@searchTypes");
Route::get("/searchu/{id}","Api\PlatesController@searchUsers");