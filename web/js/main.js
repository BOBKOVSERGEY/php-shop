$(function () {

  $('.cart').on('click', function (e) {
    e.preventDefault();
    $.ajax({
      url: '/cart/open',
      type: 'GET',
      success: function (res) {
        $('#cart .modal-body').html(res);
        $('#cart').modal('show');
      },
      error: function () {
        console.log('error');
      }
    })
  });


  $('.product-button__add').on('click', function (e) {
    e.preventDefault();
    let name = $(this).data('name');

    $.ajax({
      url: '/cart/add',
      data: {name:name},
      type: 'GET',
      success: function (res) {
        $('#cart .modal-body').html(res);
        $('.menu-quantity').html($('.total-quantity').html());
      },
      error: function () {
        console.log('error');
      }
    })
  });
  
  $('#clearCart').on('click', function (e) {
    e.preventDefault();
    if (confirm('Точно очистить корзину')) {
      $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
          $('#cart .modal-body').html(res);
          $('.menu-quantity').html($('.total-quantity').html());
        },
        error: function () {
          console.log('error');
        }
      })
    }
  });

  $('.modal-content').on('click', '.delete', function () {

    let id = $(this).data('id');
    $.ajax({
      url: '/cart/delete',
      data: {id:id},
      type: 'GET',
      success: function (res) {
        $('#cart .modal-body').html(res);
        if ($('.total-quantity').html()) {
          $('.menu-quantity').html($('.total-quantity').html());
        } else {
          $('.menu-quantity').html(0);
        }

      },
      error: function () {
        console.log('error');
      }
    })
  })

  $('.btn-next').on('click', function () {
    $.ajax({
      url: '/cart/order',
      type: 'GET',
      success: function (res) {
        $('#order .modal-body').html(res);
        $('#cart').modal('hide');
        $('#order').modal('show');
      },
      error: function () {
        console.log('Error');
      }
    });
  })
});