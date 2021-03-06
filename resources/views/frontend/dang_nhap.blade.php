@extends('frontend.layouts.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('dangnhap')}}">Trang chủ</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors ->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                    @if(session('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Success</strong>
                            {{session('message')}}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Warning</strong>
                            {{session('error')}}
                        </div>
                    @endif
                <div class="col-sm-6">
                    <div class="form-block">
                        <label for="email">Địa chỉ email*</label>
                        <input name="email" type="email" id="email" required style="height: 37px">
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input name="password" type="password" id="phone" required style="height: 37px">
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                    <p class="mb-1">
                        <a href="{{route('password.request')}}">Bạn quên mật khẩu của bạn?</a>
                    </p>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </form>
    </div>
</div>
@endsection
