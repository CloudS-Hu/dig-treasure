<?php
class IndexAction extends Action {
	
	//主页面加载
    public function index(){
    	$User=D("User");
    	$userId=$_SESSION["userId"]|0;
    	
    	//奖品加载
    	$Prize=D("Prize");
    	$re=$Prize->zuire();
    	$this->assign("re",$re);
    	$kuai=$Prize->zuikuai();
    	$this->assign("kuai",$kuai);
    	$xin=$Prize->zuixin();
    	$this->assign("xin",$xin);
    	$gao=$Prize->gaojia();
    	$this->assign("gao",$gao);
    	$di=$Prize->dijia();
    	$this->assign("di",$di);
    	
    	//购物车加载
    	$Tobuy=D("Tobuy");
    	$cart=$Tobuy->cartList($userId);
    	$this->assign("cart",$cart);
    	if($userId){
    		$userInfo=$User->showInfo($userId);
	    	$this->assign("User",$userInfo[0]);
	    	$this->display("index");
    	}else {
    		$this->display();
    	}
    }
}
?>