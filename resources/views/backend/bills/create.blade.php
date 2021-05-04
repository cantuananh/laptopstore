@extends("backend.layouts.master")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm phiếu nhập kho
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('bills.store')}}" method="POST" enctype="multipart/form-data">
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
                            <label>Nhân viên</label>
                            <select class="form-control" name="user_id">
                                <option value='{{Auth::user()->id}}'>{{Auth::user()->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhà cung cấp</label>
                            <select class="form-control" name="supplier_id">
                                @foreach($suppliers as $supplier)
                                    <option value='{{$supplier->id}}'>{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phương thức thanh toán</label>
                            <div class="radio-inline">
                                <input name="payment" value="1" checked="" type="radio"> Tiền mặt
                                <input name="payment" value="2" type="radio"> Qua thẻ
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm</button>
                        <a href="{{route('bills.index')}}" class="btn btn-primary">Trở về</a>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
