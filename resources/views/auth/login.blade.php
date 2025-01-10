@extends('layouts.base')

@section('content')

    <nav class=" navbar navbar-expand navbar-dark">
        <ul class="navbar-nav float-left">
            <a href="{{route('index')}}" class="btn btn-primary">Главная страница</a>
        </ul>
        <ul class="navbar-nav ml-auto">

            {{--            <a href="" class="btn btn-danger" style="margin-right: 35px">Выйти</a>--}}

        </ul>
    </nav>

    <form action="{{route('login.post')}}" class="auth-form w-25" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <h3>Вход</h3>
        </div>

        <div class="form-group">

        </div>

        <div class="form-group">
            <input type="text" placeholder="Эл.почта" class="form-control" name="email">
            @error('email')
            <div class="text-danger" style="font-size: 14px">{{$message}}</div>
            @enderror
            <div class="answer_auth">Пример example@gmail.com</div>
        </div>

        <div class="form-group">
            <input type="password" placeholder="Пароль" class="form-control" name="password">
            @error('password')
            <div class="text-danger" style="font-size: 14px">{{$message}}</div>
            @enderror
            <div class="answer_auth">Пароль<span style="float: right">Нет аккаунта? <a href="{{route('register')}}">Зарегистрироваться</a></span> </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-secondary">Войти</button>
        </div>

    </form>

@endsection
