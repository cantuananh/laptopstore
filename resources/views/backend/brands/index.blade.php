@extends('backend.layouts.master')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thương hiệu
                        <small>Danh sách</small>
                        <a href="{{route('brands.create')}}" class="btn btn-primary"
                           style="color: white;border-radius: 50%"><i class="fas fa-plus-circle"></i></a>
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
                <div class="input-group">
                    <input type="text" class="col-lg-4" name="name"
                           placeholder="Nhập tên..." style="margin-right: 10px">
                    <input type="text" class="col-lg-4" name="description"
                           placeholder="Nhập mô tả..." style="margin-right: 10px">
                    <button type="submit" class="col-lg-1">
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
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->description}}</td>
                        <td>
                            <form action="{{route('brands.destroy',['brand'=>$brand->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-del"
                                        style="border-radius: 50%" title="xoa">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <a href="{{route('brands.edit',['brand'=>$brand->id])}}" class="btn btn-success"
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
