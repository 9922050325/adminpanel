<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/preffer','Api\prefferController@prefferApi');


Route::get('/blog','Api\BlogController@indexApi');
Route::post('/blog/insertblog','Api\BlogController@createBlog');
Route::put('/blog/update/{id}','Api\BlogController@blogUpdate');
Route::delete('/blog/delete/{id}','Api\BlogController@deleteBlog');

