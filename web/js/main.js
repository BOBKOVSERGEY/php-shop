$(function () {
  $('.cart').on('click', function (e) {
    e.preventDefault();
    $('#cart').modal('show');
  });

  $('.product-button__add').on('click', function (e) {
    e.preventDefault();
    let name = $(this).data('name');
    console.log(name);
  })
});