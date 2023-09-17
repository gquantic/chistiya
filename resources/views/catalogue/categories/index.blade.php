@extends('templates.land')

@section('header')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="fs-3 mt-4 mb-3">Каталог</h1>
            </div>
            <div class="categories-display">
                @foreach($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}" class="categories-display__item">
                        {{ $category->title }}
                    </a>

                    @dd($category->products()->get())
                @endforeach
            </div>
            <div class="products">
                @foreach($products as $product)
                    {{ $product->title }}
                @endforeach
            </div>
        </div>
    </div>
@endsection
