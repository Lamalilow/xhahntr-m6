@extends('welcome')
@section('title', 'Добавление товара')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @include('breadcrumb', $breadcrumbs)
                @if(isset($product))
                    <h2>Редактирование {{$product->name}}</h2>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Товар успешно отредактирован</div>
                    @endif
                @else
                    <h2>Создание нового товара</h2>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Товар успешно создан</div>
                    @endif
                @endif
                <form action="{{ (isset($product) ? route('admin.product.update', ['product' => $product->id]) : route('admin.product.store')) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($product)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Наименование товара</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputLogin" value="{{old('name')}}"  >
                        @error('name')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Страна производитель</label>
                        <input type="text" name="made" class="form-control @error('made') is-invalid @enderror" id="inputLogin" value="{{old('made')}}"  >
                        @error('made')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Страна производитель</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="198.9" id="inputLogin" value="{{old('price')}}"  >
                        @error('price')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Изображение товара</label>
                        <input type="file" name="photo_file" class="form-control @error('photo_file') is-invalid @enderror" placeholder="198.9" id="inputLogin" value="{{old('photo')}}"  >
                        @error('photo_file')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Изображение товара</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3"> {{ old('description') }}</textarea>
                        @error('description')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">
                            @if(isset($product))
                                Отредактировать товар
                            @else
                                Добавить новый товар
                            @endif
                        </button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
