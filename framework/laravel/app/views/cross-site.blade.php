<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CSRF Login</title>
</head>
<body>
	<h3>CSRF Login</h3>
	{{Form::open()}}
	
	{{Form::token()}}

	{{Form::label('email', 'Email')}}{{Form::email('email', Form::old('email'))}} <br>
	{{Form::label('password', 'Password')}}{{Form::password('password', Form::old('password'))}} <br>

	{{Form::submit('Submit')}}

	{{Form::close()}}	

	<br>

	<h3>CSRF Fake Login</h3>
	{{Form::open()}}
	
	{{Form::hidden('_token', 'smurftacular')}}

	{{Form::label('email', 'Email')}}{{Form::email('email', Form::old('email'))}} <br>
	{{Form::label('password', 'Password')}}{{Form::password('password', Form::old('password'))}} <br>

	{{Form::submit('Submit')}}

	{{Form::close()}}	

</body>
</html>