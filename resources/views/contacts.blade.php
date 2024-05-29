@extends('welcome')
@section('title', 'Контакты')
@section('content')
    <div class="container">
        <div class="row w-100" style="margin-top: 150px;">
            <div class="col-lg-6 my-4">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A726d73a068f456e92c65e3f4abd71007be6f611429e731332a8c6b767b1cdfc0&amp;source=constructor" width="600" height="400" class="rounded-3"></iframe>
            </div>
            <div class="col-lg-6 my-4 d-flex align-items-center">
                <div>
                    <h3>Ресторан Gong расположен на улице Академика Королёва, 33</h3>
                    <p>Контактный номер: +7 904 933-98-96</p>
                    <p>Электронный адрес: gong@gmail.com</p>
                    <p style="font-weight: bold">ПН-ПТ 9:00-23:45</p>
                    <p style="font-weight: bold">СБ-ВС 9:00-1:45</p>
                    <p style="font-weight: bolder">Ждем вас в гости!</p>
                </div>
            </div>
        </div>
@endsection

