@extends('welcome')
@section('title', 'Показ товара')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @include('breadcrumb', $breadcrumbs)
                <div class="card mt-2">
                    <div class="card-header">
                        {{$product->name}}
                    </div>
                    <div class="card-body text-center">
                        <img src="{{'/public/storage/' . $product->photo}}" class="card-img-top w-50" alt="{{$product->name}}">
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Стоимость товара: {{ $product->price }}</p>
                        <p class="card-text">Страна производства: {{ $product->made }}</p>
                        <a href="{{route('admin.product.edit', ['product' => $product->id])}}" class="btn btn-primary">Редактировать</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Удалить
                        </button>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Удалить товар {{ $product->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите удалить товар? <br>
                    {{ $product->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <form action="{{route('admin.product.destroy', ['product' => $product->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
