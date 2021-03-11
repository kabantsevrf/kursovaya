<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'shops';

$connect = mysqli_connect($host, $user, $password, $dbname);
if (!$connect) {
    die('Ошибка при подключении к базе данных');

}

?>