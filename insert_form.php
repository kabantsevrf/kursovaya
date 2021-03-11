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
<form action="php\insert.php" method="post" enctype="multipart/form-data">
   <h1 class="form_title">Добавление данных</h1>    
   <label>Наименование товара</label>
   <input type="text" name="tovar" maxlength="25" placeholder="Введите наименование товара">
   <label>Артикул товара</label>
   <input type="text" name="article" maxlength="18" placeholder="Артикул">
   <label>Стоимость товара</label>
   <input type="text" name="price" maxlength="9" placeholder="Введите стоимость">
   <label>Количество товара</label>
   <input type="text" name="amount" maxlength="5" placeholder="Количество">
   <label>Изображение товара 175x175</label>
   <input type="file" name="imges" class="form-control">
   <button type="submit" name="insert">Добавить запись</button>
</body>
</html>