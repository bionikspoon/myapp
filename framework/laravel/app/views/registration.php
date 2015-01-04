<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Authentication - Registration</title>
</head>
<body>
	<h2>Laravel Authentication - Registration</h2>
	<?php $messages = $errors->all('<p style="color:red">:messages</p>') ?>
	<?php foreach ($messages as $msg) {
		echo $msg;
	} ?>
	<?= Form::open() ?>
	<?= Form::label('email', 'Email Address: ') ?>
	<?= Form::text('email', Input::old('email')) ?>
	<br>
	<?= Form::label('password', 'Password: ') ?>
	<?= Form::password('password') ?>
	<br>
	<?= Form::label('password_confirm', 'Retype Password: ') ?>
	<?= Form::password('password_confirm') ?>
	<br>
	<?= Form::label('name', 'Name: ') ?>
	<?= Form::text('name', Input::old('name')) ?>
	<br>
	<?= Form::label('admin', 'Admin?: ') ?>
	<?= Form::checkbox('admin', 'true', Input::old('admin')) ?>
	<br>
	<?= Form::submit('Register!') ?>
	<?= Form::close() ?>
	
</body>
</html>