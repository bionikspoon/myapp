@extends('layout.index')

@section('page_title')
	@parent
		Our {{ $movie['name'] }} Page
@endsection

@section('content')
	@include('blade.info')
	<p>Go to {{ HTML::link('blade-home', 'the Home Page.')}}</p>
@endsection