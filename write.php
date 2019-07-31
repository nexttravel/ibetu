<? include 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>KBO Tipster</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='Write.css'>
	<link rel='stylesheet' href='scroll_panel_menu.css'>
	<script src='http://code.jquery.com/jquery-3.3.1.js'></script>
	<script src="scroll_panel_menu.js"></script>
	<link rel="stylesheet" href="animate.css">
	<script src="wow.min.js"></script>
	<script>
	    new WOW().init();
	</script>
</head>

<script>
	$(document).ready(function(){
		var i=0, z=0;

		var left = ($(window).width() - $('.write_panel').width())/2;
		$('.write_panel').css({left:left});
		
		var width = $('.option_box').width()/2;
		$('.option').css({width:width});
		$('.option').each(function(index){
			$(this).attr('option-index', index);
		}).click(function(){
			var index = $(this).attr('option-index');
			$('.option[option-index=' + index + ']').addClass('clicked');
			$('.option[option-index!=' + index + ']').removeClass('clicked');
		});
		// left = left + $('.contents').width() - $('.write_btn').width();
		// $('.write_btn').css({left:left});

		width = ($('option_box').width() - $('.radio_box').width())/2;
		$('.radio_box').css({width:width});

		$('.star_img').each(function(index){
			$(this).attr('star_img-index', index);
		});

		// 별점
		$('.star').each(function(index){
			$(this).attr('star-index', index);
		}).click(function(){
			var index = $(this).attr('star-index');
			var old_clicked = $('.star_clicked').length;

			if(index < old_clicked){
				for(i=old_clicked; i>index; i--){
					$('.star_img[star_img-index=' + i + ']').attr('src', 'star.png');
					$('.star_img[star_img-index=' + i + ']').removeClass('star_clicked');
				}
			}

			else{
				for(i=0; i<=index; i++){
					$('.star_img[star_img-index=' + i + ']').attr('src', 'color_star.png');
					$('.star_img[star_img-index=' + i + ']').addClass('star_clicked');
				}
			}

			var new_clicked = $('.star_clicked').length;

			$('.rate').text(new_clicked.toPrecision(2));
			
		});
		
	});
</script>

<?
	$game = $_POST["game"];
	$score = $_POST["rate"];
	$type = $_POST["type"];
	$title = $_POST["title"];
	$content1 = $_POST["content1"];
	$content2 = $_POST["content2"];
	$content3 = $_POST["content3"];
	$content4 = $_POST["content4"];
	$date = date('Y-m-j');

	if(isset($_POST['write']) && !empty($_POST['title']) && !empty($_POST['content1']) && !empty($_POST['content2']) && !empty($_POST['content3']) && !empty($_POST['content4'])){
		$query = "INSERT INTO boardTBL(game, score, type, title, 
									 content1, content2, content3, content4, mdate) 
				VALUES('".$game."','".$score."','".$type."','".$title."','".$content1."','".$content2."','".$content3."','".$content4."','".$date."')";

		mysqli_query($con, $query);
	}
	
?>

<body>
	<div class="panel">
		<div class="menu_panel">
			<div class="menu_box">
				<div class="menu" onclick="location.href='index.php'">HOME</div>
				<!-- <div class="menu">ABOUT US</div> -->
				<div class="menu" onclick="location.href='premiumboard.php'">프리미엄 TIPS</div>
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

		<form method="POST" action="">
			<div class="write_panel">
			<!-- <div class="write_btn">발행</div> -->

				<div class="game_panel">
					<div class="item">게임 선택</div>

					<select class="game_box" name="game">
				    	<option>게임 선택</option>
				    	<option name="game_name">7.2.(화) 오후 6:30 NC vs KIA</option>
				    	<option name="game_name">7.2.(화) 오후 6:30 롯데 vs SK</option>
				    	<option name="game_name">7.3.(수) 오후 6:30 롯데 vs SK</option>
				   		<option name="game_name">7.3.(수) 오후 6:30 두산 vs 히어로즈</option>
					</select>
				</div>

				<div class="expected_team_panel">
					<div class="item">예상 우승 팀</div>

					<div class="expected_team_box">
						<select class="expected_team_opt" name="expected">
					    	<option>팀 선택</option>
					    	<option name="expected_team">두산</option>
					    	<option name="expected_team">히어로즈</option>
				    	</select>
					</div>
				</div>

				<div class="rate_panel">
					<div class="item">예상 승률</div>

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


				<input class="ttl" name="title" type="text" placeholder="제목"></input>

				<div class="contents_panel">
					<div class="contents_box">
						<div class="item">선발 분석</div>
							<textarea class="contents" name="content1" type="text" placeholder="내용"></textarea>
					</div>

					<div class="contents_box">
						<div class="item">볼펜 분석</div>
						<textarea class="contents" name="content2" type="text" placeholder="내용"></textarea>
					</div>

					<div class="contents_box">
						<div class="item">타격 분석</div>
						<textarea class="contents" name="content3" type="text" placeholder="내용"></textarea>
					</div>

					<div class="contents_box">	
						<div class="item">최근 흐름</div>
						<textarea class="contents" name="content4" type="text" placeholder="내용"></textarea>
					</div>
				</div>

				<!-- <div class="write_btn"> -->
                    	<button class="btn" type="submit" name="write">글 작성</button>
                <!-- </div> -->
			</div>
		</form>
		
	</div>

</body>
</html> 