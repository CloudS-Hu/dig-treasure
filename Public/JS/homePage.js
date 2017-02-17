var SW=window.innerWidth;

//跳转到最新揭晓页面
function toNewest(){
//	var SW=screen.width;
	$("#mainPart").css("margin-left",-SW+"px");
	$(".footerHomeWrap span").eq(1).css("color","rgb(225,51,61)");
	$(".footerHomeWrap img").eq(1).attr("src",starRedUrl);
	$(".footerHomeWrap span").eq(0).css("color","rgb(157,157,170)");
	$(".footerHomeWrap img").eq(0).attr("src",homeGrayUrl);
}
//清除按钮样式
function switchInitial(){
	$(".homePrizeHeader span").css("color","rgb(101,101,101)");
	$(".homePrizeHeader span").css("border-bottom","0");
}

//首页奖品分类排序切换动作
function listSwitch(obj){
	switchInitial();
	var className=$(obj).attr("class");
	$(".homePrizeList").hide();
	$("."+className).show();
	$("."+className).find("span").eq(0).css("color","rgb(225,51,61)");
	$("."+className).find("span").eq(0).css("border-bottom","3px solid rgb(225,51,61)");
	$("."+className).find("span").eq(1).css("color","rgb(225,51,61)");
	$("."+className).find("span").eq(1).css("border-bottom","3px solid rgb(225,51,61)");
}
     
$(document).ready(function(){
	var LLQH=window.innerHeight;
	var homeHeight=LLQH-50;
	$(".homeTail").css("height",(homeHeight+250)+"px");
	$(".newestTail").css("height",(homeHeight+250)+"px");
	$(".baskTail").css("height",(homeHeight+250)+"px");
	$(".toBuyTail").css("height",(homeHeight+250)+"px");
	$(".my").css("height",(homeHeight)+"px");
	$(".homePrizeHeader").eq(0).hide();
    $(".toBuyEmptyB,.toBuyEmptyM,.toBuyEmptyT,.error").hide();
    $(".homePrizeList").eq(1).hide();
	$('.shade').hide();
	$('.toBuyDel').hide();
	$('.TBDel').hide();
	$('.shareTo').hide();
	
	//页面加载时购物车页面状态
	var countPrize=$('.toBuyTail').find('tr').length/2;
    $('.toBuyCountLeft').find('i').eq(1).text(countPrize);
    if(countPrize==0){
    	$(".toBuyTail").find('table').hide();
        $(".toBuyBottom,.toBuyCount").hide();
        $(".toBuyEmptyB,.toBuyEmptyM,.toBuyEmptyT").show();
    }
});

//首页奖品分类标题悬停动作
function judge(obj){
	if(Math.abs(obj)>=351){
		$(".homePrizeHeader").eq(0).show();
		$(".homePrizeHeader").eq(1).css("z-index","-1");
	}else{
		$(".homePrizeHeader").eq(0).hide();
		$(".homePrizeHeader").eq(1).css("z-index","3");
	}
}


//分享按钮跳转
function shareTo(){
	$('.shade').show();
	setTimeout(function(){
		$('.shareTo').slideDown();
	},300);
}












