$(document).ready(function(){
	var width = $('.menu_panel').width()/$('.menu').length - 40;
	$('.menu').css({width:width});

	width = $('.menu').width() * $('.menu').length + 10;
	$('.menu_box').css({width:width});

	var height = $('.menu').height();
	$('.menu_box').css({height:height});

	var left = ($('.menu_panel').width() - $('.menu_box').width())/2;
	$('.menu_box').css({left:left});

	var top = ($('.menu_panel').height() - $('.menu_box').height())/2;
	$('.menu_box').css({top:top});





});