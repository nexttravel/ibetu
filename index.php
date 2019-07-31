<? include 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="favicon.ico">
	<title>KBO Tipster</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel='stylesheet' href='scroll_panel_menu.css'>
	<link rel='stylesheet' href='index.css'>
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
		// $('.sign_out').click(function(){
		// 	<?
		// 		session_destroy();
		// 	?>
		// });

		// $('.menu_panel').css({'position':'fixed'});

		var left = ($(window).width() - $('.rank_panel').width())/2;
		$('.rank_panel').css({left:left});

		//스크롤
		var a = $('.a').offset();
		var p = $('.photo_box').offset();
		// alert(a.top);
		// alert(p.top);

		$(window).scroll(function() {
			$('.top').text('p' + p.top + 'a' + a.top);
			
			if(p.top == 172){
				// alert('aa');
				$('.menu_panel').css({'position':'fixed'});
			}
			else{
				$('.menu_panel').removeClass('sticky');
			}
		});
	});
</script>

<body>
	<div class="panel">
		<div class="photo_box">
			<img class="photo"src="index.jpg">
		</div>

	<div class="a">
		<div class="menu_panel">
			<div class="menu_box">
				<div class="menu menu_clicked" onclick="location.href='index.php'">HOME</div>
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

		<?
			// if(isset($_SESSION['signed_id'])){
			// 	echo "<div class='login_panel'>
			// 			<div class='profile_box1'>
			// 				<div class='profile_id_box'>
			// 					<div class='profile_photo_box float_left'>
			// 						<img class=profile_photo src='https://img.icons8.com/flat_round/64/000000/bee.png'>
			// 					</div>
			// 					<div class='profile_info_box float_left'>
			// 						<div class='profile_txt'><b>".$signed_id."</b></div>
			// 						<div class='profile_txt'>오늘 <b>35</b>명 조회</div>
			// 					</div>
			// 				</div>
				
			// 				<div class='profile_menu_box'>
			// 					<div class='profile_menu' onclick='location.href='http://newtrip.cafe24.com/write.php''>글쓰기</div>
			// 					<div class='profile_menu'>내 게시판</div>
			// 					<div class='profile_menu'>마이페이지</div>
			// 				</div>
			// 			</div>
			// 		</div>";
			// }
		?>

		<!-- <div class="top"></div> -->
	
		<div class="rank_panel">
			<div class="rank_box">
				<div class="rank_ttl">GOOD TIPSTER RANKING</div>

				<div class="list_box list_index">
					<div class="list_txt rank left">랭킹</div> 
					<div class="list_txt rank_id left">ID</div>
					<div class="list_txt rank_dividend">배당률</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">글 목록</div> 
				</div>


				<div class="list_box">
					<div class="list_txt rank left">1</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">2</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">3</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">4</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">5</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">6</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">7</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">8</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">9</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>

				<div class="list_box">
					<div class="list_txt rank left">10</div> 
					<div class="list_txt rank_id left">A_user</div>
					<div class="list_txt rank_dividend">1.65</div> <!-- 적중률 -->
					<div class="list_txt link_to_tipster">바로가기</div> 
				</div>
			</div>
	</div>

	</div>



</body>
</html> 