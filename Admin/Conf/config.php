<?php
	$db_config	=	require $_SERVER['DOCUMENT_ROOT'].'/Configs/config.inc.php';
	$config=array(
		//'DEFAULT_ACTION'=>'/Login',
		//'USER_AUTH_GATEWAY'=>'/Login',	// 默认认证网关
		/* SESSION设置 */
		'SESSION_AUTO_START' => true, //是否开启session
		'SESSION_EXPIRE' => '300000' ,     // 默认Session有效期
		
		'UPLOAD_SYS_FILE'=>'../Public/images/',
		'TMPL_PARSE_STRING'  =>array(
				'__PUBLIC__' => '/admin/public', // 更改默认的__PUBLIC__ 替换规则
		)
	);
	return array_merge($db_config,$config);
?>