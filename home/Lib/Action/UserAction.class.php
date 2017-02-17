<?php

class UserAction extends Action {
	
	//登录及注册页面加载
	public function login(){
		$this->display("login");
	}
	
    //登录
	public function loginaction(){
		
		$userPhone=$_POST['userPhone'];
		$userPassword=$_POST['userPassword'];
		$User=D('User');
		$query=$User->login($userPhone,$userPassword);
		if($query){
			$_SESSION["userId"]=$query[0]["userId"];
			$this->assign("User",$query[0]);
            echo "登录成功,即将跳转";
		}else{
			$_SESSION["userId"]="";
			echo "手机号或密码错误";
		}   	
    }
    
    //注销
    public function logout(){
    	$_SESSION["userId"]="";
    	$this->display("login");
    }
    
    //注册时,判断用户名是否存在
    public function userjudge(){
    	$userPhone=$_POST['userPhone'];
    	$User=D("User");
	    $checkresult=$User->checkuser($userPhone);
	    if($checkresult){
	    	echo "该手机号码已经被注册";
	    }else{
	    	echo "手机号码可用";
	    }
    }
    
    //注册
    public function register() {
	    $userPhone=$_POST['userPhone'];
	    $userPassword=$_POST['userPassword'];
	    $User=D("User");
	    $checkresult=$User->checkuser($userPhone);    
	    if($checkresult){
	    	echo "请不要重复注册";
	    }else{
	    	$User->register($userPhone,$userPassword);
		    echo '注册成功,即将跳转到登录页面';
	    }
    }
    
    //用户充值页面加载
    public function userPay(){
    	$userId=$_SESSION["userId"]|0;
    	$this->assign("userId",$userId);
    	$this->display();
    }
    
    //充值
    public function pay(){
		$userId=$_SESSION['userId'];	
		$payCount=$_POST['payCount'];
		$User=D("User");
		if($userId){
			$User->userpay($userId,$payCount);
			echo "充值成功";
		}else{
			echo "登录超时,请重新登录";
		}
	    
    }
    
    //充值界面返回主页
//    public function payBack(){
//    	$this->redirect("Index:index");
//    }
    
    //个人信息页面加载
	public function userInfo(){
	    $User=D("User");
    	$userId=$_SESSION["userId"]|0;
    	if($userId){
    		$userInfo=$User->showInfo($userId);
	    	$this->assign("User",$userInfo[0]);
	    	$this->display();
    	}else {
    		$this->display("login");
    	}
    }
    
    //用户昵称设置页面加载
    public function nicknameSet(){
    	$User=D("User");
    	$userId=$_SESSION["userId"]|0;
    	$userInfo=$User->showInfo($userId);
	    $this->assign("userNickName",$userInfo[0]["userNickName"]);
	    $this->display();
    }
    
    //用户昵称设置
    public function nicknameAction(){
    	$User=D("User");
    	$userId=$_SESSION["userId"]|0;
    	$userNickName=$_POST["userNickName"];
    	$result=$User->findNickName();
    	if($userId==0){
    		echo "登录超时,请重新登录";
    	}else if($result){
    		echo "昵称未更改";
    	}else{
    		$User->setNickName($userNickName,$userId);
    		echo "昵称修改成功";
    	}   	
    }
    
    //账户管理(密码设置)页面加载
    public function accountSet(){
    	$userId=$_SESSION["userId"]|0;
	    $this->assign("userId",$userId);
	    $this->display();
    }
    
    //账户管理页面密码修改
    public function acountSetAction(){
		$userId=$_SESSION['userId']|0;	
		$userPassword=$_POST['userPassword'];
		$newPassword=$_POST['newPassword'];
	    $User=D("User");
	    $result=$User->checkPassword($userId,$userPassword);
	    if($userId==0||$userId==""){
	    	echo "登录超时,请重新登录";
	    }else if($result){
	    	$User->setPassword($newPassword,$userId);
	        echo "密码修改成功";   
	    }else{
	    	echo '手机号码或密码错误!';
	    }
    }
    
    //用户地址页面展示
    public function address(){
    	$this->display();
    }
    
    //用户地址页面加载
    public function addressLoad(){
	   $userId=$_SESSION['userId']|0;
	   $Address=D("Address");
	   if($userId==0||$userId==""){
	   	   echo "登录超时,请重新登录";
	   }else {
	       $query=$Address->address($userId);
		   $this->ajaxReturn($query);
	   }
    }

    
    //用户地址设置页面加载
    public function addressSet(){
    	$userId=$_SESSION['userId']|0;
    	$addressId=$_GET['addressId'];
    	$this->assign("addressId",$addressId);
	    $Address=D("Address");
	    if($userId==0||$userId==""){
	   	    echo "登录超时,请重新登录";
	    }else {
	        $query=$Address->fromAddressId($addressId);
		    $this->assign("addressArr",$query);
	    }
	    $this->display();
    }
    
