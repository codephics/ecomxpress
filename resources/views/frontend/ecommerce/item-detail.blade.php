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
		            <span class="fw-bold fs-5 text-success">৳ {{ $page->regular_price }}</span>
		            @else
		            <span>Free</span>
		            @endif
		        </small>
		        <div class="d-grid mt-3 gap-2">
		            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
		                <a type="button" class="btn btn-primary position-relative" data-bs-toggle="modal" data-bs-target="#confirmNow" data-bs-whatever="@mdo">Pre Order <i class="fa-solid fa-shopping-cart"></i></a>
		                <div class="modal fade" id="confirmNow" tabindex="-1" aria-labelledby="confirmNowLabel" aria-hidden="true">
		                    <div class="modal-dialog">
		                        <div class="modal-content">
		                            <div class="modal-header">
		                                <span class="modal-title fs-5" id="confirmNowLabel">Confirm Now</span>
		                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		                            </div>
		                            <div class="modal-body">
		                                <form class="needs-validation" method="POST" action="{{ route('ecommerce.pre-order.confirm') }}">
		                                    @csrf
		                                    <input type="hidden" name="product_name" value="{{ $page->name }}">
		                                    <input type="hidden" name="product_price" value="{{ $page->sale_price ?? $page->regular_price }}">
		                                    <input type="hidden" name="sub_total" id="hiddenSubTotal">
		                                    <input type="hidden" name="delivery_charge" id="hiddenDeliveryCharge">
		                                    <input type="hidden" name="total" id="hiddenTotal">
		                                    <div class="mb-3">
		                                        <label for="name" class="col-form-label">Name: <span class="text-danger">*</span></label>
		                                        <input type="text" class="form-control" name="name" placeholder="Name" required />
		                                        <div class="invalid-feedback">Valid Name is required.</div>
		                                    </div>
		                                    <div class="mb-3">
		                                        <label for="email" class="col-form-label">Email (optional):</label>
		                                        <input type="email" class="form-control" name="email" placeholder="Email (optional)" />
		                                        <div class="invalid-feedback">Please enter a valid email address.</div>
		                                    </div>
		                                    <div class="mb-3">
		                                        <label for="mobile" class="col-form-label">Mobile: <span class="text-danger">*</span></label>
		                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile" required />
		                                        <div class="invalid-feedback">Please enter a valid mobile number.</div>
		                                    </div>
		                                    <div class="mb-3">
		                                        <label for="address" class="col-form-label">Address:</label>
		                                        <textarea class="form-control" name="address" placeholder="address"></textarea>
		                                        <div class="invalid-feedback">Please enter address.</div>
		                                    </div>
		                                    <div class="mb-3">
		                                        <label for="quantity" class="col-form-label">Quantity: <span class="text-danger">*</span></label>
		                                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" placeholder="Quantity" required />
		                                        <div class="invalid-feedback">Please enter a valid quantity.</div>
		                                    </div>
		                                    <div class="mb-3">
		                                        <label class="col-form-label">Shipping Method</label>
		                                        <div>
		                                            <div class="form-check">
		                                                <input class="form-check-input shipping-method" type="checkbox" id="insideDhaka" name="shipping_method" value="50" />
		                                                <label class="form-check-label" for="insideDhaka">Inside Dhaka (50৳)</label>
		                                            </div>
		                                            <div class="form-check">
		                                                <input class="form-check-input shipping-method" type="checkbox" id="outsideDhaka" name="shipping_method" value="100" />
		                                                <label class="form-check-label" for="outsideDhaka">Outside Dhaka (100৳)</label>
		                                            </div>
		                                        </div>
		                                        <div id="shipping-method-error" class="invalid-feedback">Please select a shipping method.</div>
		                                    </div>
		                                    <div class="mb-3">
		                                        <div class="table-responsive">
		                                            <table class="table">
		                                                <tbody>
		                                                    <tr>
		                                                        <td width="75%"><label class="col-form-label">Sub Total</label></td>
		                                                        <td width="25%"><p id="subTotal">৳ 0.00</p></td>
		                                                    </tr>
		                                                    <tr>
		                                                        <td width="75%"><label class="col-form-label">Delivery Charge</label></td>
		                                                        <td width="25%"><p id="deliveryCharge">৳ 0.00</p></td>
		                                                    </tr>
		                                                    <tr>
		                                                        <td width="75%"><label class="col-form-label">Total</label></td>
		                                                        <td width="25%"><p id="total">৳ 0.00</p></td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>
		                                        </div>
		                                    </div>
		                                    <div class="mb-3">
		                                        <label for="orderNote" class="col-form-label">Order Note (optional):</label>
		                                        <textarea class="form-control" id="orderNote" name="order_note" placeholder="Order Note (optional)"></textarea>
		                                    </div>
		                                    <div class="mb-3">
		                                        <span><font color="red"><b>Delivery charges may vary based on weight. Consequently, the total amount may change. We will notify you of the final total charge.</b></font></span>
		                                    </div>
		                                    <div class="modal-footer">
		                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                                        <button type="submit" class="btn btn-primary">Confirm Now</button>
		                                    </div>
		                                </form>
		                            </div>
		                        </div>
		                    </div>
		                </div>
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
		            @if($page->change_log)
		            <li class="nav-item" role="presentation">
		                <button class="nav-link mb-3" id="pills-changelog-tab" data-bs-toggle="pill" data-bs-target="#pills-changelog" type="button" role="tab" aria-controls="pills-changelog" aria-selected="true">
		                    Change Log
		                </button>
		            </li>
		            @endif
		        </ul>
		        <div class="tab-content" id="pills-tabContent">
		            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
		                {!! $page->long_description !!}
		            </div>
		            <div class="tab-pane fade show" id="pills-changelog" role="tabpanel" aria-labelledby="pills-changelog-tab">
		                {!! $page->change_log !!}
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
								<a type="button" class="btn btn-outline-secondary float-end" href="{{ route('blog') }}">Read Blog</a>
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
	                        <a href="{{ route('blog',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
	                            <img src="{{ asset('global/weblog/image/featured/' . $blog->featured_image) }}" class="card-img-top" alt="...">
	                        </a>
	                        <figcaption>
	                            <div class="card-body">
	                                <ul class="d-flex list-unstyled mt-auto">
	                                  <li class="me-auto">
	                                    <a href="{{ route('blog',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</a>
	                                    <small>{{ $blog->created_at->format('M d, Y') }}</small>
	                                  </li>
	                                  <li class="d-flex align-items-center">
	                                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
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
		

