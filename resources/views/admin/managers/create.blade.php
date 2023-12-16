@extends('layouts.adminwrapper')

@section('title')
    Добавить менеджера
@endsection

@section('manager')
    active
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><br></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.managers.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" class="form-control" placeholder="Имя" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Телефон</label>
                    <input type="text" class="form-control" placeholder="Телефон" name="phone" required>
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Фото</label>
                        <input type="file" class="form-control" name="photo" required>
                    </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
@endsection
