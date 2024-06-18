@extends('welcome')
@section('title', $productOne->product_name)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card bg-black text-white" style="width: 800px;margin-top: 150px;margin-left: -100px;">

                        <a href="{{route('catalog_product', $productOne)}}">
                            <img src="{{ asset('storage/app/public/'. $productOne->product_photo) }}"alt="Фото товара" style="margin-left: 300px;">

                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$productOne->product_name}}</h5>
                            <p class="card-text text-center">{{$productOne->product_description}}</p>
                            <div class=" d-flex justify-content-between">
                                {{--                                <div class="card-price">--}}
                                <h4 class="card-text text-danger pt-2">{{$productOne->product_price}} ₽</h4>
                                {{--                                </div>--}}
                                @auth()
                                    <form action="{{ route('basket.add', $productOne) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn"><img src="/public/storage/plus-ikon.png" alt="plus" style="height: 30px;">
                                        </button>
                                    </form>
                                @endauth
                            </div>

                        </div>
                    </div>
{{--                    <img src="{{ asset('storage/app/public/'. $productOne->product_photo) }}"width="400px" class="card-img-top" alt="Фото товара">--}}
{{--                    <div class="card-body d-flex flex-column gap-3">--}}
{{--                        <h3 class="card-title text-primary">{{$productOne->product_name}}</h3>--}}
{{--                        <h4 class="card-text">{{$productOne->product_description}}</h4>--}}
{{--                        <div class="lower-card d-flex justify-content-between">--}}
{{--                            <div class="card-price">--}}
{{--                                <p class="text-center text-primary">Цена</p>--}}
{{--                                <h4 class="card-text text-center">{{$productOne->product_price}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-country">--}}
{{--                                <p class="text-center text-primary">Страна</p>--}}
{{--                                <h4 class="card-text text-center">{{$productOne->product_country}}</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-country">--}}
{{--                                <p class="text-center text-primary">Количество</p>--}}
{{--                                <h4 class="card-text text-center">{{$productOne->product_count}}</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @auth()--}}
{{--                            <form action="{{ route('basket.add', $productOne) }}" method="post" class="text-center mt-3">--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="btn btn-outline-info">В корзину</button>--}}
{{--                            </form>--}}
{{--                        @endauth--}}
{{--                    </div>--}}
            </div>
            <div class="col"></div>
        </div>
    </div>


@endsection
