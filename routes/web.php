<?php

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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','Admin\DashboardController@getDashboard');


// Language Routes
Route::post('/home/language','Admin\LanguageController@store');
Route::get('/home/language','Admin\LanguageController@index');

Route::get('/home/language/update/{id}','Admin\LanguageController@getLanguageUpdate');
Route::post('/home/language/update/{id}','Admin\LanguageController@languageUpdate');
Route::get('/home/language/delete/{id}','Admin\LanguageController@languageDelete');
// End Languafge  Routes

// Category Routes
Route::get('/home/category','Admin\CategoryController@index');
Route::post('/home/category','Admin\CategoryController@insertCategory');

Route::get('/home/category/update/{id}','Admin\CategoryController@getUpdateCategory');
Route::post('/home/category/update/{id}','Admin\CategoryController@updateCategory');
Route::get('/home/category/delete/{id}','Admin\CategoryController@categoryDelete');
// End Category Routes

// Country Routes
Route::get('/home/country','Admin\CountryController@getInsertCountry');
Route::post('/home/country','Admin\CountryController@insertCountry');

Route::get('/home/country/update/{id}','Admin\CountryController@getUpdateCountry');
Route::post('/home/country/update/{id}','Admin\CountryController@updateCountry');
Route::get('/home/country/delete/{id}','Admin\CountryController@countryDelete');
//End Country Routes

//Blog Route

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home/blog','Api\BlogController@index');
    Route::get('/home/blog/insertblog','Api\BlogController@insertBlog');
    Route::post('/home/blog/insertblog','Api\BlogController@createBlog');
    Route::get('home/blog/delete/{id}','Api\BlogController@deleteBlog');
    Route::get('/home/blog/update/{id}','Api\BlogController@getBlogUpdate');
    Route::post('/home/blog/update/{id}','Api\BlogController@blogUpdate');

});

//End BLog Route

//Banner Route
Route::group(['middlewere' => 'auth'], function () {
    Route::get('/home/banner','Api\BannerController@index');
    Route::post('/home/banner','Api\BannerController@store');

    Route::get('/home/banner/status/{id}','Api\BannerController@deactivate');
    Route::get('/home/banner/update/{id}','Api\BannerController@deactivate');

});

//End Banner Rote
