<? include 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>KBO Tipster</title>
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='Tip.css'>
	<link rel='stylesheet' href='scroll_panel_menu.css'>
	<script src='http://code.jquery.com/jquery-3.3.1.js'></script>
	<script src="scroll_panel_menu.js"></script>
	<link rel="stylesheet" href="animate.css">
</head>

<script>
	$(document).ready(function(){
		//스크롤 위치 기억하기
		if(sessionStorage.getItem('page_scroll_position')){  
       		$('.page').scrollTop(sessionStorage.getItem('page_scroll_position'));
    	}


		var left = ($(window).width() - $('.tip_panel').width())/2;
		$('.tip_panel').css({left:left});

		var top = ($('.info_box').height() - $('.prof_box').height())/2;
		$('.prof_box').css({top:top});

		left = $('.prof_box').width() + 10;
		$('.id').css({left:left});

		top = ($('.info_box').height() - $('.info').height())/2;
		$('.info').css({top:top});

		left = $('.info_box').width() - $('.date').width() - 10;
		$('.date').css({left:left});

		left = left - $('.view').width() - 10;
		$('.view').css({left:left});

		// top = ($('.comment_row').height() - $('.comment_colm').height())/5;
		// $('.comment_colm').css({top:top});

		// left = $('.comment_id').width() + 20;
		// $('.comment').css({left:left});
		// var height = $('.comment').height() + 40;
		// $('.comment_row').css({height:height});
	});
</script>

<body>
	<div class="panel">
		<div class="menu_panel">
			<div class="menu_box">
				<div class="menu" onclick="location.href='index.php'">HOME</div>
				<div class="menu">ABOUT US</div>
				<div class="menu" onclick="location.href='premiumboard.php'">프리미엄 TIPS</div>
				<div class="menu" onclick="location.href='legendboard.php'">레전드 TIPS</div>
				<div class="menu" onclick="location.href='freeboard.php'">FREE TIPS</div>	
				<div class="menu" onclick="location.href='TipsterRank.html'">TIPS RANKING</div>
				<div class="menu" onclick="location.href='GameSchedule.html'">경기 일정</div>
				<div class="menu">NEWS</div>
				<div class="menu">MY PAGE</div>
				<div class="menu">CONTACT</div>
				<!-- <div class="menu">관련 사이트</div> -->
			</div>
		</div>

		<?

			$idx = $_GET["idx"];
			
			$update = " UPDATE boardTBL SET views = views+1 WHERE idx = '".$idx."'";
			mysqli_query($con,$update);

			$query1 = " SELECT * FROM boardTBL WHERE idx = '".$idx."' ";
			$result1 = mysqli_query($con,$query1);
			if ($board = mysqli_fetch_array($result1)) {

				$game = $board['game'];
				$title = $board['title'];
				$views = $board['views'];
				$mdate = $board['mdate'];
				$content1 = $board['content1'];
				$content2 = $board['content2'];
				$content3 = $board['content3'];
				$content4 = $board['content4'];

		?>

		<div class="tip_panel">
			<div class="ttl"><?echo $title; ?></div>

			<div class="info_box">
				<div class="prof_box">
					<img class="prof" src="https://img.icons8.com/flat_round/64/000000/bee.png">
				</div>
				<div class="id info">A_user</div>
				<div class="view info"><?echo $views;?>&nbsp;조회</div>
				<div class="date info"><?echo $mdate;?></div>
			</div>

			<div class="rate_panel"> 
				<div class="rate_box">
					<div class="bolder rate">경기</div>
					<div class="rate game_selected"><?echo $game;?></div>
				</div><br><br><br><br>

				<div class="rate_box">
					<div class="bolder rate">예상 우승 팀</div>
					<div class="rate">히어로즈</div>
				</div>
				
				<div class="rate_box">
					<div class="bolder rate">예상 별 점</div>
					
					<div class="star">
						<img class="star_img" src="star.png">
					</div>
					<div class="star">
						<img class="star_img" src="star.png">
					</div>
					<div class="star">
						<img class="star_img" src="star.png">
					</div>
					<div class="star">
						<img class="star_img" src="star.png">
					</div>
					<div class="star">
						<img class="star_img" src="star.png">
					</div>

					<div class="rate">0.0</div>	
				</div>
			</div>

			<div class="contents_panel">
				<div class="contents_box">
					<div class="contents_ttl">선발 분석</div>
					<div class="contents"><?echo $board["content1"];?></div>
				</div>

				<div class="contents_box">
					<div class="contents_ttl">볼펜 분석</div>
					<div class="contents"><?echo $board["content2"];?></div>
				</div>
				
				<div class="contents_box">		
					<div class="contents_ttl">타격 분석</div>
					<div class="contents"><?echo $board["content3"];?></div>
				</div>

				<div class="contents_box">
					<div class="contents_ttl">최근 흐름</div>
					<div class="contents"><?echo $board["content4"];}?></div>
				</div>	
			</div>

			<div class="comment_panel">
				<?php
					$board_num = $idx;
					$query2 = " SELECT * FROM commentTBL WHERE board_num = '".$board_num."' ORDER BY idx DESC" ;
					$result2 = mysqli_query($con,$query2);
					$count = mysqli_num_rows($result2);
				?>
				<div class="comment_wrapper">
					<form method="POST">
						<div class="comment_info">댓글 <?php echo $count; ?> 개</div>
						<div class="wrt_commnet_box">
							<input type="hidden" name="board_num" value="<?php echo $board_num; ?>">
							<textarea class="wrt_comment" name="comment"></textarea>
							
							<button class="comment_btn" type="submit">댓글<br>등록</button> 
						
						</div>
					</form>

					<!-- 댓글 DB 삽입 -->
					<?php
						$board_num = $_POST['board_num'];
						$comment = $_POST['comment'];
						
						$sql = "INSERT INTO commentTBL(board_num,comment) VALUES('".$board_num."','".$comment."')";

						if(!empty($_POST['board_num']) && !empty($_POST['comment'])){
							mysqli_query($con, $sql);

							// 댓글 입력 -> 댓글 등록 클릭 -> 새로고침 클릭 -> 댓글 등록 클릭 -> 이전에 입력했던 댓글 등록됨. !!!!! 보완 필요 
							unset($_POST['comment']);
						}

					?>
					
					
					
					<div class="comment_box">
						<?php
							while ($row = mysqli_fetch_array($result2)) {
								$comment = $row['comment'];	
						?>
						<div class="comment_row">
							<div class="comment_colm comment_id">B_user</div>
							<div class="comment_colm comment"><?php echo $comment;?></div>
						</div>
						<? } ?>
					</div>
				</div>	
				

				
				
			</div>
		</div>
		
	</div>
</body>

<script>
	//스크롤 위치 기억하기
	function(){
   		var page_scrollTop = $('.page').scrollTop();
   	 	sessionStorage.setItem('page_scroll_position', page_scrollTop); 
   		location.reload();
	}
</script>	

</html> 