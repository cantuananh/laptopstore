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
                       placeholder="Nhập tên thương hiệu..." style="margin-right: 5px">
                <input type="text" class="col-lg-2" name="description"
                       placeholder="Nhập mô tả..." style="margin-right: 5px">
                <button type="submit" title="Tìm kiếm thương hiệu" class="btn-search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <br>
        <table class="table table-striped table-bordered table-hover test col-10 m-auto">
            <thead>
            <tr align="center">
                <th class="align-middle">ID</th>
                <th class="align-middle">Tên thương hiệu</th>
                <th class="align-middle">Mô tả chi tiết</th>
                <th class="align-middle">Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr class="odd gradeX">
                    <td class="text-center align-middle">{{$brand->id}}</td>
                    <td class="text-center align-middle">{{$brand->name}}</td>
                    <td class="align-middle">{{$brand->description}}</td>
                    <td class="text-center align-middle">
                        <form action="{{route('brands.destroy',['brand'=>$brand->id])}}" method="POST">
                            {!! csrf_field() !!}
                            @method('DELETE')
                            <a href="{{route('brands.edit',['brand'=>$brand->id])}}"
                               class="btn btn-warning"
                               title="Chỉnh sửa thương hiệu"
                               style="color: white;border-radius: 50%;">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="submit"
                                    class="btn btn-danger btn-del"
                                    style="border-radius: 50%;"
                                    title="Xóa thương hiệu">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate-item">{{$brands->links()}}</div>
    </div>
@endsection

<style>
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
