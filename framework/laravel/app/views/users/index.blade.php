<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Registration</title>
	<?php echo HTML::script('js/jquery-1.7.2.js') ?>
</head>
<body>
	{{ Form::open(['id' => 'register'])}}
	{{ Form::label('email', 'Your email: ')}}{{ Form::email('email', Input::old('email'))}}
	<br>
	{{ Form::label('password', 'Your password: ')}}{{ Form::password('password')}}
	<br>
	{{ Form::submit()}}
	{{Form::close()}}
	<div id="results"></div>
	<script type="text/javascript">
	$(function(){
		$("#register").submit(function(e) {
			e.preventDefault();
			var results = '';
			$.post('users', {email: $("#email").val(), password: $("#password").val()}, function(data){
				$.each(data, function() {
					results += this + "<br>";
				});
				$("#results").html(results);
			});
		});
	});
	</script>
</body>
</html>