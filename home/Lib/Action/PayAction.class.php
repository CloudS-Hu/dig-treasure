<?php

    class PayAction extends Action{
    	
    	//购物车结算提交(订单结算页面加载)
    	public function toPay(){
    		$userId=$_SESSION["userId"]|0;
    		$titleStr=$_POST["titleStr"];
    		$priceStr=$_POST["priceStr"];
    		$idStr=$_POST["idStr"];
    		$allPay=$_POST["allPay"];
    		$prizeTitle = explode('_',$titleStr);
    		$prizePrice = explode('_',$priceStr);
    		$prizeId = explode('_',$idStr);
    		$count=count($prizeTitle);
    		
    		$User=D("User");
    		$getBalance=$User->getBalance($userId);
    		$balance=$getBalance[0]["userBalance"];
    		
    		$this->assign("priceStr",$priceStr);
    		$this->assign("idStr",$idStr);
    		
    		$this->assign("allPay",$allPay);
    		$this->assign("balance",$balance);
    		$this->assign("count",$count);
    		$this->assign("title",$prizeTitle);
    		$this->assign("price",$prizePrice);
    		$this->display("pay");
    	}
    	
    	//支付
    	public function pay(){
    		$userId=$_SESSION["userId"];
    		$idStr=$_POST["idStr"];
    		$priceStr=$_POST["priceStr"];
    		$allPay=$_POST["allPay"];
    		
    		$idArr = explode('_',$idStr);
    		$priceArr = explode('_',$priceStr);
    		
    		$time=date('y-m-d h:i:s',time());
    		for($i=0;$i<count($idArr);$i++){
    			
    			//查询该奖品对应的开奖期Id
    			$Prizeterm=D("Prizeterm");
	    		$prizeTermId=$Prizeterm->getTermId($idArr[$i]);
	    		$termId=$prizeTermId[0]["prizeTermId"];
	    		
	    		//更新开奖期表数据
	    		$Prizeterm->updateBetCount($termId,$priceArr[$i]);	
	    		  	    
	    		//更新用户参与表记录
	    		$data=array(
	    		    "prizeTermId"  =>$termId,
	    		    "userId"       =>$userId,
	    		    "tpiPayAmount" =>$priceArr[$i],
	    		    "tpiTime"      =>$time
	    		);
	    		
	    		$Takepartin=D("Takepartin");
	    		$tpiId=$Takepartin->addData($data);
	    		//更新订单记录表数据
	    		$data1=array(
	    		    "prizeId"      =>$idArr[$i],
	    		    "userId"       =>$userId,
	    		    "tpiId"        =>$tpiId
	    		);
	    		
	    		$Orderrecord=D("Orderrecord");
	    		$Orderrecord->addData($data1);

	    		//查询当前开奖期已下注人次
	    		$PrizeBetCount=$Prizeterm->getBetCount($termId);
	    		$betCount=$PrizeBetCount[0]["prizeTermBetCount"];
	    		//查询奖品价格
	    		$Prize=D("Prize");
	    		$prizeDetails=$Prize->prizeDetails($idArr[$i]);
	    		$prizePrice=$prizeDetails[0]["prizePrice"];
	    		//如果下注人次等于奖品价格(执行开奖),那么创建新的开奖期
	    		if($betCount>=$prizePrice){
	    			$data2=array(
		    		    "prizeId"      =>$idArr[$i]
		    		);
	    			$Prizeterm=D("Prizeterm");
	    			$Prizeterm->newTerm($data2);
	    		}
    		}
    		
    		//用户余额支付(用户余额扣除购买价格),先查询余额,如果余额不足则支付失败
    		$User=D("User");
    		$userBalance=$User->getBalance($userId);
    		$balance=$userBalance[0]['userBalance'];
    		if($balance<$allPay){
    			$this->error("支付失败");
    		}else{
    			$User->payNow($userId,$allPay);
    		}  
            $this->assign("allPay",$allPay);
    		
    		$this->display("paySuccess");
    		
    	}
    }

?>