@extends('backend.layouts.admin')

@section('title', 'Добавить товар')

@section('content_header')
    <h1>Добавить товар</h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Товары</a></li>
        <li class="breadcrumb-item active">Создать</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{route('products.index')}}" title="Назад" class="btn btn-warning btn-sm">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
            </a>
            <br/>
            <br/>

            <form method="POST" enctype="multipart/form-data" action="{{ route('products.index') }}"
                  accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}

                @include ('backend.product.form')
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Создать">
                </div>
            </form>

        </div>
    </div>
@endsection
