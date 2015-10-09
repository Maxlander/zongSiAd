<?php
$servername = "localhost";
$username = "root";
$password = "chenyong";
$dbname = "zongsi";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
mysqli_set_charset($conn,"utf8");
//mysqli_query($conn,"set name utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

