@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    </h1>
                </div>
                <div class="row placeholders statistical">
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$user}}">0</div>
                            Thành viên
                        </h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$product}}">0</div>
                            Sản phẩm
                        </h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$order}}">0</div>
                            Hóa đơn bán
                        </h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="{{asset('\uploads\charts\circle.png')}}"
                             width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%); color: white;">
                            <div class="counter" data-count="{{$bill}}">0</div>
                            Phiếu nhập kho
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .statistical {
        position: absolute;
        left: 36%;
        top: 10%;
    }
</style>
