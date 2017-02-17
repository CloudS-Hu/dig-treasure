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
		<!--<script type="text/javascript" src="__PUBLIC__/js/iscroll.js"></script>-->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/userInfo.css"/>
	</head>

	<body style="font-size: 0px;">
		<!--<div class="shade" onclick="shadeHide()"></div>-->
		<!--内容主体-->
		<div class="Header">
			<div class="back">
				<a href="__APP__/Index/index"><img src="__PUBLIC__/images/icon/back.png" /> </a>
			</div>
			<div class="Title"><span>个人信息</span> </div>
		</div>
		<div class="picture">
			<span>头像</span>
			<div class="pictureImg">
				<img src="<?php echo ($User["userPortrait"]); ?>" />
			</div>
			<div class="pictureNext">
				<img src="__PUBLIC__/images/icon/next.png" />
			</div>
		</div>
		<div class="nickName">
			<a href="__APP__/User/nicknameSet">
				<span>昵称</span>
				<span><?php echo ($User["userNickName"]); ?></span>
				<div class="nickNameNext">
					<img src="__PUBLIC__/images/icon/next.png" />
				</div>
			</a>
		</div>
		<!--<div class="nickName">
			<span>性别</span>
			<span>男</span>
			<div class="nickNameNext">
				<img src="__PUBLIC__/images/icon/next.png" />
			</div>
		</div>
		<div class="nickName">
			<span>生日</span>
			<span>1987-04-18</span>
			<div class="nickNameNext">
				<img src="__PUBLIC__/images/icon/next.png" />
			</div>
		</div>-->
		<div class="account">
			<div class="nickName">
				<a href="__APP__/User/accountSet">
					<span>账户管理</span>
					<span><?php echo ($User["userPhone"]); ?></span>
					<div class="nickNameNext">
						<img src="__PUBLIC__/images/icon/next.png" />
					</div>
				</a>
			</div>
			<div class="nickName">
				<span>我的夺宝币</span>
				<span style="color: rgb(222,47,81);"><?php echo ($User["userBalance"]); ?></span>
			</div>
		</div>
		<!--<div class="birthdaySet">
			<div><span>填入您的生日 : </span><input /> </div>
			<div>
				<span onclick="shadeHide()">取消</span>
			    <span>确定</span>
			</div>
		</div>-->
	</body>

</html>