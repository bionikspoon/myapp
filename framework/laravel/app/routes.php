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
Route::get('queueships', function()
{
    $ships = [
        [
            'name' => 'Galactica',
            'show' => 'Battlestar Galactica'
        ],
        [
            'name' => 'Millennium Falcon',
            'show' => 'Star Wars'
        ],
        [
            'name' => 'USS Prometheus',
            'show' => 'Stargate SG-1'
        ],
    ];
    $queue = Queue::push('Spaceship', ['ships' => $ships]);

    return 'Ships are queued';
});
Route::get('pay', function()
{
    return View::make('pay');
});
Route::post('pay', function()
{
    Stripe::setApiKey($_ENV['STRIPE_SK']);
    $chargeCard = [
        'number'        => Input::get('number'),
        'exp_month'     => Input::get('exp_month'),
        'exp_year'      =>  Input::get('exp_year'),
    ];
    $charge = Stripe_Charge::create([
        'card'      => $chargeCard,
        'amount'    => 3700,
        'currency'  => 'usd'
        ]);
    return dd($charge);
});
Route::get('geo', ['before' => 'geoip:73.9.1.5', function()
{
    return;
}]);
Route::get('geo/{country_code}', function($country_code)
{
    return "Welcome! Your country code is: $country_code";
});
Route::get('buckets', function()
{
    $list = AWS::get('s3')->listBuckets();
    foreach ($list['Buckets'] as $bucket) {
        echo $bucket['Name'] . "<br>";
    }
});
Route::get('cloud', function()
{
    return View::make('cloud');
});
Route::post('cloud', function()
{
      $my_image = Input::file('my_image');
      $s3_name = date('Ymdhis') . '-' . $my_image->getClientOriginalName();
      $path = $my_image->getRealPath();
      $s3 = AWS::get('s3');
      $obj = [
        'Bucket'        => 'bionikspoon.myapp',
        'Key'           => $s3_name,
        'SourceFile'    => $path,
        'ACL'           => 'public-read'
      ];
      if ($s3->putObject($obj)) {
          return Redirect::to('http://bionikspoon.myapp.s3.amazonaws.com/' . $s3_name );
      } else {
          return App::abort(404, 'There was an error');
      }
      
});