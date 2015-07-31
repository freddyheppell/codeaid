<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::model('snip', 'App\Snip');
Route::model('comment', 'App\Comment');
Route::model('language', 'App\Language');

// Snips
Route::get('/', 'SnipController@index');
Route::get('/s/create', 'SnipController@create');
Route::post('/s', 'SnipController@store');
Route::get('/s/{snip}', 'SnipController@show');
Route::get('/s/{snip}/edit', 'SnipController@edit');
Route::put('/s/{snip}', 'SnipController@update');
Route::delete('/s/{snip}', 'SnipController@destroy');


// Comments
Route::post('/s/{snip}/comment/create', 'CommentController@store');
Route::put('/s/{snip}/comment/{comment}', 'CommentController@update');

// Languages
Route::get('/l', 'LanguageController@index');
Route::get('/l/create', 'LanguageController@create');
Route::post('/l', 'LanguageController@store');
Route::get('/l/{language}', 'LanguageController@show');
Route::get('/l/{language}/edit', 'LanguageController@edit');
Route::put('/l/{language}', 'LanguageController@update');
Route::delete('/l/{language}', 'LanguageController@destroy');

// Voting
Route::get('/s/{snip}/like', 'VoteController@makeVote');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/auth/status', function(){
   return Auth::user();
});