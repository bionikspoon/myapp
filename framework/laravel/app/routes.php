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
Route::get('tvshow/{show?}/{year?}', function($show = null, $year = null)
{
	if (!$show && !$year) {
		return 'You did not pick a show.';
	}
	elseif (!$year) {
		return "You picked the show <strong>$show</strong>.";
	}
	return "You picked the show <strong>$show</strong> from the year <em>$year</em>.";
})
->where('year', '\d{4}');

Route::get('admin-only', ['before' => 'checkAdmin', 'after' => 'logAdmin', function()
{
	return 'Hello there, Admin!';
}]);
Route::get('set-admin/{admin}', function($admin)
{
	if ($admin) {
		# code...
		Session::put('user_type', 'admin');
	} else {
		Session::forget('user_type');
	}
	
	return Redirect::to('admin-only');
});

Route::get('set-profile/{user}', function($user)
{
	if ($user) {
		Session::set('profile', 'user');
	} else {
		Session::forget('profile');
	}
	return Redirect::to('profile/user');
});
Route::group(['before' => 'checkUser', 'prefix' => 'profile'], function()
{
	Route::get('user', function()
	{
		return 'I am logged in! This is my user profile.' . dd(Session::all());
	});
	Route::get('friends', function()
	{
		return 'This would be a list of friends';
	});
});