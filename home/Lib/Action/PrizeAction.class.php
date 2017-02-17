<?php
	class PrizeAction extends Action {
		
		//奖品详情展示
		public function prizeDtails(){
			$prizeId=$_GET["prizeId"];
			$Prize=D("Prize");
			$details=$Prize->prizeDetails($prizeId);
			$this->assign("details",$details);
			
			$newestTermId=$details[0]["newestTermId"];
			$Takepartin=D("Takepartin");
			$tuhao=$Takepartin->tuhao($newestTermId);
			$tuhaoId=$tuhao[0]['userId'];
			$tuhaoPay=$tuhao[0]['allPay'];
			$User=D("User");
			$tuhaoInfo=$User->showInfo($tuhaoId);
			$tuhaoName=$tuhaoInfo[0]["userNickName"];
			$tuhaoPic=$tuhaoInfo[0]["userPortrait"];
			$this->assign("tuhaoPic",$tuhaoPic);
			$this->assign("tuhaoPay",$tuhaoPay);
			$this->assign("tuhaoName",$tuhaoName);
			
			$shafa=$Takepartin->shafa($newestTermId);
			$shafaId=$shafa[0]["userId"];
			$shafaInfo=$User->showInfo($shafaId);
			$this->assign("shafa",$shafaInfo);
			
			$userList=$Takepartin->userList($newestTermId);
			$this->assign("userList",$userList);
			
			$this->display();
		}
	}

?>