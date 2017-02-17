function countPrice(){
	var priceInput=$('.toBuyTail').find('input');
	var countPrice=0;
	if(priceInput){
		for(var i=0;i<priceInput.length;i++){
		    countPrice+=parseInt(priceInput.eq(i).val());
	    }
	}
	$('.toBuyCountLeft').find('i').eq(0).text(countPrice);
}

function toBuyAll(obj){
	var judge= $(obj).text();
	if(judge=="包尾"){
		var all=$(obj).parent().siblings().find('.toBuyTailFooterMiddleTop1 span').html();
		$(obj).css("background-color","limegreen");
		$(obj).text("√");
		$(obj).css("font-size","0.3rem");
		$(obj).parent().siblings().find('.toBuyTailFooterMiddleBottom').text('购买人次已改为包尾人次').css("color","rgb(225,51,61)");
		$(obj).parent().siblings().find('input').val(all);
		down=true;
	}else if(judge=="√"){
		$(obj).css("background-color","rgb(225,51,61)");
		$(obj).text("包尾");
		$(obj).css("font-size","0.13rem");
		$(obj).parent().siblings().find('input').val(5);
		$(obj).parent().siblings().find('.toBuyTailFooterMiddleBottom').text('奖品最新一期火热进行中').css("color","rgb(149,149,149)");
	    down=false;
	}
	countPrice();
}
function toBuyMinus(obj){
	var count=$(obj).siblings().find('input').val()-1;
	var all=$(obj).parent().parent().parent().siblings().eq(1).find('span').html();
	var el=$(obj).parent().parent().parent().parent().siblings().eq(1).find('span');
	if(count>0){
	    $(obj).siblings().find('input').val(count);
	    el.css("background-color","rgb(225,51,61)");
		el.text("包尾");
		el.css("font-size","0.13rem");
		el.parent().siblings().find('.toBuyTailFooterMiddleBottom').text('奖品最新一期火热进行中').css("color","rgb(149,149,149)");
	    down=false;
	}
	countPrice();
}

function toBuyAdd(obj){
	var el=$(obj).parent().parent().parent().parent().siblings().eq(1).find('span');
	var count=parseInt($(obj).siblings().find('input').val())+1;
	var all=$(obj).parent().parent().parent().siblings().eq(1).find('span').html();
	if(count<all){
	    $(obj).siblings().find('input').val(count);
	}else if(count==all){
		el.css("background-color","limegreen");
		el.text("√");
		el.css("font-size","0.3rem");
		el.parent().siblings().find('.toBuyTailFooterMiddleBottom').text('购买人次已改为包尾人次').css("color","rgb(225,51,61)");
		el.parent().siblings().find('input').val(all);
		down=true;
	}
	
	countPrice();
}

//购物车商品数量
function prizeCount(){
	var countPrize=$('.toBuyTail').find('tr').length/2;
	$('.toBuyCountLeft').find('i').eq(1).text(countPrize);
	$('.cartCount').text(countPrize);
}

//夺金币总计
function countPrice(){
	var priceInput=$('.countPrice');
	var countPrice=0;
	if(priceInput){
		for(var i=0;i<priceInput.length;i++){
		    countPrice+=parseInt(priceInput.eq(i).val());
	    }
	}
	$('.toBuyCountLeft').find('i').eq(0).text(countPrice);
}

//删除事件绑定
	var delElement;
    function deleteBtn(){
    	var el=$('.toBuyTailHeaderRight');
    	if(el){
    		for(var i=0;i<el.length;i++){
    			el.eq(i).on('tap',function(){
    				$('.shade').show();
    	            $('.toBuyDel').show();
    	            delElement=$(this);
    			});
    		}
    	}
    }
    
    //确认删除
    function confirmDelete(){
    	$('.toBuyDel div span:last').on('click',function(){
    		var toBuyId=delElement.siblings().eq(0).val();
    		$.ajax({
    			type:'POST',
    	        url:delPrizeUrl,
    	        data:{toBuyId:toBuyId},
    	        dataType:'text',
    	        success:function(data){   	        	
    	        	Msg(data);
    	        },
    	        error:function(XMLHttpRequest, textStatus, errorThrown){
    	            alert(errorThrown);
    	        } 
    		});
    		delElement.parent().parent().parent().remove();
    		$('.shade').hide();
    	    $('.toBuyDel').hide();
    	    $('.TBDel').hide();
    	    setTimeout(function(){
    	    	toBuyScroll.refresh();
    	    },0);
    	    var countPrize=$('.toBuyTail').find('tr').length/2;
    	    $('.toBuyCountLeft').find('i').eq(1).text(countPrize);
    	    $('.cartCount').text(countPrize);
    	    if(countPrize==0){
    	    	$(".toBuyTail").find('table').hide();
    	        $(".toBuyBottom,.toBuyCount").hide();
    	        $(".cartCount").hide();
    	        $(".toBuyEmptyB,.toBuyEmptyM,.toBuyEmptyT").show();
    	    }
    	    countPrice();
    	});
    }

