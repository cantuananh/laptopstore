@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Danh sách sản phẩm
                        <a href="{{route('products.create')}}"
                           title="Thêm sản phẩm"
                           style="color: green; font-size: 1.5rem;"><i class="fas fa-plus-circle"></i></a>
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
                <div class="input-group d-flex justify-content-center">
                    <input type="text" class="col-lg-2" name="name"
                           placeholder="Nhập tên loại hàng..." style="margin-right: 5px">
                    <input type="text" class="col-lg-2" name="brand_id"
                           placeholder="Nhập loai hàng..." style="margin-right: 5px">
                    <button type="submit" class="btn-search"
                            title="Tìm kiếm sản phẩm">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-hover table-bordered table-striped col-10 m-auto">
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
                        <td class="text-center">{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td class="text-center">{{$product->brand->name}}</td>
                        <td class="text-center"><img src="uploads/products/{{$product->image}}" height="100"
                                                     width="150">
                        </td>
                        <td class="text-center">{{$product->microprocessors}}</td>
                        <td class="text-center">{{$product->screen}}</td>
                        <td class="text-center">{{number_format($product->price)}} <u>đ</u></td>
                        <td class="text-center">{{$product->quantity}}</td>
                        <td class="text-center">
                            <form action="{{route('products.destroy',['product'=>$product->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-del"
                                        title="Xoá sản phẩm"
                                        style="border-radius: 50%" title="Xóa">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-warning"
                                   title="Chỉnh sửa sản phẩm"
                                   style="border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('products.show',['product'=>$product->id])}}" class="btn btn-primary"
                                   title="Xem sản phẩm"
                                   style="color: white;border-radius: 50%"><i class="fas fa-eye"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-item">{{$products->links()}}</div>
        </div>
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
