<?php
	class PrizeModel extends Model{
	    	
		//按最热排序查询
		public function zuire(){
			$Prize=M("Prize");
			return $Prize->query("select pt.prizeId,min(pt.prizeTermBetCount) as betCount,p.prizeTitle,p.prizePrice,p.prizePicture,count(*) as termNum from c_prizeterm pt left join c_prize p on pt.prizeId=p.prizeId group by pt.prizeId order by termNum desc;");
		}
		
		//按最快排序查询
		public function zuikuai(){
			$Prize=M("Prize");
			return $Prize->query("select pt.prizeId,min(pt.prizeTermBetCount) as betCount,p.prizeTitle,p.prizePrice,p.prizePicture,count(*) as termNum from c_prizeterm pt left join c_prize p on pt.prizeId=p.prizeId group by pt.prizeId;");
		}
		
		//按最新排序查询
		public function zuixin(){
			$Prize=M("Prize");
			return $Prize->query("select pt.prizeId,min(pt.prizeTermBetCount) as betCount,p.prizeTitle,p.prizePrice,p.prizePicture,count(*) as termNum from c_prizeterm pt left join c_prize p on pt.prizeId=p.prizeId group by pt.prizeId order by prizeId desc;");
		}
		
		//按高价排序查询
		public function gaojia(){
			$Prize=M("Prize");
			return $Prize->query("select pt.prizeId,min(pt.prizeTermBetCount) as betCount,p.prizeTitle,p.prizePrice,p.prizePicture,count(*) as termNum from c_prizeterm pt left join c_prize p on pt.prizeId=p.prizeId group by pt.prizeId order by prizePrice desc;");
		}
		
		//按低价排序查询
		public function dijia(){
			$Prize=M("Prize");
			return $Prize->query("select pt.prizeId,min(pt.prizeTermBetCount) as betCount,p.prizeTitle,p.prizePrice,p.prizePicture,count(*) as termNum from c_prizeterm pt left join c_prize p on pt.prizeId=p.prizeId group by pt.prizeId order by prizePrice;");
		}
		
		//查询奖品信息
		public function prizeDetails($prizeId){
			$Prize=M("Prize");
			return $Prize->query("select p.prizeDetail,p.prizeTitle,p.prizePrice,max(pt.prizeTermId) as newestTermId,min(pt.prizeTermBetCount) as betCount,count(*) as termNum from c_prize p ,c_prizeterm pt where p.prizeId=pt.prizeId and p.prizeId='$prizeId' group by p.prizeId;");
		}
		
		
    }
?>