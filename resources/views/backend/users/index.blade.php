@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Danh sách tài khoản
                        <a href="{{route('users.create')}}"
                           title="Thêm tài khoản"
                           style="color: green; border-radius: 50%"><i class="fas fa-plus-circle"></i></a>
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
                <div class="input-group d-flex justify-content-center">
                    <input type="text" class="col-lg-2" name="name"
                           placeholder="Nhập tên tài khoản..." style="margin-right: 5px">
                    <select style="margin-right: 10px" name="role" class="col-lg-1">
                        <option value="">Tất cả</option>
                        @foreach($roles as $role)
                            <option
                                value="{{$role->name}}" {{request()->input('role')==$role->name?'selected':''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-search">
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-hover table-bordered table-striped col-10 m-auto">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Ảnh đại diện</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td class="text-center align-middle">{{$user->id}}</td>
                        <td class="text-center align-middle">{{$user->name}}</td>
                        <td class="text-center align-middle"><img src="uploads/users/{{$user->image}}" height="100px"
                                                                  width="150px">
                        </td>
                        <td class="text-center align-middle">{{$user->email}}</td>
                        <td class="text-center align-middle">
                            @foreach($user->roles as $role)
                                {{$role->name}} <br>
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            <form action="{{route('users.destroy',['user'=>$user->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-primary"
                                   title="Chỉnh sửa tài khoản"
                                   style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-danger btn-del"
                                        style="border-radius: 50%" title="Xóa tài khoản">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-item">{{$users->links()}}</div>
        </div>
    </div>
@endsection

<style>
    .fas.fa-plus-circle {
        font-size: 1.5rem;
    }

    .btn-search {
        background-color: #498EBC;
        border: unset !important;
        border-radius: 5px;
        color: white;
    }

    .paginate-item {
        padding-left: 9.8rem !important;
        padding-top: 2rem;
    }
</style>
