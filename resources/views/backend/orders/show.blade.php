@extends('backend.layouts.master')
@section('content')
    @include('backend.orders.order_detail.create')
    @include('backend.orders.order_detail.edit')
    @include('backend.orders.order_detail.index')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa Đơn Bán
                        <small>Chi tiết</small>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#newBillProductModal"
                                value="{{$order->id}}">Thêm
                        </button>
                        <a href="{{route('orders.index')}}" class="btn btn-primary"
                           style="color: white;border-radius: 50%"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody class="table__list_item">
                    @foreach($product_items as $item)
                        <tr class="odd gradeX">
                            <td>{{$item->id}}</td>
                            <td>{{$item->detail_product->product->name}}</td>
                            <td><img src="../uploads/products/{{$item->detail_product->product->image}}" height="100"
                                     width="100">
                            <td>
                                {{$item->detail_product->product->price}} <u>đ</u>
                            </td>
                            <td>
                                {{$item->quantity}}
                            </td>
                            <td>
                                1000000 <u>đ</u>
                            </td>
                            <td class="center">
                                <button class="btn btn-danger btnDeleteBillProductModal btn-del" data-toggle="modal"
                                        style="border-radius: 50%"
                                        data-target="#btnDeleteBillDetailModal" data-id="{{$item->id}}"
                                        title="xoa">
                                    <i class="far fa-trash-alt"></i></button>
                                <button class="btn btn-primary btnEditBillProductModal" data-toggle="modal"
                                        style="border-radius: 50%"
                                        data-target="#editBillProductModal" data-id="{{$item->id}}"
                                        title="sua">
                                    <i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-success btnEditBillProductModal" data-toggle="modal"
                                        style="border-radius: 50%"
                                        data-target="#indexBillProductModal" data-id="{{$item->id}}"
                                        title="sua">
                                    <i class="fas fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
