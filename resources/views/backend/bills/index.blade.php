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
                    <input type="text" name="name"
                           placeholder="Nhập tên phiếu nhập kho..." style="width: 50%;margin-right: 10px">
                    <select style="width: 20%; height: 25px; margin-right: 10px" name="payment">
                        <option value="">Tất cả</option>
                        <option value="1">Tiền mặt</option>
                        <option value="0">Qua thẻ</option>
                    </select>
                    <button type="submit" style="width: 20%" class="col-lg-1" title="Thêm phiếu nhập kho">
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-striped table-bordered table-hover test table-id">
                <thead>
                <tr align="center">
                    <th>Mã phiếu</th>
                    <th>Nhân viên</th>
                    <th>Ngày nhập</th>
                    <th>Nhà cung cấp</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr class="odd gradeX">
                        <td class="text-center">{{$bill->id}}</td>
                        <td>{{$bill->user->name}}</td>
                        <td class="text-center">
                            <?php Carbon\Carbon::setLocale('vi');
                            if (Carbon\Carbon::createFromTimestamp(strtotime($bill->created_at))->diffInHours() >= 24) {
                                $date = $bill->created_at;
                            } else {
                                $date = Carbon\Carbon::createFromTimestamp(strtotime($bill->created_at))->diffforHumans();
                            }
                            ?>
                            {{$date}}
                        </td>
                        <td> {{$bill->supplier->name}}</td>
                        <td> @if($bill->payment==1) Tiền mặt @else Qua thẻ @endif  </td>
                        <td> {{ number_format($bill->total_price-$bill->total_price*($bill->supplier->percent_discount/100))}}
                            <u>đ</u></td>
                        <td class="text-center">
                            <form action="{{route('updateBillStatus',['id'=>$bill->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @if($bill->status == 1)
                                    <i class="fas fa-check-circle" title="Chưa thanh toán"></i>
                                @else
                                    <i class="fas fa-check-circle" title="Đã thanh toán" style="color: green"></i>
                                @endif
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="{{route('bills.destroy',['bill'=>$bill->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                @if($bill->status == 1)
                                    <button type="submit" class="btn btn-danger btn-del"
                                            style="border-radius: 50%" title="Xoá phiếu nhập kho">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    <a href="{{route('bills.edit',['bill'=>$bill->id])}}"
                                       title="Chỉnh sửa phiếu nhập kho"
                                       class="btn btn-warning"
                                       style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                                @endif
                                <a href="{{route('bills.show',['bill'=>$bill->id])}}"
                                   title="Xem phiếu nhập kho"
                                   class="btn btn-primary"
                                   style="color: white;border-radius: 50%"><i class="fas fa-eye"></i></a>
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
            {{$bills->links()}}
        </div>
    </div>
@endsection

<style>
    .fas.fa-check-circle {
        font-size: 1.5rem;
    }
</style>
