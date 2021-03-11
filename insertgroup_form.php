<?php
session_start();
if(!$_SESSION['login']){
    header("Location: form_avt.php");
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление карточки</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<form action="php\insertgroup.php" method="post" enctype="multipart/form-data">
   <h1 class="form_title">Загрузка данных</h1>    
   <label>Файл формата csv</label>
   <input type="file" name="csv" class="form-control">
   <button type="submit" name="insertgroup">Импортировать</button>
</body>
</html>