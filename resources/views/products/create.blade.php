@extends('layouts.layout')

@section('title')@parent | {{$title}} @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">



    <form class="mt-5" method="post" action="{{ route('products.store') }}">

        @csrf

        <legend>Добавить товар</legend>

        <div class="mb-3">
            <label for="product_name" class="form-label">Наименование продукции</label>
            <input value="{{ old('product_name') }}" type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" aria-describedby="emailHelp" name="product_name" placeholder="Введите наименование продукции">
            @error('product_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product_price" class="form-label">Цена, руб.</label>
            <input value="{{ old('product_price') }}" min="0" step="any" type="number" id="product_price" class="form-control @error('product_price') is-invalid @enderror" placeholder="Введите цену в руб. " name="product_price">
            @error('product_price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product_quantity" class="form-label">Кол-во на складе</label>
            <input value="{{ old('product_quantity') }}" min="0" step="any" type="number" id="product_quantity" class="form-control @error('product_quantity') is-invalid @enderror"  placeholder="Введите кол-во на складе" name="product_quantity">
            @error('product_quantity')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product_unit_id" class="form-label">Единица измерения</label>
            <select id="product_unit_id" class="@error('product_unit_id') is-invalid @enderror form-select" name="product_unit_id">
                <option>Выберите единицу измерения</option>
                @foreach($units as $k =>$v)

                    <option value="{{ $k }}"
                    @if(old('product_unit_id') == $k) selected @endif
                    >{{ $v }}</option>

                @endforeach

            </select>
            @error('product_unit_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Добавить</button>

    </form>
    </div>
@endsection
