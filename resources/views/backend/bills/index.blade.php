@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Danh sách phiếu nhập kho
                        <a href="{{route('bills.create')}}"
                           title="Thêm phiếu nhập kho"
                           style="color: green; font-size: 1.5rem"><i class="fas fa-plus-circle"></i></a>
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
            <form action="{{route('bills.index')}}" method="get" role="search">
                <div class="input-group d-flex justify-content-center">
                    <input type="text" name="name" style="margin-right: 5px"
                           placeholder="Nhập tên nhân viên..." class="col-lg-2">
                    <select name="payment" class="col-lg-1" style="margin-right: 5px">
                        <option value="">Tất cả</option>
                        <option value="1">Tiền mặt</option>
                        <option value="0">Qua thẻ</option>
                    </select>
                    <button type="submit" class="btn-search" title="Thêm phiếu nhập kho">
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-striped table-bordered table-hover test table-id col-10 m-auto">
                <thead>
                <tr align="center">
                    <th class="align-middle">Mã phiếu</th>
                    <th class="align-middle">Nhân viên</th>
                    <th class="align-middle">Ngày nhập</th>
                    <th class="align-middle">Nhà cung cấp</th>
                    <th class="align-middle">Phương thức thanh toán</th>
                    <th class="align-middle">Tổng tiền</th>
                    <th class="align-middle">Trạng thái</th>
                    <th class="align-middle">Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr class="odd gradeX">
                        <td class="text-center align-middle">{{$bill->id}}</td>
                        <td class="align-middle">{{optional($bill->user)->name}}</td>
                        <td class="text-center align-middle">
                            <?php Carbon\Carbon::setLocale('vi');
                            if (Carbon\Carbon::createFromTimestamp(strtotime($bill->created_at))->diffInHours() >= 24) {
                                $date = $bill->created_at;
                            } else {
                                $date = Carbon\Carbon::createFromTimestamp(strtotime($bill->created_at))->diffforHumans();
                            }
                            ?>
                            {{$date}}
                        </td>
                        <td class="align-middle"> {{$bill->supplier->name}}</td>
                        <td class="align-middle text-center"> @if($bill->payment==1) Tiền mặt @else Qua thẻ @endif  </td>
                        <td class="align-middle"> {{ number_format($bill->total_price-$bill->total_price*($bill->supplier->percent_discount/100))}}
                            <u>đ</u></td>
                        <td class="text-center align-middle">
                            <form action="{{route('updateBillStatus',['id'=>$bill->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @if($bill->status == 1)
                                    <button style="border: unset; background-color: unset;"><i
                                            class="fas fa-check-circle" style="color: gray" title="Chưa thanh toán"></i></button>
                                @else
                                    <button style="border: unset; background-color: unset;"><i
                                            class="fas fa-check-circle" title="Đã thanh toán"
                                            style="color: green"></i></button>
                                @endif
                            </form>
                        </td>
                        <td class="text-center align-middle">
                            <form action="{{route('bills.destroy',['bill'=>$bill->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <a href="{{route('bills.show',['bill'=>$bill->id])}}"
                                   title="Xem phiếu nhập kho"
                                   class="btn btn-primary"
                                   style="color: white;border-radius: 50%"><i class="fas fa-eye"></i></a>
                                @if($bill->status == 1)
                                    <a href="{{route('bills.edit',['bill'=>$bill->id])}}"
                                       title="Chỉnh sửa phiếu nhập kho"
                                       class="btn btn-warning"
                                       style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="submit" class="btn btn-danger btn-del"
                                            style="border-radius: 50%" title="Xoá phiếu nhập kho">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                @endif
                                @if($bill->status == 2)
                                    <a href="{{route('exportBill',['id'=>$bill->id])}}" class="btn btn-success"
                                       title="Xuất file PDF"
                                       style="color: white;border-radius: 50%;">
                                        <i class="fas fa-download"></i></a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-item">{{$bills->links()}}</div>
        </div>
    </div>
@endsection

<style>
    .fas.fa-check-circle {
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
