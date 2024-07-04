@extends('backend.skeleton.body')
@section('content') @section('custom-head')
<script src="https://cdn.tiny.cloud/1/m9g2pjluv64jkrzcnksdf4ur6nd9lvyrbatcjua3iazeof63/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ecommerce.pre-order.manage') }}">Manage Pre-Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Pre-Order</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Update Pre-Order</h1>
        </div>
    </div>

    <form class="needs-validation" method="POST" action="{{ route('ecommerce.pre-order.update',$preOrder->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $preOrder->name }}" placeholder="Name" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $preOrder->email }}" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{ $preOrder->mobile }}" placeholder="Mobile" required />
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
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address">{{ $preOrder->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="order_note" class="form-label">Order Note</label>
                            <textarea class="form-control" name="order_note">{{ $preOrder->order_note }}</textarea>
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
                                <label class="input-group-text" for="inputGroupStatus">Order Status</label>
                                <select class="form-select" id="inputGroupStatus" name="status">
                                    @if($preOrder->status == 1)
                                    <option value="1">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="3">Delivered</option>
                                    <option value="4">Recieved</option>
                                    @elseif($preOrder->status == NULL)
                                    <option value="1">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="3">Delivered</option>
                                    <option value="4">Recieved</option>
                                    @elseif($preOrder->status == 2)
                                    <option value="2">Confirmed</option>
                                    <option value="1">Pending</option>
                                    <option value="3">Delivered</option>
                                    <option value="4">Recieved</option>
                                    @elseif($preOrder->status == 3)
                                    <option value="3">Delivered</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="4">Recieved</option>
                                    @else
                                    <option value="4">Recieved</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="3">Delivered</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="custom-textarea" name="comment" rows="3">{{ $preOrder->comment }}</textarea>
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
<script>
    tinymce.init({
        selector: '#custom-textarea',
        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
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
@endsection @endsection