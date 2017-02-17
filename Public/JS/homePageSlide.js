var xx,yy,XX,YY,swipeX,swipeY ;
$(document).ready(function(){
	
	//① #home页面滑动设定
	//定义手指接触屏幕时的初始坐标位置变量startLocation、主页面左边距MarginLeft和手指滑动距离(全局变量)
	var startLocation=0;
	var MarginLeft=0;
	var slidmove=0;
	var startLocationY=0;
	var MarginTop=0;
	var slidmoveY=0;
	var startTime,endTime,moveTime,startS,endS,S,speed,duration,distance,flag;
	var a=4000;
	var scrollElement=$('#mainPart');
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
        		$(this).css("margin-left",(slidmove+MarginLeft) + "px");return false;
        	}
	        //左边距大于一个屏幕宽度且小于四个屏幕宽度,即在首页和最后一页之间,页面随手指滑动
	        }else if(ML>=SW&&ML<4*SW){
	//      	$(this).animate({marginLeft:(event.touches[0].pageX - startLocation+MarginLeft) + "px"},0);
	        	$(this).css("margin-left",(slidmove+MarginLeft) + "px");return false;
	        //左边距大于等于4个屏幕宽度,即在最后一页时,页面随手指滑动
	        }else if(ML>=4*SW){
	        	if(slidmove>0){
	//      		$(this).animate({marginLeft:(event.touches[0].pageX - startLocation+MarginLeft) + "px"},0);
	        		$(this).css("margin-left",(slidmove+MarginLeft) + "px");   return false;    		
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
				if(slidmove<0&&SM>=SW/5){
					$(this).animate({marginLeft: -SW+ "px"},100);
					$(".footerHome span").css("color","rgb(157,157,170)");
					$(".footerHome img").attr("src",homeGrayUrl);
					$(".footerNewest span").css("color","rgb(225,51,61)");
					$(".footerNewest img").attr("src",starRedUrl);return false;
				}else if(slidmove<0&&SM<SW/5){
					$(this).animate({marginLeft: "0px"},100);return false;
				//如果触摸向左又向右折回时这时候slidmove大于等于零,需要将位置归位(=0时点击(显示全部)事件会执行这里)
				}else if(slidmove>0){
					$(this).animate({marginLeft: "0px"},50);return false;
				}
			//在最新揭晓页触摸结束时触发的动画效果,及按钮的状态切换
			}else if(ML>=SW&&ML<2*SW){
				if(slidmove<0&&SM>=SW/5){
					$(this).animate({marginLeft: -2*SW+ "px"},100);
					$(".footerBask span").css("color","rgb(225,51,61)");
					$(".footerBask img").attr("src",cameraRedUrl);
					$(".footerNewest span").css("color","rgb(157,157,170)");
					$(".footerNewest img").attr("src",starGrayUrl);return false;
				}else if(slidmove<0&&SM<SW/5){
					$(this).animate({marginLeft: -SW+"px"},100);return false;
				}else if(slidmove>=SW/5){
					$(this).animate({marginLeft: "0px"},100);
					$(".footerHome span").css("color","rgb(225,51,61)");
					$(".footerHome img").attr("src",homeRedUrl);
					$(".footerNewest span").css("color","rgb(157,157,170)");
					$(".footerNewest img").attr("src",starGrayUrl);return false;
				}else if(slidmove>0&&slidmove<SW/5){
					$(this).animate({marginLeft: -SW+"px"},100);return false;
				}
			//在晒单页触摸结束时触发的动画效果,及按钮的状态切换	
			}else if(ML>=2*SW&&ML<3*SW){
				if(slidmove<0&&SM>=SW/5){
					$(this).animate({marginLeft: -3*SW+ "px"},100);
					$(".footerTobuy span").css("color","rgb(225,51,61)");
					$(".footerTobuy img").attr("src",cartRedUrl);
					$(".footerBask span").css("color","rgb(157,157,170)");
					$(".footerBask img").attr("src",cameraGrayUrl);return false;
				}else if(slidmove<0&&SM<SW/5){
					$(this).animate({marginLeft: -2*SW+"px"},100);return false;
				}else if(slidmove>=SW/5){
					$(this).animate({marginLeft: -SW+"px"},100);
					$(".footerNewest span").css("color","rgb(225,51,61)");
					$(".footerNewest img").attr("src",starRedUrl);
					$(".footerBask span").css("color","rgb(157,157,170)");
					$(".footerBask img").attr("src",cameraGrayUrl);return false;
				}else if(slidmove>0&&slidmove<SW/5){
					$(this).animate({marginLeft: -2*SW+"px"},100);return false;
				}
			//在清单页触摸结束时触发的动画效果,及按钮的状态切换
			}else if(ML>=3*SW&&ML<4*SW){
				if(slidmove<0&&SM>=SW/5){
					$(this).animate({marginLeft: -4*SW+ "px"},100);
					$(".footerMy span").css("color","rgb(225,51,61)");
					$(".footerMy img").attr("src",userRedUrl);
					$(".footerTobuy span").css("color","rgb(157,157,170)");
					$(".footerTobuy img").attr("src",cartGrayUrl);return false;
				}else if(slidmove<0&&SM<SW/5){
					$(this).animate({marginLeft: -3*SW+"px"},100);return false;
				}else if(slidmove>=SW/5){
					$(this).animate({marginLeft: -2*SW+"px"},100);
					$(".footerBask span").css("color","rgb(225,51,61)");
					$(".footerBask img").attr("src",cameraRedUrl);
					$(".footerTobuy span").css("color","rgb(157,157,170)");
					$(".footerTobuy img").attr("src",cartGrayUrl);return false;
				}else if(slidmove>0&&slidmove<SW/5){
					$(this).animate({marginLeft: -3*SW+"px"},100);return false;
				}
			//在最后一页触摸结束时触发的动画效果,及按钮的状态切换
			}else if(ML>=4*SW&&ML<5*SW){
				if(slidmove>=SW/5){
					$(this).animate({marginLeft: -3*SW+"px"},100);
					$(".footerTobuy span").css("color","rgb(225,51,61)");
					$(".footerTobuy img").attr("src",cartRedUrl);
					$(".footerMy span").css("color","rgb(157,157,170)");
					$(".footerMy img").attr("src",userGrayUrl);return false;
				}else if(slidmove>0&&slidmove<SW/5){
					$(this).animate({marginLeft: -4*SW+"px"},100);return false;
				//向右滑动然后又向左折回,当slidmove小于零时,末页位置初始操作	
				}else if(slidmove<0){
					$(this).animate({marginLeft: -4*SW+"px"},50);return false;
				}
			}
		}
//		event.preventDefault();
//      return false;
//		event.stopPropagation();
//		return false;
//		$("#test").html("ML:"+ML+",slidmove:"+slidmove+",SW:"+SW+",SM:"+SM);
	});
//	$(".mainPart").bind("touchmove",function(){
//		event.preventDefault();
//	});
//	$(".footer").bind("touchmove",function(){
//		event.preventDefault();
//	});
//  window.event? window.event.returnValue = false : evt.preventDefault();
});