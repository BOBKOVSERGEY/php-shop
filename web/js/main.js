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
        //$('#cart').modal('show');
      },
      error: function () {
        console.log('error');
      }
    })
  })
});