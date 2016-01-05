//getMac
function getMac(){
    var checkedDevice = document.getElementsByName('checkedDevice');
    var Mac_name_string = '';
    for(var i=0; i< checkedDevice.length; i++){
        if(checkedDevice[i].checked == true){
            var Mac_obj = checkedDevice[i].parentNode.nextSibling.nextSibling;
            var Mac_name = Mac_obj.innerHTML;  
            Mac_name_string = Mac_name_string + Mac_name + '_';
        } 
    }

    return Mac_name_string;
}

//
function openDiv(newDivID)
{
    //one mac selected at least
    var Macs_string = getMac();
    if(!Macs_string){
        alert('请至少选择一项');
        return;
    }
    
    //遮罩层
    var newMaskID = "mask";  //遮罩层id
    var  newMaskWidth =document.body.scrollWidth;//遮罩层宽度
    var  newMaskHeight =document.body.scrollHeight;//遮罩层高度    
      //mask遮罩层  
    var newMask = document.createElement("div");//创建遮罩层
    newMask.id = newMaskID;//设置遮罩层id
    newMask.style.position = "absolute";//遮罩层位置
    newMask.style.zIndex = "1";//遮罩层zIndex
    newMask.style.width = newMaskWidth + "px";//设置遮罩层宽度
    newMask.style.height = newMaskHeight + "px";//设置遮罩层高度
    newMask.style.top = "0px";//设置遮罩层于上边距离
    newMask.style.left = "0px";//设置遮罩层左边距离
    newMask.style.background = "white";//#33393C//遮罩层背景色
    newMask.style.filter = "alpha(opacity=40)";//遮罩层透明度IE
    newMask.style.opacity = "0.40";//遮罩层透明度FF
    document.body.appendChild(newMask);//遮罩层添加到DOM中
   
    //新弹出层
    var newDivWidth = 400;//新弹出层宽度
    var newDivHeight = 150;//新弹出层高度
    var newDiv = document.createElement("div");//创建新弹出层
    newDiv.id = newDivID;//设置新弹出层ＩＤ
    newDiv.style.position = "absolute";//新弹出层位置
    newDiv.style.zIndex = "9999";//新弹出层zIndex
 
    newDiv.style.width = newDivWidth + "px";//新弹出层宽度
    newDiv.style.height = newDivHeight + "px";//新弹出层高度
    var newDivtop=(document.body.scrollTop + document.body.clientHeight/2 
          - newDivHeight/2) ;//新弹出层距离上边距离
    var newDivleft=(document.body.scrollLeft + document.body.clientWidth/2 
            - newDivWidth/2);//新弹出层距离左边距离
    newDiv.style.top = newDivtop+ "px";//新弹出层距离上边距离
    newDiv.style.left = newDivleft + "px";//新弹出层距离左边距离
    newDiv.style.background = "#337ab7";//新弹出层背景色
    newDiv.style.border = "1px solid #337ab7";///新弹出层边框样式
    newDiv.style.padding = "5px";//新弹出层
    //newDiv.innerHTML = "此处添加内容";//新弹出层内容
    document.body.appendChild(newDiv);//新弹出层添加到DOM中
	
   
    //弹出层滚动居中
    function newDivCenter()
    {
       newDiv.style.top = (document.body.scrollTop + document.body.clientHeight/2 
                 - newDivHeight/2) + "px";
       newDiv.style.left = (document.body.scrollLeft + document.body.clientWidth/2
                - newDivWidth/2) + "px";
    }
    if(document.all)//处理滚动事件，使弹出层始终居中
    {
        window.attachEvent("onscroll",newDivCenter);
    }
    else
    {
        window.addEventListener('scroll',newDivCenter,false);
    }

	
    //关闭新图层和mask遮罩层

    var newA = document.createElement("span");
    newA.href = "#";
    newA.style.position = "absolute";//span位置
    newA.style.left=370+ "px";
	newA.style.background = '';
    newA.innerHTML = "关闭";
    newA.onclick = function()//处理关闭事件
    {
        if(document.all)
        {
            window.detachEvent("onscroll",newDivCenter);
        }
        else
        {
            window.removeEventListener('scroll',newDivCenter,false);
        }
         document.body.removeChild(newMask);//移除遮罩层   
         document.body.removeChild(newDiv);////移除弹出框
        return false;
    }
    newDiv.appendChild(newA);//添加关闭span
	
	//title'Order'	
    var Order_title = document.createElement("span");
    Order_title.style.position = "absolute";//span位置
    Order_title.style.left=5+ "px";
	Order_title.style.width = 200 + 'px';
	Order_title.style.height = 20 + 'px';
	Order_title.style.background = '';
    Order_title.innerHTML = "Order";
    newDiv.appendChild(Order_title);//添加关闭span
	//textarea	
    var order_Div = document.createElement("span");
    order_Div.style.position = "absolute";//span位置
    order_Div.style.left=5+ "px";
	order_Div.style.top = 33 + 'px';
	order_Div.style.width = 390 + 'px';
	order_Div.style.height = 50 + 'px';
	order_Div.style.background = '';
    order_Div.innerHTML = "<textarea rows='3' cols='52'>";
    newDiv.appendChild(order_Div);//添加关闭span
	//submit button	
    var submit_Div = document.createElement("span");
    submit_Div.style.position = "absolute";//span位置
    submit_Div.style.left=5+ "px";
	submit_Div.style.top = 100 + 'px';
	submit_Div.style.width = 390 + 'px';
	submit_Div.style.height = 25 + 'px';
	submit_Div.style.background = '';
    submit_Div.innerHTML = "<input type='submit' name='publish_order' value='下发命令'>";
    newDiv.appendChild(submit_Div);//添加关闭span	
             
    //获取Order
    var order = order_Div.firstChild;
    var orderButton = submit_Div.firstChild;   
    orderButton.onclick = function(){
        var order_string = order.value;
        var Macs_order_string = Macs_string + order_string;
        window.open('/device/order/'+Macs_order_string, '_self');
    }
}
