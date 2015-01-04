<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Open ID Login</title>
</head>
<body>
	<h1>Laravel Open ID Login</h1>
	<?=Form::open(array('url' => 'openid', 'method' => 'POST'))?>
	<?=Form::label('openid_identity', 'OpenID')?>
	<?=Form::text('openid_identity', Input::old('openid_identity'))?>
	<br>
	<?=Form::submit('Log in!')?>
	<?=Form::close()?>
</body>
</html>