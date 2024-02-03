@extends('templates.land')

@section('header')

@endsection

@section('styles')
    <link rel="stylesheet" href="/t/v538/images/mosaic/designs/design-incpuhgqw-1654779286_styles.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <img src="{{ $product->getImage() }}" style="width: 400px !important" alt="">
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="fs-3 mt-4 mb-3">{{ $product->title }}</h1>
                                <p>Объем: {{ $product->volume }} {{ $product->volume_text }}</p>
                            </div>
                            <div class="col-xs-12">
                                <table class="table table-bordered prices">
                                    <tr>
                                        <td>Сумма</td>
                                        <td>Розница</td>
                                        <td>До 30 000 руб.</td>
                                        <td>30 000 - 50 000 руб.</td>
                                        <td>От 50 000 руб.</td>
                                    </tr>
                                    <tr>
                                        <td>Цена за штуку</td>
                                        <td>{{ $product->price_1 }} руб.</td>
                                        <td>{{ $product->price_2 }} руб.</td>
                                        <td>{{ $product->price_3 }} руб.</td>
                                        <td>{{ $product->price_4 }} руб.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 mt-3 mb-5">
                <hr class="mt-3 mb-3">
                <order-form item="{{ json_encode($product) }}"></order-form>
            </div>
        </div>
    </div>
@endsection

