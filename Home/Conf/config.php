<?php
	$db_config	=	require $_SERVER['DOCUMENT_ROOT'].'/Configs/config.inc.php';
	$config=array(
		/* SESSION设置 */
		'SESSION_AUTO_START' => true, //是否开启session
		'SESSION_EXPIRE' => '300000' ,     // 默认Session有效期
		'SHOW_PAGE_TRACE'=>true,		//显示调试信息
		'URL_PATHINFO_DEPR'=>'/',
		'URL_CASE_INSENSITIVE' =>true,
		'URL_MODEL'=>2,
		
	);
	return array_merge($db_config,$config);
?>