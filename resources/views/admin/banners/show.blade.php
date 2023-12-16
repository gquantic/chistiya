@extends('layouts.adminwrapper')

@section('title')
Баннер {{$banner->id}}
@endsection

@section('banner')
active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route('admin.banners.index')}}" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Назад
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
        <a href="{{route('admin.banners.edit', $banner->id)}}" class="btn btn-success">
            <i class="fas fa-pen"></i> Редактировать
        </a>
    </div>
</div>
<br>
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

<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Заголовок</th>
                <th>Подзаголовок</th>
                <th>Относится к</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$banner->id}}</td>
                <td>{{$banner->title}}</td>
                <td>{{$banner->subtitle}}</td>
                <td>{{$banner->parent_block}}</td>
            </tr>


            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>


@endsection
