@extends('frontend.layouts.app')
@section('title', 'Регистрация')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/registr.css') }}?v={{ time() }}">
@endsection
@section('content')
    <section class="container">
        <div class="registration">
            <h2>Регистрация</h2>
            <form class="reg_form" method="POST" id="regForm" action="{{ route('reg') }}">
                {{ csrf_field() }}
                <div class="form_data">
                    <input required id="firstname" name="firstname" class="form_input" type="text"
                           placeholder="Имя" value="{{ old('firstname') }}">
                    <input required id="surname" name="surname" class="form_input" type="text"
                           placeholder="Фамилия" value="{{ old('surname') }}">
                </div>
                <div class="form_data">
                    <input required id="phone" name="phone" class="form_input" type="tel" placeholder="Телефон"
                           value="{{ old('phone') }}">
                    <input required id="register_email" name="register_email" class="form_input" type="email"
                           placeholder="Email"
                           value="{{ old('register_email') }}">
                </div>
                <div class="form_data">
                    <div class="pass`word">
                        <input required class="form_input" type="password" id="register-password"
                               name="register_password"
                               placeholder="Пароль" autocomplete="new-password">
                        <a href="#" class="password-control"></a>
                    </div>
                    <div class="password">
                        <input required class="form_input" type="password" id="register-password-confirmation"
                               name="register_password_confirmation" placeholder="Повторите пароль"
                               autocomplete="new-password">
                        <a href="#" class="repassword-control"></a>
                    </div>
                </div>
                {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
                {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                {!! $errors->first('register_email', '<p class="help-block">:message</p>') !!}
                {!! $errors->first('register_password', '<p class="help-block">:message</p>') !!}
                <div class="form_btn">
                    <input type="submit" value="зарегистрироваться" class="submit_btn">
                    <p>У меня уже есть аккаунт чтобы <a class="red_link" id="openModal">Войти</a></p>
                </div>
            </form>
        </div>
    </section>
    <script src="{{ asset('js/registr.js') }}?v={{ time() }}"></script>
@endsection
