@extends('welcome')
@section('title', 'Добавление товара')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                    <h2>Редактирование аккаунта</h2>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Данные успешно отредактированы</div>
                    @endif
                <form action="" method="post">
                    @csrf
                    @isset($product)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">ФИО</label>
                        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="inputLogin" value="{{\Illuminate\Support\Facades\Auth::user()->fullname}}"  >
                        @error('fullname')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Адрес</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="inputLogin" value="{{\Illuminate\Support\Facades\Auth::user()->address}}"  >
                        @error('address')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <p class="small"> При не вводе пароли, изменения его не косунтся</p>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="inputLogin">
                        @error('password')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Повтор пароля</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputLogin">
                        @error('password_confirmation')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Редактировать аккаунт</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
