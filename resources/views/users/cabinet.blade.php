@extends('welcome')
@section('title', 'Кабинет')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">

                <h2>Мой кабинет аккаунта</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ФИО: {{ \Illuminate\Support\Facades\Auth::user()->fullname }}</li>
                    <li class="list-group-item">Логин: {{ \Illuminate\Support\Facades\Auth::user()->login }}</li>
                    <li class="list-group-item">Почта: {{ \Illuminate\Support\Facades\Auth::user()->email }}</li>
                    <li class="list-group-item">Адрес: {{ \Illuminate\Support\Facades\Auth::user()->address }}</li>
                </ul>
            </div>
            <a href="{{ route('cabinetEdit') }}" class="btn btn-primary" > Редактирование аккаунта</a>
            <div class="col"></div>
        </div>
    </div>
@endsection
