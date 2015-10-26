<?php
require_once '../include.php';
$useradmin=$_POST['useradmin'];
$password=$_POST['password'];
$email=$_POST['email'];
$sql = "INSERT INTO zongsi.ad_admin (useradmin,password,email) VALUES ('$username','$password','$email')";

if ($conn->query($sql) === TRUE) {
    alertMes("编辑成功！","<a href='addAdmin.php' target='mainFrame'>查看商品列表</a>");
} else {
    alertMes("编辑失败！","<p>编辑失败!</p><a href='listAdmin.php' target='mainFrame'>重新编辑</a>");
}
