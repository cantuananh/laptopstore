@extends('frontend.layouts.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">{{$detail_product->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('index')}}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="uploads/products/{{$detail_product->image}}" alt="" height="230px" width="180px">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <div class="space20">&nbsp;</div>
                                <p class="single-item-title" style="font-size: 25px">{{$detail_product->name}}</p>
                                <div class="space20">&nbsp;</div>
                                <p class="single-item-price" style="font-size: 25px">
                                    @if($detail_product->cost>$detail_product->price)
                                        <span class="flash-del">{{number_format($detail_product->cost)}}<u>đ</u></span>
                                    @endif
                                    <span class="flash-sale">{{number_format($detail_product->price)}}<u>đ</u></span>
                                </p>
                            </div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-options">
                                <a class="add-to-cart" href="{{route('themgiohang',$detail_product->id)}}"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description"><b>Mô tả</b></a></li>
                        </ul>
                        <div class="panel" id="tab-description">
                            <p>
                                {{$detail_product->description}}
                                <br> Bộ vi xử lý: {{$detail_product->microprocessors}}
                                <br> Màn hình: {{$detail_product->screen}} inch
                                <br> Bộ nhớ: {{$detail_product->ram}} GB
                            </p>
                            <br>
                            <form action="{{route('feedback',['id' => $id])}}" method="POST">
                                {!! csrf_field() !!}
                                <label>Bình luận của bạn</label>
                                <br>
                                <input type="text" name="comment" maxlength="80"
                                       placeholder="Nhập bình luận của bạn về sản phẩm!">
                                <br>
                                @if($check)
                                    <button type="submit" class="btn btn-primary ">Đánh giá sản
                                        phẩm
                                    </button>
                                @else
                                    <a href="{{route('dangnhap')}}" class="btn btn-primary">Đánh giá sản
                                        phẩm</a>
                                @endif
                            </form>
                            <hr>
                            <p>
                            @foreach($feed_backs as $fb)
                                <div>
                                    <img src="uploads/users/{{$fb->user->image}}" alt="" height="42px"
                                         width="34px"> &nbsp; {{$fb->user->name}}
                                    <br>
                                    {{$fb->content}}
                                    <br>
                                </div>
                                @endforeach
                                </p>
                        </div>
                    </div>
                    <div class="space40">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Sản phẩm tương tự</h4>
                        <div class="row">
                            @foreach($sanpham_tuongtu as $sptt)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper">
                                            @if($sptt->cost>$sptt->price)
                                                <div class="ribbon sale">Sale</div>
                                            @endif
                                        </div>
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham',$sptt->id)}}"><img
                                                    src="uploads/products/{{$sptt->image}}" alt="" height="230px"
                                                    width="180px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sptt->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">
                                                @if($sptt->cost>$sptt->price)
                                                    <span
                                                        class="flash-del">{{number_format($sptt->cost)}}<u>đ</u></span>
                                                @endif
                                                <span class="flash-sale">{{number_format($sptt->price)}}<u>đ</u></span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="{{route('themgiohang',$sptt->id)}}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi
                                                tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{$sanpham_tuongtu->links()}}</div>
                    </div>
                </div>
                <div class="col-sm-3 list-product aside">
                    <div class="widget">
                        <h3 class="widget-title">Tất cả sản phẩm</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach( $sanpham_noibat as $sptt)
                                    <div class="media beta-sales-item">
                                        <a href="{{route('chitietsanpham',$sptt->id)}}"><img
                                                src="uploads/products/{{$sptt->image}}" alt=""></a>
                                        <div class="media-body">
                                            <p class="single-item-title" style="font-size: 18px">{{$sptt->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">
                                                @if($sptt->cost>$sptt->price)
                                                    <span
                                                        class="flash-del">{{number_format($sptt->cost)}}<u>đ</u></span>
                                                @endif
                                                <span class="flash-sale">{{number_format($sptt->price)}}<u>đ</u></span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
</style>
