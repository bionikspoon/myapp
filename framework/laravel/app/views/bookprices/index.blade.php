<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bookprices</title>
	{{HTML::script('/js/jquery-1.11.2.js')}}
	{{HTML::script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js')}}
	{{HTML::style('//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css')}}
</head>
<body>
<h1>Book List</h1>
<table>
	<thead>
		<tr>
			<th>Price</th>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
		@foreach($bookprices as $bookprice)
		<tr>
			<td>{{$bookprice->price}}</td>
			<td>{{$bookprice->book}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<script type="text/javascript">
	$(function(){
		$("table").dataTable();
	});
</script>
</body>
</html>