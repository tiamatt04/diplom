@extends('welcome')
@section('title', 'О нас')
@section('content')
    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5 bg-black mt-3 rounded-3 ">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{asset('/public/storage/hero_logo.png')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="600" height="400" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold lh-2 mb-3 text-white">МЫ ВСЕГДА</h2>
                <h1 class="display-5 fw-bold lh-1 mb-3 text-danger">ТЕБЕ РАДЫ</h1>
                <p class="lead text-light">Главный акцент - свежая рыба и морепродукты, которые доставляются прямиком из Японии</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{route('booking')}}"type="button" class="btn btn-outline-danger btn-lg px-4 me-md-2">Забронируй столик прямо сейчас</a>
                </div>
            </div>
        </div>
        </div>
@endsection
