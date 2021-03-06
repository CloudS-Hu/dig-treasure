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
			var loginUrl="__APP__/User/login";
			var acountSetActionUrl="__APP__/User/acountSetAction";
			
		    $(document).ready(function(){
		    	$('.error').hide();
			    
		    	function saveMsg(obj){
					$('.error span').text(obj);
					$('.error').fadeIn();
					setTimeout(function(){
						$('.error').fadeOut();
					},3000);
				}
				
                $('.save').click(function(){
                	var len1=$('#newPswd').val().length;
                	var len2=$('#confirmPswd').val().length;
                	if($("#userId").val()==0||$("#userId").val()==""){
                		saveMsg('登录超时,请重新登录!');
                		setTimeout(function(){
                			window.location.href=loginUrl;
                    	},3000);
                	}else if($('#initialPswd').val()==""||$('#newPswd').val()==""||$('#confirmPswd').val()==""){
		    	        saveMsg('密码不能为空哦!');
                    }else if(len1<6||len1>20||len2<6||len2>20){
                        saveMsg('密码必须要6-20位');
                    }else if($('#newPswd').val()!=$('#confirmPswd').val()){
                    	saveMsg('两次密码不一致');
                    }else if($('#initialPswd').val()==$('#newPswd').val()){
                    	saveMsg('新密码不能和原始密码一样');
                    }else{
                        $.ajax({
                            url:acountSetActionUrl,
                            type:'POST',
                            data:{newPassword:$('#confirmPswd').val(),userPassword:$('#initialPswd').val()},
                            dataType:'text',
                            beforeSend:function(){
                            	$('.error span').text('修改中');
            					$('.error').fadeIn();
                            },
                            success:function(data){
                            	saveMsg(data);
                            },
                            error:function(){
                            	saveMsg('网络连接错误,请检查网络');
                            }
                        });
                    }
                });
			});
		</script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/accountSet.css"/>
	</head>

	<body style="font-size: 0px;">
		<div class="shade"></div>
		<!--内容主体-->
		<div class="Header">
			<div class="back">
				<a href="__APP__/User/userInfo"><img src="__PUBLIC__/images/icon/back.png" /> </a>
			</div>
			<div class="Title"><span>账户管理</span></div>
		</div>	
		<div class="top"><span>该页面用于修改密码</span> </div>
		<div class="initialPsw"><input type="password" placeholder="请输入原始密码" id="initialPswd" /> </div>
		<div class="initialPsw"><input type="password" placeholder="请输入6-20位新密码" id="newPswd" /> </div>
		<div class="initialPsw"><input type="password" placeholder="再次输入确认" id="confirmPswd" /> </div>
		<div class="save">确认修改</div>
		<div class="error">
			<span></span>
		</div>
		<input id="userId" type="hidden" value="<?php echo ($userId); ?>"/>
	</body>

</html>