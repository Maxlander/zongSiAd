<?php
/*require_once '../include.php';
checkLogined();
$sql="select uid,username,phone,money from ad_user";
$rows=fetchAll($sql);
if(!$rows){
    alertMes("sorry,没有用户,请添加!","addUser.php");
    exit;
}
*/?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户列表</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addUser()">
        </div>

    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="15%">ID号</th>
            <th width="20%">用户名称</th>
            <th width="20%">手机号</th>
            <th width="20%">账户余额</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once '../include.php';
        $result=mysqli_query($conn,"select id,uid,username,phone,money from ad_user");
        while($row=mysqli_fetch_array($result)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $row['uid'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['money'] ?></td>
            <td><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id']; ?>)"><input type="button" value="删除" class="btn" onclick="delPro(<?php echo $row['id']; ?>)"></td>
            <?php
            }
            ?>
<script type="text/javascript">

    function addUser(){
        window.location="addUser.php";
    }
    function editUser(id){
        window.location="editUser.php?id="+id;
    }
    function delUser(id){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="doAdminAction.php?act=delUser&id="+id;
        }
    }
</script>
</html>