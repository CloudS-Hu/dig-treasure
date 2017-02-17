<?php
	class OrderrecordModel extends Model{
	    	
		//表中插入数据
		public function addData($data){
			$Orderrecord=M("Orderrecord");
			$Orderrecord->add($data);
		}
    }
?>