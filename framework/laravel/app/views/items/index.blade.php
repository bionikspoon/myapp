@extends('layouts.master')
@section('title')
List Items
@stop

@section('content')

@foreach($items as $item)
	<p>
		<a href="{{URL::route('items.show', $item->id)}}">{{$item->name}}</a>
		--
		<a href="{{URL::route('cart.add', $item->id)}}">Add to Card</a> 
	<p>
@endforeach

@stop
