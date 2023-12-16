@extends('layouts.adminwrapper')

@section('title')
    Редактировать информацию о доставке {{$delivery->id}}
@endsection

@section('delivery')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.delivery.index')}}" class="btn btn-default">
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
        <form action="{{route('admin.delivery.update', $delivery->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" placeholder="Заголовок" name="title" required value="{{$delivery->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Текст</label>
                    <textarea id="summernote" name="subtitle">{{$delivery->subtitle}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
@endsection
