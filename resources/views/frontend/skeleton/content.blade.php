@extends('frontend.skeleton.body') @section('content')

<!-- Featured Header -->
<section>
    <div class="row featurette">
        <div class="col-md-8 mb-3">
            <h1 class="featurette-heading fw-normal lh-1">{{ \Illuminate\Support\Str::limit($page->title, 100, '...') }}</h1>
            <p class="lead">{!! $page->short_description !!}</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a class="btn btn-primary btn-lg px-4 me-md-2" href="{{ route('item.shop') }}">Explore Items</a>
                <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('blog.more') }}">Read Blogs</a>
            </div>
        </div>
        <div class="col-md-4">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach($sliders as $slider)
                    <div class="carousel-item active">
                        <a href="{{ $slider->button_link_1 }}">
                            <img src="{{ asset('global/slider/image/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->image_alt_text }}" />
                        </a>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->heading }}</h5>
                            <p>{{ $slider->subheading }}</p>
                            <p>{!! $slider->detail !!}</p>
                            <div>
                                @if($slider->button_text_1)
                                <a class="btn btn-primary btn-sm px-4 me-md-2" href="{{ $slider->button_link_1 }}">{{ $slider->button_text_1 }}</a>
                                @endif
                                @if($slider->button_text_2)
                                <a class="btn btn-outline-secondary btn-sm px-4" href="{{ $slider->button_link_2 }}">{{ $slider->button_text_2 }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- HR -->
<div class="mt-3 border-top border-start-0 border-bottom-0 border-end-0"></div>

<div class="mt-3"></div>
<!-- Featured Items -->
<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h3 class="display-6">Browse Featured Items</h3>
            <p>
                Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.
            </p>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-outline-secondary float-end" href="{{ route('item.shop') }}">All Items</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3"></div>

    <div class="row">
        @php
            $count = $featured_items->count();
            $colClass = 'col-md-12';
            if ($count == 2) {
                $colClass = 'col-md-6';
            } elseif ($count == 3) {
                $colClass = 'col-md-4';
            } elseif ($count == 4) {
                $colClass = 'col-md-3';
            }
        @endphp
        @foreach($featured_items as $item)
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

</section>
<!-- End Featured Item -->


<!-- HR -->
<hr class="featurette-divider" />

<div class="mt-3"></div>
<!-- Categories -->
<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h2 class="display-6">Categories</h2>

            <p>
                Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate
                your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.
            </p>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-outline-secondary float-end" href="{{ route('item.shop') }}">All Categories</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3"></div>

    <div class="row">
        @php
            // Combine all categories into a single collection
            $combinedItems = $categories->concat($subcategories)->concat($sub_subcategories);
            $count = $combinedItems->count();

            // Determine column class based on the count
            $colClass = 'col-md-12'; // Default for one item
            if ($count == 2) {
                $colClass = 'col-md-6';
            } elseif ($count == 3) {
                $colClass = 'col-md-4';
            } elseif ($count == 4) {
                $colClass = 'col-md-3';
            }
        @endphp

        @foreach($categories as $category)
        <div class="{{ $colClass }}">
            <div class="card ms-3 border-0">
                <a href="{{ url('shop/'.$category->slug) }}" class="card-link">
                    <figure class="figure">
                        <img src="{{ asset('ecommerce/category/image/thumb/'.$category->thumb) }}" class="figure-img img-fluid rounded" alt="{{ $category->thumb_alt_text }}" />
                        <figcaption class="figure-caption">{{ $category->category_name }}</figcaption>
                    </figure>
                </a>
            </div>
        </div>
        @endforeach

        @foreach($subcategories as $subcategory)
        <div class="{{ $colClass }}">
            <div class="card ms-3 border-0">
                <a href="{{ url('shop',['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}" class="card-link">
                    <figure class="figure">
                        <img src="{{ asset('ecommerce/category/subcategory/image/thumb/'.$subcategory->thumb) }}" class="figure-img img-fluid rounded" alt="{{ $subcategory->thumb_alt_text }}" />
                        <figcaption class="figure-caption">{{ $subcategory->subcategory_name }}</figcaption>
                    </figure>
                </a>
            </div>
        </div>
        @endforeach

        @foreach($sub_subcategories as $sub_subcategory)
        <div class="{{ $colClass }}">
            <div class="card ms-3 border-0">
                <a href="{{ url('shop',['category' => $category->slug, 'subcategory' => $subcategory->slug, 'sub-subcategory' => $sub_subcategory->slug]) }}" class="card-link">
                    <figure class="figure">
                        <img src="{{ asset('ecommerce/category/subcategory/sub-subcategory/image/thumb/'.$sub_subcategory->thumb) }}" class="figure-img img-fluid rounded" alt="{{ $sub_subcategory->thumb_alt_text }}" />
                        <figcaption class="figure-caption">{{ $sub_subcategory->sub_subcategory_name }}</figcaption>
                    </figure>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- End Categories -->
<!-- HR -->
<div class="mt-3 border-top border-start-0 border-bottom-0 border-end-0"></div>

<div class="mt-3"></div>

<!-- Related Blogs -->
<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h4 class="display-6">Unlocking Knowledge on our Blog</h4>

            <p>
                Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate
                your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.
            </p>
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
        @php
            $count = $featured_blogs->count();
            $blogColClass = 'col-md-12';
            if ($count == 2) {
                $blogColClass = 'col-md-6';
            } elseif ($count == 3) {
                $blogColClass = 'col-md-4';
            } elseif ($count == 4) {
                $blogColClass = 'col-md-3';
            }
        @endphp
        @foreach($featured_blogs as $blog)
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
</section>
<!-- End Related Blogs -->

<section>
    <aside>
        <div class="row">
            <div class="col-12">
                <p class="text-center">Have questions or suggestions? <a href="{{ route('contact-us') }}">Contact Us</a></p>
            </div>
        </div>
    </aside>
</section>

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
