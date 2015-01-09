<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Site</title>
</head>
<body>
	<h1>
		@section('page_title')
			Welecome to
		@show
	</h1>
	@yield('content')	
</body>
</html>