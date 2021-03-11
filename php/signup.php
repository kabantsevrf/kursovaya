<?php

session_start();
require_once 'conectDB.php';

$user_name = $_POST['user_name'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$sel = "SELECT * FROM `users` WHERE `login` = '$login'";
$res = mysqli_query($connect, $sel); 
$num = mysqli_num_rows($res);
if($num == 0) {
if ($password === $password_confirm) {
    $password = md5($password);
    mysqli_query($connect, "INSERT INTO `users`(`user_name`, `login`, `password`) 
                            VALUES ('$user_name','$login','$password')");
    $_SESSION['message'] = 'Регистрация прошла успешно';
    header('Location: ../form_avt.php');
    
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../register.php');
}
} 
else
{
    $_SESSION['message'] = 'Такой пользователь уже существует';
    header('Location: ../register.php');   
}
  

?>

