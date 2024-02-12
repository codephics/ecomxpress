@extends('frontend.skeleton.body')
@section('content')
		<!-- Breadcrumb -->
		<section>
			<div class="row">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">About Us</li>
							<li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!-- End Breadcrumb -->

		<!-- Content -->
		<section>
			<div class="row">
				<div class="col-12">
					<article>
						{!! $setting->long_description !!}
					</article>
				</div>
			</div>
		</section>
		<!-- End Content -->

		<!-- Questions or Suggestions -->
		<section>
			<div class="row">
				<div class="col-12">
					<p>Have questions or suggestions? <a href="{{ route('contact-us') }}">Contact Us</a></p>
				</div>
			</div>
		</section>
		<!-- End Questions or Suggestions -->
		
		@endsection