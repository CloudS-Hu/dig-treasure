var homeScroll;
var newestScroll;
var baskScroll;
var toBuyScroll;
var myScroll;
function buildScroll(obj){
	Scroll = new IScroll(obj, 
		{
			mouseWheel: true,
			click:true,
//			bounce:false,
			disableMouse:true,
			disablePointer:true,
			scrollX:false,
			tap:true,
			probeType:2
		});
	//定义输入框失去焦点
	Scroll.on('beforeScrollStart',function(){
	    if(!!document.activeElement){
	        window.scrollTo(0, 0);
	        document.activeElement.blur();
	        countPrice();
	    }
	});
	//标题悬停
	setInterval(function(){
		var ScollY = homeScroll.y;
		judge(ScollY);
	},0);
	//滑动判断及阻止
	Scroll.on('scroll',function(){
	     if(swipeY&&Math.abs(XX-xx)-Math.abs(YY-yy)<0){
	     	swipeX=false;
	     }
	     else if(swipeX&&Math.abs(XX-xx)-Math.abs(YY-yy)>0){
	     	swipeY=false;
	     }
	});
    return Scroll;
}
function loaded () {
	homeScroll =buildScroll('.homeTail');
	newestScroll= buildScroll('.newestTail');
	baskScroll = buildScroll('.baskTail') ;
	toBuyScroll = buildScroll('.toBuyTail');
	myScroll = buildScroll('.my');
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
