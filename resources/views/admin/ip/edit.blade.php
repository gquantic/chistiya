@extends('layouts.adminwrapper')

@section('title')
    Реадактировать ИП
@endsection

@section('ip')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.ip.index')}}" class="btn btn-default">
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
        <form action="{{route('admin.ip.update', $ip->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ФИО</label>
                    <input type="text" class="form-control" placeholder="ФИО" name="name" required value="{{$ip->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ИНН</label>
                    <input type="text" class="form-control" placeholder="ИНН" name="inn" required value="{{$ip->inn}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ОРГНИП</label>
                    <input type="text" class="form-control" placeholder="ОРГНИП" name="orgnip" required value="{{$ip->orgnip}}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
@endsection
