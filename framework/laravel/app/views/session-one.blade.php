@extends('layouts.master')
@section('title')
    Laravel Sessions and Cookies
@stop

@section('content')
    {{Form::open()}}

    {{Form::label('email', 'Email: ')}}{{Form::email('email', Input::old('email'))}}
    <br>
    {{Form::label('name', 'Name: ')}}{{Form::text('name', Input::old('name'))}}
    <br>
    {{Form::label('city', 'City: ')}}{{Form::text('city', Input::old('city'))}}
    <br>
    {{Form::submit('Go!')}}
    {{Form::close()}}
@stop
