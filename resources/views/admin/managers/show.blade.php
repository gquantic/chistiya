@extends('layouts.adminwrapper')

@section('title')
Менеджер {{$manager->id}}
@endsection

@section('manager')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.managers.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.managers.edit', $manager->id)}}" class="btn btn-success">
            <i class="fas fa-pen"></i> Редактировать
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Фото</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$manager->id}}</td>
                <td>{{$manager->name}}</td>
                <td>{{$manager->phone}}</td>
                <td>{{$manager->photo}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
