<?php
  require 'config.php';
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['password']),
  FILTER_SANITIZE_STRING);


if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    print "Недопустимая длина логина";
    exit();
} else if(mb_strlen($password) < 2 || mb_strlen($password) > 20) {
    print "Недопустимая длина пароля (от 2 до 8 символов)";
    exit();

}

  $password = md5($password."dsadadsa41231");

  $mysql = new mysqli('localhost','root','hailrake322','website');
  $mysql->query("INSERT INTO `polzovateli` (`name`,`login`, `password`) VALUES ('$name','$login','$password')");
  $mysql->close();

  header('Location:index.php');
 ?>
