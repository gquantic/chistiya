@extends('layouts.adminwrapper')

@section('title')
    Информация о доставке
@endsection

@section('delivery')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.delivery.create')}}" class="btn btn-success">
                <i class="fas fa-plus"></i> Добавить
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
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($delivery_s as $delivery)

                    <tr>
                        <td>{{$delivery->id}}</td>
                        <td>{{$delivery->title}}</td>
                        <td>{{$delivery->subtitle}}</td>
                        <td>
                            <form method="post" action="{{route('admin.delivery.destroy',$delivery->id)}}">
                                @csrf
                                @method('delete')
                                <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.delivery.edit',$delivery->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.delivery.show',$delivery->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
