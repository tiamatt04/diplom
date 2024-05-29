<div class="bg-black" style="box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);">
    <div class="container">
        <nav class="navbar navbar-expand-xxl" data-bs-theme="dark">
            <div class="container-fluid" data-bs-theme="dark">
                <a class="navbar-brand text-white fs-4 d-flex gap-1" href="{{ route('/') }}" style="">
                    <img src="{{asset('/public/storage/sushi_1.png')}}" alt="Logo" width="auto" height="62"
                         class="d-inline-block pt-1">
                    <p class="pt-3">GONG</p>
                </a>
                <div class="collapse navbar-collapse " id="navbarTogglerDemo03" style="margin-left: 240px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3 fs-5 mb-1.5">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{ route('catalog') }}">Меню</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('delivery') }}">Доставка</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('booking') }}">Бронь</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('contacts') }}">Контакты</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-3">
                        @auth()
                            {{--                    @if(\Illuminate\Support\Facades\Auth::user()-> isAdmin)--}}
                            @if(Auth::check() && Auth::user()->role == "admin")
                                <a href="{{route('admin')}}" class="btn btn-danger btn-outline-dark text-white">Панель админа</a>
                            @elseif(Auth::check() && Auth::user()->role == "manager")
                                <a href="{{route('manager')}}" class="btn btn-danger btn-outline-dark text-white">Панель менеджера</a>
                            @else
                                <div class="">
                                    <a href="{{ route('orders') }}" class="btn btn-danger btn-outline-dark text-white">Заказы</a>
                                    <a href="{{ route('basket') }}"><img src="{{asset('/public/storage/shopping-bag.png')}}" alt="" height="40px" width="auto"></a>
                            @endif
                            <a href="{{route('logout')}}"><img src="{{asset('/public/storage/exit.png')}}" alt="Logo" width="auto" height="40"></a>
                        @endauth
                        @guest()
                            <a href="{{route('auth')}}" type="button" class="btn text-white" style="margin-right: -18px;">Вход</a>
                                </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>




