@extends('backend.layouts.admin')

@section('title', 'Обратные звоноки')

@section('content_header')
    Обратные звоноки
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item">Пользователи</li>
        <li class="breadcrumb-item active">Обратные звоноки</li>
    </ol>
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
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Сообщение</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($callbacks as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->message }}</td>
                            <td class="action-buttons">
                                <form method="POST" action="{{ url('callback' . '/' . $item->id)}}" accept-charset="UTF-8"
                                      style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Удаление пользователя"
                                            onclick="return confirm('Удалить пользователя?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $callbacks->onEachSide(10)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
