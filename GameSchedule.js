$(document).ready(function(){
	var left = ($(window).width() - $('.cal_panel').width())/2;
	$('.cal_panel').css({left:left});

	var width = $('.before_month').width() + $('.month').width() +$('.next_month').width() + 36;
	$('.month_box').css({width:width});

	var left = ($(window).width() - $('.month_box').width())/2;
	$('.month_box').css({left:left});


	var height = ($('.cal_box').height() - $('.cal_day_row').height())/5;
	$('.cal_date_colm').css({height:height});

	width = $('.cal_day_row').width()/7;
	$('.cal_day_colm').css({width:width-1});
	$('.cal_date_colm').css({width:width-1});

	height = ($('.cal_date_colm').height() - $('.date').height())/5 - 7.8;
	$('.game_box_row').css({height:height});

	var top = ($('.game_box_row').height() - $('.game').height())/2;
	$('.game').css({top:top});

	$('.expand_btn').click(function(){
			
	});

});