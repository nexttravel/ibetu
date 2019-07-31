<?php
	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	$con = mysqli_connect("localhost", "newtrip", "qkqhajdcjddl5!", "newtrip")or die("DB connect error");
?>

<!DOCTYPE html>
<html>
<head>
	<title>KBO Tipster</title>
	<meta charset="utf-8">
	<link rel='stylesheet' href='PremiumBoard.css' type='text/css'>
	<link rel='stylesheet' href='scroll_panel_menu.css'>
	<script src='http://code.jquery.com/jquery-3.3.1.js'></script>
	<script src="scroll_panel_menu.js"></script>
</head>

<script>
	$(document).ready(function(){
		//스크롤 위치 기억
		if(sessionStorage.getItem('page_scroll_position')){  
       		$('.page').scrollTop(sessionStorage.getItem('page_scroll_position'));
    	}

    	var height = $('.write_btn').height() + 20;
    	$('.board_top_box').css({height:height});

    	var left = $('.board_top_box').width() - $('.line_up_box').width() - 2;
    	$('.line_up_box').css({left:left});

		var left = ($(window).width() - $('.board_panel').width())/2;
		$('.board_panel').css({left:left});
		var left = ($('.board_panel').width() - $('.page_num_box').width())/2;
		$('.page_num_box').css({left:left});
	
		$('.page_num').each(function(index){
			$(this).attr('page_num-index', index);
		}).click(function(){
			var index = $(this).attr('page_num-index');
			$('.page_num[page_num-index=' + index + ']').addClass('clicked_page_num');
			$('.page_num[page_num-index!=' + index + ']').removeClass('clicked_page_num');
		});
	});
</script>

<body>
	<div class="panel">
		<div class="menu_panel">
			<div class="menu_box">
				<div class="menu" onclick="location.href='index.php'">HOME</div>
				<!-- <div class="menu">ABOUT US</div> -->
				<div class="menu menu_clicked" onclick="location.href='premiumboard.php'">프리미엄 TIPS</div>
				<!-- <div class="menu" onclick="location.href='legendboard.php'">레전드 TIPS</div> -->
				<div class="menu" onclick="location.href='freeboard.php'">FREE TIPS</div>	
				<div class="menu" onclick="location.href='TipsterRank.html'">TIPS RANKING</div>
				<div class="menu" onclick="window.open('https://sports.news.naver.com/kbaseball/schedule/index.nhn')">경기 일정</div>
				<!-- <div class="menu">NEWS</div> -->
				<div class="menu">MY PAGE</div>
				<div class="menu">CONTACT</div>
				<?
					if(empty($_SESSION["signed_id"])){
						echo "<div class='menu yellow' onclick=location.href='http://newtrip.cafe24.com/login.php'>LOGIN</div>";

					}
					else{
						echo "<div class='menu yellow sign_out'>LOGOUT</div>";
					}
				?>
				
				<!-- <div class="menu">관련 사이트</div> -->
			</div>
		</div>

		<div class="board_panel">

			<div class="board_top_box">
				<div class="write_btn" onclick="location.href='write.php'">글쓰기</div>
				
				<div class="line_up_box"> 
					<select class="line_up" name="line_up">
					    <option value="0">최신순</option>
					    <option value="1">랭킹순</option>
					    <option value="2">조회순</option>
					</select>
				</div>
			</div>
			
			<div class="post_box">
				<div class="post_row post_row_index">
					<div class="post_column post_id">ID</div>
					<div class="post_column post_ttl">Title</div>
					<div class="post_column post_game">Game</div>
					<div class="post_column post_view">View</div>
					<div class="post_column post_date">Date</div>
				</div>

				<?
	               	if(isset($_GET['page_num'])){
	                  	$page_num = $_GET['page_num'];

	                  	$page_number = ($page_num-1) * 20 + 1; 

	                  	$query = "SELECT * FROM boardTBL WHERE idx BETWEEN $page_number AND $page_number+19;";
	                  	$result = mysqli_query($con, $query); 

	                  	while($row = mysqli_fetch_array($result)){
	                  		$idx = $row['idx'];
	                    	$title = $row['title'];
	                    	$game = $row['game'];
	                    	$view = $row['views'];
	                    	$mdate = $row['mdate'];

	                    	echo "<div class='post_row post_row_hover'>
	                           		<a class='post_column post_id' href=tip.php?idx=$idx>A_user</a>
	                           		<a class='post_column post_ttl' href=tip.php?idx=$idx>".$title."</a>
	                           		<a class='post_column post_game' href=tip.php?idx=$idx>".$game."</a>
	                           		<a class='post_column post_view' href=tip.php?idx=$idx>".$view."</a>
	                          		<a class='post_column post_date' href=tip.php?idx=$idx>".$mdate."</a>
	                         	 </div>";

	                  	}
	              	}

	               	else{
	               		$query = "SELECT * FROM boardTBL WHERE idx BETWEEN 1 AND 20;";
	                  	$result = mysqli_query($con, $query); 

	                 	while($row = mysqli_fetch_array($result)){
	                 		$idx = $row['idx'];
	                     	$title = $row['title'];
	                     	$view = $row['views'];
	                     	$mdate = $row['mdate'];

	                    	echo "<div class='post_row post_row_hover'>
	                           		<a class='post_column post_id' href=tip.php?idx=$idx>A_user</a>
	                           		<a class='post_column post_ttl' href=tip.php?idx=$idx>".$title."</a>
	                           		<a class='post_column post_game' href=tip.php?idx=$idx>".$game."</a>
	                           		<a class='post_column post_view' href=tip.php?idx=$idx>".$view."</a>
	                          		<a class='post_column post_date' href=tip.php?idx=$idx>".$mdate."</a>
	                         	 </div>";
	                  }
	               }

            	?>				
			</div>

			<form method="GET">
				<div class="page_num_box">
					<?
					$query = "SELECT * FROM boardTBL;";
					$result = mysqli_query($con, $query); 
					$post_num = mysqli_num_rows($result);

					if($post_num%20 == 0) $max_page_num = $post_num%20;
					else $max_page_num = intval($post_num/20) + 1;

					for($i=1; $i<=$max_page_num; $i++){
						echo "<button class=page_num type=submit name=page_num value=".$i.">".$i."</button>";
					}
					?>	
				</div>
			</form>

		</div>
	</div>
</body>

<script>
	//스크롤 위치 기억
	function(){
   		var page_scrollTop = $('.page').scrollTop();
        //SESSION 저장소를 사용하여 스크롤 위치 값(scrollTop)을 저장하고
   	 	sessionStorage.setItem('page_scroll_position', page_scrollTop); 
   		location.reload();
	}
</script>	
</html> 