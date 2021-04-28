<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="{{asset('')}}">
    <style>
        @font-face {
            font-family: ipag, Tahoma, 'Roboto', Sans-Serif;
            font-style: normal;
            font-weight: normal;
        }

        body {
            font-family: ipag, Tahoma, 'Roboto', Sans-Serif;
        }

        table {
            font-family: ipag, Tahoma, Roboto, Sans-Serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .img {
            margin-left: 100px;
        }

        .ban1 {
            float: left;
            padding-right: 130px;
            padding-top: 10px;
        }

        .divp {
            margin-left: 90px;
        }
        .lab {
            margin-left: 70px;
            margin-right: 70px;
        }
    </style>
</head>
<body>
<div>
    <div class="ban1">
        <img src="uploads/logo/laptop.png" height="73px" width="129px" alt="logo" class="img">
        <p style="color: black" class="divp">IT Laptop</p>
    </div>
    <div class="ban2">
        <p>Địa chỉ: Xóm Mơ Nồng, Kim Quan, Thạch Thất, Hà Nội.</p>
        <p>Số điện thoại: 0348158822</p>
        <p>Email: anh.ct@deha-soft.com</p>
        <p>Website: https://itlaptop.com</p>
    </div>
</div>
<h1 class="h1" style="color: #970fc7; text-align: center">HÓA ĐƠN BÁN HÀNG</h1>
<div class="col-lg-12">
    <table class="table__info-customer">
        <tr>
            <td>Khách hàng</td>
            <td>{{$order->user->name}}</td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td>{{$order->user->phone}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$order->user->email}}</td>
        </tr>
        <tr>
            <td>Tổng tiền</td>
            <td>{{number_format($order->total_price)}} đồng</td>
        </tr>
    </table>
</div>
<br>
<div>
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
        </tr>
        </thead>
        <tbody>
        {{$stt= 1}}
        @foreach($product_items as $item)
            <tr>
                <td>{{$stt}}</td>
                <td>{{$item->detail_product->product->name}}</td>
                <td>{{number_format($item->detail_product->product->price)}} đồng</td>
                <td>{{$item->quantity}}</td>
            {{$stt++}}
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <div class="form-control-range control">
    <label style="color: black" class="lab">Người bán hàng(ký tên):</label> &nbsp;&nbsp;&nbsp;
    <label style="color: black" class="lab">Khách hàng(ký tên):</label>
    </div>
</div>
</body>
</html>
