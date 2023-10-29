function isEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function isPhoneNumber(number) {
  return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}

function showErrorMessage(field, text) {
  field.classList.add('error');
  const errorElement = document.createElement('small');
  errorElement.classList.add('error-text');
  errorElement.innerText = text;
  field.closest('.form-group').appendChild(errorElement);
}

function clearErrorMessage() {
  document.querySelectorAll('.form-group .error').forEach((item) => item.classList.remove('error'));
  document.querySelectorAll('.error-text').forEach((item) => item.remove());
}

function validateFormLogin() {
  const usernameInput = document.getElementById('username');
  const passwordInput = document.getElementById('password');

  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value.trim();

  clearErrorMessage();

  if (username.length == 0) {
    showErrorMessage(usernameInput, 'Vui lòng nhập tên đăng nhập');
  }

  if (password.length == 0) {
    showErrorMessage(passwordInput, 'Vui lòng nhập mật khẩu');
  }

  const errorInputs = document.querySelectorAll('.form-group .error');
  if (errorInputs.length > 0) return false;

  return true;
}

function validateFormComment() {
  const customerNameInput = document.getElementById('customer_name');
  const customerPhoneInput = document.getElementById('customer_phone');
  const customerCommentInput = document.getElementById('customer_comment');

  const customerName = document.getElementById('customer_name').value.trim();
  const customerPhone = document.getElementById('customer_phone').value.trim();
  const customerComment = document.getElementById('customer_comment').value.trim();

  clearErrorMessage();

  if (customerName.length == 0) {
    showErrorMessage(customerNameInput, 'Vui lòng nhập họ và tên');
  }

  if (!isPhoneNumber(customerPhone)) {
    showErrorMessage(customerPhoneInput, 'Số điện thoại không hợp lệ');
  }

  if (customerComment.length == 0) {
    showErrorMessage(customerCommentInput, 'Vui lòng nhập nội dung bình luận');
  }

  const errorInputs = document.querySelectorAll('.form-group .error');
  if (errorInputs.length > 0) return false;

  return true;
}

function validateFormContact() {
  const titleInput = document.getElementById('title');
  const contentInput = document.getElementById('content');

  const title = document.getElementById('title').value.trim();
  const content = document.getElementById('content').value.trim();

  clearErrorMessage();

  if (title.length == 0) {
    showErrorMessage(titleInput, 'Vui lòng nhập tiêu đề');
  }

  if (content.length == 0) {
    showErrorMessage(contentInput, 'Vui lòng nhập vấn đề mà bạn gặp phải');
  }

  const errorInputs = document.querySelectorAll('.form-group .error');
  if (errorInputs.length > 0) return false;

  return true;
}

function validateFormRegister() {
  const fullNameInput = document.getElementById('full_name');
  const usernameInput = document.getElementById('username');
  const emailInput = document.getElementById('email');
  const phoneInput = document.getElementById('phone');
  const addressInput = document.getElementById('address');
  const passwordInput = document.getElementById('password');
  const confirmInput = document.getElementById('confirm');

  const fullName = document.getElementById('full_name').value.trim();
  const username = document.getElementById('username').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const address = document.getElementById('address').value.trim();
  const password = document.getElementById('password').value.trim();
  const confirm = document.getElementById('confirm').value.trim();

  clearErrorMessage();

  if (fullName.length == 0) {
    showErrorMessage(fullNameInput, 'Vui lòng nhập họ tên');
  }

  if (username.length == 0) {
    showErrorMessage(usernameInput, 'Vui lòng nhập tên đăng nhập');
  }

  if (!isEmail(email)) {
    showErrorMessage(emailInput, 'Email không hợp lệ');
  }

  if (!isPhoneNumber(phone)) {
    showErrorMessage(phoneInput, 'Số điện thoại không hợp lệ');
  }

  if (address.length == 0) {
    showErrorMessage(addressInput, 'Vui lòng nhập địa chỉ');
  }

  if (password.length == 0) {
    showErrorMessage(passwordInput, 'Vui lòng nhập mật khẩu');
  }

  if (password != confirm) {
    showErrorMessage(confirmInput, 'Mật khẩu không trùng khớp');
  }

  const errorInputs = document.querySelectorAll('.form-group .error');
  if (errorInputs.length > 0) return false;

  return true;
}
