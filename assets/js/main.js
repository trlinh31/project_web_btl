$(document).ready(function () {
  reloadQuantityCart();
  function reloadQuantityCart() {
    $.ajax({
      type: 'GET',
      url: './php/get_total_quantity_cart.php',
      data: {
        request: 'get_total_quantity_cart',
      },
      success: function (response) {
        $('.cart__qty').html(response);
      },
    });
  }
  $('.add-to-cart').on('click', function () {
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: './php/add_to_cart.php',
      data: {
        id: id,
      },
      success: function (response) {
        alert(response);
        reloadQuantityCart();
      },
    });
  });
});
function showPassword() {
  const passwordInput = document.getElementById('password');
  passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
}
