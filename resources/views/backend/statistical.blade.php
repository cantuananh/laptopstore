@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê chung
                    </h1>
                </div>
                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$user}}">0</div>
                            Thành viên
                        </h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$product}}">0</div>
                            Sản phẩm
                        </h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$category}}">0</div>
                            Thương hiệu
                        </h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$bill}}">0</div>
                            Hóa đơn nhập
                        </h4>
                    </div>
                </div>
                <h2 class="sub-header" style="font-size: 36px">Danh sách 5 thành viên mới đăng ký</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover test table-id">
                        <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_new as $user)
                            <tr class="odd gradeX">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
