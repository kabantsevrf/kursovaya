<?php
session_start();

if(isset($_POST['close'])) {
 
session_destroy();
header("Location: index.php");
exit(); 
}

require_once "php/conectDB.php";

if(!$_SESSION['login']){
    header("Location: form_avt.php");
    exit;
    }
if (isset($_GET['del'])){
    $id = $_GET['del'];
$delete_tovar = mysqli_query($connect, "DELETE FROM `product` WHERE id_product = '$id'");
}
if(isset($_POST['search_b'])){
    $search = $_POST['search'];
    $tovar=mysqli_query($connect, "SELECT * FROM `product` WHERE `title` LIKE '%$search%'");
}
else
{
$tovar=mysqli_query($connect, "SELECT * FROM `product`");
}
if(isset($_POST['insertgroup'])) {
   header("Location: insertgroup_form.php");   
}
if(isset($_POST['insert'])) {
    header("Location: insert_form.php");   
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="conteiner4">
        <form action="" method="post">
        <button type="submit" name="insertgroup" class="button">Загрузить данные</button>
        </form>
    </div>
    <div class="conteiner3">
        <form action="" method="post">
        <button type="submit" name="close" class="button">Выйти</button>
        </form>
    </div>
    <div class="conteiner2">
    <form action="" method="post">
        <button type="submit" name="insert" class="button">Добавить запись</button>
        </form>
    
    </div>
    <div class="search-conteiner">
        <form action="" type = "post" method="POST" >
           <input type="text" id="search-form" name="search" placeholder="Поиск">
           <button name="search_b">
               <i>Поиск</i>
           </button>
        </form>
    </div>
    <div class="content">
    <table>
        <tr>
            <th>id товара</th>
            <th>Наименование товара</th>
            <th>Артикул товара</th>
            <th>Стоимость</th>
            <th>Количество</th>
            <th>Изображение</th>
        </tr>
<?php while($food=mysqli_fetch_assoc($tovar)) { ?>
    <tr>
        <td><?php echo $food['id_product']; ?></td>
        <td><?php echo $food['title']; ?></td>
        <td><?php echo $food['article']; ?></td>
        <td><?php echo $food['price']; ?></td>
        <td><?php echo $food['amount']; ?></td>
        <td><?php echo $food['img']; ?></td>
        <td><a href="update_form.php?up=<?php echo $food['id_product'] ?>"><img src="img\img_zam\edit.png"/></a></td>
        <td><a href="?del=<?=$food['id_product']?>"><img src="img\img_zam\delete.png"/></a></td>
    </tr>
   
    <?php } ?>
    </table>
    </div>
</body>
</html>