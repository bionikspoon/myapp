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
Route::get('user', function()
{
	$user = new User();
	$input = array();

	$input['email'] = 'user@myapp.dev';
	$input['username'] = 'user';
	$valid = $user->validate($input);
	if ($valid->passes()) {
		echo 'Everything is valid!';
	}
	else 
	{
		var_dump($valid->messages());
	}
});
Route::get('add-show', function()
{
	$user = new User();
	$user->username = 'John Doe';
	$user->email = 'johndoe@myapp.dev';
	$user->save();

	$user->shows()->attach(1);
	$user->shows()->attach(3);

	foreach ($user->shows() as $show) {
		var_dump($show->name);
	}
});
Route::get('view-show', function()
{
	$show = Show::find(1)->users;
	dd($show);
});