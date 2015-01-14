@extends('layouts.master')
@section('title')
Edit Item
@stop

@section('content')
{{Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'PUT'])}}

	<div class="form-group">{{Form::label('name', 'Name')}}{{Form::text('name', null, ['class' => 'form-control'])}}</div>
	<div class="form-group">{{Form::label('description', 'Description')}}{{Form::text('description', null, ['class' => 'form-control'])}}</div>
	<div class="form-group">{{Form::label('price', 'Price')}}{{Form::text('price', null, ['class' => 'form-control'])}}</div>

	{{Form::submit('Edit Item', ['class' => 'btn btn-primary'])}}
{{Form::close()}}
@stop