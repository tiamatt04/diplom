@extends('welcome')
@section('title', 'Каталог')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form method="get" class="d-flex gap-2 mt-5">
                    <select class="form-select" name="sort_price" id=""  style="background-color: black;color: white;border-radius: 50px;width: 250px;">
                        <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Подешевле
                        </option>
                        <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>Подороже
                        </option>
                    </select>
                    <select class="form-select" name="category" id=""  style="background-color: black;color: white;border-radius: 50px;width: 200px;">
                        <option value="">Все категории</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}" {{ request('$category') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-light btn-outline-danger " style="border-radius: 50px">Применить</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center gap-4 mt-3">
                @foreach($products as $product)
                    <div class="card bg-black text-white" style="width: 300px;height: 400px;box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);">
                        <a href="{{route('catalog_product', $product)}}">
                            <img src="{{ asset('storage/app/public/'. $product->product_photo) }}" height="200px"
                                 style="object-fit: cover; object-position: center" class="card-img-top"
                                 alt="Фото товара">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$product->product_name}}</h5>
                            <p class="card-text text-center">{{$product->product_description}}</p>
                            <div class=" d-flex justify-content-between">
{{--                                <div class="card-price">--}}
                                    <h4 class="card-text text-danger pt-2">{{$product->product_price}} ₽</h4>
{{--                                </div>--}}
                                @auth()
                                    <form action="{{ route('basket.add', $product) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn"><img src="/public/storage/plus-ikon.png" alt="plus" style="height: 30px;">
                                        </button>
                                    </form>
                                @endauth
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
