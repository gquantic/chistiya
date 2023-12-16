@extends('layouts.adminwrapper')

@section('title')
Заявка {{$application->id}}
@endsection

@section('applications')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.applications.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
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
                <th>Товар</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$application->id}}</td>
                <td>{{$application->name}}</td>
                <td>{{$application->phone}}</td>
                <td>{{$application->product}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
