@extends('layouts.adminwrapper')

@section('title')
    Контакты
@endsection

@section('contact')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.contacts.index')}}" class="btn btn-default">
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
        <form action="{{route('admin.contacts.update', $contact->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Горячая линия</label>
                    <input type="text" class="form-control" placeholder="Горячая линия" name="hotline" required value="{{$contact->hotline}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Отдел продаж</label>
                    <input type="text" class="form-control" placeholder="Отдел продаж" name="sales" required value="{{$contact->sales}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Режим работы</label>
                    <input type="text" class="form-control" placeholder="Режим работы" name="schedule" required value="{{$contact->schedule}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Адрес</label>
                    <input type="text" class="form-control" placeholder="Адрес" name="address" required value="{{$contact->address}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email" required value="{{$contact->email}}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
@endsection
