@extends('frontend.user')
@section('content1')
        <div class="content-wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <form action="" method="post" class="beta-form-checkout">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>Thông tin</h4>
                                <div class="space20">&nbsp;</div>
                                <div class="form-block">
                                    <label for="name">Họ tên: </label>{{Auth::user()->name}}
                                </div>
                                <div class="form-block">
                                    <label for="email">Địa chỉ email: </label>{{Auth::user()->email}}
                                </div>
                                <div class="form-block">
                                    <label for="adress">Địa chỉ: </label>{{Auth::user()->address}}
                                </div>
                                <div class="form-block">
                                    <label for="phone">Số điện thoại: </label>{{Auth::user()->phone}}
                                </div>
                                <div class="form-block">
                                    <label style="margin-right: 20px">Giới tính: </label>@if(Auth::user()->gender == 1)
                                        Nam
                                    @else
                                        Nữ
                                    @endif
                                </div>
                                <div class="form-block">
                                    <label>Ngày sinh: </label>{{Auth::user()->birthday}}
                                </div>
                                <div class="form-block">
                                    <label>Ảnh đại diện: </label>
                                    <img src="uploads/users/{{Auth::user()->image}}" height="100" width="100">
                                </div>
                                <div class="form-block">
                                    <label style="margin-right: 20px">Trạng thái: </label>@if(Auth::user()->status == 1)
                                        Đang dùng
                                    @else
                                        Không dùng
                                    @endif
                                </div>
                                <div class="form-block">
                                    <a href="profile/sua" class="btn btn-primary">Sửa thông tin</a>
                                    @if(Auth::user()->level == 1)
                                        <a href="admin/" class="btn btn-primary">Trang quản trị</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div>
                    </form>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
@endsection
