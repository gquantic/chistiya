@extends('layouts.adminwrapper')

@section('title')
    Добавить товар
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


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Основные</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" class="form-control" placeholder="Название" name="title" required >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Ссылка</label>
                    <input type="text" class="form-control" placeholder="Ссылка" name="slug" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Категория</label>
                    <select class="form-control" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Цены</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Розница</label>
                <input type="number" class="form-control" placeholder="Цена" name="price_1" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">До 30.000 руб.</label>
                <input type="number" class="form-control" placeholder="Цена" name="price_2" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">От 30.000 руб. до 50.000 руб.</label>
                <input type="number" class="form-control" placeholder="Цена" name="price_3" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">От 50.000 руб.</label>
                <input type="number" class="form-control" placeholder="Цена" name="price_4" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Закупочная цена</label>
                <input type="number" class="form-control" placeholder="Закупочная цена" name="buy_price" required>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Описание</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Краткое описание</label>
                <input type="text" class="form-control" placeholder="Краткое описание" name="description">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Описание</label>
                <textarea class="form-control" placeholder="Описание" name="long_description"></textarea>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Объем</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Объем</label>
                <input type="number" class="form-control" placeholder="Объем" name="volume">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Система исчисления объема</label>
                <input type="text" class="form-control" placeholder="Система исчисления объема" required name="volume_text">
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Остаток</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Остаток</label>
                <input type="text" class="form-control" placeholder="Остаток" name="remains">
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Фото</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Фото</label>
                <input type="file" class="form-control" name="photo">
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
    </form>
    </div>
@endsection
