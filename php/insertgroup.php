<?php
require_once 'conectDB.php';

if(isset($_POST['insertgroup']))
{
 
 $csv = $_FILES['csv']['name'];
 
 if($csv !='')
 {
    $insert_filename = 'img/' . time() . $_FILES['csv']['name'];
   // move_uploaded_file($_FILES['csv']['tmp_name'], '../' . $insert_filename); 
    $file = fopen($_FILES['csv']['tmp_name'], 'r');
    while(!feof($file)){
        $mass = fgetcsv($file, 1024, ';');
        $J = count($mass);
        if($J>1){
            mysqli_query($connect, "INSERT INTO `product`(`title`, `article`, `price`, `amount`) 
            VALUES ('$mass[0]', '$mass[1]', '$mass[2]', '$mass[3]')");
        }
    }
    
    
 }
}
fclose($file);

header('Location: ../admin_panel.php');
 ?>