<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Покупка</title>
  </head>
  <body>
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="#" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
          <img src="image/logo.svg" with alt="Logo" width="40px" height="32px">
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center fw-bold mb-md-0">
          <li><a href="sklad.php" class="nav-link px-4 link-dark">Склад</a></li>
          <li><a href="prodaja.php" class="nav-link px-4 link-dark">Продажа</a></li>
          <li><a href="zakupki.php" class="nav-link px-4 link-dark">Покупка</a></li>
        </ul>
        <div class="nav col-md-4 justify-content-center text-end">
          <p>Привет,<?=$_COOKIE['user']?>.Чтобы выйти нажмите <a href="exit.php">здесь</a>.</p>
        </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Покупка</h2>
                    </div>
                    <?php
                    require_once "config.php";
                    $sql = "SELECT * FROM zakupki";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                              echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Код товара</th>";
                                echo "<th>Название товара</th>";
                                echo "<th>Количество</th>";
                                echo "<th>Поставщик</th>";
                                echo "<th>Группа</th>";
                                echo "<th>Ед.Измерения</th>";
                                echo "<th>Цена</th>";
                                echo "<th>Действия</th>";
                                echo "</tr>";
                             echo "</thead>";
                            echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Tovarid'] . "</td>";
                                        echo "<td>" . $row['TovarName'] . "</td>";
                                        echo "<td>" . $row['kolichestvo'] . "</td>";
                                        echo "<td>" . $row['Postavshik'] . "</td>";
                                        echo "<td>" . $row['Gruppa'] . "</td>";
                                        echo "<td>" . $row['Edizmer'] . "</td>";
                                        echo "<td>" . $row['Price'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="Просмотреть" data-toggle="tooltip"><img src="image/eye.svg"</img></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Обновить" data-toggle="tooltip"><img src="image/pencil.svg"</img></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Удалить" data-toggle="tooltip"><img src="image/trash.svg"</img></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Нет найденных записей.</em></div>';
                        }
                    }

                    mysqli_close($link);
                    ?>
                    <div class="mt-2 mb-1 clearfix">
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Купить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </header>
    </div>
  </body>
</html>
