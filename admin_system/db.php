<?php
$host = 'localhost';
$dbname = 'adminstrator'; 
$username = 'root'; 
$password = '123456'; 

$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die("数据库连接失败: " . mysqli_connect_error());
}
?>
