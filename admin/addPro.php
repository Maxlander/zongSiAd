<?php
require_once '../include.php';
checkLogined();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加商品</title>
    <link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
    <script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
    <script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
    <script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
            $("#selectFileBtn").click(function(){
                $fileField = $('<input type="file" name="thumbs[]"/>');
                $fileField.hide();
                $("#attachList").append($fileField);
                $fileField.trigger("click");
                $fileField.change(function(){
                    $path = $(this).val();
                    $filename = $path.substring($path.lastIndexOf("\\")+1);
                    $attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
                    $attachItem.find(".left").html($filename);
                    $("#attachList").append($attachItem);
                });
            });
            $("#attachList>.attachItem").find('a').live('click',function(obj,i){
                $(this).parents('.attachItem').prev('input').remove();
                $(this).parents('.attachItem').remove();
            });
        });
    </script>
</head>
<body>
<h3>添加商品</h3>
<form action="postPro.php" method="post" enctype="multipart/form-data">
    <table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">商品名称</td>
            <td><input type="text" name="pName" id="pName" placeholder="请输入商品名称"/></td>
        </tr>
        <tr>
            <td align="right">商品编号</td>
            <td><input type="text" name="pSn" id="pSn" placeholder="请输入商品货号"/></td>
        </tr>
        <tr>
            <td align="right">商品数量</td>
            <td><input type="text" name="pNum" id="pNum" placeholder="请输入商品数量"/></td>
        </tr>
        <tr>
            <td align="right">商品单价</td>
            <td><input type="text" name="mPrice" id="mPrice" placeholder="请输入商品价格"/></td>
        </tr>
        <tr>
            <td align="right">商品描述</td>
            <td>
                <label for="pDesc"></label><textarea name="pDesc" id="pDesc" style="width:100%;height:150px;"></textarea>
            </td>
        </tr>
        <tr>
            <td align="right">商品图像</td>
            <td>
                <a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
                <div id="attachList" class="clear"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="发布商品"/></td>
        </tr>
    </table>
</form>
</body>
</html>
