<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

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
            font-family: ipag, Tahoma,'Roboto',Sans-Serif;
            font-style: normal;
            font-weight: normal;
        }

        body {
            font-family: ipag ,Tahoma, 'Roboto', Sans-Serif;
        }

        table {
            font-family: ipag,Tahoma, Roboto,Sans-Serif;
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
    </style>
</head>
<body>
<h1 style="color: red; text-align: center">Hoa don nhap</h1>
<div class="col-lg-12">
    <table class="table__info-customer">
        <tr>
            <td>nguoi nhap</td>
            <td>{{$bill->user->name}}</td>
        </tr>
        <tr>
            <td>dien thoai</td>
            <td>{{$bill->user->phone}}</td>
        </tr>
        <tr>
            <td>email</td>
            <td>{{$bill->user->email}}</td>
        </tr>
        <tr>
            <td>tong tien</td>
            <td>{{number_format($bill->total_price)}} dong</td>
        </tr>
    </table>
</div>
<br>
<div>
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>ten san pham</th>
            <th>don gia</th>
            <th>so luong</th>
        </tr>
        </thead>
        <tbody>
        {{$stt= 1}}
        @foreach($product_items as $item)
            <tr>
                <td>{{$stt}}</td>
                <td>{{$item->detail_product->product->name}}</td>
                <td>{{number_format($item->detail_product->product->price)}} dong</td>
                <td>{{$item->quantity}}</td>
            {{$stt++}}
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
