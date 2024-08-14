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
							@php
					            $count = $items->count();
					            $colClass = 'col-md-12';
					            if ($count == 2) {
					                $colClass = 'col-md-6';
					            } elseif ($count == 3) {
					                $colClass = 'col-md-4';
					            } elseif ($count == 4) {
					                $colClass = 'col-md-3';
					            }
					        @endphp
					        @foreach($items as $item)
					        <div class="{{ $colClass }}">
					            <article>
					                <figure>
					                    <div class="card">
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
					                                <li class="list-group-item">
					                                    <small>
					                                        @if($item->sale_price)
					                                        <span class="fw-bold fs-5 text-success">{{ $item->sale_price }}৳</span>/
					                                        <span class="fw-bold text-decoration-line-through text-muted">{{ $item->regular_price }}৳</span>
					                                        @elseif($item->regular_price)
					                                        <span class="fw-bold fs-5 text-success">{{ $item->regular_price }}৳</span>
					                                        @else
					                                        <span>Free</span>
					                                        @endif
					                                    </small>
					                                </li>
					                            </ul>
					                            <div class="card-body">
					                                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#confirmNow-{{ $item->uuid }}" data-sale-price="{{ $item->sale_price ?? $item->regular_price ?? 0 }}" data-item-name="{{ $item->name }}" data-item-image="{{ asset('ecommerce/item/image/' . $item->image) }}">
					                                    Pre Order
					                                </button>
					                                <div class="modal fade" id="confirmNow-{{ $item->uuid }}" tabindex="-1" aria-labelledby="confirmNowLabel-{{ $item->uuid }}" aria-hidden="true">
					                                    <div class="modal-dialog">
					                                        <div class="modal-content">
					                                            <div class="modal-header">
					                                                <span class="modal-title fs-5" id="confirmNowLabel-{{ $item->uuid }}">Confirm Now</span>
					                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					                                            </div>
					                                            <div class="modal-body">
					                                                <form class="needs-validation" id="orderForm-{{ $item->uuid }}" method="POST" action="{{ route('ecommerce.pre-order.confirm') }}">
					                                                    @csrf
					                                                    <input type="hidden" name="product_name" id="hiddenItemName-{{ $item->uuid }}">
					                                                    <input type="hidden" name="product_price" id="hiddenItemPrice-{{ $item->uuid }}">
					                                                    <input type="hidden" name="sub_total" id="hiddenSubTotal-{{ $item->uuid }}">
					                                                    <input type="hidden" name="delivery_charge" id="hiddenDeliveryCharge-{{ $item->uuid }}">
					                                                    <input type="hidden" name="total" id="hiddenTotal-{{ $item->uuid }}">
					                                                    <div class="mb-3">
					                                                        <label for="name-{{ $item->uuid }}" class="col-form-label">Name: <span class="text-danger">*</span></label>
					                                                        <input type="text" class="form-control" name="name" id="name-{{ $item->uuid }}" placeholder="Name" required />
					                                                        <div class="invalid-feedback">
					                                                            Valid Name is required.
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <label for="email-{{ $item->uuid }}" class="col-form-label">Email (optional):</label>
					                                                        <input type="email" class="form-control" name="email" id="email-{{ $item->uuid }}" placeholder="Email (optional)" />
					                                                        <div class="invalid-feedback">
					                                                            Please enter a valid email address.
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <label for="mobile-{{ $item->uuid }}" class="col-form-label">Mobile: <span class="text-danger">*</span></label>
					                                                        <input type="text" class="form-control" name="mobile" id="mobile-{{ $item->uuid }}" placeholder="Mobile" required />
					                                                        <div class="invalid-feedback">
					                                                            Please enter a valid mobile number.
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <label for="address-{{ $item->uuid }}" class="col-form-label">Address:</label>
					                                                        <textarea class="form-control" name="address" id="address-{{ $item->uuid }}" placeholder="address"></textarea>
					                                                        <div class="invalid-feedback">
					                                                            Please enter address.
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <label for="quantity-{{ $item->uuid }}" class="col-form-label">Quantity: <span class="text-danger">*</span></label>
					                                                        <input type="number" class="form-control" id="quantity-{{ $item->uuid }}" name="quantity" value="1" min="1" placeholder="Quantity" required />
					                                                        <div class="invalid-feedback">
					                                                            Please enter a valid quantity.
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <label class="col-form-label">Shipping Method</label>
					                                                        <div>
					                                                            <div class="form-check">
					                                                                <input class="form-check-input shipping-method" type="radio" id="insideDhaka-{{ $item->uuid }}" name="shipping_method" value="50" />
					                                                                <label class="form-check-label" for="insideDhaka-{{ $item->uuid }}">Inside Dhaka (50৳)</label>
					                                                            </div>
					                                                            <div class="form-check">
					                                                                <input class="form-check-input shipping-method" type="radio" id="outsideDhaka-{{ $item->uuid }}" name="shipping_method" value="100" />
					                                                                <label class="form-check-label" for="outsideDhaka-{{ $item->uuid }}">Outside Dhaka (100৳)</label>
					                                                            </div>
					                                                        </div>
					                                                        <div id="shipping-method-error-{{ $item->uuid }}" class="invalid-feedback">
					                                                            Please select a shipping method.
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <label class="col-form-label">Product</label>
					                                                        <div class="d-flex align-items-center">
					                                                            <div></div>
					                                                        </div>
					                                                        <div class="table-responsive">
					                                                            <table class="table">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td width="25%">
					                                                                            <img src="{{ asset('ecommerce/item/image/' . $item->image) }}" id="modal-image-{{ $item->uuid }}" class="img-thumbnail me-2" alt="{{ $item->img_alt_text }}" style="width: 50px;" />
					                                                                        </td>
					                                                                        <td width="50%">
					                                                                            <p id="modal-name-{{ $item->uuid }}" class="mb-0">{{ \Illuminate\Support\Str::limit($item->name, 40, '...') }}</p>
					                                                                        </td>
					                                                                        <td width="25%">
					                                                                            <span id="modal-price-{{ $item->uuid }}" class="mb-0">{{ $item->sale_price ?? $item->regular_price }}৳</span>
					                                                                        </td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <div class="table-responsive">
					                                                            <table class="table">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td width="75%">
					                                                                            <label class="col-form-label">Sub Total</label>
					                                                                        </td>
					                                                                        <td width="25%">
					                                                                            <div id="modal-subtotal-{{ $item->uuid }}">0৳</div>
					                                                                        </td>
					                                                                    </tr>
					                                                                    <tr>
					                                                                        <td width="75%"><label class="col-form-label">Delivery Charge</label></td>
					                                                                        <td width="25%"><div id="modal-delivery-charge-{{ $item->uuid }}">0৳</div></td>
					                                                                    </tr>
					                                                                    <tr>
					                                                                        <td width="75%"><label class="col-form-label">Total</label></td>
					                                                                        <td width="25%"><div id="modal-total-{{ $item->uuid }}">0৳</div></td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                        </div>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <label for="orderNote-{{ $item->uuid }}" class="col-form-label">Order Note (optional):</label>
					                                                        <textarea class="form-control" id="orderNote-{{ $item->uuid }}" name="order_note" placeholder="Order Note (optional)"></textarea>
					                                                    </div>
					                                                    <div class="mb-3">
					                                                        <span>
					                                                            <font color="red"><b>Delivery charges may vary based on weight. Consequently, the total amount may change. We will notify you of the final total charge.</b></font>
					                                                        </span>
					                                                    </div>
					                                                    <div class="modal-footer">
					                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					                                                        <button type="submit" class="btn btn-primary">Confirm Order</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('button[data-bs-toggle="modal"]').forEach(function (button) {
            button.addEventListener('click', function () {
                var targetModalId = this.getAttribute('data-bs-target');
                var modal = document.querySelector(targetModalId);

                var itemPrice = this.getAttribute('data-sale-price');
                var itemName = this.getAttribute('data-item-name');
                var itemImage = this.getAttribute('data-item-image');

                var modalName = modal.querySelector('[id^="modal-name-"]');
                var modalImage = modal.querySelector('[id^="modal-image-"]');
                var modalPrice = modal.querySelector('[id^="modal-price-"]');
                var modalSubtotal = modal.querySelector('[id^="modal-subtotal-"]');
                var modalDeliveryCharge = modal.querySelector('[id^="modal-delivery-charge-"]');
                var modalTotal = modal.querySelector('[id^="modal-total-"]');

                modalName.textContent = itemName;
                modalImage.setAttribute('src', itemImage);
                modalPrice.textContent = itemPrice + '৳';
                modalSubtotal.textContent = itemPrice + '৳';
                modalDeliveryCharge.textContent = '0৳';
                modalTotal.textContent = itemPrice + '৳';

                var quantityInput = modal.querySelector('input[name="quantity"]');
                var deliveryChargeInputs = modal.querySelectorAll('.shipping-method');

                quantityInput.addEventListener('input', updateTotals);
                deliveryChargeInputs.forEach(function (input) {
                    input.addEventListener('change', updateTotals);
                });

                function updateTotals() {
                    var quantity = quantityInput.value;
                    var itemSubtotal = quantity * itemPrice;
                    var deliveryCharge = 0;

                    deliveryChargeInputs.forEach(function (input) {
                        if (input.checked) {
                            deliveryCharge = parseInt(input.value, 10);
                        }
                    });

                    var total = itemSubtotal + deliveryCharge;

                    modalSubtotal.textContent = itemSubtotal + '৳';
                    modalDeliveryCharge.textContent = deliveryCharge + '৳';
                    modalTotal.textContent = total + '৳';

                    modal.querySelector('[id^="hiddenItemName-"]').value = itemName;
                    modal.querySelector('[id^="hiddenItemPrice-"]').value = itemPrice;
                    modal.querySelector('[id^="hiddenSubTotal-"]').value = itemSubtotal;
                    modal.querySelector('[id^="hiddenDeliveryCharge-"]').value = deliveryCharge;
                    modal.querySelector('[id^="hiddenTotal-"]').value = total;
                }

                modal.addEventListener('hidden.bs.modal', function () {
                    quantityInput.removeEventListener('input', updateTotals);
                    deliveryChargeInputs.forEach(function (input) {
                        input.removeEventListener('change', updateTotals);
                    });
                });
            });
        });
    });
</script>
@endsection @endsection