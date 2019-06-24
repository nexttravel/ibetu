$(document).ready(function(){
	var i=0, j=0, z=0;

	// cal_panel의 left (달력 박스와 month 박스를 감싸는 panel)
	var left = ($(window).width() - $('.cal_panel').width())/2;
	$('.cal_panel').css({left:left});

	// month_box의 width (달력 박스)
	var width = $('.before_month').width() + $('.month').width() +$('.next_month').width() + 36;
	$('.month_box').css({width:width});

	// month_box의 left (달력 박스)
	var left = ($(window).width() - $('.month_box').width())/2;
	$('.month_box').css({left:left});

	// cal_day_colm의 width (요일 박스)
	width = $('.cal_day_row').width()/7;
	$('.cal_day_colm').css({width:width-1});

	// // cal_date_colm의 width (날짜 박스)
	$('.cal_date_colm').css({width:width-1});

	// cal_date_colm의 height (날짜 박스)
	var height = ($('.cal_box').height() - $('.cal_day_row').height())/5;
	$('.cal_date_colm').css({height:height});

	// cal_date_colm의 left : absolute라서 일일이 설정해줘야함. (날짜 박스)
	$('.cal_date_colm').each(function(index){
		$(this).attr('cal_date_colm-index',index);
		left = j * width;
		$(this).css({left:left});
		j++;
		if(j%7 == 0) j = 0;
	});

	//// cal_date_colm의 top : absolute라서 일일이 설정해줘야함. (날짜 박스)
	$('.cal_date_row').each(function(index){
		var top = index * height + $('.cal_day_row').height();
		$(this).css({top:top});
	});

	// game_box_row의 height
	height = ($('.cal_date_colm').height() - $('.date').height())/5 - 7.8;
	$('.game_box_row').css({height:height});
    
    // game의 top
	top = ($('.game_box_row').height() - $('.game').height())/2;
	$('.game').css({top:top});

	$('.expand_colm').each(function(index){
		$(this).attr('expand_colm-index', index);
	});

	//cal_date_colm의 확장 버튼
	width = width*2;
	$('.expand_btn').each(function(index){
		$(this).attr('expand_btn-index', index);
	}).click(function(){
		$('.expand_colm[expand_colm-index=' + index + ']').animate({'width': width}, 500).css({'z-index':1});
	});

	// // cal_date_colm의 확장 버튼 
	// $('.expand_btn').click(function(){
	// 	width = width*2;
	// 	$('.expand_colm').animate({'width': width}, 500).css({'z-index':1});
	// });

});