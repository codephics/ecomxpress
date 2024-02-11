@extends('frontend.skeleton.body')

@section('custom-head')
<style>
    .custom-margin {
        margin-left: 3rem;
    }
</style>
@endsection

@section('content')
        <!-- Breadcrumb -->
        <section>
            <div class="row">
                <div class="col-12">
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->

        <div class="row">
            <!-- Categories -->
            <!-- Left Side (Hidden on Mobile) -->
            <div class="col-md-3 d-md-block d-none">
                <div class="left-side">
                    <!-- Additional sections under left side -->
                    <div class="mb-3">
                        <p class="fs-3">All Categories</p>
                        <!-- Collapsible Navbar -->
	                    @foreach($categories as $category)
						    <nav class="navbar navbar-expand-md">
						        <div class="collapse navbar-collapse" id="navbarCategories">
						            <ul class="navbar-nav">
						                <li class="nav-item">
						                    @if($category->subcategories && $category->subcategories->count() > 0)
						                        <a class="nav-link" data-bs-toggle="collapse" href="#mainCategory{{ $category->id }}" role="button" aria-expanded="false" aria-controls="mainCategory{{ $category->id }}">{{ $category->category_name }}</a>
						                        <div class="collapse" id="mainCategory{{ $category->id }}">
						                            <ul class="navbar-nav flex-column">
						                                @foreach($category->subcategories as $subcategory)
						                                    <li class="nav-item">
						                                        @if($subcategory->subSubcategories && $subcategory->subSubcategories->count() > 0)
						                                            <a class="nav-link ms-3" data-bs-toggle="collapse" href="#subcategory{{ $subcategory->id }}" role="button" aria-expanded="false" aria-controls="subcategory{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</a>
						                                            <div class="collapse" id="subcategory{{ $subcategory->id }}">
						                                                <ul class="navbar-nav flex-column">
						                                                    @foreach($subcategory->subSubcategories as $subSubcategory)
						                                                        <li class="nav-item">
						                                                            <a class="nav-link custom-margin" href="{{ route('subSubcategory.show', ['category' => $category->slug, 'subcategory' => $subcategory->slug, 'subSubcategory' => $subSubcategory->slug]) }}">{{ $subSubcategory->sub_subcategory_name }}</a>
						                                                        </li>
						                                                    @endforeach
						                                                </ul>
						                                            </div>
						                                        @else
						                                            <a class="nav-link ms-3" href="{{ route('subcategory.show', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}">{{ $subcategory->subcategory_name }}</a>
						                                        @endif
						                                    </li>
						                                @endforeach
						                            </ul>
						                        </div>
						                    @else
						                        <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->category_name }}</a>
						                    @endif
						                </li>
						            </ul>
						        </div>
						    </nav>
						@endforeach
                    </div>
                </div>
            </div>
            <!-- End Categories -->
            <!-- Solutions -->
            <!-- Right Side (Always Shown) -->
            <div class="col-md-9">
                <div class="right-side">
                    <!-- Additional sections under right side -->
                    <div class="mb-3">
                    	<img src="{{ asset('item/image/category/cover/' . $page->cover) }}" class="card-img-top" alt="{{ $page->cover_alt_text }}">
                    </div>
                    <div class="mb-3">
	                    <nav aria-label="breadcrumb">
						    <ol class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
	                            <li class="breadcrumb-item"><a href="{{ route('store') }}">Store</a></li>
						        @foreach ($breadcrumbs as $breadcrumb)
						            <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
						        @endforeach
						    </ol>
						</nav>
                    </div>
                    <div class="mb-3">
                        <h1 class="fs-3">{{ $page->title }}</h1>
						<p>{!! $page->description !!}</p>
						<div class="row">
							@foreach ($items as $item)
							<div class="col-md-6">
								<article>
									<figure>
										<div class="card shadow mb-5 rounded-3 no-border-card">
											<a href="{{ route('item.detail', $item->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
												<img src="{{ asset('item/image/' . $item->image) }}" class="card-img-top" alt="...">
											</a>
											<figcaption>
												<div class="card-body">	
													<ul class="d-flex list-unstyled mt-auto">
										              <li class="me-auto">
										                <a href="{{ route('item.detail', $item->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">{{ \Illuminate\Support\Str::limit($item->name, 100, '...') }}</a>
										              </li>
										              <li class="d-flex align-items-center">
										                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
										                <small>
										                	@if($item->sale_price)

															<span class="fw-bold fs-5 text-success">৳ {{ $item->sale_price }}</span> | <span class="list-group-item fw-bold text-decoration-line-through text-muted">৳ {{ $item->regular_price }}</span>

															@elseif($item->regular_price)

															<span class="fw-bold fs-5 text-success">৳ {{ $item->regular_price }}</span>

															@else

															<span>Free</span>

															@endif
										                </small>
										              </li>
										            </ul>
										            <ul class="d-flex list-unstyled mt-auto">
										              <li class="me-auto">
										                <small>
															@if ($item->category_name)
															    @if ($item->category)
															        <a href="{{ route('category.show', ['category' => $item->category->slug]) }}" class="link-dark">
															            {{ $item->category_name }}
															        </a>
															    @endif
															@elseif ($item->subcategory_name)
															    @if ($item->subcategory)
															        <a href="{{ route('subcategory.show', [
															                        'category' => $item->subcategory->category->slug,
															                        'subcategory' => $item->subcategory->slug,
															                    ]) }}" class="link-dark">
															            {{ $item->subcategory_name }}
															        </a>
															    @endif
															@elseif ($item->sub_subcategory_name)
															    @if ($item->sub_subcategory)
															        <a href="{{ route('subSubcategory.show', [
															                        'category' => $item->subcategory->category->slug,
															                        'subcategory' => $item->subcategory->slug,
															                        'subSubcategory' => $item->sub_subcategory->slug,
															                    ]) }}" class="link-dark">
															            {{ $item->sub_subcategory_name }}
															        </a>
															    @endif
															@endif
												        </small>
										              </li>
										              <li class="d-flex align-items-center">
										                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
										                <small>{{ $item->seller_name }}</small>
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
                    </div>
                </div>
            </div>
            <!-- End Solutions -->
        </div>

        <!-- Questions or Suggestions -->
        <section>
            <div class="row">
                <div class="col-12">
                    <p class="text-center mt-3">Have questions or suggestions? <a href="{{ route('contact-us') }}">Contact Us</a></p>
                </div>
            </div>
        </section>
        <!-- End Questions or Suggestions -->
		
		@endsection