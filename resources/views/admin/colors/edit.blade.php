@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование Цвета</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.colors.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование цвета</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <h5>Редактирование цвета</h5>
                    <div class="form-group">
                        <form action="{{route('admin.colors.update', $color->id)}}" method="post" class="w-25">
                            @method('patch')
                            {{csrf_field()}}
                            <label>Цвет</label>
                            <input type="color" class="form-control" name="color_id" value="{{$color->color_id}}">
                            <label>Цвет</label>
                            <input type="text" class="form-control" name="title" value="{{$color->title}}">
                            <input type="hidden" class="form-control" name="color_id" value="{{$color->id}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
