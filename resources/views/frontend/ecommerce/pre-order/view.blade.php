@extends('frontend.skeleton.body') @section('content')

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

    <section>
        <div class="row">
            <div class="container my-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Pre-Order Invoice</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6 text-start">
                                <h5>From:</h5>
                                <address id="fromAddress">
                                    <strong>{{ $setting->title }}</strong><br>
                                    {{ $setting->address }}<br>
                                    Email: {{ $setting->email }}<br>
                                    Mobile: {{ $setting->mobile }}
                                </address>
                            </div>
                            <div class="col-sm-6 text-end">
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
                        <div class="mb-3 text-center">
                            <button id="downloadBtn" class="btn btn-primary">Download PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@section('custom-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

<script>
    $(document).ready(function() {
        $('#downloadBtn').on('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Header
            doc.setFontSize(18);
            doc.text("Pre-Order Invoice", 105, 15, { align: 'center' });

            // From and To Addresses
            doc.setFontSize(12);
            doc.text("From:", 20, 30);
            doc.setFontSize(10);
            doc.text(`${$('#fromAddress').text()}`, -15, 35);

            doc.setFontSize(12);
            doc.text("To:", 180, 30, { align: 'right' });
            doc.setFontSize(10);
            doc.text(`${$('#toAddress').text()}`, 180, 35, { align: 'right' });

            // Invoice Date and Number
            doc.setFontSize(12);
            doc.text(`Invoice Date: ${$('#invoiceDate').text()}`, 20, 60);

            // Table
            let tableData = [];
            $('#invoiceTable tbody tr').each(function(index) {
                let rowData = [];
                $(this).find('td').each(function() {
                    rowData.push($(this).text());
                });
                tableData.push(rowData);
            });

            doc.autoTable({
                head: [['#', 'Product Name', 'Quantity', 'Unit Price', 'Total']],
                body: tableData,
                startY: 70,
                theme: 'grid',
                headStyles: { fillColor: [255, 0, 0] },
                styles: { fontSize: 10, cellPadding: 2 },
            });

            // Subtotal, Delivery Charge, Total
            let subtotal = $('#subtotalValue').text();
            let deliveryCharge = $('#deliveryChargeValue').text();
            let total = $('#totalValue').text();

            let finalY = doc.lastAutoTable.finalY + 10;

            doc.setFontSize(12);
            doc.text(`Subtotal: ${subtotal}`, 180, finalY, { align: 'right' });
            doc.text(`Delivery Charge: ${deliveryCharge}`, 180, finalY + 10, { align: 'right' });
            doc.text(`Total: ${total}`, 180, finalY + 20, { align: 'right' });

            // Order Note
            let orderNote = $('#orderNote').text();
            doc.text(`Order Note:`, 20, finalY + 40);
            doc.setFontSize(10);

            // Define the margins and column width
            const marginLeft = 20; // Left margin
            const colWidth = 105; // col-6 width in A4 (half of 210mm width)

            // Positioning for the text
            const startY = finalY + 45; // Starting Y position

            // Adding the text
            doc.setFontSize(12); // Set font size
            doc.text(`${orderNote}`, marginLeft, startY, { maxWidth: colWidth, align: 'justify' });

            doc.text(`Invoice #: ${$('#UUID').text()}`, 20, finalY + 80);

            // Save PDF
            doc.save('pre-order-invoice.pdf');
        });
    });
</script>

@endsection @endsection
