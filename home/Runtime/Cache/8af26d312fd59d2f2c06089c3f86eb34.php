<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="font-size:100px;">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, 
			width=device-width, user-scalable=no">
		<title>home</title>
		<script type="text/javascript">
		    window.onload=function(){
			    setTimeout(function(){
				    window.location.href="__APP__/Index/index";    
				},3000);
			}
		</script>
		<style  type="text/css" >
		    body{
		        background-color:rgb(238,238,238);
		    }
		    .content{
		        width:100%;
		        height:1rem;
		        font-size:0.6rem;
		        color:rgb(222,47,81);
		        line-height:1rem;
		        text-align:center;
		        margin-top:0.5rem;
		        font-weight:900;
		    }
		    .pay{
		        width:100%;
		        height:0.3rem;
		        font-size:0.2rem;
		        color:rgb(100,100,100);
		        line-height:0.3rem;
		        text-align:center;
		        margin-top:1rem;
		    }
		</style>
	</head>
<body>
    <div class="content">恭喜您<br>支付成功</div>
    <div class="pay">您支出了<?php echo ($allPay); ?>夺宝币</div>
</body>
</html>