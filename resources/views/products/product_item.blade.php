@extends('welcome')
@section('title', $productOne->product_name)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card" >
                    <img src="{{ asset('storage/app/public/'. $productOne->product_photo) }}"width="400px" class="card-img-top" alt="Фото товара">
                    <div class="card-body d-flex flex-column gap-3">
                        <h3 class="card-title text-primary">{{$productOne->product_name}}</h3>
                        <h4 class="card-text">{{$productOne->product_description}}</h4>
                        <div class="lower-card d-flex justify-content-between">
                            <div class="card-price">
                                <p class="text-center text-primary">Цена</p>
                                <h4 class="card-text text-center">{{$productOne->product_price}}</h4>
                            </div>
                            <div class="card-country">
                                <p class="text-center text-primary">Страна</p>
                                <h4 class="card-text text-center">{{$productOne->product_country}}</h4>
                            </div>
                            <div class="card-country">
                                <p class="text-center text-primary">Количество</p>
                                <h4 class="card-text text-center">{{$productOne->product_count}}</h4>
                            </div>
                        </div>
                        @auth()
                            <form action="{{ route('basket.add', $productOne) }}" method="post" class="text-center mt-3">
                                @csrf
                                <button type="submit" class="btn btn-outline-info">В корзину</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>


@endsection
