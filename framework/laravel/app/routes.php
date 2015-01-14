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
Route::get('cross-site', function()
{
	return View::make('cross-site');
});
Route::post('cross-site', ['before' => 'csrf', function()
{
	echo 'Token: ' . Session::token() . '<br>';
	dd(Input::all());
}]);
Route::get('valid', function()
{
	return View::make('valid');
});
Route::post('valid', function()
{
	$rules = [
		'email'		=> 'required|email',
		'captain'	=> 'required|check_three'
	];
	$messages = [
		'check_three' => 'Thou shalt choose three captains. No more. No less. Three shalt be the number thou shalt choose, and the number of the choosing shall be three.',
	];
	$validation = Validator::make(Input::all(), $rules, $messages);
	if ($validation->fails()) {
		return Redirect::to('valid')->withErrors($validation)->withInput();
	}
	echo "Form is Valid";
});
Validator::extend('check_three', function($attribute, $value, $parameter)
{
	return count($value) == 3;
});
Route::resource('items', 'ItemsController');
View::composer(['items.index', 'items.show'], function($view)
{
	$view->nest('cart', 'cart.index', ['cart_items' => Session::get('cart')]);
});
Route::get('cart/add/{id}', ['as' => 'cart.add', function($id)
{
	$item = Item::find($id);
	$cart = Session::get('cart');
	$cart[uniqid()] = [
		'id'	=> $item->id,
		'name'	=> $item->name,
		'price'	=> $item->price
	];
	Session::put('cart', $cart);
	return Redirect::route('items.index');
}]);
Route::get('cart.remove/{key}', ['as' => 'cart.remove', function($key)
{
	$cart = Session::get('cart');
	unset($cart[$key]);
	Session::put('cart', $cart);
	return Redirect::route('items.index');
}]);
Route::get('cart.empty', ['as' => 'cart.empty', function()
{
	Session::forget('cart');
	return Redirect::route('items.index');
}]);