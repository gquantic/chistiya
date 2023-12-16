@extends('layouts.adminwrapper')

@section('title')
    Заявки
@endsection

@section('applications')
    active
@endsection

@section('content')


    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Товар</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($applications as $application)

                    <tr>
                        <td>{{$application->id}}</td>
                        <td>{{$application->name}}</td>
                        <td>{{$application->phone}}</td>
                        <td>{{$application->product}}</td>
                        <td>
                            <form method="post" action="{{route('admin.applications.destroy',$application->id)}}">
                                @csrf
                                @method('delete')
                                <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.applications.show',$application->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
