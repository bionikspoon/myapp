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
Route::get('home', function()
{
	$page_title = "My Home Page Title";
	return View::make('myviews.home')->with('title', $page_title);
});
Route::get('second', function()
{
	$view = View::make('myviews.second');
	$view->my_name = "Bionikspoon";
	$view->my_city =  "Chicago";
	return $view;
});