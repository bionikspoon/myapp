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
Route::get('shows', function()
{
	$shows = Show::All();
	echo '<h1>All Shows</h1>';
	foreach ($shows as $show) {
		echo "$show->name - $show->rating - $show->actor <br>";
	}
	$show_object = new Show();
	$top_shows = $show_object->getTopShows();
	echo '<h1>Top Shows</h1>';
	foreach ($top_shows as $show) {
		echo "$show->name - $show->rating - $show->actor <br>";
	}
});