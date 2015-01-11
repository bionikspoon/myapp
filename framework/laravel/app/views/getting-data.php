<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Getting Data</title>
	<?php echo HTML::script('https://code.jquery.com/jquery-2.1.3.min.js') ?>
</head>
<body>
	<ul>
		<li><a href="#" id="tab1" class="tabs">Alice in Wonderland</a></li>
		<li><a href="#" id="tab2" class="tabs">Tom Sawyer</a></li>
	</ul>
	<h1 id="title"></h1>
	<div id="container"></div>
	<script>
		$(function(){
			$(".tabs").on("click", function(e){
				e.preventDefault();
				var tab = $(this).attr("id");
				var title = $(this).html();
				$("#container").html("loading...");
				$.get(tab, function(data){
					$("#title").html(title);
					$("#container").html(data);
				});
			});
		});
	</script>
</body>
</html>