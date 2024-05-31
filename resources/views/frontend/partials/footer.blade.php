<footer>
    <section class="footer_form">
        <div class="footer_info">
            <p class="footer_title">Будьте в курсе событий</p>
            <form action="{{ route('newsletter.request') }}" method="POST" class="form">
                {{ csrf_field() }}
                <input class="input_form" id="newsletterEmail" name="newsletterEmail" type="email" placeholder="Введите Email">
                <input src="{{asset('images/form_btn.png')}}" type="image" alt="submit" class="btn_form">
            </form>
            <div class="footer_links">
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('questions') }}">Распространенные вопросы</a>
                <a href="{{ route('brands') }}">Бренды</a>
            </div>
        </div>
    </section>
    <div class="footer_copy">
        <p>Все права защищены &copy; 2024 Allegria.com</p>
    </div>
</footer>
<div class="modal-background"></div>
<script src="{{ asset('js/header.js') }}?v={{ time() }}"></script>
