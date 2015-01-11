<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AJAX Search</title>
	<?php echo HTML::script('https://code.jquery.com/jquery-2.1.3.min.js') ?>
</head>
<body>
	<h1>Search</h1>
	<?php echo Form::open(['id' => 'search-form']) ?>
		<?php echo Form::label('search', 'Search') ?>
		<?php echo Form::text('search', null,['id' => 'term']) ?>
		<?php echo Form::submit() ?>
	<?php echo Form::close() ?>
	<div id="results"></div>
	<script>
	$(function(){
		$("#term").bind("input", function(e){
			//e.preventDefault();
			var search_term = $("#term").val();
			var display_results = $("#results");
			display_results.html("loading...");
			var results = "";
			$.post("search/search", {term: search_term}, function(data){
				if (data.length == 0) {
					results = "No Results";
				} else {
					$.each(data, function(){
						results += this.name + " by " + this.author + "<br>";
					});
				}
				display_results.html(results);
			});
		});
	});
	</script>
</body>
</html>