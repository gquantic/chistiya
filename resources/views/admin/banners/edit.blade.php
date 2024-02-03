@extends('layouts.adminwrapper')

@section('title')
    Редактировать баннер {{$banner->id}}
@endsection

@section('banner')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.banners.index')}}" class="btn btn-default">
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
        <form action="{{route('admin.banners.update', $banner->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" placeholder="Заголовок" name="title" required value="{{$banner->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Подзаголовок</label>
                    <input type="text" class="form-control" placeholder="Подзаголовок" name="subtitle" required value="{{$banner->subtitle}}">
                </div>
                <select class="form-control" name="parent_block" disabled>
                    <option value="1" @if($banner->parent_block==1) selected @endif>Наши товары</option>
                    <option value="2" @if($banner->parent_block==2) selected @endif>О нас</option>
                </select>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
@endsection
