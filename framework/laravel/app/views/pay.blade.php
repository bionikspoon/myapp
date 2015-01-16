@extends('layouts.master')
@section('title')
    Payment Form
@stop

@section('content')
    {{Form::open()}}

        {{Form::label('number', 'Card Number: ')}}
        {{Form::text('number', '4242424242424242')}}
        <br>
        {{Form::label('exp_month', 'Expiration (month)')}}
        {{Form::select('exp_month', [
            1 => '01',
            2 => '02',
            3 => '03',
            4 => '04',
            5 => '05',
            6 => '06',
            7 => '07',
            8 => '08',
            9 => '09',
            10 => '10',
            11 => '11',
            12 => '12',
        ], 5)}}
        <br>
        {{Form::label('exp_year', 'Expiration (year)')}}
        {{Form::select('exp_year', [
            2013 => 2013,
            2014 => 2014,
            2015 => 2015,
            2016 => 2016
        ], 2015)}}
        <br>
        {{Form::submit('Charge $37 to my card')}}
    {{Form::close()}}
@stop