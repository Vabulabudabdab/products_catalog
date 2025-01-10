@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-2">{{$product->title}}</h1>
                    <a href="{{route('admin.products.edit', $product->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{route('admin.products.delete', $product->id)}}" method="post">
                        {{csrf_field()}}
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent" onclick="alert('Are you shore?')">
                            <i class="fas fa-trash text-danger" role="button"></i>
                        </button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Просмотр Продукта</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap w-75">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$product->id}}</td>
                        </tr>

                        <tr>
                            <td>Название</td>
                            <td>{{$product->title}}</td>
                        </tr>

                        <tr>
                            <td>Категория</td>
                            <td>{{$product->category->title}}</td>
                        </tr>

                        <tr>
                            <td>Тэги</td>
                            @foreach($product->tags as $tag)
                                <td>{{$tag->title}}</td>
                            @endforeach
                        </tr>

                        <tr>
                            <td>Картинка</td>
                            <td><img src="{{asset('storage/' . $product->image)}}" style="width: 250px; height: 200px; border-radius: 10px"></td>
                        </tr>

                        <tr>
                            <td>Описание</td>
                            <td>{{$product->desc}}</td>
                        </tr>

                        <tr>
                            <td>Количество</td>
                            <td>{{$product->avaible}}</td>
                        </tr>

                        <tr>
                            <td>Магазин</td>
                            <td>{{$product->shop->title}}</td>
                        </tr>

                        <tr>
                            <td>Цена</td>
                            <td>{{$product->price}}</td>
                        </tr>

                        <tr>
                            <td>Название цвета</td>
                            @foreach($product->colors as $color)
                                <td>{{$color->title}}</td>
                            @endforeach
                        </tr>

                        <tr>
                            <td>Цвет</td>
                            @foreach($product->colors as $color)
                                <td><input type="color" disabled value="{{$color->color_id}}"></td>
                            @endforeach
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
