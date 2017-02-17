<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="font-size:100px;">
	<head>
		<!--设置编码-->
		<meta charset="UTF-8">
		<!--设置设备屏幕自适应及用户缩放特性-->
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, 
			width=device-width, user-scalable=no">
		<title>home</title>
		<script type="text/javascript">
			var homeGrayUrl="__PUBLIC__/images/icon/home_gray.png";
			var homeRedUrl="__PUBLIC__/images/icon/home_red.png";
			var starGrayUrl="__PUBLIC__/images/icon/star_gray.png";
			var starRedUrl="__PUBLIC__/images/icon/star_red.png";
			var cameraGrayUrl="__PUBLIC__/images/icon/camera_gray.png";
			var cameraRedUrl="__PUBLIC__/images/icon/camera_red.png";
			var cartGrayUrl="__PUBLIC__/images/icon/cart_gray.png";
			var cartRedUrl="__PUBLIC__/images/icon/cart_red.png";
			var userGrayUrl="__PUBLIC__/images/icon/user_gray.png";
			var userRedUrl="__PUBLIC__/images/icon/user_red.png";
			var addPrizeUrl="__APP__/Tobuy/addPrize";
			var delPrizeUrl="__APP__/Tobuy/delPrize";
			var toPayUrl="__APP__/Pay/toPay";
		</script>
		<script type="text/javascript" src="__PUBLIC__/JS/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="__PUBLIC__/JS/homePageSlide.js"></script>
		<script type="text/javascript" src="__PUBLIC__/JS/buttonStateChange.js"></script>
		<script type="text/javascript" src="__PUBLIC__/JS/homePosterSlide.js"></script>
		<script type="text/javascript" src="__PUBLIC__/JS/homePage.js"></script>
		<script type="text/javascript" src="__PUBLIC__/JS/myIscroll.js"></script>
		<script type="text/javascript" src="__PUBLIC__/JS/toBuyPage.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/iscroll-probe.js"></script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/CSS/mainPart.css"/>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/CSS/homePoster.css"/>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/CSS/homeNewest.css"/>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/CSS/homePrize.css"/>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/CSS/baskTail.css"/>
	</head>
    
	<body onload="loaded()" style="font-size: 0px;">
		<div class="shade"></div>
		<!--内容主体-->
		<div class="mainPart">
			<!--内容主体包裹层-->
			<div class="mainPartWrap"  id="mainPart">
				
				<!--首页-->
				<div class="home" id="home">
					<!--首页头部-->
					<div class="homeHeader">
						<div class="searchList">
							<a href="prizeClassify.html"  onfocus="this.blur()"><img src="__PUBLIC__/images/icon/searchList.png" /> </a>
						</div>
						<div class="homeTitle"><span>零钱夺宝</span></div>
						<div class="messageCenter">
							<a href="#"><img src="__PUBLIC__/images/icon/chat.png" /> </a>
						</div>
				    </div>
				    <div class="homePrizeHeader" style="position: fixed;z-index: 1;height: 0.9rem;">
						<ul style="top: 0.5rem;">
							<li class="zuire" onclick="listSwitch(this)" style="left: 0;"><span style="border-bottom: 3px solid rgb(222,47,81);color:rgb(222,47,81);">最热</span> </li>
							<li class="zuikuai"  onclick="listSwitch(this)"  style="left: 20%;"><span>最快</span> </li>
							<li class="zuixin"  onclick="listSwitch(this)"  style="left: 40%;"><span>最新</span> </li>
							<li class="gaojia"  onclick="listSwitch(this)"  style="left: 60%;"><span>高价</span> </li>
							<li class="dijia"  onclick="listSwitch(this)" style="left: 80%;"><span>低价</span> </li>
						</ul>
					</div>
					<div class="homeTail">
						<div class="scroller" id="homeScroller">
							<div class="homeTailTop">
								<span>作者 : 胡云南</span><span>时间 : 2016-02-20</span>
							</div>
							<!--首页海报展示-->
						<div class="homePoster">
							<!--首页海报展示包裹层-->
							<div class="homePosterWrap">
								<div class="poster1"><img src="__PUBLIC__/images/img/p1.jpg" /> </div>
								<div class="poster2"><img src="__PUBLIC__/images/img/p2.jpg"/> </div>
								<div class="poster3"><img src="__PUBLIC__/images/img/p3.jpg"/> </div>
								<div class="poster4"><img src="__PUBLIC__/images/img/p4.jpg"/> </div>
							</div>
							<ul class="posterFocus">
								<li style="left: 6.25%;"></li>
								<li style="left: 31.25%;"></li>
								<li style="left: 56.25%;"></li>
								<li style="left: 81.25%;"></li>
								<div class="activeFocus"></div>
							</ul>
						</div>
						<!--首页最新揭晓展示,显示最新三条-->
						<div class="homeNewest">
							<div class="homeNewestHeader">
								<span>最新揭晓</span>
								<a onclick="toNewest()">显示全部></a>
							</div>
							<ul class="homeNewestContent">
								<li style="left: 0;">
									<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($kuai[0]['prizeId']); ?>">
										<div class="HNCpicture"><img src="<?php echo ($kuai[0]['prizePicture']); ?>"/> </div>
										<div class="HNCtitle"><span>(第<?php echo ($kuai[0]['termNum']); ?>期)<?php echo ($kuai[0]['prizeTitle']); ?></span> </div>
										<div class="HNCdetails">
											<div class="HNCmiddle"><span></span></div>
										</div>
									</a>									
								</li>
								<li style="left: 33%;">
									<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($kuai[1]['prizeId']); ?>">
										<div class="HNCpicture"><img src="<?php echo ($kuai[1]['prizePicture']); ?>"/> </div>
										<div class="HNCtitle"><span>(第<?php echo ($kuai[1]['termNum']); ?>期)<?php echo ($kuai[1]['prizeTitle']); ?></span> </div>
										<div class="HNCdetails">
											<div class="HNCmiddle"><span></span></div>
										</div>
									</a>									
								</li>
								<li style="right: 1%;border: 0;">
									<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($kuai[2]['prizeId']); ?>">
										<div class="HNCpicture"><img src="<?php echo ($kuai[2]['prizePicture']); ?>"/> </div>
										<div class="HNCtitle"><span>(第<?php echo ($kuai[2]['termNum']); ?>期)<?php echo ($kuai[2]['prizeTitle']); ?></span> </div>
										<div class="HNCdetails">
											<div class="HNCmiddle"><span></span></div>
										</div>
									</a>									
								</li>
							</ul>
						</div>
						<!--首页奖品展示,显示众筹中的奖品10条,可下拉加载,每次加载10条-->
						<div class="homePrize">
							<div class="homePrizeHeader" id="HPH">
								<ul>
									<li class="zuire" onclick="listSwitch(this)" style="left: 0;"><span style="border-bottom: 3px solid rgb(222,47,81);color:rgb(222,47,81);">最热</span> </li>
									<li class="zuikuai"  onclick="listSwitch(this)"  style="left: 20%;"><span>最快</span> </li>
									<li class="zuixin"  onclick="listSwitch(this)"  style="left: 40%;"><span>最新</span> </li>
									<li class="gaojia"  onclick="listSwitch(this)"  style="left: 60%;"><span>高价</span> </li>
									<li class="dijia"  onclick="listSwitch(this)" style="left: 80%;"><span>低价</span> </li>
								</ul>
							</div>
							<div class="homePrizeWrap">					     
							    <ul id="zuire"  class="homePrizeList zuire">
								    <?php if(is_array($re)): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								        	<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($vo['prizeId']); ?>">
												<div class="HPLpicture"><img src="<?php echo ($vo['prizePicture']); ?>"/> </div>
												<div class="HPLtitle"><span>(第<?php echo ($vo["termNum"]); ?>期)<?php echo ($vo["prizeTitle"]); ?></span> </div>
												<div class="HPLdetails">
													<div class="HPLdetailsLeft">
														<div class="HTLtop"><span>总需:<i><?php echo ($vo["prizePrice"]); ?></i></span> </div>
														<div class="HTLmiddle">
															<span style="width: calc(<?php echo ($vo['betCount']/$vo["prizePrice"]); ?>*92%)"></span>
															<span></span>
														</div>
														<div class="HTLbottom"><span><i><?php echo ($vo["betCount"]); ?></i>已参与剩余<i><?php echo ($vo["prizePrice"]-$vo["betCount"]); ?></i></span></div>
													</div>
													<div class="HPLdetailsRight" onclick="addPrize(this)"><img src="__PUBLIC__/images/icon/cart_add.png" /><input type="hidden" value="<?php echo ($vo['prizeId']); ?>"/> </div>
												</div>
											</a>
								        </li><?php endforeach; endif; else: echo "" ;endif; ?>
							    </ul>
								<ul id="zuikuai" class="homePrizeList zuikuai">
									<?php if(is_array($kuai)): $i = 0; $__LIST__ = $kuai;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								        	<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($vo['prizeId']); ?>">
												<div class="HPLpicture"><img src="<?php echo ($vo['prizePicture']); ?>"/> </div>
												<div class="HPLtitle"><span>(第<?php echo ($vo["termNum"]); ?>期)<?php echo ($vo["prizeTitle"]); ?></span> </div>
												<div class="HPLdetails">
													<div class="HPLdetailsLeft">
														<div class="HTLtop"><span>总需:<i><?php echo ($vo["prizePrice"]); ?></i></span> </div>
														<div class="HTLmiddle">
															<span style="width: calc(<?php echo ($vo['betCount']/$vo["prizePrice"]); ?>*92%)"></span>
															<span></span>
														</div>
														<div class="HTLbottom"><span><i><?php echo ($vo["betCount"]); ?></i>已参与剩余<i><?php echo ($vo["prizePrice"]-$vo["betCount"]); ?></i></span></div>
													</div>
													<div class="HPLdetailsRight" onclick="addPrize(this)"><img src="__PUBLIC__/images/icon/cart_add.png" /><input type="hidden" value="<?php echo ($vo['prizeId']); ?>"/> </div>
												</div>
											</a>
								        </li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
								<ul id="zuixin" class="homePrizeList zuixin" style="display: none;">
									<?php if(is_array($xin)): $i = 0; $__LIST__ = $xin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								        	<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($vo['prizeId']); ?>">
												<div class="HPLpicture"><img src="<?php echo ($vo['prizePicture']); ?>"/> </div>
												<div class="HPLtitle"><span>(第<?php echo ($vo["termNum"]); ?>期)<?php echo ($vo["prizeTitle"]); ?></span> </div>
												<div class="HPLdetails">
													<div class="HPLdetailsLeft">
														<div class="HTLtop"><span>总需:<i><?php echo ($vo["prizePrice"]); ?></i></span> </div>
														<div class="HTLmiddle">
															<span style="width: calc(<?php echo ($vo['betCount']/$vo["prizePrice"]); ?>*92%)"></span>
															<span></span>
														</div>
														<div class="HTLbottom"><span><i><?php echo ($vo["betCount"]); ?></i>已参与剩余<i><?php echo ($vo["prizePrice"]-$vo["betCount"]); ?></i></span></div>
													</div>
													<div class="HPLdetailsRight" onclick="addPrize(this)"><img src="__PUBLIC__/images/icon/cart_add.png" /><input type="hidden" value="<?php echo ($vo['prizeId']); ?>"/> </div>
												</div>
											</a>
								        </li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
								<ul id="gaojia" class="homePrizeList gaojia" style="display: none;">
								    <?php if(is_array($gao)): $i = 0; $__LIST__ = $gao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								        	<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($vo['prizeId']); ?>">
												<div class="HPLpicture"><img src="<?php echo ($vo['prizePicture']); ?>"/> </div>
												<div class="HPLtitle"><span>(第<?php echo ($vo["termNum"]); ?>期)<?php echo ($vo["prizeTitle"]); ?></span> </div>
												<div class="HPLdetails">
													<div class="HPLdetailsLeft">
														<div class="HTLtop"><span>总需:<i><?php echo ($vo["prizePrice"]); ?></i></span> </div>
														<div class="HTLmiddle">
															<span style="width: calc(<?php echo ($vo['betCount']/$vo["prizePrice"]); ?>*92%)"></span>
															<span></span>
														</div>
														<div class="HTLbottom"><span><i><?php echo ($vo["betCount"]); ?></i>已参与剩余<i><?php echo ($vo["prizePrice"]-$vo["betCount"]); ?></i></span></div>
													</div>
													<div class="HPLdetailsRight" onclick="addPrize(this)"><img src="__PUBLIC__/images/icon/cart_add.png" /><input type="hidden" value="<?php echo ($vo['prizeId']); ?>"/> </div>
												</div>
											</a>
								        </li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
								<ul  class="homePrizeList dijia" id="dijia" style="display: none;">
								    <?php if(is_array($di)): $i = 0; $__LIST__ = $di;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								        	<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($vo['prizeId']); ?>">
												<div class="HPLpicture"><img src="<?php echo ($vo['prizePicture']); ?>"/> </div>
												<div class="HPLtitle"><span>(第<?php echo ($vo["termNum"]); ?>期)<?php echo ($vo["prizeTitle"]); ?></span> </div>
												<div class="HPLdetails">
													<div class="HPLdetailsLeft">
														<div class="HTLtop"><span>总需:<?php echo ($vo["prizePrice"]); ?></span> </div>
														<div class="HTLmiddle">
															<span style="width: calc(<?php echo ($vo['betCount']/$vo["prizePrice"]); ?>*92%)"></span>
															<span></span>
														</div>
														<div class="HTLbottom"><span><i><?php echo ($vo["betCount"]); ?></i>已参与剩余<i><?php echo ($vo["prizePrice"]-$vo["betCount"]); ?></i></span></div>
													</div>
													<div class="HPLdetailsRight" onclick="addPrize(this)"><img src="__PUBLIC__/images/icon/cart_add.png" /><input type="hidden" value="<?php echo ($vo['prizeId']); ?>"/> </div>
												</div>
											</a>
								        </li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
								<ul class="homePrizeList blank">
							         <?php if(is_array($re)): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li></li><?php endforeach; endif; else: echo "" ;endif; ?>
							     </ul>
							</div>							
						</div>
						</div>
					</div>
				</div>
				<!--最新揭晓-->
				<div class="newest" id="newest">
					<!--最新揭晓头部-->
					<div class="homeHeader">
						<div class="homeTitle"><span>零钱夺宝</span></div>
					</div>
					<div class="newestTail">
						<div class="scroller">
							<div class="newestTailTop">
								<span>作者 : 胡云南</span><span>时间 : 2016-02-20</span>
							</div>
							<table>
							    <?php if(is_array($re)): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
										<td>
											<a href="__APP__/Prize/prizeDtails/prizeId/<?php echo ($vo['prizeId']); ?>">
												<div class="newestTailConner">正在揭晓</div>
												<div class="newestTailLeft"><img src="<?php echo ($vo['prizePicture']); ?>" /> </div>
												<div class="newestTailRight">
													<div class="newestTailRightTop">
														<span>(第<?php echo ($vo["termNum"]); ?>期)<?php echo ($vo["prizeTitle"]); ?></span>
														<i>价值¥<?php echo ($vo["prizePrice"]); ?></i>
													</div>
													<div class="newestTailRightBottom"></div>
												</div>
											</a>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
						</div>
					</div>
				</div>
				
				<!--晒单-->
				<div class="bask" id="bask">
					<div class="homeHeader">
						<div class="homeTitle"><span>零钱夺宝</span></div>
						<div class="messageCenter">
							<a href="#"><img src="__PUBLIC__/images/icon/add.png" /> </a>
						</div>
					</div>
					<div class="baskTail">
						<div class="scroller">
							<div class="baskTailTop">
								<span>作者 : 胡云南</span><span>时间 : 2016-02-20</span>
							</div>
							<table cellpadding="0">
								<tr>
									<td class="baskLeftTd"><img src="__PUBLIC__/images/img/empty.jpg"/> </td>
									<td class="baskRightTd">
										<a href="baskDetails.html">
											<div class="baskRight">
												<div class="baskRightHead">
													<span>用户名</span><span>时间</span>
												</div>
												<div class="baskRightContent"><span>听说中奖跟晒单更配哦!</span> </div>
												<div class="baskRightImg">
													<img src="__PUBLIC__/images/img/mybc.jpg" />
													<img src="__PUBLIC__/images/img/p4.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
												</div>
												<div class="baskRightBottom">
													<span>试试手气></span>
												</div>
											</div>
										</a>
									</td>								
								</tr>
								<tr>
									<td class="baskLeftTd"><img src="__PUBLIC__/images/img/empty.jpg"/> </td>
									<td class="baskRightTd">
										<a href="baskDetails.html">
											<div class="baskRight">
												<div class="baskRightHead">
													<span>用户名</span><span>时间</span>
												</div>
												<div class="baskRightContent"><span>听说中奖跟晒单更配哦!</span> </div>
												<div class="baskRightImg">
													<img src="__PUBLIC__/images/img/mybc.jpg" />
													<img src="__PUBLIC__/images/img/p4.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
												</div>
												<div class="baskRightBottom">
													<span>试试手气></span>
												</div>
											</div>
										</a>
									</td>								
								</tr>
								<tr>
									<td class="baskLeftTd"><img src="__PUBLIC__/images/img/empty.jpg"/> </td>
									<td class="baskRightTd">
										<a href="baskDetails.html">
											<div class="baskRight">
												<div class="baskRightHead">
													<span>用户名</span><span>时间</span>
												</div>
												<div class="baskRightContent"><span>听说中奖跟晒单更配哦!</span> </div>
												<div class="baskRightImg">
													<img src="__PUBLIC__/images/img/mybc.jpg" />
													<img src="__PUBLIC__/images/img/p4.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
													<img src="__PUBLIC__/images/img/p2.jpg" />
												</div>
												<div class="baskRightBottom">
													<span>试试手气></span>
												</div>
											</div>
										</a>
									</td>								
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!--清单-->
				<div class="toBuy" id="toBuy">
					<div class="homeHeader">
						<div class="homeTitle"><span>清单</span></div>
					</div>
					<div class="toBuyTail">
						<div class="scroller" >
							<div class="toBuyTailTop">
								<span>作者 : 胡云南</span><span>时间 : 2016-02-20</span>
							</div>
							<table class="toBuyTable">
								<?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="toBuyList">
									    <input type="hidden" class="prizeTitle" value="<?php echo ($vo['prizeTitle']); ?>">
									    <input type="hidden" class="prizeId" value="<?php echo ($vo['prizeId']); ?>">
										<td>
											<div class="toBuyTailHeader">
											    <input type="hidden" value="<?php echo ($vo['toBuyId']); ?>" />
												<span class="toBuyTailHeaderLeft">(第<?php echo ($vo["termNum"]); ?>期)<?php echo ($vo["prizeTitle"]); ?></span>
												<span class="toBuyTailHeaderRight">删除</span>
											</div>
											<div class="toBuyTailFooter">
												<div class="toBuyTailFooterLeft"><img src="<?php echo ($vo['prizePicture']); ?>"/> </div>
												<div class="toBuyTailFooterMiddle">
													<span class="toBuyTailFooterMiddleTop">总需<?php echo ($vo["prizePrice"]); ?>人次</span> 
													<span class="toBuyTailFooterMiddleTop1">剩余<span style="color: rgb(222,47,81);"><?php echo ($vo["prizePrice"]-$vo["betCount"]); ?></span>人次</span>
													<table>
														<tr>
															<td onclick="toBuyMinus(this);" style="width: 0.3rem;">-</td>
																<?php if(($vo['betCount'] < 5)): ?><td style="width: 0.6rem;"><input value="<?php echo ($vo['betCount']); ?>" class="countPrice"/> </td>
																<?php else: ?>
																    <td style="width: 0.6rem;"><input value="5" class="countPrice"/> </td><?php endif; ?>
															
															<td onclick="toBuyAdd(this);" style="width: 0.3rem;border-right: 1px solid rgb(149,149,149);">+</td>
														</tr>
													</table>
													<span class="toBuyTailFooterMiddleBottom">奖品最新一期火热进行中</span>
												</div>
												<div class="toBuyTailFooterRight"><span onclick="toBuyAll(this);">包尾</span></div>
											</div>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
							<div class="toBuyBottom"><span>清单最多容纳10件奖品</span></div>
							<div class="toBuyEmptyT"><img src="__PUBLIC__/images/img/empty.jpg"/> </div>
							<span class="toBuyEmptyM">清单空空如也~</span>
							<div class="toBuyEmptyB"><span>去逛逛</span></div>
						</div>
					</div>
					<div class="toBuyCount">
						<div class="toBuyCountLeft">
							<span>总计 : <i></i>夺金币</span>
							<span>共<i></i>件商品</span>
						</div>
						<div class="toBuyCountRight">
						    <form action="__APP__/Pay/topay" method="post" onsubmit="return toPay()">
						        <input id="title"  type="hidden" name="titleStr"/>
						        <input id="price" type="hidden" name="priceStr"/>
						        <input id="idStr" type="hidden" name="idStr"/>
						        <input id="allPay" type="hidden" name="allPay"/>
								<input id="qujiesuan" type="submit" value="去结算" />
						    </form>
						</div>
					</div>
				</div>
				<!--我-->
				<div class="my" id="my">
					<div class="myWrap">
						<div class="myHeader">
							<div class="myShare" onclick="shareTo()"><img src="__PUBLIC__/images/icon/share.png"/></div>
							<div class="myLogin" >
							<?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?><a href="__APP__/User/logout">
							<?php else: ?><a href="__APP__/User/login"><?php endif; ?>
							<span>
								<?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?>注销
					            <?php else: ?>登录<?php endif; ?>
					        </span></a></div>
							<div class="myShow">
								<?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?><a href="__APP__/User/userInfo">
					            <?php else: ?><a href="__APP__/User/login"><?php endif; ?>								
									<div class="myPhoto">
									    <?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?><img src="<?php echo ($User["userPortrait"]); ?>"/>
									    <?php else: ?>
									    <img src="__PUBLIC__/images/userImage/userImage0.jpg"/><?php endif; ?>
									 </div>
									<div class="myName">
										<span style="font-size: 0.17rem;"><?php echo ($User["userNickName"]); ?></span>
										<div>
										<span>
										<?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?>余额<?php endif; ?>
										</span>
										<span style="color: rgb(255,61,51);"><?php echo ($User["userBalance"]); ?></span>
										<span>
										<?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?>夺金币<?php endif; ?>
										</span>
										</div>
									</div>	
								</a>
							</div>
							<div class="myBalance">
							<?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?><a href="__APP__/User/userPay">充值</a><?php endif; ?>
							</div>
							<div class="myHeaderShade"></div>
						</div>
						<div class="myFooter myMiddle">
							<ul>
								<li>
								    <?php if(($_SESSION['userId']!= 0) OR ($_SESSION['userId']!= null)): ?><a href="__APP__/User/address">
								    <?php else: ?><a href="__APP__/User/login"><?php endif; ?>
										<div class="left1"><img style="height: 0.23rem;width:0.17rem;vertical-align:-20%;"  src="__PUBLIC__/images/icon/dizhi.png"/><span>&nbsp;&nbsp;我的收货地址</span></div>
									    <div class="right1"> <img src="__PUBLIC__/images/icon/next.png" /> </div>
									</a>
								</li>
								<li>
									<a href="__APP__/User/login.html">
										<div class="left1"><img src="__PUBLIC__/images/icon/orderRecord.png"/><span>&nbsp;&nbsp;订单记录</span></div>
									    <div class="right1"> <img src="__PUBLIC__/images/icon/next.png" /> </div>
									</a>
								</li>
								<li>
									<a href="__APP__/User/login.html">
										<div class="left1"><img src="__PUBLIC__/images/icon/zhongjiang.png"/><span>&nbsp;&nbsp;中奖记录</span></div>
										<div class="right1"> <img src="__PUBLIC__/images/icon/next.png" /> </div>
									</a>
								</li>
								<li>
								    <a href="__APP__/User/login.html">
										<div class="left1"><img style="height: 0.18rem;vertical-align:-12%;" src="__PUBLIC__/images/icon/saidan.png"/><span>&nbsp;&nbsp;我的晒单</span></div>
										<div class="right1"> <img src="__PUBLIC__/images/icon/next.png" /> </div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--页脚--五个页面切换按钮-->
		<div class="footer">
			<div class="footerHome" onclick="buttonSC(this)" name="0">
				<div class="footerHomeWrap"><img src="__PUBLIC__/images/icon/home_red.png"/><span style="color: rgb(222,47,81);">首页</span></div>
			</div>
			<div class="footerNewest" onclick="buttonSC(this)" name="1">
				<div class="footerHomeWrap"><img src="__PUBLIC__/images/icon/star_gray.png"/><span>最新揭晓</span> </div>
			</div>
			<div class="footerBask" onclick="buttonSC(this)" name="2">
				<div class="footerHomeWrap"><img src="__PUBLIC__/images/icon/camera_gray.png"/><span>晒单</span> </div>
			</div>
			<div class="footerTobuy" onclick="buttonSC(this)" name="3">
				<div class="footerHomeWrap"><img src="__PUBLIC__/images/icon/cart_gray.png"/><span>清单</span> </div>
				<div class="cartCount">10</div>
			</div>
			<div class="footerMy" onclick="buttonSC(this)" name="4">
				<div class="footerHomeWrap"><img src="__PUBLIC__/images/icon/user_gray.png"/><span>我</span> </div>
			</div>
		</div>
		<div class="toBuyDel">
			<div><span>确定要删除我吗?</span></div>
			<div>
				<span>取消</span>
			    <span>确定</span>
			</div>
		</div>
		<div class="TBDel">删除</div>
		<div class="shareTo">
			<div class="STtop">
				<img src="__PUBLIC__/images/img/shartTo450260.jpg"/>
			</div>
			<div class="STbottom">取消</div>
		</div>
		<div class="error">
			<span>我是信息提示框</span>
		</div>
	</body>

</html>