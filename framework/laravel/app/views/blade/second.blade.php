@extends('layout.index')

@section('page_title')
	@parent
		Our Second Blade Page
@endsection

@section('content')
	<p>Go to {{ HTML::link('blade-home', 'the Home Page.')}}</p>
@endsection