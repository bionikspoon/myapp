<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::controller('users', 'UsersController');
Route::get('old_users', 'UsersController@actionIndex');
Route::get('old_users/about', 'UsersController@actionAbout');
Route::get('hello/world', function()
{
	$hello = 'Hello';
	$world = 'World';
	return "$hello {$world}!";
});