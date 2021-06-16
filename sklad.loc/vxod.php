<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Авторизация</title>
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form action="aftoriz.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Войдите</h1>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
          <label for="login">Логин</label>
        </div>
        <div class="form-floating mb-2">
          <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
          <label for="password">Пароль</label>
        </div>
        <div class="checkbox mb-2">
          <label>
            <input type="checkbox" value="remember-me"> Запомнить меня
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Вход</button>
        <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
      </form>
    </main>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
