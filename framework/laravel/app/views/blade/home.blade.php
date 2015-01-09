@extends('layout.index')

@section('page_title')
	@parent
		Our Blade Home
@endsection

@section('content')
<p>
	Go to {{ HTML::link('blade-second', 'the Second page.')}}
</p>
@endsection