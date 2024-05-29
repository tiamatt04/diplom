@extends('welcome')
@section('title', 'Авторизация')
@section('content')
    <div class="section container">
        <div class="row w-50 " style="background: white;margin-top: 150px;margin-left: 320px;border-radius: 8px;box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);">
                <form method="post" class="p-4">
                    <div class="d-flex">
                        <span class="input-group-text w-100 mb-3 fs-4 disabled">Аваторизация</span>
                        <a class="input-group-text w-100 mb-3 fs-4 bg-danger border-danger btn" style="margin-left: -15px;" href="{{route('register')}}">Регистрация</a>
                    </div>

                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Логин</span>
                        <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login">
                    </div>
                        @error('login')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Пароль</span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                    </div>
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-danger mt-3 w-25">Войти</button>
                </form>
            </div>
    </div>
@endsection
