@extends('frontend.skeleton.body')
@section('content')
			<!-- Breadcrumb -->
			<div class="row mb-3">
				<div class="col-12">
					<nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                  <!-- <li class="breadcrumb-item"><a href="{{ route('item.shop') }}">Shop</a></li> -->
                  <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
              </ol>
          </nav>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-7 mb-3">
					<img src="{{ asset('ecommerce/item/image/' . $page->image) }}" alt="" class="img-fluid" />
				</div>
				<div class="col-md-5 mb-3">
					<h1>{{ $page->name }}</h1>
					<p>{!! $page->short_description !!}</p>
          <small>
              @if($page->sale_price)

              <span class="fw-bold fs-5 text-success">৳ {{ $page->sale_price }}</span> | <span class="fw-bold text-decoration-line-through text-muted">৳ {{ $page->regular_price }}</span>

              @elseif($page->regular_price)

              <span class="fw-bold fs-5 text-success">page {{ $page->regular_price }}</span>

              @else

              <span>Free</span>

              @endif
          </small>
					<div class="d-grid mt-3 gap-2">
						<div class="btn-group" role="group" aria-label="Basic mixed styles example">
							<a type="button" class="btn btn-primary position-relative" data-bs-toggle="modal" data-bs-target="#confirmNow" data-bs-whatever="@mdo">Confirm Order <i class="fa-solid fa-shopping-cart"></i></a>
	              <div class="modal fade" id="confirmNow" tabindex="-1" aria-labelledby="confirmNowLabel" aria-hidden="true">
	                  <div class="modal-dialog">
	                      <div class="modal-content">
	                          <div class="modal-header">
	                              <span class="modal-title fs-5" id="exampleModalLabel">Confirm Now</span>
	                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	                          </div>
	                          <div class="modal-body">
	                              <form class="needs-validation" method="POST" action="{{ route('ecommerce.lead.store.front') }}">
	                                  @csrf
	                                  <div class="mb-3">
	                                      <label for="recipient-name" class="col-form-label">Name: <span class="text-danger">*</span></label>
	                                      <input type="text" class="form-control" name="name" placeholder="Name" required />
	                                      <div class="invalid-feedback">
	                                          Valid Name is required.
	                                      </div>
	                                  </div>
	                                  <div class="mb-3">
	                                      <label for="recipient-email" class="col-form-label">Email (optional):</label>
	                                      <input type="email" class="form-control" name="email" placeholder="Email (optional)" required />
	                                      <div class="invalid-feedback">
	                                          Please enter a valid email address.
	                                      </div>
	                                  </div>
	                                  <div class="mb-3">
	                                      <label for="recipient-mobile" class="col-form-label">Mobile: <span class="text-danger">*</span></label>
	                                      <input type="text" class="form-control" name="mobile" placeholder="Mobile" required />
	                                      <div class="invalid-feedback">
	                                          Please enter a valid mobile number.
	                                      </div>
	                                  </div>
	                                  <div class="mb-3">
	                                      <label for="message-text" class="col-form-label">Address: <span class="text-danger">*</span></label>
	                                      <textarea class="form-control" name="address" placeholder="address" required></textarea>
	                                      <div class="invalid-feedback">
	                                          Please enter address.
	                                      </div>
	                                  </div>
	                                  <div class="mb-3">
	                                      <label for="message-text" class="col-form-label">Order Note (optional):</label>
	                                      <textarea class="form-control" name="note" placeholder="Order Note (optional)"></textarea>
	                                  </div>
	                                  <div class="modal-footer">
	                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	                                      <button type="submit" class="btn btn-primary">Confim Now</button>
	                                  </div>
	                              </form>
	                          </div>
	                      </div>
	                  </div>
	              </div>
	              <!-- <a href="{{ $page->downloadable_link }}" target="_blank" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Github">Github <i class="fa-solid fa-external-link"></i></a> -->
						</div>
					</div>
				</div>
				<div class="col-md-12 mb-3">
					<ul class="nav nav-pills mt-3 mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active mb-3" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
								Description
							</button>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
							{!! $page->long_description !!}
						</div>
					</div>
				</div>
			</div>

			<!-- HR -->
			<div class="mt-3 border-top border-start-0 border-bottom-0 border-end-0"></div>

			<div class="mt-3"></div>

			<!-- Related Blogs -->
			<section>
				<div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
					<div class="col-lg-10">
						<h4 class="display-6">Explore more insightful content from our blog</h4>

						<p>Dive into the fundamentals of SEO and discover how it can elevate your online presence. This beginner's guide covers essential strategies and tips to optimize your website for search engines.</p>
					</div>
					<div class="col-lg-2 align-self-center">
						<div class="row">
							<div class="col-12 col-sm-12">
								<a type="button" class="btn btn-outline-secondary float-end" href="{{ route('blog.more') }}">Read Blogs</a>
							</div>
						</div>
					</div>
				</div>

				<div class="mt-3"></div>

				<div class="row">
					@foreach($relatedBlog as $blog)
            <div class="col-lg-6">
	            <article>
	                <figure>
	                    <div class="card shadow mb-5 rounded-3 no-border-card">
	                        <a href="{{ route('blog.detail',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
	                            <img src="{{ asset('blog/image/featured/' . $blog->featured_image) }}" class="card-img-top" alt="...">
	                        </a>
	                        <figcaption>
	                            <div class="card-body">
	                                <ul class="d-flex list-unstyled mt-auto">
	                                  <li class="me-auto">
	                                    <a href="{{ route('blog.detail',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</a>
	                                    <small>{{ $blog->created_at->format('M d, Y') }}</small>
	                                  </li>
	                                  <li class="d-flex align-items-center">
	                                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
	                                    <small>
	                                        <span><a href="{{ route('blog.detail',$blog->slug) }}" target="_self" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Read Blog">Read</a></span>
	                                    </small>
	                                  </li>
	                                </ul>
	                            </div>
	                        </figcaption>
	                    </div>
	                </figure>
	            </article>
	        </div>
          @endforeach
				</div>
			</section>
			<!-- End Related Blogs -->
			<div class="row">
				<div class="col-12">
					<p class="text-center">Have questions or suggestions? <a href="{{ route('contact-us') }}">Contact Us</a></p>
				</div>
			</div>
		
		@endsection