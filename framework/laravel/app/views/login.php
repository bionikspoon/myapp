<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Authentication - Login</title>
</head>
<body>
	<h2>Laravel Authentication - Login</h2>
	<?= '<span style="color:red">' . Session::get('login_error') . '</span>' ?>
	<?= Form::open() ?>
	<?= Form::label('email', 'Email address: ') ?>
	<?= Form::text('email', Input::old('email')) ?>
	<br>
	<?= Form::label('password', 'Password: ') ?>
	<?= Form::password('password') ?>
	<br>
	<?= Form::submit('Login!') ?>
	<?= Form::close() ?>
</body>
</html>
