$(document).ready(function() {
    $('.thumbnail').on('click', function() {
        // Устанавливаем новое основное изображение
        $('#main-image').attr('src', $(this).attr('src'));

        // Удаляем класс active у всех миниатюр
        $('.thumbnail').removeClass('active');

        // Добавляем класс active к выбранной миниатюре
        $(this).addClass('active');
    });
});

$(document).ready(function () {
  const colorClasses = {
    'чёрный': 'black',
    'красный': 'red',
    'синий': 'blue',
    'зеленый': 'green',
    'белый': 'white',
    'фиолетовый': 'purple'
  };

  $('.block-content').each(function () {
    const color = $(this).text().trim().toLowerCase();
    if (colorClasses[color]) {
      $(this).addClass(colorClasses[color]);
      $(this).text('');
    }
  });
});
