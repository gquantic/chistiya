@extends('layouts.adminwrapper')

@section('title')
Категория {{$category->id}}
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

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success">
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
                <th>Название</th>
                <th>Ссылка</th>
                <th>Изображение</th>
                <th>Описание</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->image}}</td>
                <td>{{$category->description}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
