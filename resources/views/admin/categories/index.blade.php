@extends('layouts.adminwrapper')

@section('title')
    Категории
@endsection

@section('category')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.categories.create')}}" class="btn btn-success">
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
                    <th>Название</th>
                    <th>Ссылка</th>
                    <th>Изображение</th>
                    <th>Описание</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->image}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <form method="post" action="{{route('admin.categories.destroy',$category->id)}}">
                                @csrf
                                @method('delete')
                                <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.categories.edit',$category->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.categories.show',$category->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
