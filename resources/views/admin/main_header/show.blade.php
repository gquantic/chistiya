@extends('layouts.adminwrapper')

@section('title')
Заголовок
@endsection

@section('main_header')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.main_header.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.main_header.edit', $header->id)}}" class="btn btn-success">
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
                <th>Заголовок</th>
                <th>Подзаголовок</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$header->title}}</td>
                <td>{{$header->subtitle}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
