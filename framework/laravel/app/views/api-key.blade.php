@extends('layouts.master')
@section('title')
    Create an API key
@stop

@section('content')
    {{Form::open()}}

    {{Form::label('name', 'Your Name:')}};
    {{Form::text('name')}}
    <br>
    {{Form::submit('go')}}

    {{Form::close()}}
    
@stop
