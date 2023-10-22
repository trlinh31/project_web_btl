function showPassword() {
  const passwordInput = document.getElementById('password');
  passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
}
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
  console.log(document.querySelector('.cart__qty'));
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
function validateFormLogin() {
  const usernameInput = document.getElementById('username').value;
  const passwordInput = document.getElementById('password').value;
  const usernameMessage = document.querySelector('.username__message');
  const passwordMessage = document.querySelector('.password__message');
  if (usernameInput.length == 0) {
    usernameMessage.innerText = 'Vui lòng không để trống tên đăng nhập !';
    return false;
  } else {
    usernameMessage.innerText = '';
  }
  if (passwordInput.length == 0) {
    passwordMessage.innerText = 'Vui lòng không để trống mật khẩu !';
    return false;
  } else {
    passwordMessage.innerText = '';
  }
  return true;
}
function validateFormComment() {
  const customerNameInput = document.getElementById('customer_name').value;
  const customerCommentInput = document.getElementById('customer_comment').value;
  const customerNameMessage = document.querySelector('.customer-name__message');
  const customerCommentMessage = document.querySelector('.customer-comment__message');
  if (customerNameInput.length == 0) {
    customerNameMessage.innerText = 'Vui lòng không để trống họ tên !';
    return false;
  } else {
    customerNameMessage.innerText = '';
  }
  if (customerCommentInput.length == 0) {
    customerCommentMessage.innerText = 'Vui lòng không để trống nội dung !';
    return false;
  } else {
    customerCommentMessage.innerText = '';
  }
  return true;
}
