@extends('backend.layouts.master')
@section('content')
    @include('backend.orders.order_detail.create')
    @include('backend.orders.order_detail.edit')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('quantity'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session()->get('quantity') }}
                        </div>
                    @endif
                    <h1 class="page-header text-center">Chi tiết hoá đơn bán hàng
                        @if($order->status == 1)
                            <button class="btn btn-success" data-toggle="modal" data-target="#newOrderProductModal"
                                    value="{{$order->id}}" style="color: white;border-radius: 50%"><i
                                    class="fas fa-plus-circle"></i>
                            </button>
                        @endif
                        <a href="{{route('orders.index')}}" class="btn btn-primary"
                           style="color: white;border-radius: 50%"><i class="fa fa-arrow-left"
                                                                      aria-hidden="true"></i></a>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover col-10 m-auto">
                    <thead>
                    <tr align="center">
                        <th class="align-middle">ID</th>
                        <th class="align-middle">Tên sản phẩm</th>
                        <th class="align-middle">Hình ảnh sản phẩm</th>
                        <th class="align-middle">Mô tả sản phẩm</th>
                        <th class="align-middle">Bảo hành</th>
                        <th class="align-middle">Đơn giá</th>
                        <th class="align-middle">Số lượng</th>
                        <th class="align-middle">Thành tiền</th>
{{--                        <th class="align-middle">Hành động</th>--}}
                    </tr>
                    </thead>
                    <tbody class="table__list_item">
                    @foreach($product_items as $item)
                        <tr class="odd gradeX">
                            <td class="text-center align-middle">{{$item->id}}</td>
                            <td class="text-center align-middle>"{{$item->detail_product->product->name}}</td>
                            <td class="text-center align-middle"><img
                                    src="uploads/products/{{$item->detail_product->product->image}}" height="100"
                                    width="100"></td>
                            <td class="text-center align-middle">
                                {{$item->detail_product->product->name}} . Ram {{$item->detail_product->product->ram}}
                                GB , Màn hình: {{$item->detail_product->product->screen }}, Vi xử
                                lý: {{$item->detail_product->product->microprocessors}}
                            </td>
                            <td class="text-center align-middle">
                                {{$item->detail_product->product->guarantee_time}} Tháng
                            </td>
                            <td class="text-center align-middle">
                                {{number_format($item->detail_product->product->price)}} <u>đ</u>
                            </td>
                            <td class="text-center align-middle">
                                {{$item->quantity}}
                            </td>
                            <td class="text-center align-middle">
                                {{number_format($item->quantity*$item->detail_product->product->price)}} <u>đ</u>
                            </td>
{{--                            <td class="text-center align-middle">--}}
{{--                                <button class="btn btn-warning btnEditOrderProductModal" data-toggle="modal"--}}
{{--                                        style="border-radius: 50%;"--}}
{{--                                        data-target="#editOrderProductModal" data-id="{{$item->id}}"--}}
{{--                                        title="Sửa chi tiết hoá đơn">--}}
{{--                                    <i class="fas fa-pencil-alt"></i>--}}
{{--                                </button>--}}
{{--                                <button class="btn btn-danger btnDeleteOrderProductModal btn-del" data-toggle="modal"--}}
{{--                                        style="border-radius: 50%"--}}
{{--                                        data-target="#btnDeleteOrderDetailModal" data-id="{{$item->id}}"--}}
{{--                                        title="Xoá chi tiết hoá đơn">--}}
{{--                                    <i class="far fa-trash-alt"></i>--}}
{{--                                </button>--}}
{{--                                <a href="{{route('exportGuarantee',['id'=>$item->id])}}"--}}
{{--                                   title="Xuất file PDF"--}}
{{--                                   class="btn btn-success"--}}
{{--                                   style="color: white;border-radius: 50%"><i class="fas fa-download"></i></a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
