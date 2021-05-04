@extends('frontend.layouts.master')
@section('content')
    <div class="inner-header" style="background-color: #D6EAF8">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Giới thiệu</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{'index'}}">Trang chủ</a> / <span>Giới thiệu</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <h2 class="text-center wow fadeInDownwow fadeInDown">IT Laptop</h2>
            <div class="space20">&nbsp;</div>
            <h5 class="text-center other-title wow fadeInLeft">Người quản lý</h5>
            <p class="text-center wow fadeInRight">Cấn Tuấn Anh</p>
            <div class="space20">&nbsp;</div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <div class="beta-person media">
                        <img class="pull-left" src="uploads/introduce/banner3.png" height="350px" width="600px" alt="">
                        <div class="media-body beta-person-body">
                            <h5>Sản phẩm đa dạng</h5>
                            <p class="font-large">Sản phẩm của chúng tôi đa dạng về thương hiệu.</p>
                            <p>Giá cả phù hợp với tất cả mọi người.</p>
                            <p>Luôn luôn cập nhật những mẫu Laptop mới nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 wow fadeInRight">
                    <div class="beta-person media">
                        <img class="pull-left" src="uploads/introduce/banner4.jpg" height="350px" width="600px" alt="">
                        <div class="media-body beta-person-body">
                            <h5>Chất lượng và bảo hành tốt</h5>
                            <p class="font-large">Tất cả sản phẩm tại cửa hàng đều là chính hãng.</p>
                            <p>Cam kết 1 đổi 1 trong vòng 30 ngày nếu phát sinh lỗi do nhà sản xuất.</p>
                            <p>Chúng tôi luôn luôn quan tâm tới nhu cầu của khách hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .font-large {
        margin-top: 0.9rem;
    }
</style>
