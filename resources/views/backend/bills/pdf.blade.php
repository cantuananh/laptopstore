<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="{{asset('')}}">
    <link href="admin_source/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="admin_source/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="admin_source/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="admin_source/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="admin_source/bower_components/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet" type="text/css">
    <link href="admin_source/css/sb-admin-2.css" rel="stylesheet" type="text/css">
    <link href="admin_source/css/mycss.css" rel="stylesheet" type="text/css">
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

        .lab {
            margin-left: 70px;
            margin-right: 70px;
        }

        .ban1 {
            float: left;
            padding-right: 130px;
            padding-top: 10px;
        }

        .divp {
            margin-left: 90px;
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
        <p>?????a ch???: X??m M?? N???ng, Kim Quan, Th???ch Th???t, H?? N???i.</p>
        <p>S??? ??i???n tho???i: 0348158822</p>
        <p>Email: anh.ct@deha-soft.com</p>
        <p>Website: https://itlaptop.com</p>
    </div>
</div>
<h1 style="color: red; text-align: center">PHI???U NH???P KHO</h1>
<div class="col-lg-12">
    <table class="table__info-customer">
        <tr>
            <td>Ng?????i nh???p</td>
            <td>{{$bill->user->name}}</td>
        </tr>
        <tr>
            <td>??i???n tho???i</td>
            <td>{{$bill->user->phone}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$bill->user->email}}</td>
        </tr>
        <tr>
            <td>T???ng ti???n</td>
            <td>{{number_format($bill->total_price*(100-$giamgia)/100)}} ?????ng</td>
        </tr>
    </table>
</div>
<br>
<div>
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>T??n s???n ph???m</th>
            <th>????n gi??</th>
            <th>S??? l?????ng</th>
        </tr>
        </thead>
        <tbody>
        {{$stt= 1}}
        @foreach($product_items as $item)
            <tr>
                <td>{{$stt}}</td>
                <td>{{$item->detail_product->product->name}}</td>
                <td>{{number_format($item->detail_product->product->price)}} ?????ng</td>
                <td>{{$item->quantity}}</td>
            {{$stt++}}
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <label style="color: black" class="lab">Ng?????i nh???p h??ng(k?? t??n)</label> &nbsp;&nbsp;&nbsp;
</div>
</body>
</html>
