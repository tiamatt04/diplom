@extends('welcome')
@section('title', 'Корзина')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(!$products)
                    <div class="col-12">
                        <h2>Ваша корзина пуста, <a href="{{ route('catalog') }}">перейти к покупкам </a></h2>
                    </div>
                @else
                    @if(session()->has('error_password_order'))
                        <div class="alert alert-danger">
                            Неверный пароль
                        </div>
                    @endif
                    <table class="table">
                        <thead class="text-center">
                        <tr>
                            <th class="text-center">Названия товаров</th>
                            <th class="text-center">Названия товаров</th>
                            <th class="text-center">Цена</th>
                            <th class="text-center">Количество</th>
                            <th class="text-center">Стоимость</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/app/public/'. $product->product_photo) }}" class="d-block w-100" alt="Фото товара">
                                </td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('basket.remove', $product) }}" method="post" class="me-2">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">-</button>
                                        </form>
                                        {{$product->count}}
                                        <form action="{{ route('basket.add', $product) }}" method="post" class="ms-2">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-dark">+</button>
                                        </form>

                                    </div>
                                </td>

                                <td>{{$product->sumPrice}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <h5>Итого: {{$basketSum}}</h5>
                        <div class="">
                            <button type="button" class="btn btn-outline-danger text-center" data-bs-toggle="modal" data-bs-target="#confirmOderModal">
                                Оформить заказ
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col"></div>
        </div>
    </div>



    <div class="modal fade" id="confirmOderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Подтверждение заказа</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('order.create') }}" class="text-center">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Тип оплаты</span>
                            <select  aria-label="Default select example" type="text" class="form-control" id="type_payment" name="type_payment">
                                <option>Оплата наличными</option>
                                <option>Оплата банковской картой</option>
                                <option>Оплата по QR-коду</option>
                            </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <div class="input-group">
                                    <span class="input-group-text">Адрес доставки</span>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Проспект Ленина 45, кв 30">
                            </div>
                            </div>
                        </div>
                        <div class="modal_footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-dark">Сформировать заказ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
