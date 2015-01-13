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
Route::get('accounts', function()
{
	$accounts = Account::all();
	//return dd($accounts);
	return View::make('accounts')->withAccounts($accounts);
});
Route::post('accounts', function()
{
	$account = new Account();
	$account->business = Input::get('business');
	$account->total_revenue = Input::get('total_revenue');
	$account->projected_revenue = Input::get('projected_revenue');
	$account->save();
	return Redirect::to('accounts');
});
Route::get('register', function()
{
	$users = DB::table('register')->get();
	return View::make('register')->withUsers($users);
});
Route::post('register', function(){
	$data = [
		'username' => Input::get('username'),
		'email' => Hash::make(Input::get('email')),
		'password' => Hash::make(Input::get('password'))
	];
	DB::table('register')->insert($data);
	return Redirect::to('register');
});
Route::post('login', function()
{
	$user = DB::table('register')->where('username', '=', Input::get('username'))->first();
	if (!is_null($user)
		and Hash::check(Input::get('email'), $user->email) 
		and Hash::check(Input::get('password'), $user->password)) {
		echo "Login Successful";
	} else {
		echo "not able to login";
	}
	
});