<? include 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>KBO Tipster</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel='stylesheet' href='login.css'>
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
		//스크롤 위치 기억
		if(sessionStorage.getItem('page_scroll_position')){  
       		$('.page').scrollTop(sessionStorage.getItem('page_scroll_position'));
    	}
		
		var top = ($(window).height() - $('.login_panel').height())/2 + $('.menu_panel').height()/2;
		$('.login_panel').css({top:top});
    	
    	var left = ($(window).width() - $('.login_panel').width())/2;
		$('.login_panel').css({left:left});

		top = ($('.login_panel').height() - $('.login_box').height())/2;
		$('.login_box').css({top:top});

		left = ($('.login_box').width() - $('.login_info').width())/2;
		$('.login_info').css({left:left});
		$('.login_btn').css({left:left});
		$('.login_service_box').css({left:left});
		$('.notice').css({left:left});
	});
</script>

<body>
	<div class="panel">
		<div class="menu_panel">
			<div class="menu_box">
				<div class="menu" onclick="location.href='index.html'">HOME</div>
				<div class="menu">ABOUT US</div>
				<div class="menu" onclick="location.href='PremiumBoard.html'">프리미엄 TIPS</div>
				<div class="menu" onclick="location.href='LegendeBoard.html'">레전드 TIPS</div>
				<div class="menu" onclick="location.href='FreeBoard.html'">FREE TIPS</div>	
				<div class="menu" onclick="location.href='TipsterRank.html'">TIPS RANKING</div>
				<div class="menu" onclick="location.href='GameSchedule.html'">경기 일정</div>
				<div class="menu">NEWS</div>
				<div class="menu">MY PAGE</div>
				<div class="menu">CONTACT</div>
				<div class="menu menu_clicked" onclick="location.href='login.html'">LOGIN</div>
				<!-- <div class="menu">관련 사이트</div> -->
			</div>
		</div>



		<form method="POST">
			<div class="login_panel">
				<div class="login_box">
					<div class="login_info_box">
						<input class="login_info" type="text" name="id" placeholder="ID"></input>
					</div>
					
					<div class="login_info_box">
						<input class="login_info" type="password" name="pw" placeholder="PASSWORD"></input>
					</div>

					<div class="login_info_box">
						<input class="login_btn" type="submit" name="login" value="LOGIN"></input>
					</div>

					<? 
						if(isset($_POST['login'])){
							$id = $_POST['id'];
							$pw = md5($_POST['pw']);

							$query = "SELECT * FROM memberTBL WHERE id='$id' AND pw='$pw';";
							$result = mysqli_query($con, $query); 
							$row = mysqli_num_rows($result);

							if($row == 1){
								$_SESSION["signed_id"] = $id;
								//이전 페이지로 넘어가도록 변경하기!!!
								header("Location:http://newtrip.cafe24.com/index.php"); 
							}

							else{
								echo "<div class=notice>잘못된 아이디 혹은 비밀번호를 입력하셨습니다.</div>";
							}

						}

					?>

					<div class="login_service_box">
						<div class="login_service">아이디 찾기</div>
						<div class="left">&nbsp;·&nbsp;</div>
						<div class="login_service">비밀번호 찾기</div>
						<div class="left">&nbsp;·&nbsp;</div>
						<div class="login_service">회원가입</div>
					</div>

					
				
					
				</div>
			</div>
		</form>

		
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