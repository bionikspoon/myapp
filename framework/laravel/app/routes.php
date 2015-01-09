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
Route::filter('checkAdmin', function()
{
	if ('admin' !== Session::get('user_type')) {
		//return dd(Session::all());
		return 'You are not an Admin. Go Away!';
	}
});
Route::filter('logAdmin', function()
{
	Log::info('Admin logged in on ' . date('m/d/Y'));
});
Route::get('set-admin/{admin}', function($admin)
{
	if ($admin == 'on') {
		# code...
		Session::put('user_type', 'admin');
	} else {
		Session::forget('user_type');
	}
	
	return Redirect::to('admin-only');
});