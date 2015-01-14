@extends('layouts.master')
@section('title')
List Items
@stop

@section('content')
<ul class="list-group">
	@foreach($items as $item)
		<li class="list-group-item">
			<h4 class="list-group-item-heading">{{$item->name}}</h4>
			<p class="list-group-item-text">{{$item->description}}</p>
			<p class="list-group-item-text">
				<a class="btn btn-default btn-sm btn-primary" href="{{URL::route('items.show', $item->id)}}" role="button">Show</a>
				<a class="btn btn-default btn-sm btn-default" href="{{URL::route('items.edit', $item->id)}}" role="button">Edit</a>
				<a class="btn btn-default btn-sm btn-danger" href="{{URL::route('items.destroy', $item->id)}}" role="button">Delete</a>
		</li>
	@endforeach
</ul>
@stop