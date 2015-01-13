<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email Form</title>
	{{HTML::script('/js/jquery-1.11.2.js')}}
</head>
<body>
	<div id="container">
		<div id="error"></div>
		{{Form::open(['id'=>'email-form'])}}
			{{Form::label('to', 'To: ')}}{{Form::email('to', $to)}} <br>
			{{Form::label('from', 'From: ')}}{{Form::email('from', $from)}} <br>
			{{Form::label('subject', 'Subject: ')}}{{Form::text('subject', $subject)}} <br>
			{{Form::label('messages', 'Message: ')}}{{Form::textarea('messages', $messages)}} <br>
			{{Form::submit('Send')}}
		{{Form::close()}}
	</div>
	<script type="text/javascript">
	$(function(){
		$("#email-form").submit(function(e) {
			e.preventDefault();
			$.post('email-send', $(this).serialize(), function(data) {
				if (data == 0) {
					$("#error").html("<h3>There was an error.</h3>")
				} else{
					if (isNaN(data)) {
						$("#error").html('<h3>' + data + '</h3');
					} else{
						$("#container").html("Your email has been sent!");
					}
				}
			});
		});
	});
	</script>
</body>
</html>