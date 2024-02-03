@extends('layouts.adminwrapper')

@section('title')
    Редактировать категорию {{$category->id}}
@endsection

@section('category')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.categories.index')}}" class="btn btn-default">
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
        <form action="{{route('admin.categories.update', $category->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" class="form-control" placeholder="Название" name="title" required  value="{{$category->title}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Ссылка</label>
                    <input type="text" class="form-control" placeholder="Ссылка" name="slug" required value="{{$category->slug}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Описание</label>
                    <input type="text" class="form-control" placeholder="Описание" name="description"  value="{{$category->description}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Сортировка (Чем больше, тем выше стоит категория)</label>
                    <input type="number" class="form-control" placeholder="0" name="sort"  value="{{$category->sort}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Фото</label>
                    <input type="file" class="form-control" name="photo">
                </div>
            </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
        </form>
    </div>

@endsection
