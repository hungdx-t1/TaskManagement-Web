<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./index.css" />
  </head>
  <body class="d-flex justify-content-center align-items-center vh-100">
    <main class="form-signin w-100">
      <form  class="d-flex justify-content-center align-items-center flex-column" action="./register/post" method="post" autocomplete="off">
      <img style="width:50%;border-radius:50%"src="./assets/image/Logo-Dai-hoc-Quy-Nhon-1.webp">
        <h1 class="mb-3 fw-bold text-dark h1">Tạo tài khoản</h1>

        <div class="mb-3 form-floating w-100">
          <input type="text" class="form-control" name="username" minlength="2" maxlength="20" id="username" placeholder="" required />
          <label for="username">Tên đăng nhập</label>
        </div>

        <div class="mb-3 form-floating  w-100">
          <input type="text" class="form-control" name="email" minlength="2" maxlength="50" id="email" placeholder="" required />
          <label for="email">Email</label>
        </div>

        <div class="mb-3 form-floating  w-100">
          <input type="password" class="form-control" name="password" minlength="6" id="password" placeholder="" required />
          <label for="password">Mật khẩu</label>
        </div>

        <div class="mb-3">
          <button type="submit" class="w-100 btn btn-lg btn-primary">Đăng ký</button>
        </div>

        <div class="text-center">Bạn đã có tài khoản? <a href="./login">Đăng nhập</a></div>
      </form>
    </main>
  </body>
</html>
