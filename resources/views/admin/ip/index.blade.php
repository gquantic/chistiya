@extends('layouts.adminwrapper')

@section('title')
    ИП
@endsection

@section('ip')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ФИО</th>
                    <th>ИНН</th>
                    <th>ОРГНИП</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($ips as $ip)

                    <tr>
                        <td>{{$ip->name}}</td>
                        <td>{{$ip->inn}}</td>
                        <td>{{$ip->orgnip}}</td>

                        <td><a href="{{route('admin.ip.edit',$ip->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.ip.show',$ip->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
