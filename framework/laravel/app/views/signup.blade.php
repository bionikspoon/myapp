<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Newsletter Signup</title>
	{{HTML::style('/css/bootstrap.css')}}
	{{HTML::script('/js/jquery-1.11.2.js')}}
	{{HTML::script('/js/bootstrap.js')}}
</head>
<body>
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#signupModal">Newsletter Signup</button>
	<div id="results"></div>
	<div id="signupModal" class="modal fade" aria-labelledby="signupModalLabel" aria-hidden="true" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Sign up for our awesome newsletter!</h3>
				</div>
				<div class="modal-body">
					<p>
						{{Form::open(['id' => 'newsletter_form'])}}
						{{Form::label('fname', 'Your First Name: ')}}{{Form::text('fname', Input::old('fname'))}} <br>
						{{Form::label('lname', 'Your Last Name:')}}{{Form::text('lname', Input::old('lname'))}} <br>
						{{Form::label('email', 'Email')}}{{Form::email('email', Input::old('email'))}} <br>
						{{Form::close()}}
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="newsletter_submit">Signup</button>
				</div>
			</div>
		</div>
	</div>
	<script>
	$('#myModal').modal()
	$(function(){
		$("#newsletter_submit").click(function(e) {
			e.preventDefault();
			$("#results").html("Loading...");
			$.post('signup-submit', $("#newsletter_form").serialize(), function(data){
				$('#signupModal').modal('hide');
				$('#results').html(data);
			});
		});
	});
	</script>
</body>
</html>