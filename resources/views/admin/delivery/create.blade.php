@extends('layouts.adminwrapper')

@section('title')
    Добавить статью
@endsection

@section('delivery')
    active
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><br></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.delivery.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" placeholder="Заголовок" name="title" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Текст</label>
                    <textarea id="summernote" name="subtitle"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
@endsection
