@extends('frontend.skeleton.body') 
@section('')
<style>
    .desktop-view {
        width: 800px; /* Fixed width to simulate desktop view */
        margin: 0 auto; /* Center the content */
    }
</style>
@endsection
@section('content')

<!-- Breadcrumb -->
<section>
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- End Breadcrumb -->

<section id="contentToDownload">
    <div class="row">
        <div class="container my-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Pre-Order Invoice</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-9 text-start">
                            <h5>From:</h5>
                            <address id="fromAddress">
                                <strong>{{ $setting->title }}</strong><br>
                                {{ $setting->address }}<br>
                                Email: {{ $setting->email }}<br>
                                Mobile: {{ $setting->mobile }}
                            </address>
                        </div>
                        <div class="col-sm-3">
                            <h5>To:</h5>
                            <address id="toAddress">
                                <strong>{{ $page->name }}</strong><br>
                                {{ $page->address }}<br>
                                Email: {{ $page->email }}<br>
                                Mobile: {{ $page->mobile }}
                            </address>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6 text-start">
                            <h5>Invoice Date:</h5>
                            <span id="invoiceDate">{{ $page->created_at->format('d-m-Y') }}</span>
                        </div>
                    </div>
                    <div class="table-responsive mb-3">
                        <table id="invoiceTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $page->product_name }}</td>
                                    <td class="text-end">{{ $page->quantity }}</td>
                                    <td class="text-end">{{ $page->product_price }}</td>
                                    <td class="text-end">{{ $page->sub_total }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Subtotal</strong></td>
                                    <td id="subtotalValue" class="text-end">{{ $page->sub_total }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Delivery Charge</strong></td>
                                    <td id="deliveryChargeValue" class="text-end">{{ $page->delivery_charge }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                                    <td id="totalValue" class="text-end"><strong>{{ $page->total }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 mb-3">
                        <h6>Order Note</h6>
                        <span id="orderNote">{{ $page->order_note }}</span>
                    </div>
                    <div class="mb-5">
                        <p>Invoice # <span id="UUID">{{ $page->uuid }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 text-center">
                <button id="downloadBtn" class="btn btn-primary">Download PDF</button>
            </div>
        </div>
    </div>
</section>

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    document.getElementById('downloadBtn').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('p', 'pt', 'a4');
        const section = document.getElementById('contentToDownload');

        // Apply the desktop view class
        section.classList.add('desktop-view');

        html2canvas(section).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const imgProps = doc.getImageProperties(imgData);
            const pdfWidth = doc.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            doc.save('pre-order-invoice.pdf');

            // Remove the desktop view class
            section.classList.remove('desktop-view');
        }).catch(error => {
            console.error('Error capturing canvas:', error);
        });
    });
</script>
@endsection @endsection
