$(document).ready(function () {
  $('#open-address-form').on('click', function () {
    $('#order-block').css('display', 'none');
    $('#edit-address').css('display', 'flex');
  });
  $('#close-address-form').on('click', function () {
    $('#edit-address').css('display', 'none');
    $('#order-block').css('display', 'flex');
  });

  if ($('.order-address p').is(':empty')){
    $('#order-form').css('display', 'none')
    $('.nonaddress').css('display', 'flex')
  }

  if (sessionStorage.getItem('address')) {
    $('.order-address p').text(sessionStorage.getItem('address'));
    $('.nonaddress').css('display', 'none')
    $('#order-form').css('display', 'flex')
  }

  $('#save-address').on('click', function () {
    let city = $('#city').val();
    let street = $('#street').val();
    let house = $('#house').val();
    let apartment = $('#apartment').val();

    if (city && street && house && apartment){
      let newAddress = `г. ${city}, ул. ${street}, д. ${house}, кв. ${apartment}`;
      sessionStorage.setItem('address', newAddress);
      $('.order-address p').text(newAddress);

      $('#edit-address').css('display', 'none');
      $('#order-block').css('display', 'flex');
      location.reload();
    }
    else{
      alert('Заполните поля');
    }
  });

  $('#order-button').on('click', function(event) {
    event.preventDefault();
    const address = $('#address-text').text();
    $('#address-input').val(address);
    $('#order-form').submit();
  });
});
