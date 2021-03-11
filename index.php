<?php
require_once "php\conectDB.php";
    if(isset($_POST['search_b'])){
     $search = $_POST['search'];
     $result=mysqli_query($connect, "SELECT * FROM `product` WHERE `title` LIKE '%$search%'");
    }
    else
    {
    $result=mysqli_query($connect, "SELECT * FROM `product`");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет каталог</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="search-conteiner">
        <form action="" type = "post" method="POST" >
           <input type="text" id="search-form" name="search" placeholder="Поиск">
           <button name="search_b">
               <i>Поиск</i>
           </button>
        </form>
    </div>
    <div class="knopka">
    <a href="form_avt.php" class="button">Войти</a>
    </div>   
    <div class="content">
        <?php
        while($food=mysqli_fetch_assoc($result))
        {
            ?>
             <div class="item">
               <div class="images">
                   <img class="img" src=<?php echo $food['img']; ?> onerror="this.src='img\error.jpg'" alt="">
               </div>
               <div class="inf">
                   <div class="title">
                   <h2><?php echo $food['title']; ?></h2>
                   </div>
                   <div class="art">
                   <p>Артикул: <?php echo $food['article']; ?></p>
                   </div>
                   <div class="price">
                   <p>Цена: <?php echo $food['price']; ?> руб</p>
                   </div>
                   <div class="amount">
                   <p>Количество: <?php echo $food['amount']; ?> штук</p>
                   </div>
               </div> 
             </div>
            <?php     
        } 
        ?>
    
    </div>
</body>
</html>