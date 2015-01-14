<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Custom Valudation</title>
</head>
<body>
	<p>
		@if($errors)
			{{$errors->first('email')}}
			{{$errors->first('captain')}}
		@endif
	</p>
	<p>
		<h3>Custom Validation</h3>
		{{Form::open()}}
			{{Form::label('email', 'Email')}}{{Form::email('email', Input::old('email'))}}
			<br><br>
			{{Form::label('captain', 'Your favorite captains (choose 3)')}}
			<br>
			{{'Pike: ' . Form::checkbox('captain[]', 'Pike')}}<br>
			{{'Kirk: ' . Form::checkbox('captain[]', 'Kirk')}}<br>
			{{'Picard: ' . Form::checkbox('captain[]', 'Picard')}}<br>
			{{'Sisko: ' . Form::checkbox('captain[]', 'Sisko')}}<br>
			{{'Janeway: ' . Form::checkbox('captain[]', 'Janeway')}}<br>
			{{'Archer: ' . Form::checkbox('captain[]', 'Archer')}}<br>
			{{'Crunch: ' . Form::checkbox('captain[]', 'Crunch')}}<br>
			
			{{Form::submit('Submit')}}
		{{Form::close()}}
	</p>
</body>
</html>