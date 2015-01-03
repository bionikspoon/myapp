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
Route::get('shape', function()
{
	$shape = new Custom\Shapes\MyShapes;
	return $shape->triangle();
});
Route::get('userform', function()
{
	return View::make('userform');
});
Route::post('userform', function()
{
	$rules = array(
		'email' => 'required|email|different:username',
		'username' => 'required|min:6',
		'password' => 'required|same:password_confirm'
	);
	$validation = Validator::make(Input::all(), $rules);
	if ($validation->fails())
	{
		return Redirect::to('userform')->withErrors($validation)->withInput();
	}
});
Route::get('userresults', function()
{
	return dd(Input::old());
});
Route::get('fileform', function()
{
	return View::make('fileform');
});
Route::post('fileform', function()
{
	$rules = array('myfile' => 'mimes:doc,docx,pdf,txt|max:1000');
	$validation = Validator::make(Input::all(), $rules);
	if ($validation->fails()) {
		return Redirect::to('fileform')->withErrors($validation)->withInput();
	} else {
		$file = Input::file('myfile');
		if ($file->move('files', $file->getClientOriginalName()))
		{
			return 'Success';
		}
		else
		{
			return 'Error';
		}
	}
});
Route::get('myform', function()
{
	return View::make('myform');
});
Route::post('myform', array( 'before' => 'csrf', function(){
	$rules = array(
		'email' => 'required|email',
		'username' => 'required',
		'password' => 'required',
		'no_email' => 'honey_pot'
		);
	$messages = array(
		'honey_pot' => 'Nothing should be in this field.'
	 	);
	$validation = Validator::make(Input::all(), $rules, $messages);
	if ($validation->fails()) {
		return Redirect::to('myform')->withErrors($validation)->withInput();
	}
	return Redirect::to('myresults')->withInput();
}));
Route::get('myresults', function()
{
	return dd(Input::old());
});