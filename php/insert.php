<?php
session_start();

require_once 'conectDB.php';

if(isset($_POST['insert']))
{
 $title = $_POST['tovar']; 
 $art = $_POST['article'];
 $price = $_POST['price'];
 $amount = $_POST['amount'];
 $new_imeg = $_FILES['imges']['name'];
 
 if($new_imeg !='')
 {
    $update_filename = 'img/' . time() . $_FILES['imges']['name'];
    move_uploaded_file($_FILES['imges']['tmp_name'], '../' . $update_filename); 
    mysqli_query($connect, "INSERT INTO `product`(`title`, `article`, `price`, `amount`, `img`) 
    VALUES ('$title', '$art', '$price', '$amount' , '$update_filename')");
    
 } 
 else
 {
    mysqli_query($connect, "INSERT INTO `product`(`title`, `article`, `price`, `amount`, `img`) 
    VALUES ('$title', '$art', '$price', '$amount' , '')");
 }



}
header('Location: ../admin_panel.php');
?>