@section('custom-scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form'); // Change this to the correct form selector
    const shippingMethods = document.querySelectorAll('.shipping-method');
    const errorDiv = document.getElementById('shipping-method-error');

    form.addEventListener('submit', function(event) {
        let oneChecked = false;
        shippingMethods.forEach(function(method) {
            if (method.checked) {
                oneChecked = true;
            }
        });

        if (!oneChecked) {
            event.preventDefault();
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none';
        }
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
	    const quantityInput = document.getElementById('quantity');
	    const shippingMethods = document.querySelectorAll('.shipping-method');
	    const subTotalElement = document.getElementById('subTotal');
	    const deliveryChargeElement = document.getElementById('deliveryCharge');
	    const totalElement = document.getElementById('total');
	    const hiddenSubTotal = document.getElementById('hiddenSubTotal');
	    const hiddenDeliveryCharge = document.getElementById('hiddenDeliveryCharge');
	    const hiddenTotal = document.getElementById('hiddenTotal');

	    const productPrice = {{ $page->sale_price ?? $page->regular_price ?? 0 }};

	    function updateTotals() {
	        const quantity = parseInt(quantityInput.value) || 1;
	        const deliveryCharge = Array.from(shippingMethods).find(method => method.checked)?.value || 0;

	        const subTotal = productPrice * quantity;
	        const total = subTotal + parseFloat(deliveryCharge);

	        subTotalElement.textContent = `৳ ${subTotal.toFixed(2)}`;
	        deliveryChargeElement.textContent = `৳ ${parseFloat(deliveryCharge).toFixed(2)}`;
	        totalElement.textContent = `৳ ${total.toFixed(2)}`;

	        hiddenSubTotal.value = subTotal.toFixed(2);
	        hiddenDeliveryCharge.value = parseFloat(deliveryCharge).toFixed(2);
	        hiddenTotal.value = total.toFixed(2);
	    }

	    quantityInput.addEventListener('input', updateTotals);
	    shippingMethods.forEach(method => method.addEventListener('change', () => {
	        shippingMethods.forEach(otherMethod => otherMethod.checked = false);
	        method.checked = true;
	        updateTotals();
	    }));

	    updateTotals();
	});

</script>
@endsection @endsection
