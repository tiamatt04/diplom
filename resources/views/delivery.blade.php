
@extends('welcome')
@section('title', 'Доставка')
@section('content')
    <div class="container">
        <div class="row w-100" style="margin-top: 100px;">
            <div class="col-lg-6 my-4">
                <img src="{{asset('/public/storage/delivery.jpg')}}" alt="Delivery_png" width="600" height="500" style="margin-left: 50px;">
            </div>
            <div class="col-lg-4 my-6 d-flex align-items-center">
                <div style="padding-left: 100px;">
                    <h3>Условия доставки</h3>
                    <h4 style="font-weight: bold">Время работы:</h4>
                    <p class="fs-6 opacity-10">Доставка и самовывоз</p>
                    <p style="font-weight: bold">ПН-ПТ 9:00-23:45</p>
                    <p style="font-weight: bold">СБ-ВС 9:00-1:45</p>
                    <img src="{{asset('/public/storage/minus.png')}}" alt="Delivery_png" style="margin-top: -70px;margin-bottom: -50px">
                    <p class="fs-6 opacity-10">Прием заказов</p>
                    <p style="font-weight: bold">ПН-ПТ 9:00-00:00</p>
                    <p style="font-weight: bold">СБ-ВС 9:00-2:00</p>

                </div>
            </div>
        </div>
@endsection

