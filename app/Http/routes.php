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

use App\Comment;
use App\Language;
use App\Snip;
use App\Vote;

Route::model('s', Snip::class);
Route::resource('s', 'SnipController');

Route::model('c', Comment::class);
Route::resource('c', 'CommentController');

Route::model('l', Language::class);
Route::resource('l', 'LanguageController');

Route::model('v', Vote::class);
Route::resource('v', 'VoteController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');