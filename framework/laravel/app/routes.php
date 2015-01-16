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
Route::get('redis-login', function(){
	return View::make('redis-login');
});
Route::post('redis-login', function()
{
	$redis = Redis::connection();
	$redis->hset('user', 'name', Input::get('name'));
	$redis->hset('user', 'email', Input::get('email'));
	return Redirect::to('redis-view');
});
Route::get('redis-view', function()
{
	$redis = Redis::connection();
	$name = $redis->hget('user', 'name');
	$email = $redis->hget('user', 'email');
	echo "Hello {$name}.  Your email is $email";
});
Route::get('redis-test', function()
{
	$redis = Redis::connection();
	$redis->set('name', 'Taylor')	;
	echo $redis->get('name');
});
Route::get('session-one', function()
{
	return View::make('session-one');
});
Route::post('session-one', function()
{
	Session::put('email', Input::get('email'));
	Session::flash('name', Input::get('name'));
	$cookie = Cookie::make('city', Input::get('city'), 30);
	return Redirect::to('session-two')->withCookie($cookie);
});
Route::get('session-two', function()
{
	$return ='Your email, from a session, is %s. <br>';
	$return .= 'Your name, from a flash session, is %s. <br>';
	$return .= 'Your city, from a cookie, is %s. <br>';
	$return .= '<a href="session-three">Next Page</a>';
	return sprintf($return, Session::get('email'), Session::get('name'), Cookie::get('city'));
});
Route::get('session-three', function()
{
	$return = '';
	if (Session::has('email')) {
		$return .= sprintf('Your email, from a Session is %s. <br>', Session::get('email'));
	} else {
		$return .= 'Email Session is not set.<br>';
	}

	if (Session::has('name')) {
		$return .= sprintf('Your name, from a flash session, is %s. <br>', Session::get('name'));
	} else {
		$return .= 'Name Session is not set. <br>';
	}

	if (Cookie::has('city')) {
		$return .= sprintf('Your city, from a cookie, is %s. <br>', Cookie::get('city'));
	} else {
		$return .+ 'City cookie is not set <br>.';
	}

	Session::forget('email');
	$return .= '<a href="session-three">Reload</a>';

	return $return;
});
Route::get('api-key', function()
{
	return View::make('api-key');
});
Route::post('api-key', function()
{
	$api = new API();
	$api->name = Input::get('name');
	$api->api_key = Str::random(16);
	$api->status = 1;
	$api->save();
	return sprintf('Your key is: %s', $api->api_key);
});
Route::get('api/{api_key}/shows', function($api_key)
{
	$client = Api::where('api_key', '=', $api_key) ->where('status', '=', 1)->first();

	if ($client) {
		return Show::all();
	} else {
		return Response::json('Not Authorized', 401);
	}
});
Route::get('api/{api_key}/shows/{show_id}', function($api_key, $show_id)
{
	$client = Api::where('api_key', '=', $api_key)->where('status', '=', 1)->first();

	if ($client) {
		$show = Show::find($show_id);

		if ($show) {
			return $show;
		} else {
			return Response::json('No Results', 204);
		}
		
	} else {
		return Response::json('Not Authorized', 401);
	}
	
});
Route::filter('api', function()
{
	if ($api_key = Input::get('api_key')) {
		$client = Api::where('api_key', '=', $api_key)->where('status', '=', $api_key)->first();

		if(!$client) {
			return Request::json('Not Authorized', 401);
		}
	} else {
		return Response::json('Not Authorized', 401);
	}
});
Route::post('api/shows', ['before' => 'api', function()
{
	return Show::all();
}]);
Route::get('post-api', function()
{
	$ch = curl_init();
	curl_setopt_array($ch, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_URL => URL::to('api/shows'),
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => [
				'api_key' => 'BsfNPhyBoByrNCHF'
			]
		]);
	dd($ch);
	$resp = curl_exec($ch);
	curl_close($ch);

	return $resp;

});