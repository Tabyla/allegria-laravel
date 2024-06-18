@extends('backend.layouts.admin')

@section('title', 'Изображения товаров')

@section('content_header')
    Изображения товаров
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
        <li class="breadcrumb-item active">Изображения товаров</li>
    </ol>
@endsection

@section('buttons')
    <a class="btn btn-success btn-sm float-sm-right" href="{{route('product_image.create')}}">Добавить изображение</a>
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
                        <th>Изображение</th>
                        <th>Товар</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td> <img class="product_image" loading="lazy" src="{{ asset('images/products/' . $item->image_path) }}"
                                      alt="{{ $item->product->name }}"></td>
                            <td>{{ $item->product->name }}</td>
                            <td class="action-buttons">
                                <a href="{{route('product_image.edit', $item->id)}}" class="btn btn-primary btn-sm"
                                   title="Отредактировать изображение">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <form method="POST" action="{{ url('admin/product_image' . '/' . $item->id)}}" accept-charset="UTF-8"
                                      style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Удаление изображения"
                                            onclick="return confirm('Удалить изображение?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $images->onEachSide(10)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
