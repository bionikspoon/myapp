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