@extends("backend.layouts.master")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa hoá đơn bán hàng
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('orders.update',['order'=>$order->id])}}}" method="POST"
                          enctype="multipart/form-data">
                        @if(!empty(session('message')))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Nhân viên</label>
                            <select class="form-control" name="user_id">
                                <option value='{{$order->user_id}}'>{{$order->user->name}}</option>
                                @foreach($users as $user)
                                    <option value='{{$user->id}}'>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phương thức thanh toán</label>
                            <div class="radio-inline">
                                <input name="payment" value="1" {{$order->payment == 1 ? 'checked': ''}} type="radio"> Tiền mặt
                                <input name="payment" value="0" {{$order->payment == 2 ? 'checked': ''}} type="radio"> Qua thẻ
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" name='ok'>Lưu lại</button>
                        <a href="{{route('orders.index')}}" class="btn btn-primary">Trở về</a>
                        {{csrf_field()}}
                        @method('PATCH')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
