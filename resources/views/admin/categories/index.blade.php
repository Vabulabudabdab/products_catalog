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
                    <div class="col-md-1 mb-3">
                        <a href="{{route('admin.categories.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущие категории</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Название</th>
                                        <th class="text-center">Просмотр</th>
                                        <th class="text-center">Редактировать</th>
                                        <th class="text-center">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->title}}</td>

                                            <td class="text-center"><a
                                                    href="{{route('admin.categories.show', $category->id)}}"><i
                                                        class="far fa-eye"></i></a></td>
                                            <td class="text-center">
                                                <a href="{{route('admin.categories.edit', $category->id)}}"
                                                                       class="text-success"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                            </td>

                                            <td class="text-center">
                                                <form action="{{route('admin.categories.delete', $category->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $categories->links()}}

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection
