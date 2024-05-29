@extends('managers.manager')
@section('title', 'Заявки на бронирование')
@section('content')
        <div class="container">
                    <h2 class="text-center">Заявки на бронь</h2>
                    <div id="accordionExample" style="display: flex;gap: 10px">
                        @foreach($bookings as $booking)
                            <div class="card" style="width: 18rem;margin-right: 15px">
                                <div class="card-body">
                                    <h5 class="card-title">Заявка №{{$booking->id}}</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Имя: {{$booking->booking_name}}</h6>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Телефон: {{$booking->booking_number}}</h6>
                                    <p class="card-text">Кол-во человек: {{$booking->count_people}}</p>
                                    <div class="d-flex gap-4">
                                        <div class="d-flex flex-column">
                                            <p class="card-subtitle mb-2 text-body-secondary">Дата:</p>
                                            <p class="card-subtitle mb-2 text-body-secondary"> {{$booking->booking_date}}</p>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="card-subtitle mb-2 text-body-secondary">Время:</p>
                                            <p class="card-subtitle mb-2 text-body-secondary"> {{$booking->booking_time}}</p>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <form action="{{ route('deleteBooking' , $booking) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                </div>
                <div class="col"></div>

    @endsection
