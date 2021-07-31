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
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Hình ảnh sản phẩm</th>
                        <th class="text-center">Giá sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-center">Hành động</th>
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
                                       style="width: 2.5rem !important;"
                                       class="product-number">
                                <button class="quantity-update btn-success" title="Cập nhật số lượng"
                                        cart="{{$cart->id}}"><b>Update</b></button>
                            </td>
                            <td class="text-center">
                                {{number_format($cart->price * $cart->quantity)}}<u>đ</u></td>
                            <td class="text-center">
                                <a title="Xoá khỏi giỏ hàng" href="{{url('del-cart',['id'=>$cart['id']])}}"><i
                                        class="fa fa-trash-o text-danger icons-delete-product" style="font-size: 1.3rem;"></i></a>
                            </td>
                        </tr>
                        <?php $i++?>
                    @endforeach
                    </tbody>
                </table>
                <h5 class="class pull-right">Tổng tiền thanh toán:
                    <b>{{number_format(\Cart::getSubTotal())}}</b><u>đ</u>
                    <a href="{{route('dathang')}}" class="btn btn-success pay-btn" style="margin-left: 1rem;"
                       title="Thanh toán sản phẩm">
                        <b>Thanh toán</b></a>
                </h5>
                <br>
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
        border: 1px solid gray;
    }

    .icons-delete-product {
        font-size: 1rem;
    }

    #content {
        height: 53%;
    }

    .icons-delete-product:hover {
        font-size: 1.4rem!important;
        font-weight: bold;
    }
</style>
