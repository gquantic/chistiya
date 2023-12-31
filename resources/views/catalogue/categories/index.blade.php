@extends('templates.land')

@section('header')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 d-flex align-items-center justify-content-between mt-4 mb-3">
                <h1 class="fs-3 mt-0 mb-0">Каталог</h1>
                <a href="" class="mt-2">
                    @include('icons.price-tag')
                    Скачать прайс
                </a>
            </div>
            @include('catalogue.categories.list')
            <div class="products">
                @foreach($products as $product)
                    @include('components.products.block')
                @endforeach
            </div>
        </div>
    </div>
@endsection
