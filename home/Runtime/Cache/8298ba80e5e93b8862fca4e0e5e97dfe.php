<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="font-size:100px;">
	<head>
		<!--设置编码-->
		<meta charset="UTF-8">
		<!--设置设备屏幕自适应及用户缩放特性-->
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, 
			width=device-width, user-scalable=no">
		<title>home</title>
		<script  type="text/javascript">
			var registerUrl="__APP__/User/register";
			var userjudgeUrl="__APP__/User/userjudge";
			var loginactionUrl="__APP__/User/loginaction";
			var indexUrl="__APP__/Index/index";
		</script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/login.js"></script>
		<script type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css"/>
	</head>

	<body style="font-size: 0px;">
		<!--内容主体-->
		<div class="Header">
			<div class="back">
				<a href="__APP__/Index/index"><img src="__PUBLIC__/images/icon/back.png" /> </a>
			</div>
			<div class="Title"><span>账号</span></div> 
		</div>
		<div class="content">
			<div class="contentHead">
				<span class="recordAll" onclick="recordBtn(this)" name="0">注册</span>
				<span class="recording" onclick="recordBtn(this)" name="1">登录</span>
				<div class="recordBar"></div>
			</div>
			<div class="contentDetails">
				<div class="recordWrap">
					<div  class="all">
							<ul>
								<li>
									<span class="left">手机号</span>
									<span class="leftInput">
										<input placeholder="请输入手机号码" type="text" name="userPhone" id="registerPhone" />
									</span>
								</li>
								<li>
									<span class="left">密码</span>
									<span class="leftInput">
										<input placeholder="请输入6-20位登录密码" type="password" name="userPassword" id="registerPswd" />
									</span>
								</li>
								<li>
									<span class="left">确认密码</span>
									<span class="leftInput">
										<input placeholder="请再次输入密码" type="password" name="userPassword" id="passwordConfirm" />
									</span>
								</li>
							</ul>
							<div class="login" id="register"><span>注册</span></div>
							<div class="guid" onclick="registerGuid()"><span>已经有账号,马上登录?</span> </div>
					</div>
					<div  class="ing">
							<ul>
								<li>
									<span class="left">账号</span>
									<span class="leftInput">
										<input name="userPhone" placeholder="请输入手机号码" id="loginPhone"/>
									</span>
								</li>
								<li>
									<span class="left">密码</span>
									<span class="leftInput">
										<input name="userPassword" placeholder="请输入密码" type="password" id="loginPassword" />
									</span>
								</li>
							</ul>
							<div class="login" id="login" onclick="login()"><span>登录</span></div>
						<div class="guid" onclick="loginGuid()"><span>还没有账号,注册一个?</span> </div>
					</div>
				</div>
			</div>
		</div>
		<div class="error">
			<span><?php echo ($error); ?></span>
		</div>
	</body>
</html>