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
     
      <form action="./login/post" method="post" autocomplete="off">
      <img style="width:100%; border-radius: 12px;" src="./assets/image/dh-quy-nhon-18473511.webp">
        <h1 class="mb-3 fw-bold text-dark h1 text-center">Đăng nhập</h1>
        <div class="mb-3 form-floating">
          <input type="text" class="form-control" name="username" maxlength="20" id="username" placeholder="" required />
          <label for="username">Tên đăng nhập</label>
        </div>

        <div class="mb-3 form-floating">
          <input type="password" class="form-control" name="password" maxlength="20" id="password" placeholder="" required />
          <label for="password">Mật khẩu</label>
        </div>

        <div class="mb-3">
          <button type="submit" class="w-100 btn btn-lg btn-primary">Đăng nhập</button>
        </div>
         
        <div class="text-center">Bạn chưa có tài khoản? <a href="./register">Đăng ký</a></div>
      </form>
    </main>
  </body>
</html>
