const indexModalBackground = $(".modal-background");
const authModal = $("#authModal");
const recoveryModal = $("#recoveryModal");
const indexBody = $('body');
const authPasswordInput = $('#password');
const authRePasswordInput = $('#repassword-input');
const recoveryForm = $(".recovery-form");
const recoveryInfo = $(".recovery-info");

$(document).ready(function() {
  $('.openAuthModal').click(function () {
    authModal.css('display', 'block');
    indexModalBackground.css('display', 'block');
    indexBody.addClass("modal-open");
  });
});

$('#openRecoveryModal').click(function () {
    authModal.hide();
    recoveryModal.css('display', 'block');
    indexModalBackground.css('display', 'block');
    indexBody.addClass("modal-open");
});

$(window).on('click', function (e) {
    if (e.target === document.getElementById("authModal")) {
        authModal.hide();
        indexModalBackground.hide();
        indexBody.removeClass("modal-open");
    }
    if (e.target === document.getElementById("recoveryModal")) {
        recoveryModal.hide();
        indexModalBackground.hide();
        recoveryInfo.hide();
        recoveryForm.css('display', 'flex');
        indexBody.removeClass("modal-open");
    }
});

$('#authClose').click(function () {
    authModal.hide();
    indexModalBackground.hide();
    indexBody.removeClass("modal-open");
});

$('#recoveryClose').click(function () {
    recoveryModal.hide();
    indexModalBackground.hide();
    recoveryInfo.hide();
    recoveryForm.css('display', 'flex');
    indexBody.removeClass("modal-open");
});

$('#recoveryBtn').click(function () {
    recoveryForm.hide();
    recoveryInfo.css('display', 'flex');
});

indexBody.on('click', '.password-control', function () {
    if (authPasswordInput.attr('type') === 'password') {
        $(this).addClass('view');
        authPasswordInput.attr('type', 'text');
    } else {
        $(this).removeClass('view');
        authPasswordInput.attr('type', 'password');
    }
});

indexBody.on('click', '.repassword-control', function () {
    if (authRePasswordInput.attr('type') === 'password') {
        $(this).addClass('view');
        authRePasswordInput.attr('type', 'text');
    } else {
        $(this).removeClass('view');
        authRePasswordInput.attr('type', 'password');
    }
});
