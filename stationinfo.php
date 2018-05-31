<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>교통관리 consulting</title>
		<link href = "img/favicon.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="default.css"><!--만들어야함, 아이콘 추가하기-->
		<link rel="stylesheet" href="stationinfo.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="tab.css" type="text/css">  
		<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script> 
		<script src="tab.js"></script> 
		
	</head>
	<body>
		<?php $stationName=$_GET[sN];?>
		<?php include"header.php"?>
		
		<div class="maintext">
		<?php include"aside.php"?>	

		<section>
		
			<div class="headline">
					<h1>지사정보</h1><!--입력한 지사에대한 정보-->
					<div class ="nav"><!--메뉴네비게이션흠,,,, 어케 ,,,, 하지  ,   ?? ? 다른 파일에도 추가해야함-->
						<p>home > 지사 분석 > 기본 정보</p>
					</div>
				</div>
			<div class="info">
				<div class="tab_face m1 s1">
					<ul>
					<li class="m1"><a href="#"><span>지사 기본정보</span></a>
						<ul> 
							<img src="img/info/<?php echo $stationName?>.png" alt="jisainfo" /> 
						</ul>
					</li>
					<li class="m2"><a href="#"><span>그룹화 정보</span></a>
						<ul>
							<img src="img/info/groupinfo1.png" width="547" height="484" alt="groupinfo" />
						</ul>
					</li>	
					</ul>
					
				</div>
			</div>
			
		</section>
		</div>
		
		<?php include"footer.html"?>
	</body>
</html>