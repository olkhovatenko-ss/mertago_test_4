@extends('layouts.layout')

@section('title')@parent | {{$title}} @endsection

@section('header')
    @parent
@endsection

@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Прайс-лист</h1>
                <p>
                    <a href="{{ route('products.create') }}" class="btn btn-primary my-2">Добавить товар</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @if($products->isEmpty())
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Товаров нет</th>
                        </tr>
                        </thead>
                    </table>
                @else
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Наименование продукции</th>
                            <th scope="col">Цена, руб.</th>
                            <th scope="col">Ед. изм.</th>
                            <th scope="col">Кол-во на складе</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$product->product_name}}</th>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->unit->unit_name}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td><a href="{{ route('products.edit', $product->product_id) }}">Редактировать</a></td>
                                <td>
                                    <form action="{{ url('/products', ['id' => $product->product_id]) }}" method="post">
                                        <input class="btn btn-danger delete-product-button" type="submit" value="Удалить"/>
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endempty

            </div>
        </div>
@endsection
