$(document).ready(function() {

	$(".home span").bind('click',function() {
		var picNow = $(this).attr('q');
		var nowAngle = parseInt($(".home").attr('currentAngle'));
		if (picNow == 2) {
			fun2(nowAngle);
			$(".mainPic").animate({left: "-22%"}, 500);
			$(".home").hide();
			$(".together .backGround").css('backgroundColor', '#cddbe5');
			$(".backGround .commentCon").show();
			$(".together .bg").fadeIn("slow");
			$(".difPage .comment").fadeIn("2000");
		} else if (picNow == 3) {
			fun3(nowAngle);
			$(".mainPic").animate({left: "-22%"}, 500);
			$(".home").hide();
			$(".together .backGround").css('backgroundColor', '#fee8af');
			$(".backGround .adCon").show();
			$(".together .bg").fadeIn("slow");
			$(".ad").fadeIn("2000");
		} else if (picNow == 4) {
			location.href = "personalCenter.html";
		} else if(picNow == 5){
			fun5(nowAngle);
			$(".mainPic").animate({left: "-22%"}, 500);
			$(".home").hide();
			$(".together .backGround").css('backgroundColor', '#b69da1');
			$(".backGround .infoCon").show();
			$(".together .bg").fadeIn("slow");
			$(".difPage .personInfo").fadeIn("2000");
		}else{
			$(".mainPic").animate({left: "-22%"}, 500);
			$(".home").hide();
			$(".together .backGround").css('backgroundColor', '#97a188');
			$(".backGround .rankCon").show();
			$(".together .bg").fadeIn("slow");
			$(".rank").fadeIn("2000");
		};
	});


	$(".difPage .font span").bind('click',function() {
		var picNow = $(this).attr('q');
		var nowAngle = parseInt($(".home").attr('currentAngle'));
		if (picNow == 2) {
			fun2(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difCon");
			rotateContent(whichOne,thisParents); 
		} else if (picNow == 3) {
			fun3(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difCon");
			rotateContent(whichOne,thisParents); 
		} else if (picNow == 4) {
			fun4(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difCon");
			rotateContent(whichOne,thisParents); 
		} else if(picNow == 5){
			fun5(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difCon");
			rotateContent(whichOne,thisParents); 
		}else{
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difCon");
			rotateContent(whichOne,thisParents); 
		};
	});


	function fun2 (nowAngle) {
		console.log(nowAngle);
		var changeAngle = nowAngle + 288;
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
	};
	function fun3 (nowAngle) {
		console.log(nowAngle);
		var changeAngle = nowAngle + 216;
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
	};
	function fun4 (nowAngle) {
		console.log(nowAngle);
		var changeAngle = nowAngle + 144;
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
	};
	function fun5 (nowAngle) {
		console.log(nowAngle);
		var changeAngle = nowAngle + 72;
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
	};

	function rotateContent(whichOne,thisParents){
		if (whichOne == "font1") {
			thisParents.fadeOut("fast");
			thisParents.siblings('.difCon').hide();
		} else if (whichOne == "font2") {
			thisParents.fadeOut("fast");
			thisParents.siblings('.difCon').hide();
			$(".commonCon").hide();
			$(".together .backGround").css('backgroundColor', '#b69da1');
			$(".infoCon").fadeIn("slow");
			$(".personInfo").fadeIn("slow");
		} else if (whichOne == "font3") {
			console.log('黄色');
			thisParents.fadeOut("fast");
			thisParents.siblings('.difCon').hide();
			$(".commonCon").hide();
			$(".together .backGround").css('backgroundColor', '#fee8af');
			$(".adCon").fadeIn("slow");
			$(".ad").fadeIn("slow");
		} else if (whichOne == "font4") {
			thisParents.fadeOut("fast");
			thisParents.siblings('.difCon').hide();
			$(".commonCon").hide();
			$(".together .backGround").css('backgroundColor', '#868953');
			$(".rankCon").fadeIn("slow");
			$(".rank").fadeIn("slow");
		} else {
			thisParents.fadeOut("fast");
			thisParents.siblings('.difCon').hide();
			$(".commonCon").hide();
			$(".together .backGround").css('backgroundColor', '#cddbe5');
			$(".commentCon").fadeIn("slow");
			$(".comment").fadeIn("slow");
		}
	};
	$(".fontLeft").each(function(){
		var maxwidth=5;
		if($(this).text().length>maxwidth){
			$(this).text($(this).text().substring(0,maxwidth));
			$(this).html($(this).html()+'…');
		}
	});
	$(".infoLeft p").each(function(){
		var maxwidth=140;
		if($(this).text().length>maxwidth){
			$(this).text($(this).text().substring(0,maxwidth));
			$(this).html($(this).html()+'…');
		}
	});
	$(".commentCon .buttonFont p").each(function(){
		var maxwidth=25;
		if($(this).text().length>maxwidth){
			$(this).text($(this).text().substring(0,maxwidth));
			$(this).html($(this).html()+'…');
		}
	});
});