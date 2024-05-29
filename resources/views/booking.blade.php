@extends('welcome')
@section('title', 'Бронирование')
@section('content')
    <div class="container" style="padding-top:170px;">
        <div class="row align-content-center">
            <div class="col"></div>
            <div class="col-6">
                <button class="input-group-text w-100 mb-3 fs-4">Бронирование</button>
        <form method="post" action="{{ route('booking.create') }}">
            @csrf
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">Имя</span>
                    <input type="text" class="form-control @error('booking_name') is-invalid @enderror"
                           id="booking_name" name="booking_name" placeholder="Алина">
                    @error('booking_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">Номер</span>
                    <input type="text"
                           class="form-control @error('booking_number') is-invalid @enderror"
                           id="booking_number" name="booking_number" placeholder="+7 xxx (xxx)-xx-xx">
                    @error('booking_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <script>
                    const phoneInput = document.getElementById('booking_number');
                    phoneInput.addEventListener('input', function () {
                        let value = phoneInput.value.replace(/\D/g, '');
                        if (value.length === 1) {
                            phoneInput.value = '+7 (' + value;
                        } else if (value.length > 1 && value.length <= 4) {
                            phoneInput.value = '+7 (' + value.slice(0, 3) + ') ' + value.slice(3);
                        } else if (value.length > 4 && value.length <= 7) {
                            phoneInput.value = '+7 (' + value.slice(0, 3) + ') ' + value.slice(3, 6) + '-' + value.slice(6);
                        } else if (value.length > 7) {
                            phoneInput.value = '+7 (' + value.slice(0, 3) + ') ' + value.slice(3, 6) + '-' + value.slice(6, 8) + '-' + value.slice(8, 10);
                        }
                    });
                </script>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Количество человек</label>
                <select class="form-select @error('count_people') is-invalid @enderror"
                        id="count_people" name="count_people">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">Дата</span>
                    <input type="date" class="form-control @error('booking_date') is-invalid @enderror"
                           id="booking_date" name="booking_date">
                    @error('booking_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">Время</span>
                    <input type="time" class="form-control @error('booking_time') is-invalid @enderror"
                           id="booking_time" name="booking_time">
                    @error('booking_time')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

                <button type="submit" onclick="myFunction()" class="input-group-text">Забронировать
                </button>
                <script>
                    function myFunction() {
                        alert("Перепроверьте,что все поля заполнены!");
                    }
                </script>
        </form>      </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
