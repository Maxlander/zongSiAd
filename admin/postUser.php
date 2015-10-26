<?php
require_once '../include.php';
$username=$_POST['username'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$sql = "INSERT INTO zongsi.ad_user (username,password,phone) VALUES ('$username','$password','$phone')";

if ($conn->query($sql) === TRUE) {
    alertMes("编辑成功！","<a href='addUser.php' target='mainFrame'>查看商品列表</a>");
} else {
    alertMes("编辑失败！","<p>编辑失败!</p><a href='listUser.php' target='mainFrame'>重新编辑</a>");
}
