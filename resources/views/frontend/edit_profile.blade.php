@extends('frontend.user')
@section('content1')
<div class="content-wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
        <form action="" method="post" class="beta-form-checkout" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div>
                @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                            <strong>Warning!!</strong>
                            {{session('error')}}
                        </div>
                    @endif
                <div class="col-sm-6">
                    <h4>Thông tin</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="your_last_name">Họ tên*</label>
                        <input type="text" name="name" id="your_last_name" value="{!! Auth::user()->name!!}">
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input type="password" id="phone" name="password">
                    </div>
                    <div class="form-block">
                        <label for="phone">Nhập lại Mật khẩu*</label>
                        <input type="password" id="phone" name="repassword">
                    </div>
                    <div class="form-block">
                        <label for="email">Địa chỉ email*</label>
                        <input type="email" name="email" id="email" value="{!! Auth::user()->email!!}">
                    </div>
                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" name="address" id="adress" value="{!! Auth::user()->address!!}">
                    </div>
                    <div class="form-block">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" id="phone" name="phone" value="{!! Auth::user()->phone!!}">
                    </div>
                    <div class="form-group">
                        <label style="margin-right: 20px">Giới tính*</label>
                        <label class="radio-inline">
                            <input name="gender" value="0" @if(Auth::user()->gender==0) checked @endif type="radio" checked="">Nữ
                        </label>
                        <label class="radio-inline">
                            <input name="gender" value="1" @if(Auth::user()->gender==1) checked @endif type="radio">Nam
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh*</label>
                        <input type='date' class="form-control" name="birthday" placeholder="Nhập vào ngày sinh" value="{!! Auth::user()->birthday!!}"/>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <img src="uploads/users/{{Auth::user()->image}}" height="100" width="100">
                        <input type="file" class="form-control" name="image" placeholder="Nhập hình đại diện" value="{{Auth::user()->image}}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="profile/thongtin" class="btn btn-primary">Trở về</a>
                </div>
                <div class="col-sm-6"></div>
            </div>
            {{csrf_field()}}
        </form>
        </div>
    </div>
</div>
@endsection
