<div id="header" style="background-color: #f4f6f6">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-location-arrow"></i>Xóm Mơ Nồng, Kim Quan, Thạch Thất, Hà Nội</a>
                    </li>
                    <li><a href=""><i class="fa fa-phone"></i>Liên hệ: 0348158822</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="profile/thongtin">Welcome: {{Auth::user()->name}}</a></li>
                        <li><a href="{{route('dangxuat')}}">Logout</a></li>
                    @else
                        <li><a href="{{route('dangky')}}">Register</a></li>
                        <li><a href="{{route('dangnhap')}}">Login</a></li>
                    @endif

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('index')}}" id="logo"><img src="uploads/logo/IT_laptop_logo.png" height="50px" width="150px"
                                           alt="image"></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('index')}}">
                        <input type="text" value="" name="name" id="s" placeholder="Enter keywords..."/>
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                @if($product_cart->count())
                    <div class="beta-comp">
                        <div class="cart" title="Xem giỏ hàng">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i>Giỏ hàng
                                ({{$product_cart->count()}})<i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body" style="background-color: #f4f6f6">
                                @foreach($product_cart as $cart)
                                    <div class="cart-item">
                                        <a class="cart-item-delete"
                                           title="Xoá khỏi giỏ hàng"
                                           href="{{url('del-cart',['id'=>$cart['id']])}}"><i
                                                class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img
                                                    src="uploads/products/{{$cart->attributes->image}}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{$cart->name}}</span>
                                                <span
                                                    class="cart-item-amount">Số lượng: {{number_format($cart->quantity)}}</span>
                                                <span
                                                    class="cart-item-amount">Giá: {{number_format($cart->price)}}<u>đ</u></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng
                                        tiền: {{number_format(\Cart::getSubTotal())}} <u>đ</u><span
                                            class="cart-total-value"></span></div>
                                    <div class="clearfix"></div>
                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="{{route('giohang')}}"
                                           title="Đặt hàng"
                                           class="beta-btn order primary text-center"
                                        ><b>Đặt hàng</b><i
                                                class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('index')}}">Trang chủ</a></li>
                    <li><a href="{{route('loaisanpham',1)}}">Loại Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $loai)
                                <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('thongtinlienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>

<style>
    .fa.fa-times {
        position: relative;
        top: 1.6px;
        right: 0.9px;
    }

    .beta-btn.order {
        background-color: #006899;
        color: white;
    }

    .fa.fa-shopping-cart {
        color: #DC7633 !important;
        font-size: 1rem !important;
    }
</style>
