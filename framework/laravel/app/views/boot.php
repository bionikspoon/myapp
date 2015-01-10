<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Bootstrap Page</title>
	<?php echo HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') ?>
</head>
<body>
<div class="container">
	<h1>Using Bootstrap with Laravel</h1>
	<ul class="nav nav-tabs">
		<li class="active"><a href="#welcome" data-toggle="tab">Welcome</a></li>
		<li class=""><a href="#about" data-toggle="tab">About Us</a></li>
		<li class=""><a href="#contact" data-toggle="tab">Contact</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="welcome">
			<h4>Welcome to our site</h4>
			<p>Here's a list of superheroes</p>
			<ul>
				<?php foreach ($superheroes as $hero): ?>
					
					<li class="badge badge-info"><?php echo $hero ?></li>
				<?php endforeach ?>
			</ul>
		</div>
		<div class="tab-pane " id="about">
			<h4>About Us</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="tab-pane" id="contact">
			<h3>Contact Form</h3>
			<?php echo Form::open(['boot', 'POST']) ?>
				<?php echo Form::label('name', 'Your Name') ?>
				<?php echo Form::text('name') ?>
				<?php echo Form::label('email', 'Your Email') ?>
				<?php echo Form::email('email') ?>
				<br>
				<?php echo Form::submit('Send', [ 'class' => 'btn btn-primary']) ?>

			<?php echo Form::close() ?>
		</div>
		<div class="tab-pane active" id="welcome">
			<h4></h4>
			<p></p>
			<ul>
				<li class="badge badge-info"></li>
			</ul>
		</div>
	</div>
</div>
<?php echo HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') ?>
<?php echo HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') ?>
</body>
</html>