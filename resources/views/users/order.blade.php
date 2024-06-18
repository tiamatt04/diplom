@extends('welcome')
@section('title', 'Заказы')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h2 class="text-center">Заказы</h2>
                <div class="accordion" id="accordionExample">
                    @foreach($orders as $order)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="btn btn-lg-danger" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$order->id}}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    Заказ №{{$order->id}} (Статус: {{$order->status()}})
                                </button>
                            </h2>

                            <div id="collapse{{$order->id}}" class="accordion-collapse collapse show"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if($order->status_id == 3)
                                        <div class="alert alert-danger">
                                            {{ $order->order_comment }}
                                        </div>
                                    @endif
                                    <table class="table mb-3">
                                        <thread class="text-center">
                                            <tr>
                                                <th>Статус</th>
                                            </tr>
                                        </thread>
                                        <tbody class="text-center">
                                        <tr>
                                            <td>{{ $order->status() }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                        <table class="table mb-3">
                                            <thread class="text-center">
                                                <tr>
                                                    <th>Блюдо</th>
                                                    <th>Назввание</th>
                                                    <th>Цена</th>
                                                </tr>
                                            </thread>
                                            @foreach($basketItems as $basketItem)
                                            <tbody class="text-center">
                                            <tr>
                                                <td><img src="{{  asset('storage/app/public/'. $basketItem->product_photo)}}" alt=""></td>
                                                <td> {{ $basketItem->product_name }}</td>
                                                <td> {{ $basketItem->product_price }}</td>
                                                <td>{{ $basketItem->count }}</td>
                                            </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    @if($order->status_id == 1)
                                        <form action="{{ route('order.remove', $order) }}" method="post">
                                            @csrf

                                            <button type="submit " class="btn btn-danger mt-3">Удалить заказ</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
