@extends('layouts.master')
@section('title')
    Cloud Form
@stop

@section('content')
    {{Form::open(['files' => true])}}

    {{Form::label('my_image', 'Image: ')}}
    {{Form::file('my_image')}}
    <br>
    {{Form::submit('Send')}}

    {{Form::close()}}
@stop