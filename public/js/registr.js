const regBody = $('body');
const regPasswordInput = $('#register-password');
const regRePasswordInput = $('#register-password-confirmation');
const form = document.getElementById('regForm');

regBody.on('click', '.password-control', function () {
  if (regPasswordInput.attr('type') === 'password') {
    $(this).addClass('view');
    regPasswordInput.attr('type', 'text');
  } else {
    $(this).removeClass('view');
    regPasswordInput.attr('type', 'password');
  }
});

regBody.on('click', '.repassword-control', function () {
    if (regRePasswordInput.attr('type') === 'password') {
        $(this).addClass('check');
        regRePasswordInput.attr('type', 'text');
    } else {
        $(this).removeClass('check');
        regRePasswordInput.attr('type', 'password');
    }
});

$('#openModal').click(function () {
    authModal.css('display', 'block');
    indexModalBackground.css('display', 'block');
    indexBody.addClass("modal-open");
});
