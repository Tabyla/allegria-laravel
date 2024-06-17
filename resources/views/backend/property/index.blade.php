@extends('backend.layouts.admin')

@section('title', 'Свойства')

@section('content_header')
    Свойства
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item active">Свойства</li>
    </ol>
@endsection

@section('buttons')
    <a class="btn btn-success btn-sm float-sm-right" href="{{route('property.create')}}">Добавить свойство</a>
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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><a href="{{route('property.edit', $item->id)}}">{{ $item->name }}</a></td>
                            <td class="action-buttons">
                                <a href="{{route('property.edit', $item->id)}}" class="btn btn-primary btn-sm"
                                   title="Отредактировать пользователя">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <form method="POST" action="{{ url('admin/property' . '/' . $item->id)}}" accept-charset="UTF-8"
                                      style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Удаление свойства"
                                            onclick="return confirm('Удалить свойство?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $properties->onEachSide(10)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
