@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phiếu nhập kho
                        <small>Danh sách</small>
                        <a href="{{route('bills.create')}}" class="btn btn-primary"
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
            <form action="{{route('bills.index')}}" method="get" role="search">
                <div class="input-group">
                    <input type="text" name="name"
                           placeholder="Nhập tên..." style="width: 50%;margin-right: 10px">
                    <select style="width: 20%; height: 25px; margin-right: 10px" name="payment">
                        <option value="">Tất cả</option>
                        <option value="1">Tiền mặt</option>
                        <option value="2">Qua thẻ</option>
                    </select>
                    <button type="submit" style="width: 20%">
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
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr class="odd gradeX">
                        <td>{{$bill->id}}</td>
                        <td>{{$bill->user->name}}</td>
                        <td>
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
                        <td> 1000000 <u>đ</u></td>
                        <td>
                            <form action="{{route('bills.destroy',['bill'=>$bill->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-del"
                                        style="border-radius: 50%" title="xoa">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <a href="{{route('bills.edit',['bill'=>$bill->id])}}" class="btn btn-primary"
                                   style="color: white;border-radius: 50%"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('bills.show',['bill'=>$bill->id])}}" class="btn btn-success"
                                   style="color: white;border-radius: 50%"><i class="fas fa-plus-circle"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
