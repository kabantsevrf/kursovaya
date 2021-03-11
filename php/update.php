<?php
require_once('conectDB.php');
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $imeg_old = $_POST['images_old'];
    $new_imeg = $_FILES['imges']['name'];
    $update_filename = 'img/' . time() . $_FILES['imges']['name'];
    move_uploaded_file($_FILES['imges']['tmp_name'], '../' . $update_filename);
    $query = mysqli_query($connect, "UPDATE `product` SET `title` = '$_POST[tovar]', `article` = '$_POST[article]', `price` = '$_POST[price]', `amount` = '$_POST[amount]', `img` = '$update_filename' WHERE `id_product` = '$id'");
    
    if ($query == 'true')
    {
        header('Location: ../admin_panel.php');
        }
        else
        {
        echo "Ошибка запроса, данные не обновлены!";
        }
}
?>