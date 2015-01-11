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
Route::resource('cities', 'CitiesController');
Route::resource('superheroes', 'SuperheroesController');

Route::get('vimeo/{username?}', function( $username = null) use ($app)
{
	$vimeo = $app['vimeolist'];
	if ($username) {
		$vimeo->setUser($username);
	}
	dd($vimeo->getList());
});

$form_json = '{
	"action" : "uform",
	"method" : "POST",
	"fields" : [
	{
		"name" : "name",
		"type" : "text",
		"label" : "Name",
		"rules" : ["required"]
	},
	{
		"name" : "email",
		"type" : "email",
		"label" : "Email",
		"value" : "myemail@example.com",
		"rules" : ["required", "email"]
	},
	{
		"name" : "message",
		"type" : "textarea",
		"label" : "Message",
		"rules" : ["required", "length[30,]"]
	}
	]
}';

$uform = new Wesleytodd\UniversalForms\Drivers\Laravel\Form($form_json);

Route::get('uform', function() use ($uform)
{
	return $uform->render();
});
Route::post('uform', function() use ($uform)
{
	$valid = $uform->valid(Input::all());
	if ($valid)
	{
		dd(Input::all());
	} else {
		dd($uform->getErrors());
	}
});