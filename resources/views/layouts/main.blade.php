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
    <!-- Navbar -->
    <nav class=" navbar navbar-expand navbar-dark">
        <ul class="navbar-nav float-left ml-5">
            <a href="{{route('index')}}" class="btn btn-primary">Главная страница</a>
        </ul>
        <ul class="navbar-nav ml-auto">
            @if(auth()->user())
                @if(auth()->user()->role_id == 1)
                <a href="{{route('admin.index')}}" class="btn btn-primary" style="margin-right: 35px">Админ панель</a>
                @endif
                <a href="{{route('logout')}}" class="btn btn-primary" style="margin-right: 35px">Выйти</a>
            @else
                <a href="{{route('register')}}" class="btn btn-primary" style="margin-right: 35px">Зарегистрироваться</a>
                <a href="{{route('login')}}" class="btn btn-primary" style="margin-right: 35px">Войти</a>
            @endif
            {{--            <a href="" class="btn btn-danger" style="margin-right: 35px">Выйти</a>--}}

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->

    <section style="display: flex">
        <div class="filter_side" style="height:auto">
            <form action="{{route('index.search')}}" method="post">
                @csrf
            <div class="desc_block_filter mt-1 ml-4">
                <h4>Фильтр поиска</h4>
               <div class="text-danger">{{session('error_price')}}</div>
            </div>

            <div class="desc_block_filter mt-1 ml-4">
                Поиск по названию
            </div>

            <div class="filter_block ml-1 w-75">
                <div class="form-check">
                   <input type="text" class="form-control" name="product_name" value="{{!empty(cookie('product_name')) ? old('product_name') : ''}}">
                </div>
            </div>

            <div class="desc_block_filter mt-1 ml-4">
                Выберите категорию
            </div>

            <div class="filter_block ml-4">
                    <select class="form-select ml-0 w-75" aria-label="Default select example" name="category">
                        <option selected>Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach

                    </select>
            </div>

            <div class="desc_block_filter mt-1 ml-4">
                Выберите тэги
            </div>

            <div class="filter_block ml-1 w-75">
                <div class="form-check">
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                        @foreach($tags as $tag)
                        <option {{!empty(old('tag_ids[]')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="desc_block_filter mt-1 ml-4">
                Фильтр по цене
            </div>

            <div class="filter_block ml-2" style="display: flex">
                <input type="number" min="0" class="form-control ml-3 w-50" placeholder="От" name="min" value="{{!empty(cookie('min_price')) ? cookie('min_price') : ''}}">
                <i class="fa fa-arrow-right mt-2 ml-2"></i>
                <input type="number" min="1"  class="form-control ml-1 w-50" placeholder="До" name="max" value="{{!empty(cookie('max_price')) ? cookie('max_price') : ''}}">
            </div>

            <div class="desc_block_filter mt-1 ml-4">
                Выберите магазин
            </div>

            <div class="filter_block ml-2">
                    <select class="form-select ml-3 w-75" aria-label="Default select example" name="shop_id">
                        <option selected>Выберите магазин</option>
                        @foreach($shops as $shop)
                            <option {{!empty(old('shop_id')) ? 'selected' : ''}} value="{{$shop->id}}">{{$shop->title}}</option>
                        @endforeach

                    </select>
            </div>

                <div class="desc_block_filter mt-1">
                    <hr class="w-75">
                </div>

                <div class="filter_block ml-4">
                    <button type="submit" class="btn btn-primary">Применить</button>
                </div>

            </form>
        </div>


        @yield('content')
    </section>

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<footer class="d-flex flex-wrap justify-content-between align-items-center pt-3 my-4  border-top w-75"
        style="margin: auto; position: relative !important; bottom: 0 !important; margin-top: 200px !important;">
    <p class="col-md-4 mb-0 text-muted">© 2025 Каталог товаров</p>

    <a href="/"
       class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Главная</a></li>
    </ul>
</footer>

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
<!-- AdminLTE App -->


<script src="{{asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    $('.tags, .select2').select2()
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
