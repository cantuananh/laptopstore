@extends('backend.layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Chi tiết sản phẩm
                        <a href="{{route('products.index')}}" class="btn btn-primary"
                           title="Trở về"
                           style="color: white;border-radius: 50%">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </h1>
                </div>
            </div>
            <form action="{{route('products.show',['product'=>$id])}}" method="get" role="search">
                <div class="input-group d-flex justify-content-center">
                    <input type="text" class="col-lg-2" name="seri"
                           placeholder="Nhập số seri..." style="margin-right: 5px">
                    <button type="submit" title="Tìm kiếm" class="btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <br>
            <table class="table table-striped table-bordered table-hover col-10 m-auto">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Số seri</th>
                    <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody class="table__list_item">
                @foreach($product_items as $item)
                    <tr class="odd gradeX">
                        <td class="text-center align-middle">{{$item->id}}</td>
                        <td class="align-middle text-center">
                            {{$item->seri}}
                        </td>
                        <td class="text-center align-middle">
                            <form action="{{route('updateDetailProduct',['id'=>$item->id])}}" method="POST">
                                {!! csrf_field() !!}
                                @if($item->status == 1)
                                    <button style="border: unset; background-color: unset;"><i
                                            class="fas fa-check-circle" style="color: gray;"
                                            title="Chưa bán"></i></button>
                                @else
                                    <button style="border: unset; background-color: unset;"><i
                                            class="fas fa-check-circle" title="Đã bán"
                                            style="color: green"></i></button>
                                @endif
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
</style>
