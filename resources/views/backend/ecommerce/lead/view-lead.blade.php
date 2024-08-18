@extends('backend.skeleton.body') @section('content')

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ecommerce.manage-lead') }}">Manage Leads</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Lead</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>View Lead</h1>
        </div>
    </div>

    <div class="row">
        <div class="container my-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Customer Invoice</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5>From:</h5>
                            <address>
                                <strong>{{ $setting->title }}</strong><br>
                                {{ $setting->address }}<br>
                                Email: {{ $setting->email }}<br>
                                Mobile: {{ $setting->mobile }}
                            </address>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <h5>To:</h5>
                            <address>
                                <strong>{{ $lead->name }}</strong><br>
                                {!! $lead->address !!}<br>
                                Email: {{ $lead->email }}<br>
                                Mobile: {{ $lead->mobile }}
                            </address>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5>Invoice Date: {{ $lead->created_at }}</h5>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <h5>Invoice #123456</h5>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-end">Quantity</th>
                                <th class="text-end">Unit Price</th>
                                <th class="text-end">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Product Name 1</td>
                                <td class="text-end">2</td>
                                <td class="text-end">$50.00</td>
                                <td class="text-end">$100.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Product Name 2</td>
                                <td class="text-end">1</td>
                                <td class="text-end">$150.00</td>
                                <td class="text-end">$150.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Subtotal</strong></td>
                                <td class="text-end">$250.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Tax (10%)</strong></td>
                                <td class="text-end">$25.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total</strong></td>
                                <td class="text-end"><strong>$275.00</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <button id="downloadBtn" class="btn btn-primary">Download PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
    document.getElementById('downloadBtn').addEventListener('click', () => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Header
        doc.autoTable({
            head: [['Customer Purchase Invoice']],
            body: [],
            theme: 'plain',
            styles: { halign: 'center', fontSize: 16, fontStyle: 'bold' },
            margin: { top: 10 },
        });

        // Company and Customer Info
        doc.text("From: Your Company", 20, 30);
        doc.text("1234 Street Name", 20, 35);
        doc.text("City, State, ZIP Code", 20, 40);
        doc.text("Email: info@yourcompany.com", 20, 45);
        doc.text("Phone: (123) 456-7890", 20, 50);

        doc.text("To: Customer Name", 120, 30);
        doc.text("5678 Another Street", 120, 35);
        doc.text("Another City, State, ZIP Code", 120, 40);
        doc.text("Email: customer@example.com", 120, 45);
        doc.text("Phone: (987) 654-3210", 120, 50);

        // Invoice Details
        doc.text("Invoice Date: 2024-07-02", 20, 60);
        doc.text("Invoice #: 123456", 120, 60);

        // Table Data
        const headers = [["#", "Description", "Quantity", "Unit Price", "Total"]];
        const data = [
            ["1", "Product Name 1", "2", "$50.00", "$100.00"],
            ["2", "Product Name 2", "1", "$150.00", "$150.00"],
            ["", "", "", "Subtotal", "$250.00"],
            ["", "", "", "Tax (10%)", "$25.00"],
            ["", "", "", "Total", "$275.00"]
        ];

        // Table
        doc.autoTable({
            head: headers,
            body: data,
            startY: 70,
        });

        // Thank You Note
        doc.text("Thank you for your business!", 105, doc.lastAutoTable.finalY + 20, { align: 'center' });

        // Save PDF
        doc.save('invoice.pdf');
    });
</script>
@endsection @section('custom-scripts') @include('backend.skeleton.summernote') @endsection @endsection