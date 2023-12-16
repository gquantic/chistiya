@extends('layouts.adminwrapper')

@section('title')
Пользователь {{$user->id}}
@endsection

@section('users')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.users.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">
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
                <th>Email</th>
                <th>Роль</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
