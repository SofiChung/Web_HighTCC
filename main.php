<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>교통관리 consulting</title>
		<link href = "img/favicon.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="Nwagon.css" type="text/css">  
		<script src="Nwagon.js"></script>
		
	</head>
	<body>
	
	
		<header>
			<div>

			<a href="main.php"><img src="img/logo.png"></a>
			<div class="searchbar">
			<!--0530아침.. 이거 폼 좀 바꿨으니까 다른 파일도 바꾸셈-->
				<form action="check.php" name=sSearch method="get" ><!--php삽입/검색어 넘김/환경으로 넘어감-->
					<input type="text" name="sN" placeholder="지사 이름 입력" />
					<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>		
				</form>

			</div>
			</div>
		</header>
		
		<div class="maintext">
			<section>
				<div id="slideShowImages"><!--자바스크립트 이미지슬라이더-->
					<img src="img/Slideshow/1.png" alt="Slide 1" />
					<img src="img/Slideshow/2.png" alt="Slide 2" />
					<img src="img/Slideshow/3.png" alt="Slide 3" />    
				</div>  
				<script src="slideShow.js"></script>
			</section>
			
		</div>
		
		<?php include"footer.html"?>
	</body>
</html>