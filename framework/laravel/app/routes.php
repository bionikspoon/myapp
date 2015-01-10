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
	return View::make('myviews.home')
	->nest('header', 'common.header')
	->nest('footer', 'common.footer')
	->with('title', $page_title);
});
Route::get('second', function()
{
	$view = View::make('myviews.second');
	$view->nest('header', 'common.header')->nest('footer', 'common.footer');
	$view->nest('userinfo', 'common.userinfo', ['my_name' => 'Bionikspoon', 'my_city' => 'Chicago']);
	return $view;
});
Route::get('blade-home', function()
{
	$movies = [
		[ 'name' => 'Star Wars', 'year' => '1977', 'slug' => 'star-wars'],
		[ 'name' => 'The Matrix', 'year' => '1999', 'slug' => 'matrix'],
		[ 'name' => 'Die Hard', 'year' => '1988', 'slug' => 'die-hard'],
		[ 'name' => 'Clerks', 'year' => '1994', 'slug' => 'clerks'],
	];
	return View::make('blade.home')->with('movies', $movies);
});
Route::get('blade-second/{slug}', function($slug)
{
	$movies = [
		'star-wars' => [ 'name' => 'Star Wars', 'year' => '1977', 'genre' => 'Sci-fi'],
		'matrix' => [ 'name' => 'The Matrix', 'year' => '1999', 'genre' => 'Sci-fi'],
		'die-hard' => ['name' => 'Die Hard', 'year' => '1988', 'genre' => 'Action'],
		'clerks' => ['name' =>'Clerks', 'year' => '1994', 'genre' => 'Comedy'],
	];
	return View::make('blade.second')->with('movie', $movies[$slug]);
});

Route::get('twig-view', function()
{
	$link = HTML::link('http://laravel.com', 'the laravel site.');
	return View::make('twig')->with('link', $link);
});