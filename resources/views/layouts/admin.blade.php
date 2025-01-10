<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Каталог товаров</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    {{--select2--}}
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/main.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <p class="animation__shake">Сотрудники</p>
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <a href="{{route('logout')}}" class="btn btn-primary" style="margin-right: 5px">Выйти</a>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light ml-2">Управление каталогом</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link">
                            <i class="fas fas fa-home"></i>
                            <p class="ml-1">
                                Главная
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.categories.index')}}" class="nav-link">
                            <i class="fas fas fa-circle"></i>
                            <p class="ml-1">
                                Управление категориями
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.tags.index')}}" class="nav-link">
                            <i class="fas fas fa-tag"></i>
                            <p class="ml-1">
                                Управление тэгами
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.shops.index')}}" class="nav-link">
                            <i class="fas fas fa-shopping-cart"></i>
                            <p class="ml-1">
                                Добавление магазина
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.colors.index')}}" class="nav-link">
                            <i class="fas fas fa-palette"></i>
                            <p class="ml-1">
                                Добавление цвета
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.products.index')}}" class="nav-link">
                            <i class="fas fas fa-gift"></i>
                            <p class="ml-1">
                                Добавление продукта
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.js')}}"></script>


<script src="{{asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    $('.tags, .select2, .colors').select2()
</script>

<script>
    function clickRadio(param) {
        var value = document.querySelectorAll("input[type='radio'][name='" + param.name + "']");
        for (var i = 0; i < value.length; i++) {
            if (value[i] != param)
                value[i].BeforeCheck = false;
        }

        if (param.BeforeCheck)
            param.checked = false;
        param.BeforeCheck = param.checked;
    }
</script>

<style>
    .custom-file-input:lang(en) ~ .custom-file-label::after {
        content: ". . .";
    }
</style>
</body>
</html>
