<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | IT Laptop</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="backend/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="backend/dist/css/dashboard.css" rel="stylesheet" type="text/css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <ul class="nav navbar-top-links navbar-right">
                @if(Auth::guard()->check())
                    <a href=""
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </ul>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{route('statistical')}}" class="brand-link">
            <img src="uploads/logo/IT_laptop_logo.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light" style="font-size: 15px;"><b>Trang quản trị</b></span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="uploads/users/{{Auth::guard()->user()->image}}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('users.profile')}}" class="d-block">{{Auth::guard()->user()->name}}</a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="{{route('statistical')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('brands.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Thương hiệu
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('products.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Sản phẩm
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('bills.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Phiếu nhập kho
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('orders.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Hóa Đơn Bán Hàng
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Tài khoản
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('kekhai')}}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Thống kê
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper" style="background-color: #D6EAF8">
        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
    <footer class="main-footer text-center">
        <strong>Copyright &copy; 2021 <a href="https://www.facebook.com/daotrongquang">IT laptop - Cấn Tuấn
                Anh</a>.</strong>
        All rights reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="backend/js/bill-product.js"></script>
<script src="backend/js/order-product.js"></script>
<script src="backend/dist/js/adminlte.min.js"></script>
<script src="backend/dist/js/demo.js"></script>
<script src="backend/js/warning-delete.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="backend/js/count-up.js"></script>
<script src="backend/js/flot-data.js"></script>
<script src="backend/js/morris-data.js"></script>
<script src="backend/js/sb-admin-2.js"></script>
<script src="backend/js/sweetalert.min.js"></script>
@yield('js')
</body>
</html>
