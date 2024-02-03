@extends('layouts.adminwrapper')

@section('title')
    О компании
@endsection

@section('about')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.about.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.about.edit', $about->id)}}" class="btn btn-success">
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
                <th>Описание</th>
                <th>Длинное описание</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$about->description}}</td>
                <td>{{$about->long_description}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
