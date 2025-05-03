<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Invoice</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            margin: 20mm;
            background: #fff;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            page-break-inside: avoid;
        }
        .invoice-header {
            background-color: #0d6efd; /* Fallback for gradient */
            background: linear-gradient(135deg, #0d6efd, #17a2b8);
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            margin-bottom: 20px;
        }
        .invoice-header h2 {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        .info-section {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-section td {
            width: 33.33%;
            padding: 15px;
            vertical-align: top;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            margin: 0 5px;
        }
        .info-box h5 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #0d6efd;
        }
        .info-box p {
            margin: 5px 0;
            font-size: 12px;
        }
        .info-box p strong {
            color: #555;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        .table th {
            background: #e9ecef;
            font-weight: bold;
            color: #333;
        }
        .table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }
        .summary-table {
            width: 50%;
            margin-left: auto;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .summary-table td {
            padding: 5px;
            text-align: right;
            font-weight: bold;
            border: none;
            font-size: 12px;
        }
        @page {
            margin: 20mm;
        }
        @media print {
            .invoice-container {
                border: none;
                padding: 0;
            }
            .info-section td {
                background: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h5>Purchase Invoice</h5>
        </div>

        <table class="info-section">
            <tr>
                <td class="info-box">
                    <h5>Supplier Info</h5>
<p><strong>Name:</strong> {{ $purchase->supplier->name }} </p>
<p><strong>Email:</strong> {{ $purchase->supplier->email }}</p>
<p><strong>Phone:</strong> {{ $purchase->supplier->phone }} </p>
                </td>
                <td class="info-box">
                    <h5>Warehouse</h5>
                    <p>{{ $purchase->warehouse->name }} </p>
                </td>
                <td class="info-box">
                    <h5>Purchase Info</h5>
<p><strong>Date:</strong> {{ $purchase->date }} </p>
<p><strong>Status:</strong> {{ $purchase->status }} </p>
<p><strong>Grand Total:</strong> ${{ number_format($purchase->grand_total, 2)  }} </p>
                </td>
            </tr>
        </table>

        <h5 style="font-weight: bold; margin: 20px 0 10px;">Order Summary</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Net Unit Cost</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchase->purchaseItems as $key => $item )
                    <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->net_unit_cost,2)  }}</td>
                <td>${{ number_format($item->discount,2)  }}</td>
                <td>${{ number_format($item->subtotal,2)  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="summary-table">
            <tr>
                <td><strong>Total Discount:</strong> ${{ number_format($purchase->discount,2)  }} </td>
            </tr>
            <tr>
                <td><strong>Shipping Cost:</strong> ${{ number_format($purchase->shipping,2)  }} </td>
            </tr>
            <tr>
                <td><strong>Grand Total:</strong> ${{ number_format($purchase->grand_total,2)  }} </td>
            </tr>
        </table>
    </div>
</body>
</html>