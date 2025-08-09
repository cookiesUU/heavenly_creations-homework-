<?php
$host = 'localhost'; 
$dbname = 'adminstrator'; 
$username = 'root'; 
$password = '123456'; 

$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("数据库连接失败: " . $connection->connect_error);
}

$connection->set_charset("utf8");

?>
