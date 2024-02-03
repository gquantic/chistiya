@extends('layouts.adminwrapper')

@section('title')
Товар {{$product->id}}
@endsection

@section('product')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.products.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-success">
            <i class="fas fa-pen"></i> Редактировать
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Категория</th>
                <th>Название</th>
                <th>Ссылка</th>
                <th>Розница</th>
                <th>До 30к</th>
                <th>30-50к</th>
                <th>От 50к</th>
                <th>Закупочная цена</th>
                <th>Остаток</th>
                <th>Объем</th>
                <th>СИ</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$categories[($product->category_id)-1]->title}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->slug}}</td>
                <td>{{$product->price_1}}</td>
                <td>{{$product->price_2}}</td>
                <td>{{$product->price_3}}</td>
                <td>{{$product->price_4}}</td>
                <td>{{$product->buy_price}}</td>
                <td>{{$product->remains}}</td>
                <td>{{$product->volume}}</td>
                <td>{{$product->volume_text}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
