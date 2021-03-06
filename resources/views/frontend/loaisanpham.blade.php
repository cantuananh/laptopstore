@extends('frontend.layouts.master')
@section('content')
    <div class="inner-header" style="background-color: #D6EAF8">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Loại sản phẩm "{{$loai_sp->name}}"</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('index')}}">Trang chủ</a> / <span>Loại sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            <h3>Thương hiệu</h3>
                            @foreach($loai as $l)
                                <li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Tất cả sản phẩm thuộc "{{$loai_sp->name}}"</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy <b>{{count($chi_tiet)}}</b> sản phẩm:</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($chi_tiet as $sp)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            <div class="ribbon-wrapper">
                                                @if($sp->cost>$sp->price)
                                                    <div class="ribbon sale">Sale</div>
                                                @endif
                                            </div>
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham',$sp->id)}}"><img
                                                        src="uploads/products/{{$sp->image}}" alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$sp->name}}</p>
                                                <p class="single-item-price" style="font-size: 18px">
                                                    @if($sp->cost>$sp->price)
                                                        <span
                                                            class="flash-del">{{number_format($sp->cost)}}<u>đ</u></span>
                                                    @endif
                                                    <span
                                                        class="flash-sale">{{number_format($sp->price)}}<u>đ</u></span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   title="Thêm vào giỏ hàng"
                                                   href="{{route('themgiohang',$sp->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   style="color: black"
                                                   title="Chi tiết sản phẩm"
                                                   href="{{route('chitietsanpham',$sp->id)}}">Chi
                                                    tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="space10">&nbsp;</div>
                            </div>
                            <div class="row">{{$chi_tiet->links()}}</div>
                        </div>
                        <div class="space50">&nbsp;</div>
                        <div class="beta-products-list">
                            <h4>Sản phẩm khác:</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy <b>{{count($sp_khac)}}</b> sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($sp_khac as $spkhac)
                                    <div class="col-sm-4 list-product">
                                        <div class="single-item">
                                            <div class="ribbon-wrapper">
                                                @if($spkhac->cost>$spkhac->price)
                                                    <div class="ribbon sale">Sale</div>
                                                @endif
                                            </div>
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham',$spkhac->id)}}"><img
                                                        src="uploads/products/{{$spkhac->image}}" alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$spkhac->name}}</p>
                                                <p class="single-item-price" style="font-size: 18px">
                                                    @if($spkhac->cost>$spkhac->price)
                                                        <span class="flash-del">{{number_format($spkhac->cost)}}<u>đ</u></span>
                                                    @endif
                                                    <span
                                                        class="flash-sale">{{number_format($spkhac->price)}}<u>đ</u></span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   title="Thêm vào giỏ hàng"
                                                   href="{{route('themgiohang',$spkhac->id)}}.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   title="Chi tiết sản phẩm"
                                                   style="color: black"
                                                   href="{{route('chitietsanpham',$spkhac->id)}}">Chi tiết <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="space10">&nbsp;</div>
                            </div>
                            <div class="row">{{$sp_khac->links()}}</div>
                            <div class="space40">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .single-item-caption {
        margin-top: 0.7rem !important;
    }

    .list-product {
        margin-top: 1.6rem;
    }

    .pagination {
        padding-left: 0.9rem !important;
    }
</style>
