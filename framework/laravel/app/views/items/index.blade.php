@extends('layouts.master')
@section('title')
List Items
@stop

@section('content')
<div class="panel-group" id="index" role="tabslist" aria-multiselectable="false">
	<div class="panel panel-default">
	@foreach($items as $item)
		<div class="panel-heading" role="tab" id="collapseListGroupHeading{{$item->id}}">
			<h4 class="panel-title">
				<a href="#collapseListGroup{{$item->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup{{$item->id}}"  data-parent="#index">
					{{$item->name}}

				</a><span class="badge">${{$item->price}}</span>
			</h4>
		</div>
		<div id="collapseListGroup{{$item->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelleddby="collapseListGroupHeading{{$item->id}}" aria-expanded="false">
			<ul class="list-group">
				<li class="list-group-item">
					{{$item->description}}
				</li>
				<li class="list-group-item">
					<ul class="nav nav-pills">
						<li role="presentation" ><a href="{{URL::route('items.show', $item->id)}}">Show</a></li>
						<li role="presentation" ><a href="{{URL::route('items.edit', $item->id)}}">Edit</a></li>
						<li role="presentation" ><a href="{{URL::route('items.destroy', $item->id)}}">Delete</a></li>
					</ul>
				</li>
			</ul>
		</div>
	@endforeach
	</div>
</div>


@stop
<!-- <a href="#collapse-{{$item->id}}" data-toggle="collapse" data-parent="#index" aria-expanded="false" aria-controls="collapse-{{$item->id}}" class="list-group-item">
		<span class="badge">${{$item->price}}</span>
		<h4 id="heading-{{$item->id}}" role="tab" class="list-group-item-heading">
			{{$item->name}}
		</h4>
		<p id="collapse-{{$item->id}}" role="tabpanel" aria-labelledby="heading-{{$item->id}}" class="collapse list-group-item-text">
			{{$item->description}}
			<br>
			<span class="btn-group" role="group" aria-label="command">
				<button type="button" class="btn btn-default">link</button>
				<button type="button" class="btn btn-default">link</button>
				<button type="button" class="btn btn-default">link</button>
			</span>
		</p>

	</a> -->