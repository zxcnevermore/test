<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
  </head>
  <body>
    <body class="text-center">
      <main class="form-signin">
        <form action="check.php" method="post">
          <h1 class="h3 mb-3 fw-normal">Зарегистрируйтесь</h1>
          <div class="form-floating  mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя">
            <label for="name">Имя</label>
          </div>
          <div class="form-floating  mb-3">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин">
            <label for="login">Логин</label>
          </div>
          <div class="form-floating  mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль">
            <label for="password">Пароль</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
          <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
        </form>
      </main>
      <script src="js/bootstrap.js"></script>
  </body>
</html>
