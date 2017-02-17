var H=window.innerHeight;
var SW=window.innerWidth; 
$(document).ready(function(){
	$(".content").css("height",(H-50)+"px");
	$(".all,.ed,.ing").css("width",SW+"px");
});

function recordBtn(obj){
	var num=parseInt($(obj).attr('name'));
	var distance=$('.recordBar').width();
	$('.recordWrap').css("margin-left",-num*SW + "px");
	$('.recordBar').css("margin-left",num*distance + "px");
	$(obj).siblings().css('color','black');
	$(obj).css('color','rgb(222,47,81)');
	
}

$(document).ready(function(){
	//① #home页面滑动设定
	//定义手指接触屏幕时的初始坐标位置变量startLocation、主页面左边距MarginLeft和手指滑动距离(全局变量)
	var startLocation=0;
	var MarginLeft=0;
	var slidmove=0;
	var xx,yy,XX,YY,swipeX,swipeY ;;
	var startLocationY=0;
	var MarginTop=0;
	var slidmoveY=0;
	var scrollElement=$(".recordWrap");
	//绑定触摸开始事件
	scrollElement.bind("touchstart",function(){
//		event.preventDefault();
//      event.stopPropagation();
		//将手指触摸时的坐标位置值赋给startLocation
		startLocationX=event.touches[0].pageX;
		//手指触摸时的MarginLeft值
		MarginLeft = parseInt(scrollElement.css("margin-left").replace("px", ""));    
		//初始化slidmove值（清零）
		slidmove=0;
		xx = event.targetTouches[0].screenX ;
        yy = event.targetTouches[0].screenY ;
        swipeX = true;
        swipeY = true ;
//      return false;
	});
	//绑定手指触摸移动事件
	scrollElement.bind("touchmove",function(){
		XX = event.targetTouches[0].screenX ;
        YY = event.targetTouches[0].screenY ;
		//定义ML取MarginLeft绝对值
		var ML=Math.abs(MarginLeft);
		//定义屏幕宽度值SW
		var SW=screen.width;
		//定义滑动距离slidmove
		slidmove=parseInt(event.touches[0].pageX - startLocationX);
		//左边距小于一个屏幕宽度,即在首页时,页面随手指滑动
        if(swipeX && Math.abs(XX-xx)-Math.abs(YY-yy)>0){
        	 event.stopPropagation();//组织冒泡
	         event.preventDefault();//阻止浏览器默认事件
//	         return false;
	         swipeY = false ;
          //左右滑动
        	if(ML<SW){
        	if(slidmove<0){
//      		$(this).animate({marginLeft:(event.touches[0].pageX - startLocation+MarginLeft) + "px"},0);
        		$(this).css("margin-left",(slidmove+MarginLeft) + "px");
        		$('.recordBar').css("margin-left",(-(slidmove+MarginLeft)/3)  + "px");
        	}
	        //左边距大于一个屏幕宽度且小于四个屏幕宽度,即在首页和最后一页之间,页面随手指滑动
	        }else if(ML>=SW&&ML<2*SW){
	//      	$(this).animate({marginLeft:(event.touches[0].pageX - startLocation+MarginLeft) + "px"},0);
	        	$(this).css("margin-left",(slidmove+MarginLeft) + "px");
	        	$('.recordBar').css("margin-left",(-(slidmove+MarginLeft)/3)  + "px");
	        //左边距大于等于4个屏幕宽度,即在最后一页时,页面随手指滑动
	        }else if(ML>=2*SW){
	        	if(slidmove>0){
	//      		$(this).animate({marginLeft:(event.touches[0].pageX - startLocation+MarginLeft) + "px"},0);
	        		$(this).css("margin-left",(slidmove+MarginLeft) + "px");  
	        		$('.recordBar').css("margin-left",(-(slidmove+MarginLeft)/3) + "px");
	        	}
	        }  
        }
//		$("#test").html(MarginLeft+","+slidmove);
	});
	//绑定手指触摸结束事件
	scrollElement.bind("touchend",function(){
//		event.preventDefault();
		//定义屏幕宽度值SW
//		var SW=screen.width;
		//定义SM取slidmove绝对值
		var SM=Math.abs(slidmove);
		//定义ML取MarginLeft绝对值
		var ML=Math.abs(MarginLeft);
	    //获取当前左边距
		MarginLeft = parseInt(scrollElement.css("margin-left").replace("px", ""));	
		//在首页触摸结束时触发的动画效果,及按钮的状态切换
		if(swipeX && Math.abs(XX-xx)-Math.abs(YY-yy)>0){
			if(ML<SW){
				if(slidmove<0&&SM>=SW/2){
					$(this).animate({marginLeft: -SW+ "px"},100);
					$('.recordBar').animate({marginLeft: SW/3+ "px"},100);
					$('.recording').css('color','rgb(222,47,81)');
					$('.recordAll').css('color','black');
					$('.recorded').css('color','black');
					return false;
				}else if(slidmove<0&&SM<SW/2){
					$(this).animate({marginLeft: "0px"},100);
					$('.recordBar').animate({marginLeft: "0px"},100);
					$('.recordAll').css('color','rgb(222,47,81)');
					$('.recorded').css('color','black');
					$('.recording').css('color','black');
					return false;
				//如果触摸向左又向右折回时这时候slidmove大于等于零,需要将位置归位(=0时点击(显示全部)事件会执行这里)
				}else if(slidmove>0){
					$(this).animate({marginLeft: "0px"},50);
					$('.recordBar').animate({marginLeft: "0px"},100);
					$('.recordAll').css('color','rgb(222,47,81)');
					$('.recording').css('color','black');
					$('.recorded').css('color','black');
					return false;
				}
			//在最新揭晓页触摸结束时触发的动画效果,及按钮的状态切换
			}else if(ML>=SW&&ML<2*SW){
				if(slidmove<0&&SM>=SW/2){
					$(this).animate({marginLeft: -2*SW+ "px"},100);
					$('.recordBar').animate({marginLeft: 2*SW/3+ "px"},100);
					$('.recordAll').css('color','black');
					$('.recording').css('color','black');
					$('.recorded').css('color','rgb(222,47,81)');
					return false;
				}else if(slidmove<0&&SM<SW/2){
					$(this).animate({marginLeft: -SW+"px"},100);
					$('.recordBar').animate({marginLeft: SW/3+ "px"},100);
					$('.recordAll').css('color','black');
					$('.recording').css('color','rgb(222,47,81)');
					$('.recorded').css('color','black');
					return false;
				}else if(slidmove>=SW/2){
					$(this).animate({marginLeft: "0px"},100);
					$('.recordBar').animate({marginLeft: "0px"},100);
					$('.recordAll').css('color','rgb(222,47,81)');
					$('.recording').css('color','black');
					$('.recorded').css('color','black');
					return false;
				}else if(slidmove>0&&slidmove<SW/2){
					$(this).animate({marginLeft: -SW+"px"},100);
					$('.recordBar').animate({marginLeft: SW/3+ "px"},100);
					$('.recordAll').css('color','black');
					$('.recording').css('color','rgb(222,47,81)');
					$('.recorded').css('color','black');
					return false;
				}
			//在最后一页触摸结束时触发的动画效果,及按钮的状态切换
			}else if(ML>=2*SW&&ML<3*SW){
				if(slidmove>=SW/2){
					$(this).animate({marginLeft: -SW+"px"},100);
					$('.recordBar').animate({marginLeft: SW/3+ "px"},100);
					$('.recordAll').css('color','black');
					$('.recording').css('color','rgb(222,47,81)');
					$('.recorded').css('color','black');
					return false;
				}else if(slidmove>0&&slidmove<SW/2){
					$(this).animate({marginLeft: -2*SW+"px"},100);
					$('.recordBar').animate({marginLeft: 2*SW/3+ "px"},100);
					$('.recordAll').css('color','black');
					$('.recording').css('color','black');
					$('.recorded').css('color','rgb(222,47,81)');
					return false;
				//向右滑动然后又向左折回,当slidmove小于零时,末页位置初始操作	
				}else if(slidmove<0){
					$(this).animate({marginLeft: -2*SW+"px"},50);
					$('.recordBar').animate({marginLeft: 2*SW/3+ "px"},100);
					$('.recordAll').css('color','black');
					$('.recording').css('color','black');
					$('.recorded').css('color','rgb(222,47,81)');
					return false;
				}
			}
		}
	});
});