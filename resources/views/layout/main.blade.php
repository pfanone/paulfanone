<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="keywords" content="web developer">
	<meta name="description" content="Paul Fanone's Personal Website">
	<title>@yield('title')</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
</head>

<body>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>