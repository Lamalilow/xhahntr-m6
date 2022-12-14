@extends('welcome')
@section('title', 'Регистрация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Регистрация</h1>
                @auth()
                    <div class="alert alert-primary">Вы уже авторизованы. Регистрация невозможна</div>
                @endauth
                @guest()
                    <form action="{{ route('registration') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Электронная почта</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" value="{{old('email')}}" >
                            @error('email')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputLogin" class="form-label">Логин</label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputLogin" value="{{old('login')}}" >
                            @error('login')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputFullname" class="form-label">Полное имя</label>
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="inputFullname" value="{{old('fullname')}}">
                            @error('fullname')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">Адрес</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="inputAddress" value="{{old('address')}}">
                            @error('address')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" >
                            @error('password')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordConfirmed" class="form-label">Пароль повторно</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPasswordConfirmed" >
                            @error('password_confirmation')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('rules') is-invalid @enderror" type="checkbox" name="rules" id="inputRules">
                            <label class="form-check-label " for="inputRules">
                                Согласие на обработку персональных данных
                            </label>
                            @error('rules')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mb-3">Регистрация</button>
                        </div>
                    </form>
                @endguest

            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
