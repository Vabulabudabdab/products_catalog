@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание продукта</h1>
                    <h5 class="text-danger">Все поля необходимо заполнить!</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Создание продукта</li>
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
                    <h5>Добавление продукта</h5>
                    <div class="form-group">
                        <form action="{{route('admin.products.store')}}" method="post" class="w-25" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label>Название</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Название продукта" name="title">
                            </div>
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label>Описание</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Описание продукта" name="desc">
                            </div>
                            <label>Цена</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Цена продукта" name="price">
                            </div>
                            <label>Количество</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Кол-во товара" name="avaible">
                            </div>

                            <div class="form-group w-100">
                                <label>Выберите категорию</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group w-100">
                                <label>Выберите магазин</label>
                                <select class="form-control" name="shop_id">
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}">{{$shop->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Тэги</label>
                                <select class="tags" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Выберите цвет</label>
                                <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group w-100">
                                <label for="exampleInputFile">Добавить главную картинку</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                    <button type="submit" class="btn btn-primary">Добавить продукт</button>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
