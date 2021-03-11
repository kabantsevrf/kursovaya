<?php
  session_start();
  require_once 'conectDB.php';

  $login = $_POST['login'];
  $password = md5($_POST['password']);
 
  $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
  if (mysqli_num_rows($check_user) > 0){
      $_SESSION['login'] = $login;
      header("Location: ../admin_panel.php");
      
      
  } else {
    $_SESSION['message'] = 'Неверный логин или пароль!';
    header('Location: ../form_avt.php');
  }
  ?>