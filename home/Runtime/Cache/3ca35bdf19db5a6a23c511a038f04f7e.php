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
            //显示当前日期
	        function time(){
		        var now=new Date();
		        var year=now.getFullYear();
		        var month=now.getMonth()+1;
		        var date=now.getDate();
		        document.getElementById("time").innerHTML=year+"-"+month+"-"+date;
		    }
		    
			$(document).ready(function(){
				time();
				var LLQH=window.innerHeight;
				var Height=LLQH-100;
				$(".content").css("height",Height+"px");
				$("html").css("height",LLQH+"px");
			});
			
		</script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/prizeDtails.css"/>
	</head>

	<body style="font-size: 0px;">
		<!--内容主体-->
		<div class="Header">
			<div class="back">
				<a href="__APP__/Index/index"><img src="__PUBLIC__/images/icon/back.png" /> </a>
			</div>
			<div class="Title"><span>奖品详情</span></div>
			<div class="buyList">
				<a href="#"><img src="__PUBLIC__/images/icon/cart_white.png" /> </a>
			</div>
		</div>
		<div class="content">
			<div class="picture">
				<img src="<?php echo ($details[0]['prizeDetail']); ?>" /> 
				<div class="toDetails"><span>点击查看图文详情</span> </div>
			</div>
			<div class="contentHead">
				<div class="contentHeadLeft">
					<div class="contentHeadTop">
						<span>进行中</span>
						<span>(第<?php echo ($details[0]['termNum']); ?>期)<?php echo ($details[0]['prizeTitle']); ?></span>
					</div>
				    <div class="contentHeadBottom">
				        <?php if($details[0]['betCount'] != $details[0]['prizePrice']): ?><span  style="width: calc(<?php echo ($details[0]['betCount']/$details[0]['prizePrice']); ?>*100%)"></span>
					    	<span></span><?php endif; ?>
				    	<span class="zongxu">总需 : <?php echo ($details[0]['prizePrice']); ?></span>
				    	<?php if($details[0]['betCount'] != $details[0]['prizePrice']): ?><span>剩余<?php echo ($details[0]['prizePrice']-$details[0]['betCount']); ?></span><?php endif; ?>
				    </div>
				</div>
				<div class="contentHeadRight"><img src="__PUBLIC__/images/icon/share_red.png" /> </div>
			</div>
			
			<?php if($details[0]['betCount'] != $details[0]['prizePrice']): ?><div class="toJoin">
					<span>您还没有参加,赶紧参加吧!</span>
				</div>
			
				<!--<div class="announceNow">
					<span>揭晓倒计时</span>
					<div>
						<span><i>06</i>分<i>03</i>秒<i>78</i></span>
						<span>查看计算详情></span> 
					</div>
				</div>
		    --><?php else: ?>
				<div class="announceEnd">
					<div class="announceEndLeft">
						<span>获奖者</span>
						<img src="__PUBLIC__/images/img/empty.jpg" />
					</div>
					<div class="announceEndRight">
						<span>中奖者 : <i style="color: rgb(27,166,255);">用户名</i><br />用户地址 : <i style="color: rgb(83,83,98);">中国北京北京</i><br />本期参与 : <i style="color: rgb(222,47,81);">5</i>人次 <br />揭晓时间 : <i style="color: rgb(83,83,98);">2016-02-18 21:14:01</i> </span>
					</div>
					<div class="announceEndBottom">
						<span>中奖号码:<i>10000055</i></span>
						<span>查看计算详情></span> 
					</div>
				</div><?php endif; ?>
			<div class="announcePast">
				<div class="abLeft"><img src="__PUBLIC__/images/icon/time.png"/><span>往期揭晓</span> </div>
				<div class="abRight"><img src="__PUBLIC__/images/icon/next.png"/> </div>
			</div>
			<div class="baskPast">
				<div class="abLeft"><img src="__PUBLIC__/images/icon/jifen.png"/><span>往期晒单</span> </div>
				<div class="abRight"><img src="__PUBLIC__/images/icon/next.png"/> </div>
			</div>
			<div class="honorRoll">
				<div class="honorRollTop">
					<div class="hrLeft"><img src="__PUBLIC__/images/icon/zhongjiang.png"/><span>荣誉榜</span> </div>
					<div class="hrRight"><span>上榜规则></span></div>
				</div>
				<div class="honorRollBottom">
					<div class="tuhao">
						<div class="one"><img src="<?php echo ($tuhaoPic); ?>" /></div>
						<div class="span1"><span>土豪</span></div>
						<span class="span2"><?php echo ($tuhaoName); ?></span>
						<span class="span3">参与<i><?php echo ($tuhaoPay); ?></i>人次</span>
					</div>
					<div class="shafa">
						<div  class="one"><img src="<?php echo ($shafa[0]["userPortrait"]); ?>" /></div>
						<div class="span1"><span>沙发</span></div>
						<span class="span2"><?php echo ($shafa[0]["userNickName"]); ?></span>
						<span class="span3">第一个参与</span>
					</div>
					<div class="baowei">
						<div  class="one"><img src="__PUBLIC__/images/img/empty.jpg" /></div>
						<?php if($details[0]['betCount'] != $details[0]['prizePrice']): ?><div class="span5"><span style="background-color: rgb(166,166,166)">包尾</span></div>
							<span class="span4">虚位以待</span>
						<?php else: ?>
							<div class="span5"><span style="background-color: rgb(27,166,255)">包尾</span></div>
						    <span class="span4" style="color: rgb(27,166,255)">用户名</span><?php endif; ?>
						<span class="span3">最后一个参与</span>
					</div>
				</div>
			</div>
			<div class="takePartDate" id="time"></div>
			<div class="takePartUserWrap">
			    <?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="takePartUser">
						<div class="takePartUserLeft"><img src="<?php echo ($vo['userPortrait']); ?>" /> </div>
						<div class="takePartUserRight">
							<span style="font-size: 0.18rem;color: rgb(121,121,134);"><?php echo ($vo['userNickName']); ?></span><br />
							<span>参与了<i><?php echo ($vo['betCount']); ?></i>人次</span><br />
							<span><?php echo ($vo['tpiTime']); ?></span>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="footer">
			<div class="borderLine"></div>
			<div class="addChart">
				<img src="__PUBLIC__/images/icon/cart_add_new.png" />
			</div>
			<div class="joinNow"><span>立即参与 </span> </div>
		</div>
	</body>

</html>