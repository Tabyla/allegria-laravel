function getNoun(count, one, two, five) {
  count = Math.abs(count);
  count %= 100;
  if (count >= 5 && count <= 20) {
    return five;
  }
  count %= 10;
  if (count === 1) {
    return one;
  }
  if (count >= 2 && count <= 4) {
    return two;
  }
  return five;
}

$(document).ready(function () {
  const count = parseInt($("#product-count").text());
  const word = getNoun(count, 'товар', 'товара', 'товаров');
  $("#product-count").text(count + ' ' + word);
});

const boxes = Array.from(document.querySelectorAll(".label"));

boxes.forEach((box) => {
  box.addEventListener("click", boxHandler);
});

function boxHandler(e) {
  const currentBox = e.target.closest(".box");
  let currentContent = currentBox.querySelector('.content');
  currentBox.classList.toggle("active");
  if (currentBox.classList.contains("active")) {
    currentContent.style.maxHeight = currentContent.scrollHeight + "px";
  } else {
    currentContent.style.maxHeight = 0;
  }
}

$(document).ready(function () {
  $('.dropdown-toggle').click(function () {
    $(this).next('.dropdown-menu').toggleClass('show');
  });

  $(window).click(function (event) {
    if (!$(event.target).closest('.dropdown').length) {
      $('.dropdown-menu').removeClass('show');
    }
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

  $('.dropdown-content').each(function () {
    const color = $(this).text().trim().toLowerCase();
    if (colorClasses[color]) {
      $(this).addClass(colorClasses[color]);
      $(this).text('');
    }
  });
});

$(document).ready(function () {
  let page = 1;

  $('#load-more').on('click', function () {
    page++;
    $.ajax({
      url: currentUrl + '?page=' + page,
      type: 'get',
      beforeSend: function () {
        $('#load-more').attr('disabled', true).val('Загрузка...');
      },
      success: function (response) {
        let products = response.data;
        products.forEach(product => {
          $('#product-list').append(`
                        <div class="product">
                            <div class="content-img">
                                <img loading="lazy" src="../images/products/${product.image_path}"
                                     alt="${product.product_name}">
                                <input type="image" src="../images/add_favourites.png" alt="add favourites">
                            </div>
                            <h2 class="name">${product.product_name}</h2>
                            <p class="category">${product.brand_name}</p>
                            <p class="price">${product.price} руб</p>
                        </div>
                        `);
        });

        if (response.current_page >= response.last_page) {
          $('#load-more').hide();
        } else {
          $('#load-more').attr('disabled', false).val('Показать больше');
        }
      },
      error: function () {
        $('#load-more').attr('disabled', false).val('Показать больше');
      }
    });
  });
});


$(document).ready(function () {
  let selectedSize = $('#size_name').val();
  let selectedColor = $('#color_name').val();
  let selectedBrand = $('#brand_name').val();
  const sizeDropDown = document.querySelectorAll('.size-option');
  const brandDropDown = document.querySelectorAll('.brand-option');

  $('#cancel-size-filter').click(function() {
    $('#size_name').val('');
    $('#filter-form').submit();
  });
  $('#cancel-color-filter').click(function() {
    $('#color_name').val('');
    $('#filter-form').submit();
  });
  $('#cancel-brand-filter').click(function() {
    $('#brand_name').val('');
    $('#filter-form').submit();
  });


  sizeDropDown.forEach(function (item) {
    item.addEventListener('click', function () {
      sizeDropDown.forEach(function (el) {
        el.classList.remove('selected-value');
      });
      this.classList.add('selected-value');
      selectedSize = $(this).data('name');
    });
  });

  $('.color-option').on('click', function () {
    selectedColor = $(this).data('name');
  });

  brandDropDown.forEach(function (item) {
    item.addEventListener('click', function () {
      brandDropDown.forEach(function (el) {
        el.classList.remove('selected-value');
      });
      this.classList.add('selected-value');
      selectedBrand = $(this).data('name');
    });
  });

  $('.apply-filter').on('click', function () {
    let property = $(this).data('property');

    if (property === 'size') {
      $('#size_name').val(selectedSize);
    } else if (property === 'color') {
      $('#color_name').val(selectedColor);
    } else if (property === 'brand') {
      $('#brand_name').val(selectedBrand);
    }

    $('#filter-form').submit();
  });
});
