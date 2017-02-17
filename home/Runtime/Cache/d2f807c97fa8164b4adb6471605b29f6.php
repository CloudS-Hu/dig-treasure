<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="font-size:100px;">

	<head>
		<!--设置编码-->
		<meta charset="UTF-8">
		<!--设置设备屏幕自适应及用户缩放特性-->
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, 
			width=device-width, user-scalable=no">
		<title>home</title>
		<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/address.js"></script>
		<script type="text/javascript">
			  var addressLoadUrl="__APP__/User/addressLoad";
			  var addressIconUrl="__PUBLIC__/images/icon/dizhi.png";
			  var addressSetUrl="__APP__/User/addressSet";

		</script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/address.css"/>
	</head>

	<body style="font-size: 0px;">
		<!--内容主体-->
		<div class="Header">
			<div class="back">
				<a href="__APP__/Index/index"><img src="__PUBLIC__/images/icon/back.png" /> </a>
			</div>
			<div class="Title"><span>我的收货地址</span></div>
			<div class="buyList">
				<a href="__APP__/User/addressAdd"><img src="__PUBLIC__/images/icon/add.png" /> </a>
			</div>
		</div>	
		<div class="headerbtm"></div>
	</body>

</html>