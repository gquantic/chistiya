@extends('layouts.adminwrapper')

@section('title')
Информация о доставке {{$delivery->id}}
@endsection

@section('delivery')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.delivery.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.delivery.edit', $delivery->id)}}" class="btn btn-success">
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
                <th>Заголовок</th>
                <th>Текст</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$delivery->id}}</td>
                <td>{{$delivery->title}}</td>
                <td>{{$delivery->subtitle}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
