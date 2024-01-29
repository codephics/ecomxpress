<!DOCTYPE html>
<html lang="en-US">
	<head>
		@yield('tiny-head')

		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap -->
		@vite(['resources/css/bootstrap.min.css', 'resources/js/fontawesome-6.4.0.js'])

		<title>Elevate Your Blogging Experience with BlogForge10 | Codephics</title>

		<link rel="icon" sizes="48x48" href="{{ asset('global/image/setting/favicon-48x48.png') }}" />
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('global/image/setting/apple-touch-icon.png') }}" />
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('global/image/setting/favicon-32x32.png') }}" />
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('global/image/setting/favicon-16x16.png') }}" />

		<!-- Custom Head -->
		@yield('custom-head')

		<!-- HTML Meta Tags -->
		@include('backend.skeleton.meta')
		<meta name="robots" content="noindex, nofollow">
		

		<!-- Schema -->
		@include('backend.skeleton.schema')

	</head>
	<body>

		<!-- Navigation -->
		@include('backend.skeleton.top-navigation')

		<!-- Content -->
		@yield('content')
		<!-- End Content -->

		<!-- Footer -->
		@include('backend.skeleton.footer')

		

		<!-- Scripts -->
		@include('backend.skeleton.scripts')

		<!-- Custom Scripts -->
		@yield('custom-scripts')

	</body>
</html>
