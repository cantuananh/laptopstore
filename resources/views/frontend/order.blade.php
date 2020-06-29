@extends('frontend.user')
@section('content1')
    <div class="content-wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-sm-6">
                    <h4>Danh sách đơn hàng đã mua </h4>
                    <div class="space20">&nbsp;</div>
                    @if(count($orders)<1)
                        <p>Bạn chưa mua đơn hàng nào!</p>
                    @else
                    @foreach($orders as $order)
                        @foreach($order->detail_order as $detail)
                            <img src="uploads/products/{{$detail->detail_product->product->image}}" height="150"
                                 width="150">
                            <div class="col-sm-6">
                                <div class="single-item-body">
                                    <p class="single-item-title"
                                       style="font-size: 15px">{{$detail->detail_product->product->name}}</p>
                                    <p>Số lượng: {{$detail->quantity}}</p>
                                    <p class="single-item-price" style="font-size: 15px">
                                        <span class="flash-sale">{{number_format($detail->detail_product->product->price)}}<u>đ</u></span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-block">
                            <label for="name">Số hóa đơn: {{$order->id}}</label>
                            <label for="email">Tổng tiền: {{$order->total_price}}</label>
                        </div>
                        <label for="name">Ngày mua hàng: {{$order->created_at}}</label> <br>
                        @if($order->payment == 1)
                            <label for="name">Thanh toán: Chưa thanh toán</label>
                        @else
                            <label for="name">Thanh toán: Đã thanh toán</label>
                        @endif
                        <hr>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
