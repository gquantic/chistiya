@extends('layouts.adminwrapper')

@section('title')
    Контакты
@endsection

@section('contact')
    active
@endsection

@section('content')

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
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($contacts as $contact)

                    <tr>
                        <td>{{$contact->hotline}}</td>
                        <td>{{$contact->sales}}</td>
                        <td>{{$contact->schedule}}</td>
                        <td>{{$contact->address}}</td>
                        <td>{{$contact->email}}</td>
                        <td><a href="{{route('admin.contacts.edit',$contact->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.contacts.show',$contact->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
