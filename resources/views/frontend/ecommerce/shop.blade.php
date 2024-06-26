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
                        <img src="{{ asset('ecommerce/category/image/cover/' . $page->cover) }}" class="card-img-top" alt="{{ $page->cover_alt_text }}">
                    </div>
                    <div class="mb-3">
	                    <nav aria-label="breadcrumb">
						    <ol class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
	                            <li class="breadcrumb-item"><a href="{{ route('item.shop') }}">Shop</a></li>
						        @foreach ($breadcrumbs as $breadcrumb)
						            <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
						        @endforeach
						    </ol>
						</nav>
                    </div>
                    <div class="mb-3">
                    	<!-- <img src="{{ asset('global/page/image/cover/' . $page->cover) }}" class="img-fluid mb-3" alt="{{ $page->cover_alt_text }}"> -->
                        <h1 class="fs-3">{{ $page->title }}</h1>
						<p>{!! $page->short_description !!}</p>
						<div class="row">
							@foreach ($items as $item)
							<div class="col-md-4">
								<article>
					                <figure>
					                    <div class="card" style="width: 18rem;">
					                        <a href="{{ route('item.detail', $item->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
					                            <img src="{{ asset('ecommerce/item/image/' . $item->image) }}" class="card-img-top" alt="{{ $item->img_alt_text }}" />
					                        </a>

					                        <figcaption>
					                          <div class="card-body">
					                          	<a href="{{ route('item.detail', $item->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
					                          		<h5 class="card-title">{{ \Illuminate\Support\Str::limit($item->name, 40, '...') }}</h5>
					                          	</a>
					                          </div>
					                          <ul class="list-group list-group-flush">
					                            <li class="list-group-item">
					                                <small>
					                                    @if ($item->category_name) @if ($item->category)
					                                    <a href="{{ route('category.show', ['category' => $item->category->slug]) }}" class="link-dark">
					                                        {{ $item->category_name }}
					                                    </a>
					                                    @endif @elseif ($item->subcategory_name) @if ($item->subcategory)
					                                    <a
					                                        href="{{ route('subcategory.show', [
					                                                        'category' => $item->subcategory->category->slug,
					                                                        'subcategory' => $item->subcategory->slug,
					                                                    ]) }}"
					                                        class="link-dark"
					                                    >
					                                        {{ $item->subcategory_name }}
					                                    </a>
					                                    @endif @elseif ($item->sub_subcategory_name) @if ($item->sub_subcategory)
					                                    <a
					                                        href="{{ route('subSubcategory.show', [
					                                                        'category' => $item->subcategory->category->slug,
					                                                        'subcategory' => $item->subcategory->slug,
					                                                        'subSubcategory' => $item->sub_subcategory->slug,
					                                                    ]) }}"
					                                        class="link-dark"
					                                    >
					                                        {{ $item->sub_subcategory_name }}
					                                    </a>
					                                    @endif @endif
					                                </small>
					                            </li>
					                            <li class="list-group-item">
					                                <small>
					                                    @if($item->sale_price)

					                                    <span class="fw-bold fs-5 text-success">৳ {{ $item->sale_price }}</span> | <span class="fw-bold text-decoration-line-through text-muted">৳ {{ $item->regular_price }}</span>

					                                    @elseif($item->regular_price)

					                                    <span class="fw-bold fs-5 text-success">৳ {{ $item->regular_price }}</span>

					                                    @else

					                                    <span>Free</span>

					                                    @endif
					                                </small>
					                            </li>
					                          </ul>
					                          <div class="card-body">
					                            <a type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#confirmNow" data-bs-whatever="@mdo">Confirm Order</a>
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