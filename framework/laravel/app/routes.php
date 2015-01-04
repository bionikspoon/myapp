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
Route::get('registration', function()
{
	return View::make('registration');
});
Route::post('registration', array('before' => 'csrf', function()
{
	$rules = array(
			'email'	 	=> 'required|email|unique:users',
			'password' 	=> 'required|same:password_confirm',
			'name' 		=> 'required'
		);
	$validation = Validator::make(Input::all(), $rules);
	if ($validation->fails()) {
		return Redirect::to('registration')->withErrors($validation)->withInput();
	}
	$user 				= new User;
	$user->email 		= Input::get('email');
	$user->password 	= Hash::make(Input::get('password'));
	$user->name 		= Input::get('name');
	$user->admin 		= Input::get('admin') ? 1 : 0;
	if ($user->save())
	{
		Auth::loginUsingId($user->id);
		return Redirect::to('profile');
	}
	return Redirect::to('registration')->withInput();
}));
Route::get('profile', function()
{
	if (Auth::check()) {
		return View::make('profile')->with('user', Auth::user());
	} else {
		return Redirect::to('login')->with('login_error', 'You must login first.');
	}
	
});
Route::get('login', function()
{
	return Redirect::to('openid-login');
	return View::make('login');
});
Route::post('login', function(){
	$user = array(
		'email' => Input::get('email'),
		'password' => Input::get('password'));

	if (Auth::attempt($user))
	{
		return Redirect::to('profile');
	}
	return Redirect::to('login')->with('login_error', 'Could not log in.');

});
Route::get('secured', array('before' => 'auth', function()
{
	return 'This is a second page!';
}));
Route::get('profile-edit', function()
{
	if (Auth::check()) {
		$user = Input::old() ? (object) Input::old() : Auth::user();
		return View::make('profile-edit')->with('user', $user);
	}
});
Route::post('profile-edit', function()
{
	$rules = array(
		'email' 	=> 'required|email',
		'password' 	=> 'same:password_confirm', 
		'name' 		=> 'required'
		);
	$validation = Validator::make(Input::all(), $rules);

	if ($validation->fails()) {
		return Redirect::to('profile-edit')->withErrors($validation)->withInput();
	}

	$user = User::find(Auth::user()->id);
	$user->email = Input::get('email');
	if (Input::get('password')) {
		$user->password = Hash::make(Input::get('password'));
	}
	$user->name = Input::get('name');
	if ($user->save()){
		return Redirect::to('profile')->with('notify', 'Information Updated');
	}
	return Redirect::to('profile-edit')->withInput();
});
Route::get('restricted', array('before' => 'auth', function()
{
	return 'This page is restricted to logged-in users! <a href="admin">Admins Click here.</a>';
}));
Route::get('admin', array('before' => 'auth_admin', function()
{
	return 'This page is restricted to Admins only!';
}));

Route::get('openid-login', function()
{
	return View::make('openid-login');
});
Route::any('openid/{auth?}', function($auth = NULL)
{
	if ($auth == 'auth') {
		try {
			Hybrid_Endpoint::process();
		} catch (Exception $e) {
			return Redirect::to('openid');
		}
		return;
	}
	try {
		$oauth = new Hybrid_Auth(app_path() . '/config/openid_auth.php');
		$provider = $oauth->authenticate('OpenID', array('openid_identifier' => Input::get('openid_identity')));
		$profile = $provider->getUserProfile();
	} catch (Exception $e) {
		return $e->getMessage();
	}
	echo "Welcome $profile->firstName $profile->lastName <br>";
	echo "Your email: $profile->email <br>";
	dd($profile);
	//https://www.google.com/accounts/o8/id
});