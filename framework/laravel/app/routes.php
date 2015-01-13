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
Route::get('getting-data', function()
{
	return View::make('getting-data');
});
Route::get('tab1', function()
{
	if (Request::ajax()) {
		return View::make('tab1');
	}
	return App::abort(404);
});
Route::get('tab2', function()
{
	if (Request::ajax()) {
		return View::make('tab2');
	}
	return App::abort(404);
});
Route::controller('stories', 'StoriesController');
Route::controller('search', 'SearchController');
Route::resource('users', 'UsersController');
Route::resource('books', 'BooksController');
Route::get('signup', function()
{
	return View::make('signup');
});
Route::post('signup-submit', function()
{
		$mc = new Mailchimp($_ENV['MC_APP_SECRET']);
		$id = 'a0a4353cb0';
		// $params = ['email' => Input::get('email')];
		$params = ['email' => 'fake@fake.com'];
	try {			
		$response = $mc->lists->subscribe($id, $params);
	} catch (Exception $e) {
		return dd($e);
	}

	if ($mc->errorCode()) {
		return 'There was an error' . $mc->errorMessage;
	} else {
		return 'You have subscribed!';
	}
	
});

Route::get('email-form', function()
{
	return View::make('email-form')->with(['to'=>'bionikspoon@aol.com','from'=>'no-reply@localhost.com','subject'=>'Test','messages'=>'This is a test']);
});
Route::post('email-send', function()
{
	$input = Input::all();

	$rules = [
		'to'		=> 'required|email',
		'from'		=> 'required|email',
		'subject'	=> 'required',
		'messages'	=> 'required',
	];
	$validation = Validator::make($input, $rules);
	if ($validation->fails()) {
		$return = '';
		foreach ($validation->errors()->all() as $err) {
			$return .= "$err <br>";
		}
		return $return;
	}

	$return = Mail::send('ajax-email', ['messages' => Input::get('messages')], function($email)
	{
		$email
			->to(Input::get('to'))
			->replyTo(Input::get('from'))
			->subject(Input::get('subject'));
	});
	return $return;
});