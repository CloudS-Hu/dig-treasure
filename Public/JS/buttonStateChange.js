//初始化操作函数
function buttonInital(){
	//对五个按钮进行颜色和图片初始化
	for(var i=0;i<5;i++){
		var a=$(".footerHomeWrap img:eq("+i+")").attr("src");
		var ab=a.replace("red", "gray");
		$(".footerHomeWrap img:eq("+i+")").attr("src",ab);
		$(".footerHomeWrap span").css("color","rgb(157,157,170)");
	}
}
//按钮点击事件函数
function buttonSC(obj){
	//所有按钮初始化操作
	buttonInital();
	//获取当前按钮图片地址
	var a=$(obj).find("img").attr("src");
	//替换当前按钮图片地址关键字
	var ab=a.replace("gray", "red");
	//当前按钮文字颜色变更
	$(obj).find("span").css("color","rgb(225,51,61)");
	//当前按钮图片替换
	$(obj).find("img").attr("src",ab);
	//获取当前按钮的name值
	var n=$(obj).attr("name");
	//将name值强转为int型
	var num=parseInt(n);
	//获取屏幕宽度
	var SW=screen.width;
	//切换到按钮指向的页面位置
	$("#mainPart").css("margin-left",-num*SW+"px");
}