    //显示省份信息
    public function showProvince(){
	   $userId=$_SESSION['userId']|0;
	   $T_prov_city_area=D("T_prov_city_area");
	   $province=$T_prov_city_area->selectProvince();
       $this->ajaxReturn($province);
    }
    
    
	//显示市信息
    public function showCity(){
	   $areaname=$_POST['shengName'];
	   $T_prov_city_area=D("T_prov_city_area");
	   $City=$T_prov_city_area->selectCity($areaname);
       $this->ajaxReturn($City);
    }
    
    
	//显示区信息
    public function showArea(){
	   $areaname=$_POST['shiName'];
	   $T_prov_city_area=D("T_prov_city_area");
	   $Area=$T_prov_city_area->selectCity($areaname);
       $this->ajaxReturn($Area);
    }
    
    //删除用户地址
    public function addressDelete(){
	    $userId=$_SESSION['userId']|0;
	    $addressId=$_POST['addressId'];
	    $Address=D("Address");
	    if($userId==0){
	        echo '请登录后再进行删除操作';
	    }else{
	    	$Address->addressDelete($addressId);
	    	echo '地址删除成功';
	    }
    }
    
    //更新地址信息(保存)
    public function addressUpdate(){
    	$userId=$_SESSION['userId']|0;
	    $addressId=$_POST['addressId'];
	    $data=array(
	        "addressConsignee"=>$_POST['addressConsignee'],
	        "addressTel"=>$_POST['addressTel'],
	        "addressAddress"=>$_POST['addressAddress'],
	        "addressDetails"=>$_POST['addressDetails'],
	        "isDefault"=>$_POST['isDefault']
	    );
	    $Address=D("Address");
	    if($userId==0){
	    	echo '登录超时,请重新登录';
	    }else if($_POST['isDefault']==1){
	    	$Address->zeroDefault($userId);
	    	$Address->addressUpdate($data,$addressId);
	    	echo '地址保存成功,已设置为默认地址';
	    }else{
	    	$Address->addressUpdate($data,$addressId);
	    	echo '地址保存成功,当前为非默认地址';
	    }
    }
    
    //添加地址信息
    public function addAddress(){
    	$userId=$_SESSION['userId']|0;
    	$isDefault=$_POST['isDefault'];
    	$data=array(
    	    "addressConsignee"=>$_POST['addressConsignee'],
	    	"addressTel"=>$_POST['addressTel'],
	    	"addressAddress"=>$_POST['addressAddress'],
	    	"addressDetails"=>$_POST['addressDetails'],
	    	"isDefault"=>$isDefault,
	    	"userId"=>$userId
    	);
    	$Address=D("Address");
    	
	    if($userId){
		    $lastId=$Address->addAddress($data);
		    if($isDefault){
		    	$Address->zeroDefault($userId);
		    	$Address->setDefault($lastId);
		    }
		    echo '地址添加成功';
	    }else{
	    	echo '登录超时,请重新登录';
	    }

    }
    
    //修改头像
    public function setPhoto(){
//    	include_once'lei/shujuku.php';
//		 $shujuku=new shujuku();
//		 $username=$_SESSION["username"];
//		 $sex=$_POST["sex"];
//		 $dizhi=$_POST["dizhi"];
//		 $hangye=$_POST["hangye"];
//		 $xueli=$_POST["xueli"];
//		 $jieshao=$_POST["jieshao"];
		 
		 $sqlt="select u_touxiang from user where username='$username'";
		 $queryt=$shujuku->queryR($sqlt);
		 while($result=mysql_fetch_array($queryt)){
		 	$touxiang=$result["u_touxiang"];
		 }
		 
		 $pic=$_FILES["pic"];
		
		 if($pic["size"]!=0){
		 $touxiang="touxiang/".$pic["name"];
		      if(is_uploaded_file($pic["tmp_name"])){
			move_uploaded_file($pic["tmp_name"],$touxiang);
		   }
		 }
		 $sql="update user set sex='$sex',dizhi='$dizhi',hangye='$hangye',xueli='$xueli',jieshao='$jieshao',u_touxiang='$touxiang' where username='$username'";
		 $query=$shujuku->query($sql);
		 header("location:gerenxiugai.php");
    	
    }
    
    
}
?>