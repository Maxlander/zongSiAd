<?php 
/**
 * 添加商品
 * @return string
 */
function addPro(){
	$arr=$_POST;
	$arr['pNAme']=$_POST['pName'];
	$arr=$_POST;
	$arr['pubTime']=time();
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$res=insert("ad_pro",$arr);
	$pid=getInsertId();
	if($res&&$pid){
		foreach($uploadFiles as $uploadFile){
			$arr1['pid']=$pid;
			$arr1['albumPath']=$uploadFile['name'];
			addAlbum($arr1);
		}
		$mes="<p>添加成功!</p><a href='/admin/addPro.php' target='mainFrame'>继续添加</a>|<a href='/admin/listPro.php' target='mainFrame'>查看商品列表</a>";
	}else{
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";

	}
	return $mes;
}
/**
 *编辑商品
 * @param int $id
 * @return string
 */
function editPro($id){
	$arr=$_POST;
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="id={$id}";
	$res=update("ad_pro",$arr,$where);
	$pid=$id;
	if($res&&$pid){
		if($uploadFiles &&is_array($uploadFiles)){
			foreach($uploadFiles as $uploadFile){
				$arr1['pid']=$pid;
				$arr1['albumPath']=$uploadFile['name'];
				addAlbum($arr1);
			}
		}
		$mes="<p>编辑成功!</p><a href='/admin/listPro.php' target='mainFrame'>查看商品列表</a>";
	}else{
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
	}
		$mes="<p>编辑失败!</p><a href='/admin/listPro.php' target='mainFrame'>重新编辑</a>";
		
	}
	return $mes;
}

function delPro($id){
	$where="id=$id";
	$res=delete("ad_pro",$where);
	$proImgs=getAllImgByProId($id);
	if($proImgs&&is_array($proImgs)){
		foreach($proImgs as $proImg){
			if(file_exists("uploads/".$proImg['albumPath'])){
				unlink("uploads/".$proImg['albumPath']);
			}
			if(file_exists("../image_50/".$proImg['albumPath'])){
				unlink("../image_50/".$proImg['albumPath']);
			}
			if(file_exists("../image_220/".$proImg['albumPath'])){
				unlink("../image_220/".$proImg['albumPath']);
			}
			if(file_exists("../image_350/".$proImg['albumPath'])){
				unlink("../image_350/".$proImg['albumPath']);
			}
			if(file_exists("../image_800/".$proImg['albumPath'])){
				unlink("../image_800/".$proImg['albumPath']);
			}
		}
	}
	$where1="pid={$id}";
	$res1=delete("ad_album",$where1);
	if($res&&$res1){
		$mes="删除成功!<br/><a href='/admin/listPro.php' target='mainFrame'>查看商品列表</a>";
	}else{
		$mes="删除失败!<br/><a href='/admin/listPro.php' target='mainFrame'>重新删除</a>";
	}
	return $mes;
}


/**
 * 得到商品的所有信息
 * @return array
 */
function getAllProByAdmin(){
	$sql="select pName,pSn,pNum,mPrice,pDesc from ad_pro";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getAllImgByProId($id){
	$sql="select a.albumPath from ad_album a where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 根据id得到商品的详细信息
 * @param int $id
 * @return array
 */
function getProById($id){
		$sql="select pName,pSn,pNum,mPrice,pDesc from ad_pro";
		$row=fetchOne($sql);
		return $row;
}
/**
 * 检查分类下是否有产品
 * @param int $cid
 * @return array
 */
function checkProExist($cid){
	$sql="select pName,pSn,pNum,mPrice,pDesc from ad_pro";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到所有商品
 * @return array
 */
function getAllPros(){
	$servername = "localhost";
	$username = "root";
	$password = "chenyong";
	$dbname = "zongsi";
// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql=mysqli_query($conn,"select pName,pSn,pNum,mPrice,pDesc from ad_pro ");
//	$rows=fetchAll($sql);
	$row=mysqli_fetch_array($sql);
	return $row;
}

/**
 *根据cid得到4条产品
 * @param int $cid
 * @return Array
 */
function getProsByCid($cid){
	$sql="select pName,pSn,pNum,mPrice,pDesc from ad_pro";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到下4条产品
 * @param int $cid
 * @return array
 */
function getSmallProsByCid($cid){
	$sql="select pName,pSn,pNum,mPrice,pDesc from ad_pro";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到商品ID和商品名称
 * @return array
 */
function getProInfo(){
	$sql="select pName,pSn,pNum,mPrice,pDesc from ad_pro";
	$rows=fetchAll($sql);
	return $rows;
}
