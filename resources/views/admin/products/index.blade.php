@extends('layouts.adminwrapper')

@section('title')
    Товары
@endsection

@section('product')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.products.create')}}" class="btn btn-success">
                <i class="fas fa-plus"></i> Добавить
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
                    <th>ссылка</th>
                    <th>Розница</th>
                    <th>До 30к</th>
                    <th>30-50к</th>
                    <th>От 50к</th>
                    <th>Закупочная цена</th>
                    <th>Остаток</th>
                    <th>Объем</th>
                    <th>СИ</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$categories[($product->category_id)-1]->title}}</td>
                        <td>{{$product->title}} {{$product->volume}} {{$product->volume_text}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->price_1}}</td>
                        <td>{{$product->price_2}}</td>
                        <td>{{$product->price_3}}</td>
                        <td>{{$product->price_4}}</td>
                        <td>{{$product->buy_price}}</td>
                        <td>{{$product->remains}}</td>
                        <td>{{$product->volume}}</td>
                        <td>{{$product->volume_text}}</td>
                        <td>
                            <form method="post" action="{{route('admin.products.destroy',$product->id)}}">
                                @csrf
                                @method('delete')
                                <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.products.edit',$product->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.products.show',$product->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
