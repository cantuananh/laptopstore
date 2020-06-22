@extends('frontend.layouts.master')
@section('content')
    <link rel="stylesheet" href="backend/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <div class="wrapper">
        <aside class="main-sidebar sidebar-light-white elevation-2">
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="profile/thongtin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Tài Khoản của tôi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="profile/thongtin" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Đơn mua
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content1')
    </div>
@endsection
