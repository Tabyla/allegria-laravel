@extends('backend.layouts.admin')

@section('title', 'Товары')

@section('content_header')
    Товары
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
        <li class="breadcrumb-item active">Товары</li>
    </ol>
@endsection

@section('buttons')
    <a class="btn btn-success btn-sm float-sm-right" href="{{route('products.create')}}">Добавить товар</a>
@endsection

@section('content')
    @if (session('alert'))
        <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px">
            {{ session('alert') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Описание</th>
                        <th>Бренд</th>
                        <th>Категория</th>
                        <th>Основное фото</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><a href="{{route('products.edit', $item->id)}}">{{ $item->name }}</a></td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->brand->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td><img class="product_image" loading="lazy" src="{{ asset('images/products/' . $item->mainImage->image_path) }}"
                                     alt="{{ $item->name }}"></td>
                            <td class="action-buttons">
                                <a href="{{route('products.edit', $item->id)}}" class="btn btn-primary btn-sm"
                                   title="Отредактировать товар">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <form method="POST" action="{{ url('admin/products' . '/' . $item->id)}}" accept-charset="UTF-8"
                                      style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Удаление товаров"
                                            onclick="return confirm('Удалить товар?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $products->onEachSide(10)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
