@extends('layouts.adminwrapper')

@section('title')
    Заголовок
@endsection

@section('main_header')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.main_header.index')}}" class="btn btn-default">
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
        <form action="{{route('admin.main_header.update', $header->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" placeholder="Заголовок" name="title" required value="{{$header->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Подзаголовок</label>
                    <input type="text" class="form-control" placeholder="Подзаголовок" name="subtitle" required value="{{$header->subtitle}}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
@endsection
