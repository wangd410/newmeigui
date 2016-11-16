var navList = $(".navList"),
    navLinkedList = new DoublyCircularLinkedList(),
    navContent = document.getElementById("navContent")
	gerenzhongxin = document.getElementById("l3");
ifAnimated = false;


/*初始化*/
$(document).ready(function(){
	

	for(var i = 0; i < navListContent.length; i++){
		navLinkedList.append(navListContent[i]);
	}
	navLinkedList.traverse();



	navList.each(function(){
		$(this).bind("click",function(){
			if(ifAnimated == false){
				rotate($(this));
			}
		});
	})

	if(document.getElementById("canshu").innerHTML.length != 0){
		gerenzhongxin.click();
	}
});


DoublyCircularLinkedList.prototype.findNodeByText = function(text){
	var current = this.getHead(),
		indexCheck = 0,
		length = this.size();

	while(current && indexCheck++ < length){
		if (current.element.text === text) {
			return current;
		};
		current = current.next;
	}

	return false;
}

DoublyCircularLinkedList.prototype.traversePositive = function(startElement){  
	var current = this.findNodeByText(startElement),
	    indexCheck = 0,
	    length = this.size();
	navContent.style.background = current.element.color;
	navContent.innerHTML = current.element.src;
	while(current && indexCheck < length){
		navList[indexCheck].childNodes[3].innerHTML = current.element.text;
		navList[indexCheck].childNodes[1].style.background = current.element.color;
		current = current.next;
		indexCheck++;
	}
}
 


DoublyCircularLinkedList.prototype.traverse = function(){
	var current = this.getHead(),
	    indexCheck = 0,
	    length = this.size();

	while(current && indexCheck < length){
		navList[indexCheck].childNodes[3].innerHTML = current.element.text;
		navContent.innerHtml = current.element.src;
		navList[indexCheck].childNodes[1].style.background = current.element.color;
		current = current.next;
		indexCheck++;
	}

	return true;
}


function rotate(target){
	ifAnimated = true;

	var id = target.attr("id");

	if(id == "l1"){
		return true;
	}else if(id == "l4" || id =="l5"){
		if(id == 'l4') imgRotate(144)
			else imgRotate(72);
		navLinkedList.traversePositive(target.children(".text").html()); 
	}else if(id == "l2" || id == "l3"){
		if(id == 'l2') imgRotate(-72)
			else imgRotate(-144);
		navLinkedList.traversePositive(target.children(".text").html());
	}
	var a = setTimeout(function(){
		ifAnimated = false;
	},500);
}

function imgRotate(deg){
	var $img = $("#flower"),
		rotateNow = getRotate($img);
	 
	$img.rotate({
		animateTo: rotateNow + deg
	})
}

function getRotate(element){
	var rotate;

	if(element.css('transform') != 'none'){
		var str = element.css('transform');
	   	str = str.slice(7,str.length-1);
	   	str = str.replace(/ /g,'');
	   	var array = str.split(',');
	   	
	   	rotate = getmatrix(array[0],array[1],array[2],array[3],array[4],array[5]);
	   	
	}else{
		rotate = 0;
	}
	
    return rotate;
}


function getmatrix(a,b,c,d,e,f){  

	/*当前解析方法仅解析出360以内度数*/
    var aa=Math.round(180*Math.asin(a)/ Math.PI),  
    	bb=Math.round(180*Math.acos(b)/ Math.PI),  
    	cc=Math.round(180*Math.asin(c)/ Math.PI),  
    	dd=Math.round(180*Math.acos(d)/ Math.PI),  
    	deg=0;  

    if(aa==bb||-aa==bb){  
        deg=dd;  
    }else if(-aa+bb==180){  
        deg=180+cc;  
    }else if(aa+bb==180){  
        deg=360-cc||360-dd;  
    }  
    return deg;
    /*return deg>=360?0:deg; */ 
    //return (aa+','+bb+','+cc+','+dd);  
}  
