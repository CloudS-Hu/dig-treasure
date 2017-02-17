<?php
	class TobuyModel extends Model{
		
		    //用户购物车奖品清单展示
	    	public function cartList($userId){
	    		$Tobuy=M("Tobuy");
	    		return $Tobuy->query("select buy.prizeId,buy.toBuyId, min(prizeTermBetCount) as betCount,count(*) as termNum,buy.prizeTitle,buy.prizePicture,buy.prizePrice from c_prizeterm pt ,(select t.toBuyId,p.prizeId,p.prizeTitle,p.prizePrice,p.prizePicture from c_tobuy t ,c_prize p where t.prizeId=p.prizeId and userId='$userId') as buy where pt.prizeId=buy.prizeId group by buy.prizeId order by buy.toBuyId;");
	    	}
	    	
	    	//查询用户要添加的商品是否存在
	    	public function isAdd($userId,$prizeId){
	    		$Tobuy=M("Tobuy");
	    		$condition["userId"]=$userId;
	    		$condition["prizeId"]=$prizeId;
	    		return $Tobuy->where($condition)->select();
	    	}
	    	
	    	//购物车添加商品
	    	public function addPrize($userId,$prizeId){
	    		$data=array(
	    		    "userId"=>$userId,
	    		    "prizeId"=>$prizeId
	    		);
	    		$Tobuy=M("Tobuy");
	    		$Tobuy->add($data);	    		
	    	}
	    	
	    	//购物车删除商品
	    	public function delPrize($toBuyId){
	    		$Tobuy=M("Tobuy");
	    		$Tobuy->where("toBuyId='$toBuyId'")->delete();
	    	}
    }
?>