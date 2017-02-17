<?php
    class TobuyAction extends Action{
    	
    	//购物车添加商品
    	public function addPrize(){
    		$userId=$_SESSION["userId"]|0;
    		$prizeId=$_POST["prizeId"];
    		$Tobuy=D("Tobuy");
    		$isAdd=$Tobuy->isAdd($userId,$prizeId);
    		if($userId==0){
    			echo "请登录后再添加商品";
    		}else if($isAdd){
    			echo "该商品已经添加过了";
    		}else{
    			$Tobuy->addPrize($userId,$prizeId);                  
    			$Tobuy=D("Tobuy");
		    	$cart=$Tobuy->cartList($userId);
		    	for($i=0;$i<count($cart);$i++){
		    		$preUrl="/www/digTreasure-ThinkPHP/Public/images/prize/";
		    		$tailUrl=$cart[$i]['prizePicture'];
		    		$fileName=basename($tailUrl);
		    		$picUrl=$preUrl.$fileName;
		    		
		    		echo "<tr class='toBuyList'><td>
		    		    <input type='hidden' class='prizeTitle' value='".$cart[$i]['prizeTitle']."'>
		    		    <input type='hidden' class='prizeId' value='".$cart[$i]['prizeId']."'>
						<div class='toBuyTailHeader'>
						     <input type='hidden' value='".$cart[$i]['toBuyId']."' />
							<span class='toBuyTailHeaderLeft'>(第".$cart[$i]['termNum']."期)".$cart[$i]['prizeTitle']."</span>
							<span class='toBuyTailHeaderRight'>删除</span>
						</div>
						<div class='toBuyTailFooter'>
							<div class='toBuyTailFooterLeft'><img src='".$picUrl."'/> </div>
							<div class='toBuyTailFooterMiddle'>
								<span class='toBuyTailFooterMiddleTop'>总需".$cart[$i]['prizePrice']."人次</span> 
								<span class='toBuyTailFooterMiddleTop1'>剩余<span style='color: rgb(222,47,81);'>".($cart[$i]['prizePrice']-$cart[$i]['betCount'])."</span>人次</span>
								<table>
									<tr>
										<td onclick='toBuyMinus(this);' style='width: 0.3rem;'>-</td>
										<td style='width: 0.6rem;'><input value='5' class='countPrice' /> </td>
										<td onclick='toBuyAdd(this);' style='width: 0.3rem;border-right: 1px solid rgb(149,149,149);'>+</td>
									</tr>
								</table>
								<span class='toBuyTailFooterMiddleBottom'>奖品最新一期火热进行中</span>
							</div>
							<div class='toBuyTailFooterRight'><span onclick='toBuyAll(this);'>包尾</span></div>
						</div>
					</td></tr>";	
		    	}
    				    			
    		}
    	}
    	
    	//购物车删除商品
    	public function delPrize(){
    		$userId=$_SESSION["userId"]|0;
    		$toBuyId=$_POST["toBuyId"];
    		$Tobuy=D("Tobuy");
    		if($userId==0){
    			echo "登录超时,请重新登录";
    		}else{
	    		$Tobuy->delPrize($toBuyId);
	    		echo "删除成功";
    		}
    	}
    	
    }
?>