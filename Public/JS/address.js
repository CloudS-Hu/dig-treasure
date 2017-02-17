function addressLoad(){
	$.ajax({
		type:"POST",
		url:addressLoadUrl,
		data:"",
		dataType:"text",
		success:function(data){
			if(data=='登录超时,请重新登录'){
				var div=$("<div class='outTime'>登录超时,请重新登录!</div>");
				div.appendTo("body");
			}else if(data=="[]"){
				var div=$("<div class='outTime'>您还没有添加收货地址哦!</div>");
				div.appendTo("body");
			}else{
				var addressArr=eval(data);
				for(var i=0;i<addressArr.length;i++){
					var content=$("<div class='content' id='content"+i+"'></div>");
					content.appendTo("body");
					content.append($("<div class='contentLeft' id='contentLeft"+i+"'></div>"));
					var contentLeftChildMoren=$("<img src="+addressIconUrl+" /><span class='shdz'>实物收货地址 "+(i+1)+" </span><span class='moren'>默认</span>");
					var contentLeftChild=$("<img src="+addressIconUrl+" /><span class='shdz'>实物收货地址 "+(i+1)+" </span>");
					if(addressArr[i]['isDefault']==1){
						contentLeftChildMoren.appendTo("#contentLeft"+i);
					}else{
						contentLeftChild.appendTo("#contentLeft"+i);
					}
					var contentRight=$("<div class='contenRight'><a href="+addressSetUrl+"/addressId/"+addressArr[i]['addressId']+"><span>编辑</span></a></div>");
					contentRight.appendTo("#content"+i);
					var contentTop=$("<div class='contentTop'></div>");
					contentTop.appendTo("#content"+i);
					var contentBottom=$("<div class='contentBottom' id='contentBottom"+i+"'></div>");
					contentBottom.appendTo("#content"+i);
					var consignee=$("<div class='CB'><span>收货人 : </span><i>"+addressArr[i]['addressConsignee']+"</i></div>");
					consignee.appendTo("#contentBottom"+i);
					var tel=$("<div class='CB'><span>联系方式 : </span><i>"+addressArr[i]['addressTel']+"</i></div>");
					tel.appendTo("#contentBottom"+i);
					var addressAdsDts=$("<div class='CB'><span>收货人 : </span><i>"+addressArr[i]['addressAddress']+addressArr[i]['addressDetails']+"</i></div>");
					addressAdsDts.appendTo("#contentBottom"+i);
				}
			}
		},
        error:function(XMLHttpRequest, textStatus, errorThrown){
            alert(errorThrown);
        }
	});
}


$(document).ready(function(){
	addressLoad();
});