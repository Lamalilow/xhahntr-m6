@extends('welcome')
@section('title', 'Регистрация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Авторизация</h1>
                @auth()
                    <div class="alert alert-success">Вы успешно авторизованы</div>
                @endauth
                @guest()
                    @error('auth')
                        <div class="alert alert-danger"> Логин или пароль неверный</div>
                    @enderror
                    @if(session()->has('register'))
                        <div class="alert alert-primary">Вы успешно зарегистрированы</div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
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
                            <label for="inputPassword" class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" >
                            @error('password')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mb-3">Авторизация</button>
                        </div>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
