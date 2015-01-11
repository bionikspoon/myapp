<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show Books</title>
	<?php echo HTML::script('https://code.jquery.com/jquery-2.1.3.min.js') ?>

</head>
<body>
<a href="#" id="book-button">Load Books</a>
<div id="book-list"></div>
<script>
	$(function(){
		$("#book-button").on('click', function(e){
			e.preventDefault();
			$('#book-list').html('loading...');
			$.get('books/books', function(data){
				var book_list = '';
				$.each(data, function(){
					book_list += this + '<br>';
				});
				$("#book-list").html(book_list);
				$("#book-button").hide();
			});
		});
	});
</script>
	
</body>
</html>