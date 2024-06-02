<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registr.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Регистрация</title>
</head>
<body>
@extends('frontend.layouts.app')
<main>
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
                        <input required id="register_email" name="register_email" class="form_input" type="email" placeholder="Email"
                               value="{{ old('register_email') }}">
                    </div>
                    <div class="form_data">
                        <div class="password">
                            <input required class="form_input" type="password" id="register-password" name="register_password"
                                   placeholder="Пароль" autocomplete="new-password">
                            <a href="#" class="password-control"></a>
                        </div>
                        {!! $errors->first('register_password', '<p class="help-block">:message</p>') !!}
                        <div class="password">
                            <input required class="form_input" type="password" id="register-password-confirmation"
                                   name="register_password_confirmation" placeholder="Повторите пароль"
                                   autocomplete="new-password">
                            <a href="#" class="repassword-control"></a>
                        </div>
                        {!! $errors->first('register_password_confirmation', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="checkbox_verification">
                        <div class="first-item">
                            <div class="checkbox-mailing">
                                <input type="checkbox" id="checkbox-mailing" name="check">
                                <label for="checkbox-mailing">Подписаться на рассылку</label>
                            </div>
                        </div>
                        <div class="second-item">
                            <div class="checkbox-privacy-policy">
                                <input required type="checkbox" id="checkbox-privacy-policy" name="check">
                                <label for="checkbox-privacy-policy">Я согласен с <a class="red_link" href="#">политикой
                                        конфиденциальности</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form_btn">
                        <input type="submit" value="зарегистрироваться" class="submit_btn">
                        <p>У меня уже есть аккаунт чтобы <a class="red_link" id="openModal">Войти</a></p>
                    </div>
                </form>
            </div>
        </section>
{{--        <div id="emailModal" class="modal">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="close"><img src="{{asset('images/close.png')}}" id="close" alt="close"></div>--}}
{{--                    <div class="content-info">--}}
{{--                        <h2>подтвердите e-mail</h2>--}}
{{--                        <p>На почту <span>sashaperezhogin123@gmail.com</span>--}}
{{--                            <br>отправлено письмо для подтверждения вашей регистрации</p>--}}
{{--                        <button type="button" class="submit_btn">--}}
{{--                            <a href="https://mail.google.com/mail/">Подтвердить</a>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <script src="{{ asset('js/registr.js') }}?v={{ time() }}"></script>
    @endsection
</main>
</body>
</html>
