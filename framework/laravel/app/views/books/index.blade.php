<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Books Filter</title>
	{{ HTML::script('/js/jquery-1.11.2.js')}}
</head>
<body>
	{{ Form::open(['id' => 'filter'])}}
	{{Form::label('comedy', 'Comedy: ')}}{{Form::checkbox('genre[]', 'comedy')}}
	{{Form::label('drama', 'Drama: ')}}{{Form::checkbox('genre[]', 'drama')}}
	{{Form::label('fantasy', 'Fantasy: ')}}{{Form::checkbox('genre[]', 'fantasy')}}
	{{Form::label('horror', 'Horror: ')}}{{Form::checkbox('genre[]', 'horror')}}
	{{Form::label('philosophy', 'Philosophy: ')}}{{Form::checkbox('genre[]', 'philosophy')}}
	{{ Form::close()}}
	<hr>
	<h3>Results</h3>
	<div id="books"></div>
	<script>
		$(function(){
			$("input:checkbox").on('click', function() {
				var results = '';
				$('#books').html('Loading...');
				var temp = $('input:checked').serialize();
				$.post('books', $('input:checked').serialize(), function(data) {
					$.each(data, function() {
						results += this.name + ' by ' + this.author + ' (' + this.genre + ')<br>';
					});
				$("#books").html(results);
				});
			});
		});
	</script>
</body>
</html>