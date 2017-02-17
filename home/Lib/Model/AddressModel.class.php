<?php
	class AddressModel extends Model{
		//查询用户地址信息
    	public function address($userId){
    		$Address=M("Address");
    		return $Address->query("select addressId,isDefault,addressConsignee,addressTel,addressAddress,addressDetails from C_Address where userId='$userId';");
    	}
    	
    	//查询某条地址ID相应的地址信息
		public function fromAddressId($addressId){
    		$Address=M("Address");
    		return $Address->query("select addressConsignee,addressTel,addressAddress,addressDetails,isDefault from C_Address where addressId='$addressId'");
    	}
    	
    	//删除用户地址
    	public function addressDelete($addressId){
    		$Address=M("Address");
    		$Address->where("addressId='$addressId'")->delete();
    	}
    	
    	//用户默认地址信息置零
		public function zeroDefault($userId){
    		$Address=M("Address");
    		$Address->query("update C_Address set isDefault=0 where userId='$userId';");
    	}
    	
    	//设置当前地址为默认地址
		public function setDefault($addressId){
    		$Address=M("Address");
    		$Address->query("update C_Address set isDefault=1 where addressId='$addressId';");
    	}
    	
    	//更新地址信息
		public function addressUpdate($data,$addressId){
			$Address=M("Address");
	    	$Address-> where("addressId='$addressId'")->setField($data);
	    }
	    
	    //添加地址信息
		public function addAddress($data){
			$Address=M("Address");
	    	return $Address-> add($data);
	    }
	    
	    
	    
	    
	    
    }
?>