@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa tài khoản
                    </h1>
                </div>
                <div class="col-lg-7" style=" padding-bottom:120px">
                    @if(session('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Success</strong>
                            {{session('message')}}
                        </div>
                    @endif
                    <form action="{{asset('admin/users/'.$user->id)}}" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Tên (<span style="color: red;">*</span>)</label>
                            <input class="form-control" name="name" placeholder="Điền vào họ tên User"
                                   value="{!! $user->name !!}"/>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email (<span style="color: red;">*</span>)</label>
                            <input type='email' class="form-control" name="email" placeholder="Nhập vào Email"
                                   value='{{ $user->email }}'/>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 20px">Giới tính</label>
                            <label class="radio-inline">
                                <input name="gender" value="0" type="radio" checked=""> Nữ
                                <input name="gender" value="1" type="radio"> Nam
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại (<span style="color: red;">*</span>)</label>
                            <input type='text' class="form-control" name="phone" placeholder="Nhập vào số điện thoại"
                                   value='{{ $user->phone }}'/>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh (<span style="color: red;">*</span>)</label>
                            <input type='date' class="form-control" name="birthday" placeholder="Nhập vào ngày sinh"
                                   value="{{$user->birthday}}"/>
                            @error('birthday')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (<span style="color: red;">*</span>)</label>
                            <input type='text' class="form-control" name="address" placeholder="Nhập vào địa chỉ"
                                   value='{{ $user->address}}'/>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-5">
                                <label>Ảnh đại diện (<span style="color: red;">*</span>)</label>
                                <div class="col-lg-5">
                                    <a href=""><img src="{{asset('uploads/users/'.$user->image)}}"
                                                    class="rounded-circle"
                                                    alt="image"
                                                    height="100px"
                                                    width="150px"></a>
                                </div>
                                <input type='file' class="form-control" name="image"
                                       placeholder="Nhập vào ảnh đại diện"/>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 20px">Trạng thái</label>
                            <div class="radio-inline">
                                <input name="status" value="1"
                                       type="radio" {{($user->status==1)? 'checked=checked':'' }}> Đang dùng
                                <input name="status" value="0" type="radio" @if($user->status == 0) checked @endif> Không
                                dùng
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 20px">Quyền hạn</label>
                            @foreach($roles as $role)
                                <div>
                                    <input type="checkbox" name="roles[]"
                                           value="{{$role->id}}" {{in_array($role->id,$listRole)?'checked=checked':''}}
                                    "> {{$role->name}}
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success">Lưu lại</button>
                        <a href="{{route('users.index')}}" class="btn btn-primary">Trở về</a>
                        {{csrf_field()}}
                        @method('PATCH')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
