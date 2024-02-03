@extends('layouts.adminwrapper')

@section('title')
ИП
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

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.ip.edit', $ip->id)}}" class="btn btn-success">
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
                <th>ФИО</th>
                <th>ИНН</th>
                <th>ОРГНИП</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$ip->name}}</td>
                <td>{{$ip->inn}}</td>
                <td>{{$ip->orgnip}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
