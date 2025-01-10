@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Магазин</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Магазин</li>
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
                    <h5>Редактирование категории</h5>
                    <form action="{{route('admin.shops.update', $shop->id)}}" method="post" class="w-25" enctype="multipart/form-data">
                        @method('PATCH')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Название магазина</label>
                            <input type="text" class="form-control" placeholder="Название магазина" name="title" value="{{$shop->title}}">
                            <label>Адресс</label>
                            <input type="text" class="form-control" placeholder="Адресс" name="address" value="{{$shop->address}}">
                            <input type="hidden" value="{{$shop->id}}" name="shop_id">
                        </div>
                        <input type="hidden" value="{{$shop->id}}" name="category_id">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection()
