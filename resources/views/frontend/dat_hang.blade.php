@extends('frontend.layouts.master')
@section('content')
    <div class="inner-header" style="background-color: #D6EAF8">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đơn đặt hàng</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="{{route('index')}}">Trang chủ</a> / <span>Đặt hàng</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Thông tin cá nhân</h4>
                        <div class="space20">&nbsp;</div>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <strong>Warning!!</strong>
                                @foreach($errors->all() as $err)
                                    <br>{{$err}}
                                @endforeach
                            </div>
                        @endif
                        @if(session('loi'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                {{session('loi')}}
                            </div>
                        @endif
                        @if(session('thanhcong'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                {{session('thanhcong')}}
                            </div>
                        @endif
                        <div class="form-block">
                            <label for="name">Họ tên (<span style="color: red">*</span>)</label>
                            <input type="text" id="name" name="name" value="{{get_data_user('web','name')}}">
                        </div>
                        <div class="form-block">
                            <label for="gender">Giới tính</label>
                            <input id="gender" type="radio" class="input" name="gender" value="nam
                             " checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                            <input id="gender" type="radio" class="input" name="gender" value="nu
                             " style="width: 10%"><span style="margin-right: 10%">Nữ</span>
                        </div>
                        <div class="form-block">
                            <label for="address">Địa chỉ (<span style="color: red">*</span>)</label>
                            <input type="text" id="address" name="address" value="{{get_data_user('web','address')}}">
                        </div>

                        <div class="form-block">
                            <label for="phone">Điện thoại (<span style="color: red">*</span>)</label>
                            <input type="text" id="phone" name="phone" value="{{get_data_user('web','phone')}}">
                        </div>

                        <div class="form-block">
                            <label for="notes">Ghi chú</label>
                            <textarea id="notes" name="note"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="your-order">
                            <div class="your-order-head"><h5>Thông tin đơn hàng</h5></div>
                            <div class="your-order-body">
                                <div class="your-order-item">
                                    <div>
                                        @foreach($product_cart as $cart)
                                            <div class="media content-product">
                                                <img height="100px" width="140px"
                                                     src="uploads/products/{{$cart->attributes->image}}" alt=""
                                                     class="pull-left">
                                                <div class="media-body content-product">
                                                    <p class="font-large content-product"></p>
                                                    <span
                                                        class="color-black your-order-info ">Sản phẩm: {{$cart->name}}</span>
                                                    <span class="color-black your-order-info">Đơn giá: {{number_format($cart->price)}}đ</span>
                                                    <span
                                                        class="color-black your-order-info">Số lương: {{number_format($cart->quantity)}} </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="your-order-item">
                                    <div class="pull-left"><p class="your-order-f18">Tổng tiền: </p></div>
                                    <div class="pull-right"><h5
                                            class="color-black">{{number_format(\Cart::getSubTotal())}}<u>đ</u></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment"
                                               value="1" checked="checked" data-order_button_text="">
                                        <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn. Sau đó bạn có thế kiểm tra hàng rồi thanh toán cho
                                            nhân viên cửa hàng.
                                        </div>
                                    </li>
                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                               name="payment" value="0" data-order_button_text="">
                                        <label for="payment_method_cheque">Chuyển khoản </label>
                                        <div class="payment_box payment_method_cheque" style="display: block;">
                                            Bạn vui lòng chuyển tiền qua số tài khoản ACB: 6978367 - CAN TUAN ANH với nội dung là:
                                            Họ tên + Tên sản phẩm + ngày đặt.
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @if(\Cart::getSubTotal())
                                <div class="text-center">
                                    <button title="Đặt hàng sản phẩm" type="submit" class="beta-btn primary" name="ok">Đặt hàng <i
                                            class="fa fa-chevron-right"></i></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection

<style>
    .content-product {
        margin-top: 0.6rem;
    }
</style>

