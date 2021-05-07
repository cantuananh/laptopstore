{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <title>Admin Laptop Store | Log in</title>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">--}}
{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
{{--    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="backend/dist/css/adminlte.min.css">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
{{--</head>--}}
{{--<body class="hold-transition login-page">--}}
{{--<div class="login-box">--}}
{{--    <div class="login-logo">--}}
{{--        <a href="{{route('login')}}"><b>Admin </b>LaptopStore</a>--}}
{{--    </div>--}}
{{--    <div class="card">--}}
{{--        <div class="card-body login-card-body">--}}
{{--            <p class="login-box-msg">Đăng nhập để vào trang Admin</p>--}}
{{--            <form action="{{url('login')}}" method="post">--}}
{{--                <div class="input-group mb-3">--}}
{{--                    <input type="email" class="form-control" placeholder="Email" name="email">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <div class="input-group-text">--}}
{{--                            <span class="fas fa-envelope"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="input-group mb-3">--}}
{{--                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <div class="input-group-text">--}}
{{--                            <span class="fas fa-lock"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-6">--}}
{{--                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                {{csrf_field()}}--}}
{{--            </form>--}}
{{--            @if(session('error'))--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span--}}
{{--                            aria-hidden="true">&times;</span></button>--}}
{{--                    {{session('error')}}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <br>--}}
{{--            <p class="mb-1">--}}
{{--                <a href="{{route('register')}}">Bạn chưa có tài khoản?</a>--}}
{{--            </p>--}}
{{--            <p class="mb-1">--}}
{{--                <a href="{{route('password.request')}}">Bạn quên mật khẩu của bạn?</a>--}}
{{--            </p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<script src="plugins/jquery/jquery.min.js"></script>--}}
{{--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="backend/dist/js/adminlte.min.js"></script>--}}

{{--</body>--}}
{{--</html>--}}


    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V8</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form action="{{url('login')}}" method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
                        IT Laptop Store
					</span>
                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100" type="email" name="email" placeholder="Enter email...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter password">
                    <input class="input100" type="password" name="password" placeholder="Enter password...">
                    <span class="focus-input100"></span>
                </div>

                <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

                    <a href="{{route('password.request')}}" class="txt2">
                        Username / Password?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn btn btn-primary btn-block" type="submit">
                        Đăng nhập
                    </button>
                </div>
                {{csrf_field()}}
                @if(session('error'))
                    <div class="alert alert-danger error-message text-center" role="alert" style="color: red;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span style="color: red !important;" aria-hidden="true">&times;</span></button>
                        <span>{{session('error')}}</span>
                    </div>
                @endif
                <div class="flex-col-c p-t-170 p-b-40">
                    <a href="{{route('register')}}" class="txt3">
                        Đăng ký tài khoản
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .error-message {
        padding-top: 1.5rem !important;
    }
</style>


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
