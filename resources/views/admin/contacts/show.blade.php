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

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.contacts.edit', $contact->id)}}" class="btn btn-success">
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
                <th>Горячая линия</th>
                <th>Отдел продаж</th>
                <th>Режим работы</th>
                <th>Адрес</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$contact->hotline}}</td>
                <td>{{$contact->sales}}</td>
                <td>{{$contact->schedule}}</td>
                <td>{{$contact->address}}</td>
                <td>{{$contact->email}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
