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

    <form action="{{route('register.post')}}" class="auth-form w-25" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <h3>Регистрация</h3>
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
            <div class="answer_auth">Придумайте надежный пароль</div>
        </div>

        <div class="form-group">
            <input type="password" placeholder="Пароль" class="form-control" name="password_confirmation">
            @error('password_confirmation')
            <div class="text-danger" style="font-size: 14px">{{$message}}</div>
            @enderror
            <div class="answer_auth">Подтвердите пароль <span style="float: right">Уже есть аккаунт? <a href="">Войти</a></span> </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-secondary">Зарегистрироваться</button>
        </div>

    </form>

@endsection
