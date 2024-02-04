@extends('layouts.adminwrapper')

@section('title')
    Товары
@endsection

@section('product')
    active
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.products.create')}}" class="btn btn-success">
                <i class="fas fa-plus"></i> Добавить
            </a>
        </div>
    </div>
    <div class="row p-2 pt-3 pb-3 bg-body-tertiary" style="margin: 30px 0;background: rgba(0,0,0,.02);border-radius: 5px;">
        <div class="col-12">
            <h4 class="mb-2">Фильтры</h4>
        </div>
        <form class="col-12" action="{{ route('admin.products.index') }}" method="get">
            <div class="form-group">
                <label for="">Категория</label>
                <select name="category" id="" class="form-control">
                    <option value="">Все категории</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" @if(request()->get('category') == $category->id) selected @endif>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="">Дополнительно</label>
                <br>
                <label for="no_image">
                    <input type="checkbox" id="no_image" name="no_image" value="true"
                        @if(request()->get('no_image') == true) checked @endif>
                    <span class="ml-1">Без фото</span>
                </label>
            </div>
            <input type="submit" class="btn btn-primary" value="Фильтровать">
            <a href="{{ route('admin.products.index') }}" type="button" class="btn btn-default ml-1">Сбросить фильтры</a>
        </form>
    </div>
    <br>

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Фото</th>
                    <th>Категория</th>
                    <th>Название</th>
                    <th>ссылка</th>
                    <th>Розница</th>
                    <th>До 30к</th>
                    <th>30-50к</th>
                    <th>От 50к</th>
                    <th>Объем</th>
                    <th>СИ</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)

                    <tr>
                        <td>{{$product->id}}</td>
                        <td><img src="{{ $product->image() }}" style="width: 40px;border-radius: 8px;" alt=""></td>
                        <td>{{$categories[($product->category_id)-1]->title}}</td>
                        <td>{{$product->title}} {{$product->volume}} {{$product->volume_text}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->price_1}}</td>
                        <td>{{$product->price_2}}</td>
                        <td>{{$product->price_3}}</td>
                        <td>{{$product->price_4}}</td>
                        <td>
                            <form method="post" action="{{route('admin.products.destroy',$product->id)}}">
                                @csrf
                                @method('delete')
                                <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.products.edit',$product->id)}}"><i class="fas fa-pen"></i></a></td>
                        <td><a href="{{route('admin.products.show',$product->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

@endsection
