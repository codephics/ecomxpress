@extends('backend.skeleton.body')
@section('content') @section('custom-head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ecommerce.pre-order.manage') }}">Manage Pre-Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Pre-Order</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Add Pre-Order</h1>
        </div>
    </div>

    <form class="needs-validation" method="POST" action="{{ route('ecommerce.pre-order.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile" required />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="product_select" class="form-label">Product Name</label>
                            <select class="form-control" name="product_name" required>
                                <option value="">Select a product</option>
                                <option value="product1" data-price="100">Product 1 - $100</option>
                                <option value="product2" data-price="200">Product 2 - $200</option>
                                <option value="product3" data-price="300">Product 3 - $300</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="1" min="1" placeholder="Quantity" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="shipping_method" class="form-label">Shipping Method</label>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shipping_method" id="insideDhaka" value="50" required>
                                    <label class="form-check-label" for="insideDhaka">Inside Dhaka - ৳50</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shipping_method" id="outsideDhaka" value="100" required>
                                    <label class="form-check-label" for="outsideDhaka">Outside Dhaka - ৳100</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="75%">
                                                <label class="col-form-label">Sub Total</label>
                                            </td>
                                            <td width="25%">
                                                <p id="subTotal">৳ 0.00</p>
                                            </td>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" name="note"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="order_link" class="form-label">Order Link</label>
                            <input type="text" class="form-control" placeholder="Order Link" disabled />
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupStatus">Status</label>
                            <select class="form-select" id="inputGroupStatus" name="status">
                                <option value="1">Pending</option>
                                <option value="2">Confirmed</option>
                                <option value="3">Delivered</option>
                                <option value="4">Received</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="custom-textarea" name="comment" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </form>
</main>

@section('custom-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('#product_select').selectpicker();

        function calculateTotal() {
            var productPrice = parseFloat($('#product_select option:selected').data('price')) || 0;
            var quantity = parseInt($('input[name="quantity"]').val()) || 1;
            var shippingCharge = parseFloat($('input[name="shippingMethod"]:checked').val()) || 0;

            var subTotal = productPrice * quantity;
            var total = subTotal + shippingCharge;

            $('#subTotal').text('৳ ' + subTotal.toFixed(2));
            $('#deliveryCharge').text('৳ ' + shippingCharge.toFixed(2));
            $('#total').text('৳ ' + total.toFixed(2));
        }

        $('#product_select, input[name="quantity"], input[name="shippingMethod"]').on('change', calculateTotal);
    });
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
</script>
@endsection

@endsection