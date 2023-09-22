<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: 'Times New Roman';
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: 'Times New Roman';
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: 'Times New Roman';
        }

        .small-heading {
            font-size: 18px;
            font-family: 'Times New Roman';
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: 'Times New Roman';
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: 'Times New Roman';
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>

<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">MyShoes Ecommerce</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Mã hoá đơn Id: #{{ $order->id}}</span> <br>
                    <span>Ngày: {{ now() }}</span> <br>
                    <span>Zip code : 560077</span> <br>
                    <span>Địa chỉ: 150 Tân Thới Nhất 1, Tân Thới Nhất, Q.12, HCM, Việt Nam</span> <br>
                </th>
            </tr>
            <tr class="bg-black">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mã đơn hàng:</td>
                <td>{{ $order->id }}</td>

                <td>Họ tên:</td>
                <td>{{ $order->fullname }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $order->tracking_no }}</td>

                <td>Email:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Ngày đặt hàng:</td>
                <td>{{ $order->created_at->format('Y-m-d h:i A') }}</td>

                <td>Số điện thoại:</td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td>Phương thức thanh toán:</td>
                <td>{{ $order->payment_mode }}</td>

                <td>Địa chỉ giao hàng:</td>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <td>Tình trạng đơn hàng:</td>
                <td>{{ $order->status_message }}</td>

                <td>Pin code:</td>
                <td>{{ $order->pincode }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-grey">
                <th>Mã đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Màu</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @forelse ($order->orderItems as $orderItem)
                <tr>
                    <td width="10%">{{ $orderItem->id }}</td>
                    <td>
                        {{ $orderItem->product->name }}
                    </td>
                    <td>
                        @if ($orderItem->productColor)
                            <span>
                                {{ $orderItem->productColor->Color->name }}
                            </span>
                        @endif
                    </td>
                    <td width="10%">{{ $orderItem->quantity }}</td>
                    <td width="10%" class="fw-bold">
                        {{ number_format($orderItem->quantity * $orderItem->price) }}Vnđ
                    </td>
                    @php
                        $totalPrice += $orderItem->quantity * $orderItem->price;
                    @endphp
                </tr>
            @empty
                <tr colspan="5">
                    <td>Hiện tại không có đơn hàng nào.</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="fw-bold">
                    <strong>Tổng tiền:</strong>
                </td>
                <td colspan="1" class="fw-bold">
                    <strong>{{ number_format($totalPrice) }}Vnđ</strong>
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Cảm ơn quý khách đã mua hàng!!!!
    </p>

</body>

</html>
