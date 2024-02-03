@extends('layouts.adminwrapper')

@section('title')
Отзыв {{$review->id}}
@endsection

@section('review')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.reviews.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.reviews.edit', $review->id)}}" class="btn btn-success">
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
                <th>Имя</th>
                <th>Текст</th>
                <th>Фото</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->name}}</td>
                <td>{{$review->text}}</td>
                <td>{{$review->photo}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
