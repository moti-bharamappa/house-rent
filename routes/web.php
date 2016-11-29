<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/registered', 'HomeController@registered');
// Route::get('/confirm', 'EmailVerifyController@verify');

Route::get('/ad/post', 'AdsController@post');
Route::post('/ad/create', 'AdsController@create');

// to save after edit
Route::post('/ad/save', 'AdsController@save');

Route::get('/ad/delete/{id}', 'AdsController@delete');

// to fetch db data and generate the 'edit' view
Route::get('/ad/update/{id}', 'AdsController@update');

// Search
Route::get('/search', 'SearchController@index');


// Load Verify Form
Route::get('/verification', 'EmailVerifyController@loadForm');

// Load Verify Form
Route::post('/validateToken', 'EmailVerifyController@verifyToken');