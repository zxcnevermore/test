<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Твой склад</title>
</head>
<body>
 <div class="container">
   <?php

       if(@$_COOKIE['user'] == ''):


    ?>
    <header class="d-flex flex-wrap aligent-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="image/logo.svg" with alt="Logo" width="40px" height="32px">
      </a>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center fw-bold mb-md-0">
        <li><a href="#" class="nav-link px-4 link-dark">Возможности</a></li>
        <li><a href="#" class="nav-link px-4 link-dark">Тарифы</a></li>
        <li><a href="#" class="nav-link px-4 link-dark">Часто задоваемые вопросы</a></li>
        <li><a href="#" class="nav-link px-4 link-dark">О нас</a></li>
      </ul>
      <div class="col-md-3 text-end">
        <button id="btn_vxod" class="btn btn-outline-primary me-2">Войти</button>
        <button id="btn_register" class="btn btn-primary">Регистрация</button>
      </div>
    </header>
  </div>
  <div class="container col-xxl-8 px-3 py-3">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="image/sklad.jpg" class="d-block mx-lg-1 img-fluid" alt="Bootstrap Themes" width="600" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-5 mb-4">Склад,материальный учет</h1>
        <p class="lead fs-2">Продажи,закупки,склад,клиенты и поставщики.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-5 me-md-2">Узнать больше
            <img src="image/strelka.svg" width="30px" height="30px"  alt="strelka">
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container px-3 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Кому выгодно</h2>
    <div class="row g-5 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <img src="image/zavod.svg" width="30px" height="30px" alt="">
        </div>
        <div>
          <h2>Производству</h2>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <img src="image/shop.svg" width="30px" height="30px"alt="">
        </div>
        <div>
          <h2>Магазинам</h2>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <img src="image/truck.svg" width="30px" height="30px" alt="">
        </div>
        <div>
          <h2>Оптовой торговле</h2>
      </div>
    </div>
  </div>
  <footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Подвал</span>
  </div>
</footer>
<?php else:?>
  <?php
    require_once 'sklad.php';
   ?>
<?php endif;?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/myjs.js"></script>
</body>
</html>
