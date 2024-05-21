<footer>
    <section class="footer_form">
        <div class="footer_info">
            <p class="footer_title">Будьте в курсе событий</p>
            <form method="POST" class="form">
                <input class="input_form" id="email" name="email" type="email" placeholder="Введите Email">
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
<div id="authModal" class="modal">
    <div class="auth-modal-dialog">
        <div class="modal-content">
            <div class="close"><img src="{{asset('images/close.png')}}" id="authClose" alt="close"></div>
            <div class="auth-content-info">
                <form action="profile.html" method="POST" class="auth-form">
                    <h4>вход</h4>
                    <div class="auth-form_data">
                        <input class="form_input" required type="email" placeholder="Email">
                        <div class="password">
                            <input class="form_input" required type="password" id="auth-password-input"
                                   placeholder="Пароль">
                            <a href="#" class="password-control"></a>
                        </div>
                    </div>
                    <input type="submit" class="submit_btn" value="войти">
                </form>
                <div class="auth_links">
                    <button id="openRecoveryModal" class="red_link">Забыли пароль</button>
                    <p class="red_link">/</p>
                    <a href="registr.html" class="red_link">У меня нет аккаунта</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="recoveryModal" class="modal">
    <div class="recovery-modal-dialog">
        <div class="modal-content">
            <div class="close"><img src="{{asset('images/close.png')}}" id="recoveryClose" alt="close"></div>
            <div class="recovery-content-info">
                <form action="#" method="POST" class="recovery-form">
                    <h4>Восстановить пароль</h4>
                    <input class="form_input" required type="email" placeholder="Email">
                    <input type="submit" id="recoveryBtn" class="submit_btn" value="отправить">
                </form>
                <div class="recovery-info">
                    <h4>Восстановить пароль</h4>
                    <p>Ссылка для восстановления пароля отправлено <br>на sashaperezhogin123@gmail.com .</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-background"></div>
<script src="{{ asset('js/header.js') }}"></script>
