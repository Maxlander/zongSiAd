<?php
/*require_once '../include.php';
$pageSize=2;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getAdminByPage($page,$pageSize);
if(!$rows){
    alertMes("sorry,没有管理员,请添加!","addAdmin.php");
    exit;
}
*/?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加管理员</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
        </div>

    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="20%">编号</th>
            <th width="30%">管理员名称</th>
            <th width="35%">管理员邮箱</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once '../include.php';
        $result=mysqli_query($conn,"select id,uid,username,email from ad_admin");
        while($row=mysqli_fetch_array($result)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $row['uid'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id']; ?>)"><input type="button" value="删除" class="btn" onclick="delPro(<?php echo $row['id']; ?>)"></td>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">

    function addAdmin(){
        window.location="addAdmin.php";
    }
    function editAdmin(id){
        window.location="editAdmin.php?id="+id;
    }
    function delAdmin(id){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
            window.location="doAdminAction.php?act=delAdmin&id="+id;
        }
    }
</script>
</html>