<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);

  $pass = filter_var(trim($_POST['password']),
  FILTER_SANITIZE_STRING);

  $pass = md5($pass);

  $mysql = new mysqli('localhost', 'root', 'root', 'users');

  $result = $mysql->query("SELECT * FROM `user` WHERE `login` =
  '$login' AND `pass` = '$pass'");
  $user = $result->fetch_assoc();
  if(count($user) == 0) {
    echo "Такой пользователь не найден!";
    exit();
  }

  setcookie('user', $user['login'], time() + 3600, "/");

  $mysql->close();

  header('Location: /');
?>
