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
				<div class="col-md-8 mb-3">
					<form class="needs-validation" novalidate>
						<img src="{{ asset('ecommerce/item/image/' . $page->image) }}" alt="" width="100%" height="100%" class="d-inline-block rounded-3 align-text-top" />
					</form>
				</div>
				<div class="col-md-4 mb-3">
					<h1>{{ $page->name }}</h1>
					<p>{!! $page->short_description !!}</p>
					<span class="text-primary">Grab it now!</span>
					<span class="badge bg-primary rounded-pill">Free</span>
					<div class="d-grid mt-3 gap-2">
						<div class="btn-group" role="group" aria-label="Basic mixed styles example">
							<a href="{{ $page->live_preview_link }}" target="_blank" class="btn btn-outline-primary">Live Preview <i class="fa-solid fa-external-link"></i></a>
						</div>
						<div class="btn-group" role="group" aria-label="Basic mixed styles example">
							<a href="{{ $page->admin_link }}" target="_blank" class="btn btn-primary position-relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download HTML">Admin <i class="fa-solid fa-external-link"></i></a>
							<a href="{{ $page->downloadable_link }}" target="_blank" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Github">Github <i class="fa-solid fa-external-link"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-8 mb-3">
					<ul class="nav nav-pills mt-3 mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active mb-3" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
								Description
							</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link mb-3" id="pills-changelog-tab" data-bs-toggle="pill" data-bs-target="#pills-changelog" type="button" role="tab" aria-controls="pills-changelog" aria-selected="false">
								Change Log
							</button>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
							{!! $page->long_description !!}
						</div>
						<div class="tab-pane fade" id="pills-changelog" role="tabpanel" aria-labelledby="pills-changelog-tab">
							{!! $page->change_log !!}
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<ul class="list-group list-group-flush mt-3">
						<li class="list-group-item d-flex justify-content-between align-items-center bg-light">
							Bootstrap
							<span class="text-muted">{{ $page->bootstrap_v }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center bg-light">
							Released
							<span class="text-muted">{{ $page->created_at->format('M d, Y') }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center bg-light">
							Updated
							<span class="text-muted">{{ $page->updated_at->format('M d, Y') }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center bg-light">
							Version
							<span class="text-muted">{{ $page->version }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center bg-light">
							Category
							
							@if ($page->category_name)
							    @if ($page->category)
							        <!-- <a href="{{ route('category.show', ['category' => $page->category->slug]) }}" class="link-dark">
							            {{ $page->category_name }}
							        </a> -->
							        <span class="text-muted">{{ $page->category_name }}</span>
							    @endif
							@elseif ($page->subcategory_name)
							    @if ($page->subcategory)
							        <!-- <a href="{{ route('subcategory.show', [
							                        'category' => $page->subcategory->category->slug,
							                        'subcategory' => $page->subcategory->slug,
							                    ]) }}" class="link-dark">
							            {{ $page->subcategory_name }}
							        </a> -->
							        <span class="text-muted">{{ $page->subcategory_name }}</span>
							    @endif
							@elseif ($page->sub_subcategory_name)
							    @if ($page->sub_subcategory)
							        <!-- <a href="{{ route('subSubcategory.show', [
							                        'category' => $page->subcategory->category->slug,
							                        'subcategory' => $page->subcategory->slug,
							                        'subSubcategory' => $page->sub_subcategory->slug,
							                    ]) }}" class="link-dark">
							            {{ $page->sub_subcategory_name }}
							        </a> -->
							        <span class="text-muted">{{ $page->sub_subcategory_name }}</span>
							    @endif
							@endif
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center bg-light">
							Questions?
							<a href="mailto:codephics@gmail.com" class="btn btn-outline-primary btn-sm">Contact Developer</a>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center p-3 bg-light">
							<div class="d-flex align-items-center">
								<!-- <div class="flex-shrink-0 card shadow rounded-4">
									<img src="{{ asset('ecommerce/seller/image/icon' . $page->image) }}" alt="..." width="69" height="69">
								</div> -->
								<div class="flex-grow-1 ms-3">
									<div class="ms-2 me-auto">
										<div class="fw-bold">Created by</div>
										{{ $page->seller_name }}
									</div>
								</div>
							</div>
						</li>
					</ul>
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
					@foreach ($relatedBlog as $blog)
					<div class="col-lg-6">
						<article>
							<figure>
								<div class="card shadow mb-5 rounded-3 no-border-card">
									<a href="{{ route('blog.detail',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
										<img src="{{ asset('blog/image/' . $blog->featured_image) }}" class="card-img-top" alt="...">
									</a>
									<figcaption>
										<div class="card-body">
											<p class="card-title lead">
												<a href="{{ route('blog.detail',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
													{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}
												</a>
												<small>{{ $blog->created_at->format('M d, Y') }}</small>
												<p class="card-text">{!! \Illuminate\Support\Str::limit($blog->short_description, 100, '...') !!}</p>
												<p class="card-text">
													<small><i>by</i> {{ $blog->seller_name }}</small><br>
													<!-- <small><i>in</i> <a href="{{ url('/' . $blog->slug) }}" target="_blank" class="link-dark">{{ $blog->category_name }}</a></small> -->
												</p>
											</p>
										</div>
										<div class="card-body">
											<div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
												<a href="{{ route('blog.detail',$blog->slug) }}" target="_self" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download HTML">Read</a>
											</div>
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