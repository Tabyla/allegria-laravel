<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ time() }}">
    <title>Популярные вопросы</title>
</head>
<body>
@extends('frontend.layouts.app')
<main>
    @section('content')
        <section class="questions">
            <h1>Популярные вопросы</h1>
            <div class="questions-content">
                <div class="popular_questions">
                    <div class="first_column">
                        <h3 class="title">Покупки</h3>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="second_column">
                        <h3 class="title">Возврат и обмен</h3>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="label">Вопрос от покупателя</div>
                            <div class="content">
                                <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse
                                    adipisci ex impedit itaque labore. Dolorum tempore ipsum autem
                                    molestias corrupti possimus voluptate, quos accusamus esse maiores
                                    dolorem qui eaque facilis nemo nulla, amet excepturi laborum eveniet
                                    eligendi aperiam nostrum culpa.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question_form">
                    <form action="{{ route('callback.request') }}" method="POST" class="form_content">
                        {{ csrf_field() }}
                        <h2>Есть вопросы<br>или предложения? <br>НАПИШИТЕ НАМ</h2>
                        <div class="content_contacts">
                            <input class="form_input text" required id="name" name="name"type="text" placeholder="Имя">
                            <input class="form_input text" required id="email" name="email" type="email" placeholder="Email">
                        </div>
                        <div class="form_question">
                            <textarea class="text" required id="message" name="message" placeholder="Текст сообщения"></textarea>
                            <input type="submit" class="btn" value="отправить">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="{{ asset('js/questions.js') }}"></script>
    @endsection
</main>

</body>
</html>