<div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img style="width: 100px" src="/public/assets/images/logo/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="navbar-nav">
                    @guest()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">Регистрация</a>
                        </li>
                    @endguest
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('order.all') }}">Мои заказы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cabinet')}}">Мой аккаунт</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Администрирование
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.product.create') }}">Добавить товар</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.product.index') }}">Все товары</a></li>
                                        <li><a class="dropdown-item" href="{{ route('order.all', ['myOrder' => 'admin']) }}">Просмотр заказов</a></li>
                                        <li><a class="dropdown-item" href="#">Пользователи</a></li>
                                    </ul>
                                </li>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('order.basket') }}">Корзина</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Выйти</a>
                        </li>
                    @endauth

                </div>
            </div>
        </div>
    </nav>

</div>
