$(document).on('click', '#btn', function () {
  const num = $(this).attr('data-num');
  $('.info').removeClass('content')
  $('.profile-links button').removeClass('active')
  $('#block' + num).addClass('content')
  $('.btn' + num).addClass('active')
});

$('.password-form-content input').focus(function () {
  $('.password_form .submit_btn').css('display', 'block');
});

$(document).ready(function () {
  if ($('#product-list-block').children().length === 0) {
    $('.default-list-block').css('display', 'flex');
  }

  if ($('#product-orders-block').children().length === 0) {
    $('.default-order-block').css('display', 'flex');
  }

  $('#editAddress').click(function () {
    $('.default-address-block').hide();
    $('#address_form').css('display', 'flex');
  });
});
