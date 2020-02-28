@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tài khoản
                        <small>Danh sách</small>
                        <a href="{{route('users.create')}}" class="btn btn-primary"
                           style="color: white;border-radius: 50%"><i class="fas fa-plus-circle"></i></a>
                    </h1>
                </div>
                @if(session('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Success</strong>
                        {{session('message')}}
                    </div>
                @endif
            </div>
            <form action="{{route('users.index')}}" method="get" role="search">
                <div class="input-group">
                    <input type="text" class="col-lg-4" name="name"
                           placeholder="Nhập tên..." style="margin-right: 5px">
                    <select style="width: 100px; height: 25px; margin-right: 10px" name="role" class="col-lg-5">
                        <option value="">all</option>
                        @foreach($roles as $role)
                        <option value="{{$role->name}}" {{request()->input('role')==$role->name?'selected':''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="col-lg-2">
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Ảnh đại diện</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td><img src="../uploads/users/{{$user->image}}" height="100"
                                 width="150">
                        </td>
                        <td>{{$user->email}}</td>
                        <td>
                             @foreach($user->roles as $role)
                                        {{$role->name}} <br>
                             @endforeach
                        </td>
                        <td>
                            <form action="{{route('users.destroy',['user'=>$user->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-del"
                                        style="border-radius: 50%" title="xoa">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-primary"
                                   style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--            {{$users->links()}}--}}
        </div>
    </div>
@endsection
