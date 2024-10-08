@extends('frontend.skeleton.body') @section('content')
        <!-- Breadcrumb -->
        <section>
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->

        <!-- Content -->
        <section>
			<div class="my-5 text-center">
				<img class="d-block mx-auto mb-2" src="{{ asset('global/page/image/thumb/' . $page->thumb) }}" alt="" width="72" height="57" />
				<h1>{{ $page->title }}</h1>
				<div class="col-lg-6 mx-auto">
					<p>{!! $page->short_description !!}</p>
				</div>
			</div>

			<div class="row">
				<div class="col"></div>
				<div class="col-md-4 col-lg-5 bg-white">
					<form class="row g-3 float-end needs-validation" method="POST" action="{{ route('contact-us.new') }}" novalidate>
						@csrf
						<div class="row g-3">
							<div class="col-sm-12">
								<label for="firstName" class="form-label fw-bold">Your name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="name" placeholder="I am?" value="" required />
								<div class="invalid-feedback">
									Valid Name is required.
								</div>
							</div>

							<div class="col-12">
								<label for="email" class="form-label fw-bold">Your email address <span class="text-danger">*</span></label>
								<input type="email" class="form-control" name="email" placeholder="you@example.com" required />
								<div class="invalid-feedback">
									Please enter a valid email address.
								</div>
							</div>
							<div class="col-12">
								<label for="exampleFormControlTextarea1" class="form-label fw-bold">Tell us about your thoughts<span class="text-danger">*</span></label>
								<textarea class="form-control" name="description" rows="3" placeholder="I want to tell." required></textarea>
							</div>
							<div class="col-12">
								<button class="w-100 btn btn-primary btn-lg" type="submit">Let's Start Discussion</button>
							</div>
							<div class="col-12">
								<p class="text-center">You'll hear from us within 3-5 business days.</p>
							</div>
						</div>
					</form>
				</div>
				<div class="col"></div>
			</div>
        </section>
        <!-- End Content -->

	@section('custom-scripts') @include('backend.skeleton.summernote') @endsection @endsection