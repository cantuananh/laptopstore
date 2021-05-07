@extends('frontend.layouts.master')
@section('content')
    <div class="inner-header" style="background-color: #D6EAF8">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Liên hệ</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{'index'}}">Trang chủ</a> / <span>Liên hệ</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="beta-map">
        <div class="abs-fullwidth beta-map wow flipInX">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3723.5553754651205!2d105.57210323289527!3d21.050469355799986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zeMOzbSBtxqEgbuG7k25nLCBraW0gcXVhbiwgdGjhuqFjaCB0aOG6pXQsIGjDoCBu4buZaSA!5e0!3m2!1sen!2s!4v1619614979151!5m2!1sen!2s"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="space50">&nbsp;</div>
            <div class="row">
                <div class="col-sm-6">
                    <h2>Thông tin liên hệ</h2>
                    <div class="space20">&nbsp;</div>
                    <h6 class="contact-title">Địa chỉ</h6>
                    <br>
                    <p>
                        <i class="fa fa-location-arrow"></i> Xóm Mơ Nồng, Kim Quan, Thạch Thất, Hà Nội.
                    </p>
                    <div class="space20">&nbsp;</div>
                    <h6 class="contact-title">Liên hệ</h6>
                    <br>
                    <p>
                        Chúng tôi luôn giải đáp những thắc mắc của bạn! <br>
                        <i class="fa fa-phone"></i> 0348158822
                    </p>
                    <div class="space20">&nbsp;</div>
                    <h6 class="contact-title">Khẩu hiệu</h6>
                    <br>
                    <p>
                        Chúng tôi luôn nhìn vào sự hài lòng của khách
                        <br>hàng để hoàn thiện hơn.
                    </p>
                </div>
                <div class="col-sm-6">
                    <img class="pull-left" src="uploads/slides/banner8.png" height="320px" width="1200px" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
