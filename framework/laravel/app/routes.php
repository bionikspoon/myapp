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