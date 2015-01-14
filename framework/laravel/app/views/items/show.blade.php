@extends('layouts.master')
@section('title')
	Item: {{$item->name}}
@stop

@section('content')
	<div>
		<h2>{{$item->name}}</h2>
		<p>Price: {{$item->price}}</p>
		<p><a href="{{URL::route('cart.add', $item->id)}}">Add to Card</a></p>
		<p><a href="{{URL::route('items.index')}}">Item List</a></p>
	</div>
	@if(Session::has('cart'))
		{{$cart}}
	@endif
@stop