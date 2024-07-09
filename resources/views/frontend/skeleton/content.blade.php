@extends('frontend.skeleton.body') @section('custom-head')
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
</style>
@endsection @section('content')
<!-- Featured Header -->
<section>
    <div class="row featurette">
        <div class="col-md-9 mb-3">
            <h1 class="featurette-heading fw-normal lh-1">{{ \Illuminate\Support\Str::limit($setting->title, 100, '...') }}</h1>
            <p class="lead">{!! $setting->about_in_short !!}</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a class="btn btn-primary btn-lg px-4 me-md-2" href="{{ route('item.shop') }}">Explore Items</a>
                <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('blog.more') }}">Read More Blogs</a>
            </div>
        </div>
        <div class="col-md-3">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($featured_items as $item)
                    <div class="carousel-item active">
                        <div class="card mb-3 border border-0">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <div class="card" style="width: 18rem;">
                                        <a href="{{ route('item.detail', $item->slug) }}">
                                            <img src="{{ asset('ecommerce/item/image/' . $item->image) }}" class="img-fluid" alt="{{ $item->img_alt_text }}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- HR -->
<hr class="featurette-divider" />

<div class="mt-3"></div>
<!-- Categories -->
<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h2 class="display-6">Browse Categories</h2>

            <p>
                Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate
                your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.
            </p>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-secondary float-end" href="{{ route('item.shop') }}">All Categories</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3"></div>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        @foreach($categories as $category)
        <div class="card ms-3 border-0" style="width: 8rem;">
            <a href="{{ url('item/'.$category->slug) }}" class="card-link">
                <figure class="figure">
                    <img src="{{ asset('ecommerce/category/image/thumb/'.$category->thumb) }}" class="figure-img img-fluid rounded" alt="{{ $category->thumb_alt_text }}" />
                    <figcaption class="figure-caption">{{ $category->category_name }}</figcaption>
                </figure>
            </a>
        </div>
        @endforeach @foreach($subcategories as $subcategory)
        <div class="card ms-3 border-0" style="width: 8rem;">
            <a href="{{ url('item/'.$category->slug) }}" class="card-link">
                <figure class="figure">
                    <img src="{{ asset('ecommerce/category/subcategory/image/thumb/'.$subcategory->thumb) }}" class="figure-img img-fluid rounded" alt="{{ $subcategory->thumb_alt_text }}" />
                    <figcaption class="figure-caption">{{ $subcategory->subcategory_name }}</figcaption>
                </figure>
            </a>
        </div>
        @endforeach @foreach($sub_subcategories as $sub_subcategory)
        <div class="card ms-3 border-0" style="width: 8rem;">
            <a href="{{ url('item/'.$category->slug) }}" class="card-link">
                <figure class="figure">
                    <img src="{{ asset('ecommerce/category/subcategory/sub-subcategory/image/thumb/'.$sub_subcategory->thumb) }}" class="figure-img img-fluid rounded" alt="{{ $sub_subcategory->thumb_alt_text }}" />
                    <figcaption class="figure-caption">{{ $sub_subcategory->sub_subcategory_name }}</figcaption>
                </figure>
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- HR -->
<div class="mt-3 border-top border-start-0 border-bottom-0 border-end-0"></div>

<div class="mt-3"></div>

