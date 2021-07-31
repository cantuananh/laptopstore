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
                    <h1 class="page-header text-center">Chi tiết phiếu nhập kho
                        @if($bill->status == 1)
                        <button class="btn btn-success" data-toggle="modal" data-target="#newBillProductModal"
                                title="Thêm chi tiết phiếu nhập kho"
                                value="{{$bill->id}}" style="color: white;border-radius: 50%"><i
                                class="fas fa-plus-circle"></i>
                        </button>
                        @endif
                        <a href="{{route('bills.index')}}" class="btn btn-primary"
                           title="Trở về"
                           style="color: white;border-radius: 50%"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover col-10 m-auto">
                    <thead>
                    <tr align="center">
                        <th class="align-middle">Mã sản phẩm</th>
                        <th class="align-middle">Tên sản phẩm</th>
                        <th class="align-middle">Hình ảnh sản phẩm</th>
                        <th class="align-middle">Mô tả sản phẩm</th>
                        <th class="align-middle">Thời gian bảo hành</th>
                        <th class="align-middle">Số lượng</th>
                        <th class="align-middle">Đơn giá</th>
                        <th class="align-middle">Thành tiền</th>
{{--                        <th>Chức năng</th>--}}
                    </tr>
                    </thead>
                    <tbody class="table__list_item">
                    @foreach($product_items as $item)
                        <tr class="odd gradeX">
                            <td class="text-center align-middle">{{$item->detail_product->product->id}}</td>
                            <td class="align-middle">{{$item->detail_product->product->name}}</td>
                            <td class="text-center align-middle"><img src="uploads/products/{{$item->detail_product->product->image}}" height="100"
                                     width="100"></td>
                            <td class="align-middle">
                                {{$item->detail_product->product->descriptionf}} . Ram {{$item->detail_product->product->ram}} GB , Màn hình: {{$item->detail_product->product->screen }}, Vi xử lý: {{$item->detail_product->product->microprocessors}}
                            </td>
                            <td class="text-center align-middle">
                                {{$item->detail_product->product->guarantee_time}} Tháng
                            </td>
                            <td class="text-center align-middle">
                                {{$item->quantity}}
                            </td>
                            <td class="text-center align-middle">
                                {{$item->detail_product->product->price}} <u>đ</u>
                            </td>
                            <td class="text-center align-middle">
                                {{$item->detail_product->product->price*$item->quantity}} <u>đ</u>
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
