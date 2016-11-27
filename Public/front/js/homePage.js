$(document).ready(function() {
	var screenHeight = $(document).height();
	var avgHeight = screenHeight / 2.5;
	$("#wrapTop").css('height', avgHeight);

	$(".home span").bind('click',function() {
		var picNow = $(this).attr('q');
		var nowAngle = parseInt($(".home").attr('currentAngle'));
		if (picNow == 2) {
			fun2(nowAngle);
			$(".mainPic").animate({left: "120px"}, 1000);
			$(".home").hide();
			$(".difPage2").show('slow');
		} else if (picNow == 3) {
			fun3(nowAngle);
			$(".mainPic").animate({left: "120px"}, 1000);
			$(".home").hide();
			$(".difPage3").show('slow');
		} else if (picNow == 4) {
			fun4(nowAngle);
			$(".home").hide();
			$(".difPage4").show('500');
		} else if(picNow == 5){
			fun5(nowAngle);
			$(".mainPic").animate({left: "120px"}, 1000);
			$(".home").hide();
			$(".difPage5").show('slow');
		}else{
			$(".mainPic").animate({left: "120px"}, 1000);
			$(".home").hide();
			$(".difPage1").show('slow');
		};
	});
	$(".difPage .font span").bind('click',function() {
		var picNow = $(this).attr('q');
		var nowAngle = parseInt(0);
		var test = $(this).parents();
		console.log(test);
		if (picNow == 2) {
			console.log('2');
			fun2(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difPage");
			rotateContent(whichOne,thisParents);
			console.log(test);
		} else if (picNow == 3) {
			console.log('3');
			fun3(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difPage");
			rotateContent(whichOne,thisParents);
			console.log(test);
		} else if (picNow == 4) {
			console.log('4');
			fun4(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difPage");
			rotateContent(whichOne,thisParents);
			console.log(test);
		} else if(picNow == 5){
			console.log('5');
			fun5(nowAngle);
			var whichOne = $(this).attr('class');
			var thisParents = $(this).parents(".difPage");
			rotateContent(whichOne,thisParents);
			console.log(test);
		}else{
			console.log('1');
			console.log(test);
		};
	});
	function fun2 (nowAngle) {
		var changeAngle = nowAngle + 288;
		console.log(changeAngle);
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
		$("span").each(function() {
			var a = parseInt($(this).attr('q'));
			if (a < 2) {
				var b = a + 4;
				$(this).attr('q', b);
			} else {
				var c = a - 1;
				$(this).attr('q', c);
			}	
		});
	};
	function fun3 (nowAngle) {
		var nowAngle = parseInt($(".home").attr('currentAngle'));
		var changeAngle = nowAngle + 216;
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
		$("span").each(function() {
			var a = parseInt($(this).attr('q'));
			if (a < 3) {
				var b = a + 3;
				$(this).attr('q', b);
			} else {
				var c = a-2;
				$(this).attr('q', c);
			}
		});
	};
	function fun4 (nowAngle) {
		var nowAngle = parseInt($(".home").attr('currentAngle'));
		var changeAngle = nowAngle + 144;
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
		$("span").each(function() {
			var a = parseInt($(this).attr('q'));
			if (a < 4) {
				var b = a + 2;
				$(this).attr('q', b);
			} else {
				var c = a-3;
				$(this).attr('q', c);
			}
		});
	};
	function fun5 (nowAngle) {
		var nowAngle = parseInt($(".home").attr('currentAngle'));
		var changeAngle = nowAngle + 72;
		$(".home").attr('currentAngle', changeAngle);
		$(".mainPic").rotate({animateTo:changeAngle});
		$("span").each(function() {
			var a = parseInt($(this).attr('q'));
			if (a < 5) {
				var b = a + 1;
				$(this).attr('q', b);
			} else {
				var c = a - 4;
				$(this).attr('q', c);
			}
		});
	};

	function rotateContent(whichOne,thisParents){
		if (whichOne == "font1") {
			console.log('橙色');
			thisParents.fadeOut("fast");
			thisParents.siblings('difPage').hide();
			$(".difPage4").fadeIn("slow");
		} else if (whichOne == "font2") {
			console.log('紫色');
			thisParents.fadeOut("fast");
			thisParents.siblings('difPage').hide();
			$(".difPage5").fadeIn("slow");
		} else if (whichOne == "font3") {
			console.log('黄色');
			thisParents.fadeOut("fast");
			thisParents.siblings('difPage').hide();
			$(".difPage3").fadeIn("slow");
		} else if (whichOne == "font4") {
			console.log('绿色');
			thisParents.fadeOut("fast");
			thisParents.siblings('difPage').hide();
			$(".difPage1").fadeIn("slow");
		} else {
			console.log('蓝色');
			thisParents.fadeOut("fast");
			thisParents.siblings('difPage').hide();
			$(".difPage2").fadeIn("slow");
		}
	};

});