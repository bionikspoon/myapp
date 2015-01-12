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
	try {			
		$mc = new Mailchimp();
		$mcl = new Mailchimp_Lists($mc);
		$response = $mc->listSubscribe(
			'{list_id}',
			Input::get('email'),
			[
			'FNAME' => Input::get('fname'),
			'LNAME' => Input::get('lname')
			]
		);
		if ($mc->errorCode()) {
			return 'There was an error' . $mc->errorMessage;
		} else {
			return 'You have subscribed!';
		}
	} catch (Exception $e) {
		return dd($e);
	}

	
});