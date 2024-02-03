@extends('layouts.adminwrapper')

@section('title')
    Добавить отзыв
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


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><br></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.reviews.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" class="form-control" placeholder="Имя" name="name" required >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Текст отзыва</label>
                    <textarea class="form-control" placeholder="Текст отзыва" name="text" required></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Фото</label>
                    <input type="file" class="form-control" name="photo">
                </div>

            </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
    </form>
    </div>
@endsection
