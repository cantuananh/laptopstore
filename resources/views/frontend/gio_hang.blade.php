@extends('frontend.layouts.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Giỏ hàng của bạn</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="{{route('index')}}">Trang chủ</a> / <span>Giỏ hàng</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <form action="{{route('giohang')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="csrf-token" value="{{csrf_token()}}">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($product_cart as $cart)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td>{{$cart->name}}</td>
                            <td class="text-center"><img height="100px" width="130px"
                                                         src="uploads/products/{{$cart->attributes->image}}"
                                                         alt="" class="pull-left"></td>
                            <td>{{number_format($cart->price)}}đ</td>
                            <td class="text-center">
                                <input id="qty-{{$cart->id}}"
                                       value="{{$cart->quantity}}"
                                       type="number"
                                       min="1"
                                       class="product-number">
                                <button class="quantity-update btn-success" title="Cập nhật số lượng"
                                        cart="{{$cart->id}}"><b>Update</b></button>
                            </td>
                            <td class="text-center">
                                {{number_format($cart->price * $cart->quantity)}}<u>đ</u></td>
                            <td class="text-center">
                                <a href="{{url('del-cart',['id'=>$cart['id']])}}"><i
                                        class="fa fa-trash-o text-danger icons-delete-product"></i>Xoá</a>
                            </td>
                        </tr>
                        <?php $i++?>
                    @endforeach
                    </tbody>
                </table>
                <h5 class="class pull-right">Tổng tiền thanh toán: <b>{{number_format(\Cart::getSubTotal())}}</b><u>đ</u></h5>
                <br>
                <div class="pay-product">
                    <a href="{{route('dathang')}}" class="btn btn-warning pay-btn"><b class="pay-text">Thanh toán</b></a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function tang(obj) {
        }
    </script>
@endsection

<style>
    .product-number {
        width: 40% !important;
    }

    .quantity-update {
        border-radius: 10px 10px 10px 10px;
    }

    .icons-delete-product {
        font-size: 1rem;
    }

    .pay-product {
        position: absolute;

        right: 50%;
        margin-top: 2.5rem !important;
    }

    #content {
        height: 53%;
    }

    .pay-btn {
        height: 3rem;
        width: 10rem;
    }

    .pay-text {
        position: relative;
        top: 0.4rem;
    }
</style>
