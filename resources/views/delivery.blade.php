
@extends('welcome')
@section('title', 'Доставка')
@section('content')
    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5 bg-black mt-5 pt-2 rounded-3 ">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{asset('/public/storage/delivery.jpg')}}" alt="Delivery_png" width="600" height="500" class="rounded-3" >
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-2 mb-3 text-white">Условия доставки</h1>
                <h4 class="display-6 fw-bold lh-1 mb-3 text-danger">Время работы:</h4>
                <p class="lead text-light">Доставка и самовывоз</p>
                <p class="lead text-light">ПН-ПТ 9:00-23:45</p>
                <p class="lead text-light border-bottom w-25 pb-2">СБ-ВС 9:00-1:45</p>
                <p class="lead text-light">Прием заказов</p>
                <p class="lead text-light">ПН-ПТ 9:00-00:00</p>
                <p class="lead text-light">СБ-ВС 9:00-2:00</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                </div>
            </div>
        </div>
@endsection

