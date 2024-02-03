@extends('layouts.adminwrapper')

@section('title')
    Заголовки
@endsection

@section('main_header')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Подзаголовок</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($headers as $header)

                    <tr>
                        <td>{{$header->title}}</td>
                        <td>{{$header->subtitle}}</td>
                        <td><a href="{{route('admin.main_header.edit',$header->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.main_header.show',$header->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
