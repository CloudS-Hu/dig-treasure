<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="font-size:100px;">

	<head>
		<!--设置编码-->
		<meta charset="UTF-8">
		<!--设置设备屏幕自适应及用户缩放特性-->
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, 
			width=device-width, user-scalable=no">
		<title>home</title>
		<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.0.js"></script>
		<script type="text/javascript">
		    var showProvinceUrl="__APP__/User/showProvince";
		    var showCityUrl="__APP__/User/showCity";
		    var showAreaUrl="__APP__/User/showArea";
		    var addressUrl="__APP__/User/address";
		    var addAddressUrl="__APP__/User/addAddress";
			$(document).ready(function(){
				var btnDown=false;
				$('.btn').on('click',function(){
					if(btnDown==false){
						$('.btn div b').animate({marginRight:"0.16rem"},500,function(){
							$('.btn div').css('background-color','rgb(147,147,147)');
							$('.btn div b').css('background-color','white');
							$('.btn div b').css('border','1px solid rgb(133,133,133)');
						});
						btnDown=true;
					}else if(btnDown){
						$('.btn div b').animate({marginRight:"0"},500,function(){
							$('.btn div').css('background-color',' rgb(109,190,183)');
							$('.btn div b').css('background-color','rgb(0,150,136)');
							$('.btn div b').css('border','0');
						});
						btnDown=false;
					}
				});
				$('.shade,.address,.addressDel,.shengSelect,.shiSelect,.quSelect,.error').hide();
			});

			//省份信息下拉展示
		    function addXiala(){
		    	$('.shade,.address').show();
		    }

		    //动作切换时隐藏
		    function shadeHide(){
		    	$('.shade,.address').hide();
		    }


		    //选择地区
            function select(obj){
                $('.qu input').val($(obj).text());    
            }
            

            //显示区信息
		    var quArr={};
        	function quSelect(obj){
            	$('.shi input').val($(obj).text());
            	$('.qu input').val("");
                $.ajax({
                    type:'POST',
                    url:showAreaUrl,
                    data:{shiName:$(obj).text()},
                    dataType:'text',
                    success:function(data){
                    	$('.quSelect').slideDown().html("");
                    	var quStr=data.substring(1,data.length-1);
                    	quArr= eval("["+quStr+"]");
                    	for(var i=0;i<quArr.length-1;i++){
                        	var span=$("<span onclick='select(this)'>"+quArr[i]['areaname']+"</span>");
                        	$('.quSelect').append(span);
                        }
                    },
                    error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert(errorThrown);
                    }  
                });
            }


        	//显示市信息
		    var shiArr={};
        	function shiSelect(obj){
            	$('.sheng input').val($(obj).text());
            	$('.shi input,.qu input').val("");
                $.ajax({
                    type:'POST',
                    url:showCityUrl,
                    data:{shengName:$(obj).text()},
                    dataType:'text',
                    success:function(data){
                    	$('.shiSelect').slideDown().html("");
                    	$('.quSelect').slideUp();
                    	var shiStr=data.substring(1,data.length-1);
                    	shiArr= eval("["+shiStr+"]");
                    	for(var i=0;i<shiArr.length-1;i++){
                        	var span=$("<span onclick='quSelect(this)'>"+shiArr[i]['areaname']+"</span>");
                        	$('.shiSelect').append(span);
                        }
                    },
                    error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert(errorThrown);
                    }  
                });
            }
		    
		    
        	//显示省份信息
            var shengArr={};
            function shengSelect(){
                $.ajax({
                	type:'POST',
                	url:showProvinceUrl,
                	data:"",
                    dataType:'text',
                    success:function(data){
                	    $('.shengSelect').slideDown();
                        var shengStr=data.substring(1,data.length-1);
                        shengArr= eval("["+shengStr+"]");
                        for(var i=0;i<shengArr.length-1;i++){
                        	var span=$("<span onclick='shiSelect(this)'>"+shengArr[i]['areaname']+"</span>");
                        	$('.shengSelect').append(span);
                        }
                    },        
                    error:function(XMLHttpRequest, textStatus, errorThrown){
                        alert(errorThrown);
                    }           
                });
            }


            function confirm(){
                var address=$('.sheng input').val()+" "+$('.shi input').val()+" "+$('.qu input').val();
                $('#SSQ i').text(address);
                shadeHide();
            }

            function saveMsg(obj){
            	$('.error span').text(obj);
            	$('.error').fadeIn();
            	setTimeout(function(){
            		$('.error').fadeOut();
            	},3000);
            }
           //设置默认值开关
            var isDefault=1;
            function isD(){
            	if(isDefault){
            		isDefault=0;
                }else {
                	isDefault=1;
                }
            }
            
            //提交数据保存
            function addressSave(){
                if($("#consignee").val()==""){
            		saveMsg('收货人不能为空!');
                }else if($("#tel").val()==""){
                	saveMsg('手机号码不能为空!');
                }else if($("#address1").text()==""){
                	saveMsg('省、市、区不能为空!');
                }else if($("#address2").val()==""){
                	saveMsg('详细地址不能为空!');
                }else{
                	$.ajax({
                        url:addAddressUrl,
                        type:'POST',
                        dataType:'text',
                        data:{addressConsignee:$('#consignee').val(),addressAddress:$("#address1").text(),addressDetails:$("#address2").val(),addressTel:$('#tel').val(),isDefault:isDefault},
                        beforeSend:function(){
                        	$('.error span').text('保存中');
                        	$('.error').fadeIn();
    					},
                        success:function(data){
                            saveMsg(data);
                            setTimeout(function(){
                        		window.location.href=addressUrl;
                            },3000);
                        },
                        error:function(){
                        	saveMsg('连接超时,请检查网络');
    					}
                    });
                }
                
            }



            
		</script>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/addressAdd.css"/>
	</head>

	<body style="font-size: 0px;">
		<div class="shade" onclick="shadeHide()"></div>
		<!--内容主体-->
		<div class="Header">
			<div class="back">
				<a href="__APP__/User/address"><img src="__PUBLIC__/images/icon/back.png" /> </a>
			</div>
			<div class="Title"><span>添加实物收货地址</span></div>
			<div class="buyList" onclick="shanchu()">
				<span>删除</span>
			</div>
		</div>	
		<div class="contentTop"></div>
		<div class="contentBottom">
			<div class="CB">
				<span>收货人</span><i><input id="consignee" value="" /></i>
			</div>
			<div class="CB">
				<span>手机号码</span><i><input id="tel" value="" /> </i>
			</div>
			<div class="CB" id="SSQ" onclick="addXiala()">
				<span>省市区</span><i id="address1"></i><div class="xiala">▼</div>
			</div>
			<div class="CB">
				<span>详细地址</span><i><textarea id="address2"></textarea> </i>
			</div>
			<div class="CB">
				<span>设为默认值</span>
				<div class="btn" onclick="isD()"><div class="botton"><b class="bottonHand"></b> </div></div>
			</div>
			<div class="conplain"> 
				<span>(实物收货地址用于实物奖品中奖后的发货,最多可添加3个)</span>
			</div>
			<div class="save" onclick="addressSave()">保存</div>
		</div>
		
		<div class="address">
			<div class="top">
				<div class="addressHead"><b>请选择省、市、 区 ：</b> </div>
				<div class="addressContent">
				    <div class="addressInput">
				        <div class="sheng"  onclick="shengSelect()"><input placeholder="请选择省" readonly="readonly" ><span>▼</span> </div>
				        <div class="shi"><input placeholder="请选择市"  readonly="readonly" ><span>▼</span>  </div>
				        <div class="qu"><input placeholder="请选择区"  readonly="readonly" ><span>▼</span>  </div>
				    </div>
				    <div class="addressSelect">
				        <div class="shengSelect"></div>
				        <div class="shiSelect"></div>
				        <div class="quSelect"></div>
				    </div>
				</div>
			</div>
			<div class="bottom">
				<span onclick="shadeHide()">取消</span>
			    <span onclick="confirm()">确定</span>
			</div>
		</div>
		<div class="error">
			<span></span>
		</div>
	</body>

</html>