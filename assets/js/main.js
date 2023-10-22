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
  const customerPhoneInput = document.getElementById('customer_phone').value;
  const customerNameMessage = document.querySelector('.customer-name__message');
  const customerPhoneMessage = document.querySelector('.customer-phone__message');
  const customerCommentMessage = document.querySelector('.customer-comment__message');
  if (customerNameInput.length == 0) {
    customerNameMessage.innerText = 'Vui lòng không để trống họ tên !';
    return false;
  } else {
    customerNameMessage.innerText = '';
  }
  if (customerPhoneInput.length > 0 && !validatePhoneNumber(customerPhoneInput)) {
    customerPhoneMessage.innerText = 'Vui lòng nhập đúng số điện thoại !';
    return false;
  } else {
    customerPhoneMessage.innerText = '';
  }
  if (customerCommentInput.length == 0) {
    customerCommentMessage.innerText = 'Vui lòng không để trống nội dung !';
    return false;
  } else {
    customerCommentMessage.innerText = '';
  }
  return true;
}
function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function validatePhoneNumber(number) {
  return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}
function validateFormContact() {
  const fullNameInput = document.getElementById('full_name').value;
  const phoneInput = document.getElementById('phone').value;
  const subjectInput = document.getElementById('subject').value;
  const emailInput = document.getElementById('email').value;
  const contentlInput = document.getElementById('content').value;

  const fullNameMessage = document.querySelector('.full-name__message');
  const phoneMessage = document.querySelector('.phone__message');
  const subjectMessage = document.querySelector('.subject__message');
  const emailMessage = document.querySelector('.email__message');
  const contentMessage = document.querySelector('.content__message');

  if (fullNameInput.length == 0) {
    fullNameMessage.innerText = 'Vui lòng không để trống thông tin';
    return false;
  } else {
    fullNameMessage.innerText = '';
  }
  if (phoneInput.length == 0) {
    phoneMessage.innerText = 'Vui lòng không để trống thông tin';
    return false;
  } else {
    phoneMessage.innerText = '';
  }
  if (!validatePhoneNumber(phoneInput)) {
    phoneMessage.innerText = 'Vui lòng nhập số điện thoại hợp lệ !';
    return false;
  } else {
    phoneMessage.innerText = '';
  }
  if (subjectInput.length == 0) {
    subjectMessage.innerText = 'Vui lòng không để trống thông tin';
    return false;
  } else {
    subjectMessage.innerText = '';
  }
  if (emailInput.length == 0) {
    emailMessage.innerText = 'Vui lòng không để trống thông tin';
    return false;
  } else {
    emailMessage.innerText = '';
  }
  if (!validateEmail(emailInput)) {
    emailMessage.innerText = 'Vui lòng nhập đúng định dạng email';
    return false;
  } else {
    emailMessage.innerText = '';
  }
  if (contentlInput.length == 0) {
    contentMessage.innerText = 'Vui lòng không để trống thông tin';
    return false;
  } else {
    contentMessage.innerText = '';
  }
  return true;
}
