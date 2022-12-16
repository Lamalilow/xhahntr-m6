@extends('welcome')
@section('title', 'Товары')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h1>Все товары интернет-магазниа</h1>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-4">
                            <div class="card">
                                <img src="/public/storage/{{ $product->photo }}" class="card-img-top" style="width: 100%; height: 300px" alt="{{$product->name}}">
                                <div class="card-body">
                                    <div class="card-title">{{ $product->name }}</div>
                                    <div class="card-text">{{ $product->description }}</div>
                                    <a href="{{ route('admin.product.show', ['product' => $product->id]) }}" class="btn btn-primary">Посмотреть</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
