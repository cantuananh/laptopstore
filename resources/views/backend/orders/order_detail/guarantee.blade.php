<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <style>
        @font-face {
            font-family: ipag, Tahoma, 'Roboto', Sans-Serif;
            font-style: normal;
            font-weight: normal;
        }

        body {
            background: rgba(19, 226, 232, 0.94);
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
        <img src="uploads/logo/laptop.png" height="73px" width="129px" alt="logo" class="img">
        <p style="color: black" class="divp">LAPTOP DAO QUANG</p>
    </div>
    <div class="ban2">
        <p>Dia chi: So 14 Duc Hoa, Soc Son, Ha Noi</p>
        <p>So dien thoai: 0343417170</p>
        <p>Email: aovanquang@gmail.com</p>
        <p>Website: https://laptopdaoquang.com</p>
    </div>
</div>
<h1 class="h1" style="color: #970fc7; text-align: center">PHIEU BAO HANH</h1>
<h2 style="color: white ; background: red; text-align: center" class="tex">Vui long trinh phieu khi co nhu cau sua chua
    - bao hanh</h2>
<div class="form-control-range control">
    <p style="color: black" class="tex">San pham: {{$detail_order->detail_product->product->name}}</p>
    <p style="color: black" class="tex">Khach hang: {{$order->user->name}}</P>
    <p style="color: black" class="tex">So dien thoai: {{$order->user->phone}}</P>
    <p style="color: black" class="tex">Ngay mua: {{$detail_order->updated_at}}</P>
    @for($i = 0 ; $i< $detail_order->quantity ; $i++)
        <p style="color: black" class="tex">So seri {{$i+1}}: ..............................</P>
    @endfor
    <p style="color: black" class="tex">Thoi gian bao hanh: {{$detail_order->detail_product->product->guarantee_time}}
        thang</p>
    <label style="color: black" class="lab">Cua hang(ky ten hoac dong dau):</label> &nbsp;&nbsp;&nbsp;
    <label style="color: black" class="lab">Khach hang(ky ten):</label>
    <br><br> <br><br>
    <hr>
    <p style="color: red" class="tex">*Chu y: Bat ky mot su thay doi bo sung nao khac voi noi dung cua phieu nay se
        khong co gia tri bao hanh.</p>
</div>
</body>
</html>
