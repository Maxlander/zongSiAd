<?php
require_once '../include.php';
$pName=$_POST['pName'];
$pSn=$_POST['pSn'];
$pNum=$_POST['pNum'];
$mPrice=$_POST['mPrice'];
$pDesc=$_POST['pDesc'];
$sql = "INSERT INTO zongsi.ad_pro (pName,pSn,pNum,mPrice,pDesc) VALUES ('$pName','$pSn','$pNum','$mPrice','$pDesc')";

if ($conn->query($sql) === TRUE) {
    alertMes("编辑成功！","<a href='/admin/listPro.php' target='mainFrame'>查看商品列表</a>");
} else {
    alertMes("编辑失败！","<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>");
}
