<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['password']),
  FILTER_SANITIZE_STRING);
 

  $password = md5($password."dsadadsa41231");
  $mysql = new mysqli('localhost','root','hailrake322','website');
  $result = $mysql->query("SELECT * FROM `polzovateli` WHERE `login` = '$login' AND `password` = '$password'");
  $user = $result->fetch_assoc();
  if(count($user) == 0) {
    print "Такого пользователя не существует";
    exit();
  }

  setcookie('user', $user['name'], time() + 3600, "/");


  $mysql->close();


  header('Location:index.php');

 ?>
