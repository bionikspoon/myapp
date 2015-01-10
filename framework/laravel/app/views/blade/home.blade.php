@extends('layout.index')

@section('page_title')
	@parent
		Our List of Movies
@endsection

@section('content')

	<ul>
	@foreach ($movies as $movie)
		<li> {{ HTML::link('blade-second/' . $movie['slug'], $movie['name'])}}
			@if ($movie['name'] == 'Die Hard')
			<ul>
				<li>Main character: John McClane</li>
			</ul>
			@endif
		</li>
	@endforeach
	</ul>

@endsection