<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ company_data()->name }}</title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }

    </style>
</head>

<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">{{ company_data()->name }}</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">{{ company_data()->email }}</p>
                        <p class="text-white">{{ company_data()->address }}</p>
                        <p class="text-white">{{ company_data()->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: 001</h2>
                    <p class="sub-heading">Tracking No. tohoney2025 </p>
                    <p class="sub-heading">Order Date: {{ $order_summeries->created_at->format('d/m/Y') }} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name: {{ $order_summeries->billing_detail->name }} </p>
                    <p class="sub-heading">Address: {{ $order_summeries->billing_detail->address }} </p>
                    <p class="sub-heading">Phone Number: {{ $order_summeries->billing_detail->phone_number }} </p>
                    <p class="sub-heading">
                        Country, City, Pincode: {{ $country->name }}, {{ $city->name }},
                        {{ $order_summeries->billing_detail->postcode }}
                    </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_summeries->order_detail as $ordered_items)
                        <tr>
                            <td>{{ $ordered_items->product->name }}</td>
                            <td>{{ $ordered_items->product_price }}</td>
                            <td>{{ $ordered_items->amount }}</td>
                            <td>{{ $ordered_items->amount * $ordered_items->product_price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Cart Total &nbsp;</td>
                        <td>{{ $order_summeries->cart_total }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Discount &nbsp;</td>
                        <td>{{ $order_summeries->discount_total }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Sub Total &nbsp;</td>
                        <td>{{ $order_summeries->sub_total }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Shipping Cost &nbsp;</td>
                        <td>{{ $order_summeries->shipping }}</td>
                    </tr>
                    <tr style="font-weight:800">
                        <td colspan="3" class="text-right">Grand Total &nbsp;</td>
                        <td>{{ $order_summeries->grand_total }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: {{ $order_summeries->payment_status == 1 ? 'Paid' : 'Not paid yet' }}</h3>
            <h3 class="heading">Payment Mode: {{ $order_summeries->payment_option == 1 ? 'Cash on delivery' : 'Online payment' }}</h3>
        </div>

        <div class="body-section">
            <p>Thank you for shopping here.
                <a href="#" class="float-right">www.Tohoney.com</a>
            </p>
        </div>
    </div>

</body>

</html>
