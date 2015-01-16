@extends('layouts.master')
@section('title')
    Redis Login
@stop

@section('content')
    <style>
        .form-signin {
          max-width: 330px;
          padding: 15px;
          margin: 0 auto;
        }
    </style>
    {{Form::open(['class' => 'form-signin'])}}
        <h2 class="form-signin-heading">Please sign in</h2>
        {{Form::label('name', 'Your Name', ['class' => 'sr-only'])}}
        {{Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Your Name', 'required'=>'', 'autofocus'=>''])}}
        {{Form::label('email', 'Email Address', ['class' => 'sr-only'])}}
        {{Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email address', 'required'=>''])}}
        <div class="checkbox">
            <label>
                <input value="remember-me" type="checkbox"> Remember me
            </label>
        </div>
        {{Form::submit('Sign in', ['class' => "btn btn-lg btn-primary btn-block"])}}
    {{Form::close()}}
@stop
