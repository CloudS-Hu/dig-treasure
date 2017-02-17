<?php
	class UserModel extends Model{
            //登录账户密码匹配查询
	    	public function login($name,$password){
	    		$User=M("User");
	    		return $User->query("select * from C_User where userPhone='$name' and userPassword='$password';");
	    	}
	    	//查询当前登录用户信息
	    	public function showInfo($userId){
	    		$User=M("User");
	    		return $User->query("select * from C_User where userId='$userId';");
	    	}
	    	
	    	//查询账户是否存在
			public function checkuser($name){
	    		$User=M("User");
	    		return $User->query("select userPhone from C_User where userPhone='$name';");
	    	}
	    	
	    	//用户注册
			public function register($userPhone,$userPassword){
	    		$User=M("User");
	    		$User->query("insert into C_User(userPhone,userPassword) values('$userPhone','$userPassword');");
	    	}
	    	
	    	//用户充值
	    	public function userpay($userId,$payCount){
	    		$User=M("User");
	    		$myQuery=$User->query("select userBalance from C_User where userId=$userId;");
			    $userBalance=intval($myQuery[0]['userBalance'])+$payCount;
			    $User->query("update C_User set userBalance=$userBalance where userId=$userId;");
	    	}
	    	
	    	//查询用户昵称
			public function findNickName($name){
	    		$User=M("User");
	    		return $User->query("select userId from C_User where userNickName='$name';");
	    	}
	    	
	    	//设置用户昵称
			public function setNickName($userNickName,$userId){
	    		$User=M("User");
	    		return $User->query("update C_User set userNickName='$userNickName' where userId=$userId;");
	    	}
	    	
			//匹配登录用户密码是否正确
			public function checkPassword($userId,$userPassword){
	    		$User=M("User");
	    		return $User->query("select userPassword from C_User where userId='$userId' and userPassword='$userPassword';");
	    	}
	    	
			//修改用户密码
			public function setPassword($newPassword,$userId){
	    		$User=M("User");
	    		$User->query("update C_User set userPassword='$newPassword' where userId='$userId';");
	    	}
	    	
	    	//查询余额
	    	public function getBalance($userId){
	    		$User=M("User");
	    		return $User->query("select userBalance from c_user where userId='$userId';");
	    	}
	    	
	    	//用户余额支付
			public function payNow($userId,$allPay){
	    		$User=M("User");
	    		$User->where("userId=$userId")->setDec("userBalance",$allPay);
	    	}
    }
?>