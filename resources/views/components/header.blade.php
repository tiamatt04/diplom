{{--<div class="bg-black" style="box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);">--}}
{{--    <div class="container">--}}
{{--            <div class="container-fluid" data-bs-theme="dark">--}}
{{--                <a class="navbar-brand text-white fs-4 d-flex gap-1" href="{{ route('/') }}" style="">--}}
{{--                    <img src="{{asset('/public/storage/sushi_1.png')}}" alt="Logo" width="auto" height="62"--}}
{{--                         class="d-inline-block pt-1">--}}
{{--                    <p class="pt-3">GONG</p>--}}
{{--                </a>--}}
{{--                <div class="collapse navbar-collapse " id="navbarTogglerDemo03" style="margin-left: 240px;">--}}
{{--                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3 fs-5 mb-1.5">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active text-white" aria-current="page" href="{{ route('catalog') }}">Меню</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-white" href="{{ route('delivery') }}">Доставка</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-white" href="{{ route('booking') }}">Бронь</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-white" href="{{ route('contacts') }}">Контакты</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="d-flex gap-3">--}}
{{--                        @auth()--}}
{{--                            --}}{{--                    @if(\Illuminate\Support\Facades\Auth::user()-> isAdmin)--}}
{{--                            @if(Auth::check() && Auth::user()->role == "admin")--}}
{{--                                <a href="{{route('admin')}}" class="btn btn-danger btn-outline-dark text-white">Панель админа</a>--}}
{{--                            @elseif(Auth::check() && Auth::user()->role == "manager")--}}
{{--                                <a href="{{route('manager')}}" class="btn btn-danger btn-outline-dark text-white">Панель менеджера</a>--}}
{{--                            @else--}}
{{--                                <div class="">--}}
{{--                                    <a href="{{ route('orders') }}" class="btn btn-danger btn-outline-dark text-white">Заказы</a>--}}
{{--                                    <a href="{{ route('basket') }}"><img src="{{asset('/public/storage/shopping-bag.png')}}" alt="" height="40px" width="auto"></a>--}}
{{--                            @endif--}}
{{--                            <a href="{{route('logout')}}"><img src="{{asset('/public/storage/exit.png')}}" alt="Logo" width="auto" height="40"></a>--}}
{{--                        @endauth--}}
{{--                        @guest()--}}
{{--                            <a href="{{route('auth')}}" type="button" class="btn text-white" style="margin-right: -18px;">Вход</a>--}}
{{--                                </div>--}}
{{--                        @endguest--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="bg-black" style="box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);">
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none bold">
                <img src="{{asset('/public/storage/sushi_1.png')}}" alt="Logo" width="auto" height="62">
                <p class="pt-4 fs-5 text-white">GONG</p>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 mt-1">
                <li><a href="{{ route('catalog') }}" class="nav-link px-2 active text-white">Меню</a></li>
                <li><a href="{{ route('delivery') }}" class="nav-link px-2 active text-white">Доставка</a></li>
                <li><a href="{{ route('booking') }}" class="nav-link px-2 active text-white">Бронь</a></li>
                <li><a href="{{ route('contacts') }}" class="nav-link px-2 active text-white">Контакты</a></li>
            </ul>

            <div class="col-md-3 text-end">
                @auth()
                    @if(Auth::check() && Auth::user()->role == "admin")
                        <a href="{{route('admin')}}" class="btn btn-danger btn-outline-dark text-white">Панель админа</a>
                    @elseif(Auth::check() && Auth::user()->role == "manager")
                        <a href="{{route('manager')}}"  class="btn btn-danger btn-outline-dark text-white">Панель менеджера</a>
                    @else
                        <a href="{{ route('orders') }}" class="btn btn-danger btn-outline-dark text-white">Заказы</a>
                        <a href="{{ route('basket') }}"><img src="{{asset('/public/storage/shopping-bag.png')}}" alt="Корзина" height="40"></a>
                    @endif
                    <a href="{{route('logout')}}"><img src="{{asset('/public/storage/exit.png')}}" alt="Logo" height="40"></a>
                @endauth
                        @guest()
                            <a href="{{route('auth')}}" type="button" class="btn text-white">Вход</a>
                        @endguest
            </div>
        </header>
    </div>
</div>


