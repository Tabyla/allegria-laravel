@extends('backend.layouts.admin')

@section('title', 'Изменить Свойство ' . $property->name)

@section('content_header')
    <h1>Изменить свойство {{ $property->name }}</h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
        <li class="breadcrumb-item active"><a href="{{route('property.index')}}">Свойства</a></li>
        <li class="breadcrumb-item active">Редактировать</li>
    </ol>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <a href="{{ route('property.index') }}" title="Назад">
                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
                </button>
            </a>
            <br/>
            <br/>

            <form method="POST" action="{{ route('property.update', ['property' => $property->id]) }}"
                  accept-charset="UTF-8"
                  class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                @include ('backend.property.form')

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Обновить">
                </div>
            </form>

        </div>
    </div>
@endsection
