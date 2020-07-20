@extends("backend.layouts.master")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa Đơn Bán Hàng
                        <small>Thêm</small>
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
                        @if(count($errors)>0)
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Khách hàng</label>
                            <select class="form-control" name="user_id">
                                @foreach($users as $user)
                                    <option value='{{$user->id}}'>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phương thức thanh toán</label>
                            <label class="radio-inline">
                                <input name="payment" value="1" checked="" type="radio">Tiền mặt
                            </label>
                            <label class="radio-inline">
                                <input name="payment" value="2" type="radio">Qua thẻ
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href="{{route('orders.index')}}" class="btn btn-default">Trở về</a>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
