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
		<script type="text/javascript">
		    var nickNameSetUrl="__APP__/User/nicknameAction";
		    $(document).ready(function(){
			    $('.error').hide();
			});
		    function saveMsg(obj){
				$('.error span').text(obj);
				$('.error').fadeIn();
				setTimeout(function(){
					$('.error').fadeOut();
				},2000);
			}
		    function save(){
                if($('.nickInput input').val()=='<?php echo $userNickName;?>'){
                	saveMsg('昵称未做更改');
                }else if($('.nickInput input').val()==""){
                	saveMsg('请输入昵称');
                }else{
                    $.ajax({
                        url:nickNameSetUrl,
                        type:'POST',
                        data:{userNickName:$('.nickInput input').val()},
                        dataType:'text',
                        beforeSend:function(){
                            $('.error span').text('保存中');
            				$('.error').fadeIn();
                        } ,
                        success:function(data){
                        	saveMsg(data);
                        },
                        error:function(){
                        	saveMsg('网络连接超时,请重试');
                        }   
                    });
                }
		    }
		</script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/nicknameSet.css"/>
	</head>

	<body style="font-size: 0px;">
		<!--内容主体-->
		<div class="Header">
			<div class="back">
				<a href="__APP__/User/userInfo"><img src="__PUBLIC__/images/icon/back.png" /> </a>
			</div>
			<div class="Title"><span>昵称</span></div>
			<div class="save" onclick="save()">
				<span>保存</span>
			</div>
		</div>
		<div class="nickInput">
		    <span>昵称</span>
		    <span><input value="<?php echo ($userNickName); ?>" /> </span>
		</div>
		<div class="beizhu">
			<span>好的名字带给你好的运气 ~ </span>
		</div>
		<div class="error">
			<span></span>
		</div>
	</body>

</html>