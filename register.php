<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/fonts/css/all.min.css" />
  <link rel="stylesheet" href="./lib/boostrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/app.css" />
  <title>Nhóm 2 | Bán hàng nội thất</title>
</head>

<body>
  <div id="root">
    <section class="my-5">
      <div class="mx-auto bg-white p-4 shadow" style="width: 500px; height: max-content;">
        <h1>Đăng Ký</h1>
        <hr />
        <form action="./php/handle_register.php" method="post" onsubmit="return validateFormRegister()">
          <div class="mb-3">
            <label for="full_name" class="form-label">Tên tài khoản:</label>
            <input type="text" name="full_name" id="full_name" class="form-control rounded" />
            <span class="full-name__message text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập:</label>
            <input type="text" name="username" id="username" class="form-control rounded" />
            <span class="username__message text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" id="email" class="form-control rounded" placeholder="example@gmail.com" />
            <span class="email__message text-danger"></span>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <label for="phone" class="form-label">Số điện thoại:</label>
              <input type="text" name="phone" id="phone" class="form-control rounded" />
              <span class="phone__message text-danger"></span>
            </div>
            <div class="col-6">
              <label for="address" class="form-label">Địa chỉ:</label>
              <input type="text" name="address" id="address" class="form-control rounded" />
              <span class="address__message text-danger"></span>
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu:</label>
            <input type="password" name="password" id="password" class="form-control rounded" />
            <span class="password__message text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="confirm" class="form-label">Nhập lại mật khẩu:</label>
            <input type="password" name="confirm" id="confirm" class="form-control rounded" />
            <span class="confirm__message text-danger"></span>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
            <p class="mb-0">Bạn đã có tài khoản? <a href="index.php">Trở về trang chủ</a></p>
          </div>
        </form>
      </div>
    </section>
  </div>
  <script>
    function validateEmail(email) {
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
    }

    function validatePhoneNumber(number) {
      return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
    }

    function validateFormRegister() {
      const fullNameInput = document.getElementById('full_name').value;
      const usernameInput = document.getElementById('username').value;
      const emailInput = document.getElementById('email').value;
      const phoneInput = document.getElementById('phone').value;
      const addressInput = document.getElementById('address').value;
      const passwordInput = document.getElementById('password').value;
      const confirmInput = document.getElementById('confirm').value;

      const fullNameMessage = document.querySelector('.full-name__message');
      const usernameMessage = document.querySelector('.username__message');
      const emailMessage = document.querySelector('.email__message');
      const phoneMessage = document.querySelector('.phone__message');
      const addressMessage = document.querySelector('.address__message');
      const passwordMessage = document.querySelector('.password__message');
      const confirmMessage = document.querySelector('.confirm__message');
      const regexEmail = '^[w-.]+@([w-]+.)+[w-]{2,4}$';
      if (fullNameInput.length == 0) {
        fullNameMessage.innerText = 'Vui lòng không để trống thông tin !';
        return false;
      } else {
        fullNameMessage.innerText = '';
      }
      if (usernameInput.length == 0) {
        usernameMessage.innerText = 'Vui lòng không để trống thông tin !';
        return false;
      } else {
        usernameMessage.innerText = '';
      }
      if (emailInput.length == 0) {
        emailMessage.innerText = 'Vui lòng không để trống thông tin !';
        return false;
      } else {
        emailMessage.innerText = '';
      }
      if (!validateEmail(emailInput)) {
        emailMessage.innerText = 'Vui lòng nhập đúng định dạng email !';
        return false;
      } else {
        emailMessage.innerText = '';
      }
      if (phoneInput.length == 0) {
        phoneMessage.innerText = 'Vui lòng không để trống thông tin !';
        return false;
      } else {
        phoneMessage.innerText = '';
      }
      if (!validatePhoneNumber(phoneInput)) {
        phoneMessage.innerText = 'Vui lòng nhập đúng số điện thoại !';
        return false;
      } else {
        phoneMessage.innerText = '';
      }
      if (addressInput.length == 0) {
        addressMessage.innerText = 'Vui lòng không để trống thông tin !';
        return false;
      } else {
        addressMessage.innerText = '';
      }
      if (passwordInput.length == 0) {
        passwordMessage.innerText = 'Vui lòng không để trống thông tin !';
        return false;
      } else {
        passwordMessage.innerText = '';
      }
      if (passwordInput.length <= 4) {
        passwordMessage.innerText = 'Mật khẩu yêu cầu tối thiểu 5 ký tự !';
        return false;
      } else {
        passwordMessage.innerText = '';
      }
      if (confirmInput.length == 0) {
        confirmMessage.innerText = 'Vui lòng không để trống thông tin !';
        return false;
      } else {
        confirmMessage.innerText = '';
      }
      if (passwordInput != confirmInput) {
        confirmMessage.innerText = 'Mật khẩu không trùng khớp !';
        return false;
      } else {
        confirmMessage.innerText = '';
      }
      return true;
    }
  </script>
</body>

</html>