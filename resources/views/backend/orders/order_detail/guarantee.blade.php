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
            background: #C9CDCF;
            font-family: ipag, Tahoma, 'Roboto', Sans-Serif;
        }

        .h1 {
            padding-bottom: 50px;
        }

        .tex {
            margin-left: 30px;
            margin-right: 30px;
        }

        .lab {
            margin-left: 70px;
            margin-right: 70px;
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
    </style>
</head>
<body>
<div>
    <div class="ban1">
        <p style="color: black; margin-top: 4.5rem;" class="divp">IT Laptop</p>
    </div>
    <div class="ban2">
        <p>Địa chỉ: Xóm Mơ Nồng, Kim Quan, Thạch Thất, Hà Nội.</p>
        <p>Số điện thoại: 0348158822</p>
        <p style="margin-left: 18rem;">Email: anh.ct@deha-soft.com</p>
        <p style="margin-left: 18rem;">Website: https://itlaptop.com</p>
    </div>
</div>
<h1 class="h1" style="color: black; text-align: center">PHIẾU BẢO HÀNH</h1>
<h2 style="color: white ; background: red; text-align: center" class="tex">Vui lòng trình phiếu khi có nhu cầu sửa chữa
    - bảo hành</h2>
<div class="form-control-range control">
    <p style="color: black" class="tex">Sản phẩm: {{$detail_order->detail_product->product->name}}</p>
    <p style="color: black" class="tex">Khách hàng: {{$order->user->name}}</P>
    <p style="color: black" class="tex">Số điện thoại: {{$order->user->phone}}</P>
    <p style="color: black" class="tex">Ngày mua: {{$detail_order->updated_at}}</P>
    @for($i = 0 ; $i< $detail_order->quantity ; $i++)
        <p style="color: black" class="tex">Số seri: {{$detail[$i]->seri}}</P>
    @endfor
    <p style="color: black" class="tex">Thời gian bảo hành: {{$detail_order->detail_product->product->guarantee_time}}
        tháng</p>
    <label style="color: black" class="lab">Cửa hàng (ký tên hoặc đóng dấu):</label> &nbsp;&nbsp;&nbsp;
    <label style="color: black" class="lab">Khách hàng (ký tên):</label>
    <br><br><br><br><br><br><br><br><br><br><br>
    <hr>
    <p style="color: #66696A;" class="tex">*Chú ý: Bất kỳ một sự thay đổi bổ sung nào khác với nội dung của phiếu này sẽ
        không có giá trị bảo hành.</p>
</div>
</body>
</html>
