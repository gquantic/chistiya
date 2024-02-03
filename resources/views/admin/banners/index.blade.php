@extends('layouts.adminwrapper')

@section('title')
    Баннеры
@endsection

@section('banner')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Заголовок</th>
                    <th>Подзаголовок</th>
                    <th>Относится к</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($banners as $banner)
                    @switch($banner->parent_block)
                        @case(1)
                            @php
                                $parent_block='Наши товары';
                            @endphp
                        @break
                        @case(2)
                            @php
                                $parent_block='О нас';
                            @endphp
                            @break
                    @endswitch

                    <tr>
                        <td>{{$banner->id}}</td>
                        <td>{{$banner->title}}</td>
                        <td>{{$banner->subtitle}}</td>
                        <td>{{$banner->parent_block}}</td>
                        <td>
                            <form method="post" action="{{route('admin.banners.destroy',$banner->id)}}">
                                @csrf
                                @method('delete')
                                <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.banners.edit',$banner->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.banners.show',$banner->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
