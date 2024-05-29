@extends('managers.manager')
@section('title', 'Управление заказами')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h1 class="text-center m-5">Заказы менеджера</h1>
                <form action="{{route('manager.order.sort')}}" method="post" class="d-flex gap-5 mb-5">
                    @csrf
                    <select name="status_id" class="form-select">
                        <option value="">Все заказы</option>
                        <option value="1" {{request('status_id')==1 ? 'selected' : ''}}>Новые заказы</option>
                        <option value="2" {{request('status_id')==2 ? 'selected' : ''}}>Подтверждённые заказы</option>
                        <option value="3" {{request('status_id')==3 ? 'selected' : ''}}>Отменённые заказы</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Фильтровать</button>
                </form>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="accordion" id="accordionExample">
                    @foreach($orders as $order)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$order->id}}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    {{ $order->created_at }} - {{ $order->user->name }} {{ $order->user->patronymic }}

                                </button>
                            </h2>
                            <div id="collapse{{$order->id}}" class="accordion-collapse collapse show"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Статус: {{ $order->status() }}</p>
                                    <p>Оплата: {{ $order->type_payment }}</p>
                                    <p>Адрес доставки: {{ $order->address }}</p>
                                    <h5>Состав заказа:</h5>
                                    @foreach($basketItems as $basketItem)
                                        <p>Товар: {{ $basketItem->product_name }} | Цена: {{ $basketItem->product_price }} ₽ | Кол-во: {{ $basketItem->count }}</p>
                                    @endforeach
                                    @if($order->status_id == 1)
                                        <form
                                            action="{{ route('manager.order.status', ['orderId'=> $order->id, 'action'=> 'cancel']) }}"
                                            method="post">
                                            @csrf
                                            <input type="text" class="form-control" name="order_comment"
                                                   placeholder="Причина отмены">
                                            <button class="btn btn-danger mt-3" type="submit">Отменить заказ</button>
                                        </form>
                                        <form
                                            action="{{ route('manager.order.status', ['orderId'=> $order->id, 'action'=> 'confirm']) }}"
                                            method="post">
                                            @csrf
                                            <button class="btn btn-success mt-3" type="submit">Подтвердить заказ
                                            </button>
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
