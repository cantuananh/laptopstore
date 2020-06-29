@extends('backend.layouts.master')
@section('content')
    @include('backend.bills.bill_detail.create')
    @include('backend.bills.bill_detail.edit')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('seri'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session()->get('seri') }}
                        </div>
                    @endif
                    <h1 class="page-header">Phiếu nhập kho
                        <small>Chi tiết</small>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#newBillProductModal"
                                value="{{$bill->id}}" style="color: white;border-radius: 50%"><i
                                class="fas fa-plus-circle"></i>
                        </button>
                        <a href="{{route('bills.index')}}" class="btn btn-primary"
                           style="color: white;border-radius: 50%"><i class="fa fa-arrow-left"
                                                                      aria-hidden="true"></i></a>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>Mã sản phẩm</th>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
{{--                        <th>Chức năng</th>--}}
                    </tr>
                    </thead>
                    <tbody class="table__list_item">
                    @foreach($product_items as $item)
                        <tr class="odd gradeX">
                            <td>{{$item->detail_product->product->id}}</td>
                            <td>{{$item->detail_product->product->name}}</td>
                            <td><img src="uploads/products/{{$item->detail_product->product->image}}" height="100"
                                     width="100">
                            <td>
                                {{$item->quantity}}
                            </td>
                            <td>
                                {{$item->detail_product->product->price}} <u>đ</u>
                            </td>
                            <td>
                                {{$item->detail_product->product->price*$item->quantity}}
                            </td>
{{--                            <td class="center">--}}
{{--                                <button class="btn btn-danger btnDeleteBillProductModal btn-del" data-toggle="modal"--}}
{{--                                        style="border-radius: 50%"--}}
{{--                                        data-target="#btnDeleteBillDetailModal" data-id="{{$item->id}}"--}}
{{--                                        title="Xóa">--}}
{{--                                    <i class="far fa-trash-alt"></i></button>--}}
{{--                                <button class="btn btn-primary btnEditBillProductModal" data-toggle="modal"--}}
{{--                                        style="border-radius: 50%"--}}
{{--                                        data-target="#editBillProductModal" data-id="{{$item->id}}"--}}
{{--                                        title="Sửa">--}}
{{--                                    <i class="fas fa-pencil-alt"></i></button>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function loadInputSeri(obj) {
            var qty = obj.value;
            var listInputSeri = '';
            for (let i = 0; i < qty; i++) {
                listInputSeri += `<input type='text' placeholder="Nhập số seri thứ ${i + 1}" class='form-control' name='seri${i}'> <br>`;
            }
            console.log(listInputSeri);
            document.getElementById('listSeris').innerHTML = listInputSeri;
        }
    </script>
@endsection
