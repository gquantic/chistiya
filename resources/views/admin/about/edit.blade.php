@extends('layouts.adminwrapper')

@section('title')
    О компании
@endsection

@section('about')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.about.index')}}" class="btn btn-default">
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
        <form action="{{route('admin.about.update', $about->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Описание</label>
                    <input type="text" class="form-control" placeholder="Описание" name="description" required value="{{$about->description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Длинное описание</label>
                    <input type="text" class="form-control" placeholder="Длинное описание" name="long_description" required value="{{$about->long_description}}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
@endsection
