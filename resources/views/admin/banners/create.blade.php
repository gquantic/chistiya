@extends('layouts.adminwrapper')

@section('title')
    Преимущества
@endsection

@section('banner')
    active
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><br></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.banners.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" placeholder="Заголовок" name="title" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Подзаголовок</label>
                    <input type="text" class="form-control" placeholder="Подзаголовок" name="subtitle" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Относится к</label>
                    <select class="form-control" name="parent_block" required>
                        <option value="1">Наши товары</option>
                        <option value="2">О нас</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
@endsection
