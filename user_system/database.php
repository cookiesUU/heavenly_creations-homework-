<?php

$host = "localhost";
$dbname = "adminstrator";
$username = "root";
$password = "123456";
$mysqli = new mysqli($host,$username,$password,$dbname);
if ($mysqli->connect_error) {
    die("Connection error: " . $mysqli->connect_error);
}
return $mysqli;