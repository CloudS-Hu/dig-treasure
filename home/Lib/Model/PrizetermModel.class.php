<?php
	class PrizetermModel extends Model{
		  
	    	//查询奖品最新一期的prizeTermId
	    	public function getTermId($prizeId){
	    		$Prizeterm=M("Prizeterm");
	    		return $Prizeterm->query("select prizeTermId from c_prizeterm where prizeId='$prizeId' order by prizeTermId desc limit 0,1;");
	    	}
	    	
	    	//更新购买商品下注的人次
	    	public function updateBetCount($termId,$betCount){
	    		$Prizeterm=M("Prizeterm");
	    		$Prizeterm->where("prizeTermId=$termId")->setInc('prizeTermBetCount',$betCount); 
	    	}
	    	
	    	//查询当前开奖期已下注人次
	    	public function getBetCount($termId){
	    		$Prizeterm=M("Prizeterm");
	    		return $Prizeterm->query("select prizeTermBetCount from c_prizeterm where prizeTermId='$termId';");
	    	}
	    	
	    	//新增新的开奖期
	    	public function newTerm($data){
	    		$Prizeterm=M("Prizeterm");
	    		$Prizeterm->add($data);
	    	}
	    	
    }
?>