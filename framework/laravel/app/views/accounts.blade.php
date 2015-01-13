<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Accounts</title>
</head>
<body>
<h1>Accounts</h1>

	{{Form::open()}}
	{{Form::label('business', 'Business: ')}}
	<br>
	{{Form::text('business', Input::old('business'))}}
	<br><br>
	{{Form::label('total_revenue', 'Total Revenue ($): ')}}
	<br>
	{{Form::text('total_revenue', Input::old('total_revenue'))}}
	<br><br>
	{{Form::label('projected_revenue', 'Projected Revenue ($): ')}}
	<br>
	{{Form::text('projected_revenue', Input::old('projected_revenue'))}}
	<br><br>
	{{Form::submit()}}
	{{Form::close()}}
	<hr>
	@if($accounts)
		<table>
			<thead>
				<tr>
					<th>Business</th>
					<th>Total Revenue</th>
					<th>Projected Revenue</th>
				</tr>
			</thead>
			<tbody>
			@foreach($accounts as $account)
				<tr>
					<td>{{$account->business}}</td>
					<td>{{$account->total_revenue}}</td>
					<td>{{$account->projected_revenue}}</td>
				</tr>
			@endforeach
			</tbody>
		</table->
	@endif
</body>
</html>