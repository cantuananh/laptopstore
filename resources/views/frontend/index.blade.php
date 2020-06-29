@extends('frontend.layouts.master')
@section('content')
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        @foreach($slides as $slide)
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                     data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                     data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                     data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                     data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                     data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                         data-bgposition="center center" data-bgrepeat="no-repeat"
                                         data-lazydone="undefined" src="uploads/slides/{{$slide->image}}"
                                         data-src="uploads/slides/{{$slide->image}}"
                                         style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('uploads/slides/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <div class="beta-products-list">
                                <h4>Sản phẩm mới</h4>
                                <div class="beta-products-details">
                                    <p class="pull-left">Tìm thấy {{count($product_news)}} sản phẩm</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    @foreach($product_news as $product)
                                        <div class="col-sm-3">
                                            <div class="single-item">
                                                @if($product->cost > $product->price)
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon sale">Sale</div>
                                                    </div>
                                                @endif
                                                <div class="single-item-header">
                                                    @if(!$product->quantity)
                                                        <span
                                                            style="position: absolute; background-color: red;color: white;">Tạm hết hàng</span>
                                                    @endif
                                                    <a href="{{route('chitietsanpham',$product->id)}}"><img
                                                            src="uploads/products/{{$product->image}}" alt=""
                                                            height="250px" width="250px"></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{$product->name}}</p>
                                                    <p class="single-item-price" style="font-size: 18px">
                                                        @if($product->cost > $product->price)
                                                        <span class="flash-del">{{number_format($product->cost)}}đ</span>
                                                        @endif
                                                        <span class="flash-sale">{{number_format($product->price)}}đ</span>
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left"
                                                       href="{{route('themgiohang',$product->id)}}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary"
                                                       href="{{route('chitietsanpham',$product->id)}}">Chi tiết<i
                                                            class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="beta-products-list">
                                <h4>Tất cả sản phẩm</h4>
                                <div class="beta-products-details">
                                    <p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-sm-3">
                                            <div class="single-item">
                                                @if($product->cost > $product->price)
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon sale">Sale</div>
                                                    </div>
                                                @endif
                                                <div class="single-item-header">
                                                    @if(!$product->quantity)
                                                        <span
                                                            style="position: absolute; background-color: red;color: white;">Tạm hết hàng</span>
                                                    @endif
                                                    <a href="{{route('chitietsanpham',$product->id)}}"><img
                                                            src="uploads/products/{{$product->image}}" alt=""
                                                            height="250px" width="250px"></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{$product->name}}</p>
                                                    <p class="single-item-price" style="font-size: 18px">
                                                        @if($product->cost > $product->price)
                                                            <span class="flash-del">{{number_format($product->cost)}}đ</span>
                                                        @endif
                                                        <span class="flash-sale">{{number_format($product->price)}}đ</span>
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left"
                                                       href="{{route('themgiohang',$product->id)}}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary"
                                                       href="{{route('chitietsanpham',$product->id)}}">Chi tiết<i
                                                            class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    @endforeach
                                </div>
                                <div class="row">{{$products->links()}}</div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
