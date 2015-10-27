<?php
require_once '../include.php';
checkLogined();
header("content-type:text/html; charset=utf-8");

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品列表</title>
    <link rel="stylesheet" href="styles/backstage.css">
    <link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
    <script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
        </div>
        <div class="fr">
            <div class="text">
                <span>商品价格：</span>
                <div class="bui_select">
                    <select id="" class="select" onchange="change(this.value)">
                        <option>-请选择-</option>
                        <option value="iPrice asc" >由低到高</option>
                        <option value="iPrice desc">由高到底</option>
                    </select>
                </div>
            </div>
            <div class="text">
                <span>上架时间：</span>
                <div class="bui_select">
                    <select id="" class="select" onchange="change(this.value)">
                        <option>-请选择-</option>
                        <option value="pubTime desc" >最新发布</option>
                        <option value="pubTime asc">历史发布</option>
                    </select>
                </div>
            </div>
            <div class="text">
                <span>搜索</span>
                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
            </div>
        </div>
    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="10%">编号</th>
            <th width="20%">商品名称</th>
            <th width="10%">商品数量</th>
            <th width="10%">商品价格</th>
            <th width="20%">商品描述</th>
            <th width="15%">操作</th>
        </tr>
        </thead>
        <?php
        $result=mysqli_query($conn,"SELECT id,pName,pSn,pNum,mPrice,pDesc FROM zongsi.ad_pro");
        while($row=mysqli_fetch_array($result)){
        ?>
        <tbody>
        <tr>
            <td><?php echo $row['pSn'] ?></td>
            <td><?php echo $row['pName'] ?></td>
            <td><?php echo $row['pNum'] ?></td>
            <td><?php echo $row['mPrice'] ?></td>
            <td><?php echo $row['pDesc'] ?></td>
            <td><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id']; ?>)"><a href="delUser.php?userId=<?php echo $row['id'] ?>">删除</a></td>
            <?php
            }
            ?>
</body>
</html>