@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Danh sách</small>
                        <a href="{{route('products.create')}}" class="btn btn-primary"
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
            <form action="{{route('products.index')}}" method="get" role="search">
                <div class="input-group">
                    <input type="text" class="col-lg-4" name="name"
                           placeholder="Nhập tên..." style="margin-right: 5px">
                    <input type="text" class="col-lg-4" name="brand_id"
                           placeholder="Nhập loai hàng..." style="margin-right: 5px">
                    <button type="submit" class="col-lg-2">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Thương hiệu</th>
                    <th>Hình ảnh</th>
                    <th>Vi xử lý</th>
                    <th>Màn hình</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="odd gradeX">
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->brand->name}}</td>
                        <td><img src="../uploads/products/{{$product->image}}" height="100"
                                 width="150">
                        </td>
                        <td>{{$product->microprocessors}}</td>
                        <td>{{$product->screen}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <form action="{{route('products.destroy',['product'=>$product->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-del"
                                        style="border-radius: 50%" title="xoa">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-primary"
                                   style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
