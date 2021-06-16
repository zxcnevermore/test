<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'hailrake322');
define('DB_NAME', 'website');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($link === false){
    die("Ошибка подключение к базе данных" . mysqli_connect_error());
}
?>