<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h3 class="display-6">Browse Featured Items</h3>

            <p>
                Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate
                your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.
            </p>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-secondary float-end" href="{{ route('item.shop') }}">All Items</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3"></div>

    <div class="row">
        @foreach($featured_items as $item)
        <div class="col-md-3">
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
                                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#confirmNow-{{ $item->uuid }}" data-sale-price="{{ $item->sale_price ?? $item->regular_price ?? 0 }}">
                                    Confirm Order
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
                                                    <input type="hidden" name="product_name" value="{{ $item->name }}">
                                                    <input type="hidden" name="product_price" value="{{ $item->sale_price ?? $item->regular_price }}">
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
                                                                <input class="form-check-input shipping-method" type="checkbox" id="insideDhaka-{{ $item->uuid }}" name="shipping_method" value="50" />
                                                                <label class="form-check-label" for="insideDhaka-{{ $item->uuid }}">Inside Dhaka (50৳)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input shipping-method" type="checkbox" id="outsideDhaka-{{ $item->uuid }}" name="shipping_method" value="100" />
                                                                <label class="form-check-label" for="outsideDhaka-{{ $item->uuid }}">Outside Dhaka (100৳)</label>
                                                            </div>
                                                        </div>
                                                        <div id="shipping-method-error" class="invalid-feedback">
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
                                                                            <img src="{{ asset('ecommerce/item/image/' . $item->image) }}" class="img-thumbnail me-2" alt="{{ $item->img_alt_text }}" style="width: 50px;" />
                                                                        </td>
                                                                        <td width="50%">
                                                                            <p class="mb-0">{{ \Illuminate\Support\Str::limit($item->name, 40, '...') }}</p>
                                                                        </td>
                                                                        <td width="25%">
                                                                            @if($item->sale_price)
                                                                            <span class="fw-bold fs-5 text-success">{{ $item->sale_price }}৳</span>/
                                                                            <span class="fw-bold text-decoration-line-through text-muted">{{ $item->regular_price }}৳</span>
                                                                            @elseif($item->regular_price)
                                                                            <span class="fw-bold fs-5 text-success">{{ $item->regular_price }}৳</span>
                                                                            @else
                                                                            <span>Free</span>
                                                                            @endif
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
                                                                            <p id="subTotal-{{ $item->uuid }}">৳ 0.00</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="75%"><label class="col-form-label">Delivery Charge</label></td>
                                                                        <td width="25%"><p id="deliveryCharge-{{ $item->uuid }}">৳ 0.00</p></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="75%"><label class="col-form-label">Total</label></td>
                                                                        <td width="25%"><p id="total-{{ $item->uuid }}">৳ 0.00</p></td>
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
                                                        <button type="submit" class="btn btn-primary">Confirm Now</button>
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
        document.querySelectorAll('[id^="confirmNow-"]').forEach(function (modalElement) {
            modalElement.addEventListener('show.bs.modal', function (event) {
                let modalId = modalElement.id.split('-')[1];
                let quantityInput = document.querySelector(`#quantity-${modalId}`);
                let insideDhakaCheckbox = document.querySelector(`#insideDhaka-${modalId}`);
                let outsideDhakaCheckbox = document.querySelector(`#outsideDhaka-${modalId}`);
                let subTotalElement = document.querySelector(`#subTotal-${modalId}`);
                let deliveryChargeElement = document.querySelector(`#deliveryCharge-${modalId}`);
                let totalElement = document.querySelector(`#total-${modalId}`);
                let hiddenSubTotalInput = document.querySelector(`#hiddenSubTotal-${modalId}`);
                let hiddenDeliveryChargeInput = document.querySelector(`#hiddenDeliveryCharge-${modalId}`);
                let hiddenTotalInput = document.querySelector(`#hiddenTotal-${modalId}`);
                let salePrice = parseFloat(event.relatedTarget.getAttribute('data-sale-price'));

                function calculateTotal() {
                    let quantity = parseInt(quantityInput.value);
                    let deliveryCharge = 0;
                    if (insideDhakaCheckbox.checked) {
                        deliveryCharge = parseInt(insideDhakaCheckbox.value);
                    }
                    if (outsideDhakaCheckbox.checked) {
                        deliveryCharge = parseInt(outsideDhakaCheckbox.value);
                    }
                    let subTotal = salePrice * quantity;
                    let total = subTotal + deliveryCharge;

                    // Update the displayed values
                    subTotalElement.textContent = `৳ ${subTotal.toFixed(2)}`;
                    deliveryChargeElement.textContent = `৳ ${deliveryCharge.toFixed(2)}`;
                    totalElement.textContent = `৳ ${total.toFixed(2)}`;

                    // Update the hidden input values
                    hiddenSubTotalInput.value = subTotal.toFixed(2);
                    hiddenDeliveryChargeInput.value = deliveryCharge.toFixed(2);
                    hiddenTotalInput.value = total.toFixed(2);
                }

                quantityInput.addEventListener('input', calculateTotal);
                insideDhakaCheckbox.addEventListener('change', calculateTotal);
                outsideDhakaCheckbox.addEventListener('change', calculateTotal);

                // Check at least one checkbox is selected before form submission
                document.querySelector(`#orderForm-${modalId}`).addEventListener('submit', function (event) {
                    if (!insideDhakaCheckbox.checked && !outsideDhakaCheckbox.checked) {
                        event.preventDefault(); // Prevent form submission
                        alert('Please select a shipping method.'); // Show an alert or handle validation message
                    }
                });

                calculateTotal();
            });
        });
    });
</script>
@endsection @endsection
