<?php
	class TakepartinModel extends Model{
		
		//查询当前开奖期购买人次最多的用户(土豪)
		public function tuhao($newestTermId){
			$Takepartin=M("Takepartin");
			return $Takepartin->query("select * from (select userId ,sum(tpiPayAmount) as allPay from c_takepartin  where prizeTermId='$newestTermId' group by userId order by sum(tpiPayAmount) desc) as t limit 0,1; ");
		}
		
		//查询当前开奖期第一个购买的用户(沙发)
		public function shafa($newestTermId){
			$Takepartin=M("Takepartin");
			return $Takepartin->query("select userId from c_takepartin where prizeTermId='$newestTermId' order by tpiTime limit 0,1;");
		}
		
		//查询当前开奖期的购买用户信息列表
		public function userList($prizeTermId){
			$Takepartin=M("Takepartin");
			return $Takepartin->query("select u.userNickName ,u.userPortrait,t.tpiPayAmount as betCount,t.tpiTime from (select * from c_takepartin where prizeTermId='$prizeTermId') as t left join c_user u on t.userId=u.userId  order by t.tpiTime desc;");
		}
		
		//插入数据到表中,并返回主键值
		public function addData($data){
			$Takepartin=M("Takepartin");
			return $Takepartin->add($data);
		}
    }
?>