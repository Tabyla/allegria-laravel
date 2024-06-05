<div id="authModal" class="modal">
    <div class="auth-modal-dialog">
        <div class="modal-content">
            <div class="close"><img src="{{asset('images/close.png')}}" id="authClose" alt="close"></div>
            <div class="auth-content-info">
                <form action="{{ route('login') }}" method="POST" class="auth-form">
                    {{ csrf_field() }}
                    <h4>вход</h4>
                    <div class="auth-form_data">
                        <input class="form_input" required id="loginEmail"
                               name="email" type="email" placeholder="Email">
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        <div class="password">
                            <input class="form_input" required id="password" type="password" name="password"
                                   placeholder="Пароль" autocomplete="new-password">
                            <a href="#" class="password-control"></a>
                        </div>
                    </div>
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    <input type="submit" class="submit_btn" value="войти">
                </form>
                <div class="auth_links">
                    <button id="openRecoveryModal" class="red_link">Забыли пароль</button>
                    <p class="red_link">/</p>
                    <a href="{{ route('reg') }}" class="red_link">У меня нет аккаунта</a>
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
                <form action="{{route('recovery.request')}}" method="POST" class="recovery-form">
                    {{ csrf_field() }}
                    <h4>Восстановить пароль</h4>
                    <input class="form_input" id="recoveryEmail" name="recoveryEmail" required type="email"
                           placeholder="Email">
                    {!! $errors->first('recoveryEmail', '<p class="help-block">:message</p>') !!}
                    <input type="submit" class="submit_btn" value="отправить">
                </form>
                <div class="recovery-info">
                    <h4>Восстановить пароль</h4>
                    <p>Ссылка для восстановления пароля отправлено <br>на sashaperezhogin123@gmail.com .</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->has('email') || $errors->has('password'))
        authModal.css('display', 'block');
        indexModalBackground.css('display', 'block');
        indexBody.addClass("modal-open");
        @endif

        @if ($errors->has('recoveryEmail'))
        recoveryModal.css('display', 'block');
        indexModalBackground.css('display', 'block');
        indexBody.addClass("modal-open");
        @endif
    });
</script>
