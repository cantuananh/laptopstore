@extends('frontend.layouts.master')
@section('content')
<div class="inner-header">
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

    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29752.433313305297!2d105.86696128492372!3d21.229700650347468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135047bc0614a7d%3A0x8df4c0918b0d724d!2zxJDhu6ljIEhvw6AsIFPDs2MgU8ahbiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1593366600459!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-6">
                <h2>Thông tin liên hệ</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title">Địa chỉ</h6>
                <p>
                  Số 6, Đức Hòa, Sóc Sơn, Hà Nội.
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Liên hệ</h6>
                <p>
                    Chúng tôi luôn giải đáp những thắc mắc của bạn! <br>
                    <a href="aovanquang@gmail.com">aovanquang@gmail.com</a>
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Khẩu hiệu</h6>
                <p>
                   Chúng tôi luôn nhìn vào sự hài lòng của khách hàng để hoàn thiện hơn.<br>
                    <a href="aovanquang@gmail.com">aovanquang@gmail.com</a>
                </p>
            </div>
            <div class="col-sm-6">
                <img class="pull-left" src="uploads/slides/banner14.png" height="320px" width="500px" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
