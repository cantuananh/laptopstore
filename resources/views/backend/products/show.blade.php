@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết sản phẩm
                        <small>Chi tiết</small>
                    </h1>
                </div>
            </div>
            <form action="{{route('products.show',['product'=>$id])}}" method="get" role="search">
                <div class="input-group">
                    <input type="text" class="col-lg-3" name="seri"
                           placeholder="Nhập số seri..." style="margin-right: 5px">
                    <button type="submit" class="col-lg-2">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Số seri</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody class="table__list_item">
                @foreach($product_items as $item)
                    <tr class="odd gradeX">
                        <td>{{$item->id}}</td>
                        <td>
                            {{$item->seri}}
                        </td>
                        <td>
                            @if($item->status == 1)
                                Chưa bán
                            @else
                                Đã Bán
                            @endif
                        </td>
                        <td class="center">
                            <form action="{{route('updateDetailProduct',['id'=>$item->id])}}" method="POST">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-success"
                                        style="color: #d40e0e;border-radius: 50%;background: #18bd0d"><i
                                        class="fab fa-adn"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
