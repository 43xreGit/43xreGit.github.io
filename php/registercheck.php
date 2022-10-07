<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);

  $pass = filter_var(trim($_POST['password']),
  FILTER_SANITIZE_STRING);

  $perm = "0";

  if(mb_strlen($login) < 5 || mb_strlen($login) > 16) {
    echo "Логин слишком маленький! Сделайте логин из 6 и больше символов!";
    exit();
  } else if(mb_strlen($pass) < 7 || mb_strlen($pass) > 16) {
    echo "Пароль слишком маленький! Сделайте пароль из 8 и больше символов!";
    exit();
  }

  $pass = md5($pass);

  $mysql = new mysqli('localhost', 'root', 'root', 'users');
  $mysql->query("INSERT INTO `user` (`login`, `pass`, `perm`)
  VALUES('$login', '$pass', '$perm')");
  $mysql->close();

  header('Location:/loginr.html');
?>
