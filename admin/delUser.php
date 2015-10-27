<?php
$userId = $_GET['userId'];
include_once "../include.php";

$sql = "delete from ad_user where id='".$userId."'";

mysqli_query($conn,$sql);

$mark  = mysqli_affected_rows($conn);

if($mark>0){
    alertMes("删除成功","listUser.php");
}else{
    alertMes("删除失败","listUser.php");
}

mysql_close($conn);