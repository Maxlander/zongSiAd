<?php
require_once '../include.php';
$username=$_POST['username'];
$password=$_POST['password'];
//$username=addslashes($username);
//$password=md5($_POST['password']);
//$verify=$_POST['verify'];
//$verify1=$_SESSION['verify'];
    $autoFlag=$_POST['autoFlag'];
//if($verify==$verify1){
    $sql=mysqli_query($conn,"select * from zongsi.ad_admin where username='{$username}' and password='{$password}'");
//	$sql="select * from ad_admin where username='{$username}' and password='{$password}'";
//	$row=checkAdmin($sql);
    $row=mysqli_fetch_array($sql);
//	if($row=mysqli_query($conn,$sql)){
    if(($row['username']==$username)&&($row['password']==$password)){
		//如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		$_SESSION['adminId']=$row['id'];
		alertMes("登陆成功","index.php");
	}else{
		alertMes("登陆失败，重新登陆","login.php");
	}
//}else{
//	alertMes("验证码错误","login.php");
//}
//$sql=mysqli_query($conn,"select * from zongsi.ad_admin where username='{$username}' and password='{$password}'");
//$colum=mysqli_fetch_array($sql);
//print_r($colum);
//if(($colum['username']==$username)&&($colum['password']==$password)){
//    alertMes("登陆成功","index.php");
//}else{
//    alertMes("登陆失败，重新登陆","login.php");
//}