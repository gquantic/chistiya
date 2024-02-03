@extends('layouts.adminwrapper')

@section('title')
    О компании
@endsection

@section('about')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Описание</th>
                    <th>Длинное описание</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($abouts as $about)

                    <tr>
                        <td>{{$about->description}}</td>
                        <td>{{$about->long_description}}</td>
                        <td><a href="{{route('admin.about.edit',$about->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.about.show',$about->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
