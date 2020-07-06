@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7" style="padding-bottom:120px">
            <form action="" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="col-sm-6">
                    <h4>Thông tin tài khoản</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-group">
                        <label for="name">Họ tên: </label>  {{Auth::user()->name}}
                    </div>
                    <div class="form-group">
                        <label for="email">Địa chỉ email: </label> {{Auth::user()->email}}
                    </div>
                    <div class="form-group">
                        <label for="adress">Địa chỉ: </label> {{Auth::user()->address}}
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại: </label> {{Auth::user()->phone}}
                    </div>
                    <div class="form-group">
                        <label style="margin-right: 20px">Giới tính: </label>@if(Auth::user()->gender == 1)
                            Nam
                        @else
                            Nữ
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh: </label> {{Auth::user()->birthday}}
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện: </label>
                        <img src="uploads/users/{{Auth::user()->image}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label style="margin-right: 20px">Trạng thái: </label>@if(Auth::user()->status == 1)
                            Đang dùng
                        @else
                            Không dùng
                        @endif
                    </div>
                    <div class="form-group">
                        <a href="admin/profile/sua" class="btn btn-primary">Sửa thông tin</a>
                        @if(Auth::user()->level == 1)
                            <a href="admin/" class="btn btn-primary">Trang quản trị</a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6"></div>
        </form>
        </div>
        </div>
    </div>
@endsection
