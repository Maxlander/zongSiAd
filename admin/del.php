<?php
$userId = $_GET['userId'];
include_once "../include.php";

$sql = "delete from ad_pro where id='".$userId."'";

mysqli_query($conn,$sql);

$mark  = mysqli_affected_rows($conn);

if($mark>0){
    alertMes("删除成功","listPro2.php");
}else{
    alertMes("删除失败","listPro2.php");
}

mysql_close($conn);