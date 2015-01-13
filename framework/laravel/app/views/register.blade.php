<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
</head>
<body>
	<p>
		<h3>Register</h3>
		{{Form::open(['url' => 'register'])}}
			{{Form::label('username', 'Username: ')}}{{Form::text('username', Input::get('username'))}} <br>
			{{Form::label('email', 'Email: ')}}{{Form::email('email', Input::get('email'))}} <br>
			{{Form::label('password', 'Password: ')}}{{Form::password('password', Input::get('password'))}} <br>
			
			{{Form::submit()}}

		{{Form::close()}}
	</p>
	<p style="border-top:1px solid #555">
		<h3>Login</h3>
		{{Form::open(['url' => 'login'])}}
			{{Form::label('username', 'Username: ')}}{{Form::text('username', Input::get('username'))}} <br>
			{{Form::label('email', 'Email: ')}}{{Form::email('email', Input::get('email'))}} <br>
			{{Form::label('password', 'Password: ')}}{{Form::password('password', Input::get('password'))}} <br>
			
			{{Form::submit()}}

		{{Form::close()}}
	</p>
	<hr>
	<table border="1">
	@if($users)
		<tr>
			<th>User Name</th>
			<th>Email</th>
			<th>Password</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{$user->username}} </td>
			<td>{{$user->email}} </td>
			<td>{{$user->password}} </td>
		</tr>
		@endforeach
	@endif
	</table>
</body>
</html>