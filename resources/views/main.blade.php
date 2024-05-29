@extends('welcome')
@section('title', 'О нас')
@section('content')
    <div class="container">
        @if($errors->has('booking_name'))
            <label class="alert alert-danger">{{$errors->first('booking_name')}}</label>
        @endif

        <div class="hero_cont d-flex justify-content-between container"
             style="padding-top: 100px;background: black;margin-top: 150px;border-radius: 8px;box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);">
            <div class="hero__right mt-4" style="padding-left: 15px;">
                <h2 class="text-white fs-2 mt-4" style="">МЫ ВСЕГДА</h2>
                <h1 class="text-danger fs-1 mt-1">ТЕБЕ РАДЫ</h1>
                <p class="text-white fs-4 w-90 mt-3">Главный акцент – свежая рыба и морепродукты, которые поставляются в
                    ресторан
                    прямиком из Японии</p>
                    <a href="{{route('booking')}}" class="btn btn-outline-danger text-white">Забронируй столик прямо сейчас!</a>

            </div>
            <div class="div container">
                <img src="{{asset('/public/storage/hero_logo.png')}}" alt="sushi"
                     style="margin-left: 48px;height: 560px;margin-top: -100px;">
            </div>
        </div>

@endsection
