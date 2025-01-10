@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Register content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <h5>Название магазина</h5>

                    <form action="{{route('admin.shops.store')}}" method="post" class="w-25">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Название магазина</label>
                            <input type="text" class="form-control" placeholder="Название магазина" name="title" value="{{old('title')}}">
                            <label>Адресс магазина</label>
                            <input type="text" class="form-control" placeholder="Адресс магазина" name="address" value="{{old('title')}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Создать категорию</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
