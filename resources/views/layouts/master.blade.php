<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', config('app.name', 'Loomi'))</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">

	@vite(['resources/css/app.css', 'resources/js/app.js'])
	@stack('styles')
</head>
<body class="@yield('body-class', 'loomi-body')">
	<div class="loomi-layout">
		@include('partials.sidebar')

		<div class="loomi-main">
			@yield('content')
		</div>
	</div>

	@stack('modals')
	@stack('scripts')
</body>
</html>
