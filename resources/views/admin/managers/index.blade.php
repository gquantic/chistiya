@extends('layouts.adminwrapper')

@section('title')
    Менеджеры
@endsection

@section('manager')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.managers.create')}}" class="btn btn-success">
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
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Фото</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($managers as $manager)

                    <tr>
                        <td>{{$manager->id}}</td>
                        <td>{{$manager->name}}</td>
                        <td>{{$manager->phone}}</td>
                        <td>{{$manager->photo}}</td>
                        <td>
                            <form method="post" action="{{route('admin.managers.destroy',$manager->id)}}">
                                @csrf
                                @method('delete')
                                <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.managers.edit',$manager->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.managers.show',$manager->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
