<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'lib/mysql.func.php';
//require_once 'lib/mysqli.php';
require_once 'lib/image.func.php';
require_once 'lib/common.func.php';
require_once 'lib/string.func.php';
require_once 'lib/page.func.php';
require_once "confings/configs.php";
require_once 'core/admin.inc.php';
require_once 'core/cate.inc.php';
require_once 'core/pro.inc.php';
require_once 'core/album.inc.php';
require_once 'lib/upload.func.php';
require_once 'core/user.inc.php';
connect();