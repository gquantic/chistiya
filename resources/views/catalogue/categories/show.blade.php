@extends('templates.land')

@section('header')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="fs-3 mt-4 mb-3">{{ $category->title }}</h1>
            </div>
            @include('catalogue.categories.list')
            <div class="products">
                @foreach($category->products as $product)
                    @include('components.products.block')
                @endforeach
            </div>
        </div>
    </div>
@endsection
