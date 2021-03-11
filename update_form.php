<?php 
session_start();
if(!$_SESSION['login']){
    header("Location: form_avt.php");
    exit;
    }

  require_once"php/conectDB.php";
  $id = $_GET['up'];
 $tovar = mysqli_query($connect, "SELECT * FROM `product` WHERE id_product = $id");
 $food=mysqli_fetch_assoc($tovar);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновление карточки</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>


   <form action="php/update.php" method="post" enctype="multipart/form-data">
   <h1 class="form_title">Обновление данных</h1>
   <input type="hidden" name="id" value="<?php echo $food['id_product'] ?>">    
   <label>Наименование товара</label>
   <input type="text" name="tovar" maxlength="25" value="<?php  echo $food['title'] ?>" placeholder="Введите наименование товара">
   <label>Артикул товара</label>
   <input type="text" name="article" maxlength="18" value="<?php echo  $food['article'] ?>" placeholder="Артикул">
   <label>Стоимость товара</label>
   <input type="text" name="price" maxlength="9" value="<?php echo $food['price'] ?>" placeholder="Введите стоимость">
   <label>Количество товара</label>
   <input type="text" name="amount" maxlength="5" value="<?php echo  $food['amount'] ?>" placeholder="Количество">
   <label>Изображение товара 175х175</label>
   <input type="file" name="imges" class="form-control">
   <input type="hidden" name="images_old" value="<?php  echo $food['img'] ?>">
   <button type="submit" name="update">Обновить</button>
   
</body>
</html>