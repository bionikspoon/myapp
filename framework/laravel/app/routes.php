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
Route::get('shows', function()
{
	$shows = Show::All();
	echo '<h1>All Shows</h1>';
	foreach ($shows as $show) {
		echo "$show->name - $show->rating - $show->actor <br>";
	}
	$show_object = new Show();
	$top_shows = $show_object->getTopShows();
	echo '<h1>Top Shows</h1>';
	foreach ($top_shows as $show) {
		echo "$show->name - $show->rating - $show->actor <br>";
	}
});
Route::get('user', function()
{
	$user = new User();
	$input = array();

	$input['email'] = 'user@myapp.dev';
	$input['username'] = 'user';
	$valid = $user->validate($input);
	if ($valid->passes()) {
		echo 'Everything is valid!';
	}
	else 
	{
		var_dump($valid->messages());
	}
});
Route::get('add-show', function()
{
	$user = new User();
	$user->username = 'John Doe';
	$user->email = 'johndoe@myapp.dev';
	$user->save();

	$user->shows()->attach(1);
	$user->shows()->attach(3);

	foreach ($user->shows() as $show) {
		var_dump($show->name);
	}
});
Route::get('view-show', function()
{
	$show = Show::find(1)->users;
	dd($show);
});
Route::controller('users', 'UsersController');
Route::get('csv', function()
{
	if (($handle = fopen(public_path() . '/scifi.csv', 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
			$scifi = new Scifi();
			$scifi->character = $data[0];
			$scifi->movie = $data[1];
			$scifi->save();
		}
		fclose($handle);
	}
	return Scifi::all();
});
Route::get('rss', function()
{
	$source = 'http://rss.cnn.com/rss/cnn_topstories.rss';
	$headers = get_headers($source);
	$response = substr($headers[0], 9, 3);
	if ($response == '404') {
		return 'Invalid Source';
	}
	$data = simplexml_load_string(file_get_contents($source));

	if (count($data) == 0)
	{
		return 'No posts';
	}
	$posts = '';
	foreach ($data->channel->item as $item) {
		$posts .= "<h1><a href='$item->link'>$item->title</a></h1>";
		$posts .= "<h4>$item->pubDate</h4>";
		$posts .= "<p>$item->description</p>";
		$posts .= "<hr>";
	}
	return $posts;
});
Route::get('odd', function(){
	$odds = Odd::all();
	foreach ($odds as $odd) {
		echo "$odd->myIDcolumn - $odd->MyUsernameGoesHere - $odd->ThisIsAnEmail <br>";
	}
});
Route::get('notodd', function()
{
	$odds = Odd::all();
	foreach ($odds as $odd) {
		echo "$odd->id - $odd->username - $odd->email <br>";
	}
});
$db_setup = Config::get('database.connections.mysql');

R::setup(
	"mysql:host=" . $db_setup['host'] . ";dbname=" . $db_setup['database'], 
	$db_setup['username'],
	$db_setup['password']
	);

Route::get('orm', function()
{

	$superhero = R::dispense('superheroes');
	$superhero->name = 'Spiderman';
	$superhero->city = 'New York';
	$superhero->age = 24;

	$id1 = R::store($superhero);

	$superhero = R::dispense('superheroes');
	$superhero->name = 'Superman';
	$superhero->city = 'Metropalis';
	$superhero->age = 50;

	$id2 = R::store($superhero);

	$superhero = R::dispense('superheroes');
	$superhero->name = 'Batman';
	$superhero->city = 'Gotham';
	$superhero->age = 36;

	$id3 = R::store($superhero);

	$heroes = R::batch('superheroes', [$id1, $id2, $id3]);

	$response = "";
	foreach ($heroes as $hero) {
		$response .= $hero->name . " - " . $hero->city . " - " . $hero->age . "<br>";
	}
	return $response;
});