$(document).ready(function(){
	
	//加载时购物车页面显示
	var countPrize=$('.toBuyTail').find('tr').length/2;
	if(countPrize==0){
		$(".cartCount").hide();
	}
	
	//点击删除/确认删除
	deleteBtn();
	confirmDelete();
	
	//取消删除
	$('.toBuyDel div span:odd,.shade,.STbottom').on('click',function(){
		$('.shade').hide();
	    $('.toBuyDel').hide();
	    $('.TBDel').hide();
	    $('.shareTo').slideUp();
	});
	
	
	//去购物
	$('.toBuyEmptyB span').on('tap',function(){
		var SW=screen.width;
		$("#mainPart").css("margin-left","0px");
		$(".footerHomeWrap span").eq(0).css("color","rgb(225,51,61)");
		$(".footerHomeWrap img").eq(0).attr("src",homeRedUrl);
		$(".footerHomeWrap span").eq(3).css("color","rgb(157,157,170)");
		$(".footerHomeWrap img").eq(3).attr("src",cartGrayUrl);
	});
	
	//购物车商品数量统计
	 prizeCount();
	
	//夺金币总计
	countPrice();
	
	//长按弹出删除窗口

	var toBuyElement=$('.toBuyList');
	var timeout ;  
	var toBuyListElment;
	for(var i=0;i<toBuyElement.length;i++){
		toBuyElement.eq(i).bind('touchstart',function() {  
			toBuyListElment=$(this);
		    timeout = setTimeout(function() {  
		        $('.TBDel').show();
		        $('.shade').show();
		    }, 500);  
		});
		toBuyElement.eq(i).bind('touchmove',function() {  
		    clearTimeout(timeout);  
		});  
		toBuyElement.eq(i).bind('touchend',function() {  
		    clearTimeout(timeout);  
		});  
	}
	//长按确认删除
	$('.TBDel').on('click',function(){
		toBuyListElment.remove();
		$('.shade').hide();
	    $('.TBDel').hide();
	    setTimeout(function(){
	    	toBuyScroll.refresh();
	    },0);
	    var countPrize=$('.toBuyTail').find('tr').length/2;
	    $('.toBuyCountLeft').find('i').eq(1).text(countPrize);
	    $('.cartCount').text(countPrize);
	    if(countPrize==0){
	    	$(".toBuyTail").find('table').hide();
	        $(".toBuyBottom,.toBuyCount").hide();
	        $(".cartCount").hide();
	        $(".toBuyEmptyB,.toBuyEmptyM,.toBuyEmptyT").show();
	    }
	    countPrice();
	});
});

//信息提示框
function Msg(obj){
	$('.error span').text(obj);
	$('.error').fadeIn();
	setTimeout(function(){
		$('.error').fadeOut();
	},2000);
}

//加入购物车
function addPrize(obj){
	
	var prizeId=$(obj).find("input").val();
	//ajax异步
	$.ajax({
		type:'POST',
        url:addPrizeUrl,
        data:{prizeId:prizeId},
        dataType:'text',
        success:function(data){
        	if(data.length<20){
        		Msg(data);
        	}else {
        		var countPrize=$('.toBuyTail').find('tr').length/2;
        		if(countPrize==0){
                	$(".toBuyTail").find('table').show();
        	        $(".toBuyBottom,.toBuyCount").show();
        	        $(".cartCount").show();
        	        $(".toBuyEmptyB,.toBuyEmptyM,.toBuyEmptyT").hide();
        		}
        		$(".toBuyTable").html(data);
            	setTimeout(function(){
        	    	toBuyScroll.refresh();
        	    },0);
            	prizeCount();
            	countPrice();
            	countPrice();
            	deleteBtn();
            	confirmDelete()
            	Msg("成功加入清单");        		
        	}
        	
        },
        error:function(XMLHttpRequest, textStatus, errorThrown){
            alert(errorThrown);
        } 
	});
	//阻止浏览器默认事件
	event.preventDefault();
}

//去结算
function toPay(){
	var titleStr="";
	var priceStr="";
	var idStr="";
	for(var i=0;i<$(".prizeTitle").length;i++){
		
		if(i==0){
			titleStr=$(".prizeTitle").eq(i).val();
			priceStr=$(".countPrice").eq(i).val();
			idStr=$(".prizeId").eq(i).val();
		}else{
			titleStr+="_"+$(".prizeTitle").eq(i).val();
			priceStr+="_"+$(".countPrice").eq(i).val();
			idStr+="_"+$(".prizeId").eq(i).val();
		}
	}
	$("#title").val(titleStr);
	$("#price").val(priceStr);
	$("#idStr").val(idStr);
	$("#allPay").val($('.toBuyCountLeft').find('i').eq(0).text());
	return true;
}





