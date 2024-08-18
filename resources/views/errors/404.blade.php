<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap -->
		@vite(['resources/css/bootstrap.min.css', 'resources/js/fontawesome-6.4.0.js'])

		<title>404 - Page not Found</title>

		<link rel="icon" sizes="48x48" href="{{ asset('global/setting/image/favicon.png') }}" />

	</head>
	<body>

		<main class="container p-1 py-3">
			<section>
				<div class="row">
					<div class="col-lg-12 text-center">
						<h1>404 - Page not Found</h1>
						<a href="{{ route('front.home') }}">Go to Homepage</a>
					</div>
				</div>
			</section>
		</main>

	</body>
</html>
