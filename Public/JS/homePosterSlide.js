$(document).ready(function(){
	//定义手指接触屏幕时的初始坐标位置变量startLocation、主页面左边距MarginLeft和手指滑动距离(全局变量)
	var startLocation=0;
	var MarginLeft=0;
	var slidmove=0;
	var timer;
    //	var TSX=0;
	//绑定触摸开始事件
	$(".homePosterWrap").bind("touchstart",function(){
		//清除setInterval
		clearInterval(timer);
		//定义屏幕宽度值SW
//		var SW=screen.width;
		//定义ML取MarginLeft绝对值
		startLocation=event.touches[0].pageX;
		//手指触摸时的MarginLeft值
		MarginLeft = parseInt($(".homePosterWrap").css("margin-left").replace("px", ""));
		var ML=Math.abs(MarginLeft);
		//将手指触摸时的坐标位置值赋给startLocation
		if(ML>=3*SW&&ML<4*SW){
			return true;
		}
		//初始化slidmove值（清零）
		slidmove=0;
//		$(this).after("Another paragraph!");
        //防止事件冒泡
        return false; 
	});
	//绑定手指触摸移动事件
	$(".homePosterWrap").bind("touchmove",function(){
//		$(this).stopPropagation();
		//定义ML取MarginLeft绝对值
		var ML=Math.abs(MarginLeft);
		//定义屏幕宽度值SW
//		var SW=screen.width;
		//定义滑动距离slidmove
		slidmove=parseInt(event.touches[0].pageX - startLocation);
		//左边距小于一个屏幕宽度,即在首页时,页面随手指滑动
        if(ML<SW){
        	if(slidmove<0){
//      		$(this).animate({marginLeft:(slidmove+MarginLeft) + "px"},0);
//      		$(".activeFocus").animate({marginLeft:(-(slidmove+MarginLeft)*0.035) + "px"},0);
        		$(this).css("margin-left",(slidmove+MarginLeft) + "px");
        		$(".activeFocus").css("margin-left",(-(slidmove+MarginLeft)*0.035) + "px");
        	}
        //左边距大于一个屏幕宽度且小于四个屏幕宽度,即在首页和最后一页之间,页面随手指滑动
        }else if(ML>=SW&&ML<3*SW){
//      	$(this).animate({marginLeft:(event.touches[0].pageX - startLocation+MarginLeft) + "px"},0);
//      	$(".activeFocus").animate({marginLeft:(-(event.touches[0].pageX - startLocation+MarginLeft)*0.035) + "px"},0);
        	$(this).css("margin-left",(slidmove+MarginLeft) + "px");
        	$(".activeFocus").css("margin-left",(-(slidmove+MarginLeft)*0.035) + "px");
        //左边距大于等于4个屏幕宽度,即在最后一页时,页面随手指滑动
        }else if(ML>=3*SW){
        	if(slidmove>0){
//      		$(this).animate({marginLeft:(event.touches[0].pageX - startLocation+MarginLeft) + "px"},0);
//      		$(".activeFocus").animate({marginLeft:(-(event.touches[0].pageX - startLocation+MarginLeft)*0.035) + "px"},0);
        		$(this).css("margin-left",(slidmove+MarginLeft) + "px");
        		$(".activeFocus").css("margin-left",(-(slidmove+MarginLeft)*0.035) + "px");
        	}
        	return true;
        }  
//      $(this).css({"transform": "translateX(" + (event.touches[0].pageX - startLocation+TSX) + "px)"});
//		$("#test1").html(MarginLeft+","+slidmove);
//		$(this).after("Another paragraph!");
        return false; 
	});
	$(".homePosterWrap").bind("touchend",function(){
//		$(this).stopPropagation();
		//定义屏幕宽度值SW
//		var SW=screen.width;
		//定义SM取slidmove绝对值
		var SM=Math.abs(slidmove);
		//定义ML取MarginLeft绝对值
		var ML=Math.abs(MarginLeft);
//		$(this).css({"transform": "translateX("+(-SW)+ "px)"});
        //获取translateX的值
//      var ts=$(this).css("transform").match(/matrix\((.*)\)/)[1].split(",")[4];
//      TSX=parseInt(ts);
//      alert(TSX);
	    //获取当前左边距
		MarginLeft = parseInt($(".homePosterWrap").css("margin-left").replace("px", ""));	
		if(ML<SW){
			if(slidmove<0&&SM>=SW/2){
				$(this).animate({marginLeft: -SW+ "px"},100);
				$(".activeFocus").animate({marginLeft: (SW*0.035)+ "px"},100);
			}else if(slidmove<0&&SM<SW/2){
				$(this).animate({marginLeft: "0px"},100);
				$(".activeFocus").animate({marginLeft: "0px"},100);
			//首页向左滑动然后又向右折回时,位置初始操作
			}else if(slidmove>=0){
				$(this).animate({marginLeft: "0px"},50);
				$(".activeFocus").animate({marginLeft: "0px"},50);
			}
		}else if(ML>=SW&&ML<2*SW){
			if(slidmove<0&&SM>=SW/2){
				$(this).animate({marginLeft: -2*SW+ "px"},100);
				$(".activeFocus").animate({marginLeft: (2*SW*0.035)+ "px"},100);
			}else if(slidmove<0&&SM<SW/2){
				$(this).animate({marginLeft: -SW+"px"},100);
				$(".activeFocus").animate({marginLeft: (SW*0.035)+ "px"},100);
			}else if(slidmove>=SW/2){
				$(this).animate({marginLeft: "0px"},100);
				$(".activeFocus").animate({marginLeft: "0px"},100);
			}else if(slidmove>0&&slidmove<SW/2){
				$(this).animate({marginLeft: -SW+"px"},100);
				$(".activeFocus").animate({marginLeft: (SW*0.035)+ "px"},100);
			}
		}else if(ML>=2*SW&&ML<3*SW){
			if(slidmove<0&&SM>=SW/2){
				$(this).animate({marginLeft: -3*SW+ "px"},100);
				$(".activeFocus").animate({marginLeft: (3*SW*0.035)+ "px"},100);
			}else if(slidmove<0&&SM<SW/2){
				$(this).animate({marginLeft: -2*SW+"px"},100);
				$(".activeFocus").animate({marginLeft: (2*SW*0.035)+ "px"},100);
			}else if(slidmove>=SW/2){
				$(this).animate({marginLeft: -SW+"px"},100);
				$(".activeFocus").animate({marginLeft: (SW*0.035)+ "px"},100);
			}else if(slidmove>0&&slidmove<SW/2){
				$(this).animate({marginLeft: -2*SW+"px"},100);
				$(".activeFocus").animate({marginLeft: (2*SW*0.035)+ "px"},100);
			}
		}else if(ML>=3*SW&&ML<4*SW){
			if(slidmove>=SW/2){
				$(this).animate({marginLeft: -2*SW+"px"},100);
				$(".activeFocus").animate({marginLeft: (2*SW*0.035)+ "px"},100);
			}else if(slidmove>0&&slidmove<SW/2){
				$(this).animate({marginLeft: -3*SW+"px"},100);
				$(".activeFocus").animate({marginLeft: (3*SW*0.035)+ "px"},100);
			//向右滑动然后又向左折回,当slidmove小于零时,末页初始位置操作	
			}else if(slidmove<=0){
				$(this).animate({marginLeft: -3*SW+"px"},50);
				$(".activeFocus").animate({marginLeft: (3*SW*0.035)+ "px"},50);
			}
			timer=setInterval(function(){setInt();},3000);
			return true;
		}
//		$("#test1").html("ML:"+ML+",slidmove:"+slidmove+",SW:"+SW+",SM:"+SM);
//		$(this).after("Another paragraph!");
        //重新启用setInterval
        timer=setInterval(function(){setInt();},3000);
        return false; 
	});
	function setInt(){
//		var SW=screen.width;
		MarginLeft = parseInt($(".homePosterWrap").css("margin-left").replace("px", ""));
		var ML=Math.abs(MarginLeft);
		var index=parseInt(ML/SW);
		index++;
		if (index == 4) {
			index = 0;
		}
		$(".homePosterWrap").animate({marginLeft: (-index*SW)+"px"},500);
		$(".activeFocus").animate({marginLeft: (index*SW*0.035)+ "px"},500);
	}
	timer=setInterval(function(){setInt();},3000);
});