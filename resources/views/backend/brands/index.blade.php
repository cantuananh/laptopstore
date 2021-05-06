@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">Danh sách thương hiệu
                    <a href="{{route('brands.create')}}" title="Thêm thương hiệu mới"
                       style="color: green; font-size: 1.5rem;"><i class="fas fa-plus-circle"></i></a>
                </h1>
                @if(session('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
        <form action="{{route('brands.index')}}" method="get" role="search">
            <div class="input-group d-flex justify-content-center">
                <input type="text" class="col-lg-2" name="name"
                       placeholder="Nhập tên thương hiệu..." style="margin-right: 5px">
                <input type="text" class="col-lg-2" name="description"
                       placeholder="Nhập mô tả..." style="margin-right: 5px">
                <button type="submit" title="Tìm kiếm thương hiệu" class="btn-search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <br>
        <table class="table table-striped table-bordered table-hover test">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên thương hiệu</th>
                <th>Mô tả</th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr class="odd gradeX">
                    <td class="text-center">{{$brand->id}}</td>
                    <td class="text-center">{{$brand->name}}</td>
                    <td>{{$brand->description}}</td>
                    <td class="text-center">
                        <form action="{{route('brands.destroy',['brand'=>$brand->id])}}" method="POST">
                            {!! csrf_field() !!}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-del"
                                    style="border-radius: 50%" title="Xóa thương hiệu">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <a href="{{route('brands.edit',['brand'=>$brand->id])}}" class="btn btn-warning"
                               title="Chỉnh sửa thương hiệu"
                               style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$brands->links()}}
    </div>
@endsection

<style>
    .btn-search {
        background-color: #498EBC;
        border: unset !important;
        border-radius: 5px;
        color: white;
    }
</style>
