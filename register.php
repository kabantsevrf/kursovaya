<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
   <form action="php\signup.php" method="post">
   <h1 class="form_title">Регистрация</h1>    
   <label>ФИО</label>
   <input type="text" name="user_name" placeholder="Введите ваше имя">
   <label>Логин</label>
   <input type="text" name="login" placeholder="Введите логин">
   <label>Пароль</label>
   <input type="password" name="password" placeholder="Введите пароль">
   <label>Подтверждение пароля</label>
   <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
   <button type="submit">Зарегестрировать</button>
   <p>
       У вас уже есть аккаунт - <a href="form_avt.php">Авторизуйтесь!</a>   
   </p>
       <?php
        if ($_SESSION['message']) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
            unset ($_SESSION['message']); 
       ?>
   
   </form> 
</body>
</html>