@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Danh sách hoá đơn bán hàng
                        <a href="{{route('orders.create')}}"
                           title="Thêm hoá đơn"
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
                @if(session('errors'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Warning</strong>
                        {{session('errors')}}
                    </div>
                @endif
            </div>
            <form action="{{route('orders.index')}}" method="get" role="search">
                <div class="input-group d-flex justify-content-center">
                    <input type="text" name="name"
                           placeholder="Nhập tên khách hàng..." style="width: 50%;margin-right: 10px">
                    <select style="width: 20%; height: 25px; margin-right: 10px" name="payment">
                        <option value="">Tất cả</option>
                        <option value="1">Tiền mặt</option>
                        <option value="2">Qua thẻ</option>
                    </select>
                    <button type="submit" style="width: 20%" class="col-lg-1">
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-striped table-bordered table-hover test table-id">
                <thead>
                <tr align="center">
                    <th>Mã hóa đơn</th>
                    <th>Khách hàng</th>
                    <th>Ngày bán</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="odd gradeX">
                        <td class="text-center">{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td class="text-center">
                            <?php Carbon\Carbon::setLocale('vi');
                            if (Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffInHours() >= 24) {
                                $date = $order->created_at;
                            } else {
                                $date = Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffforHumans();
                            }
                            ?>
                            {{$date}}
                        </td>
                        <td> @if($order->payment==1) Tiền mặt @else Qua thẻ @endif  </td>
                        <td> {{number_format($order->total_price)}} <u>đ</u></td>
                        <td class="text-center">
                            <form action="{{route('updateOrderStatus',['id'=>$order->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @if($order->status==1)
                                    <i class="fas fa-check-circle" title="Chưa thanh toán"></i>
                                @else
                                    <i class="fas fa-check-circle" title="Đã thanh toán" style="color: green"></i>
                                @endif
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="{{route('orders.destroy',['order'=>$order->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                @if($order->status == 1)
                                    <button type="submit" class="btn btn-danger btn-del"
                                            style="border-radius: 50%" title="Xóa hoá đơn">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    <a href="{{route('orders.edit',['order'=>$order->id])}}"
                                       title="Chỉnh sửa hoá đơn"
                                       class="btn btn-warning"
                                       style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                                @endif
                                <a href="{{route('orders.show',['order'=>$order->id])}}"
                                   title="Xem hoá đơn"
                                   class="btn btn-primary"
                                   style="color: white;border-radius: 50%"><i class="fas fa-eye"></i></a>
                                @if($order->status == 2)
                                    <a href="{{route('exportOrder',['id'=>$order->id])}}"
                                       title="Xuất file PDF"
                                       class="btn btn-success"
                                       style="color: white;border-radius: 50%"><i class="fas fa-download"></i></a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </div>
@endsection

<style>
    .fas.fa-check-circle {
        font-size: 1.5rem;
    }
</style>
