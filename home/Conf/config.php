<?php
return array(
	//'配置项'=>'配置值'
	//	'SHOW_PAGE_TRACE'    =>true,
	'TMPL_L_DELIM'          =>  '{',			// 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}',			// 模板引擎普通标签结束标记
	'APP_STATUS'           =>  'DUBUG',
	//	'URL_MODEL'             =>  1,
    'DB_PREFIX'             => 'C_',    // 数据库表前缀
	'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'crowdfunding',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '',          // 密码
//	'TMPL_ACTION_SUCCESS'   => 'paySuccess'// 默认成功跳转对应的模板文件

);
?>