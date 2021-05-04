@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm tài khoản
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Success</strong>
                            {{ session('message')}}
                        </div>
                    @endif
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Họ và tên (<span style="color: red;">*</span>)</label>
                            <input class="form-control" name="name" placeholder="Điền vào họ và tên User"
                                   value="{!! old('name') !!}"/>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email (<span style="color: red;">*</span>)</label>
                            <input type='email' class="form-control" name="email" placeholder="Nhập vào Email"
                                   value="{{ old('email') }}"/>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu (<span style="color: red;">*</span>)</label>
                            <input type='password' class="form-control" name="password"
                                   placeholder="Nhập vào Mật khẩu"/>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Mật khẩu (<span style="color: red;">*</span>)</label>
                            <input type='password' class="form-control" name="repassword"
                                   placeholder="Nhập lại Mật khẩu"/>
                            @error('repassword')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 20px">Giới tính (<span style="color: red;">*</span>)</label>
                            <div class="radio-inline">
                                <input name="gender" value="0" type="radio" checked=""> Nữ
                                <input name="gender" value="1" type="radio"> Nam
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại (<span style="color: red;">*</span>)</label>
                            <input type='number' class="form-control" name="phone"
                                   placeholder="Nhập vào số điện thoại" value="{!! old('phone') !!}"/>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh (<span style="color: red;">*</span>)</label>
                            <input type='date' class="form-control" name="birthday" placeholder="Nhập vào ngày sinh"
                                   value="{!! old('birthday') !!}"/>
                            @error('birthday')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (<span style="color: red;">*</span>)</label>
                            <input type='text' class="form-control" name="address" placeholder="Nhập vào địa chỉ"
                                   value="{!! old('address') !!}"/>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện (<span style="color: red;">*</span>)</label>
                            <input type='file' class="form-control" name="image" placeholder="Nhập vào ảnh đại diện"
                                   value="{!! old('image') !!}"/>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 20px">Quyền hạn</label>
                            @foreach($roles as $role)
                                <div>
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}"> {{$role->name}}
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success">Thêm</button>
                        <a href="{{route('users.index')}}" class="btn btn-primary">Trở về</a>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
