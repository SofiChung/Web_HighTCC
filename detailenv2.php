<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>교통관리 consulting</title>
		<link href = "img/favicon.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="default.css"><!--만들어야함, 아이콘 추가하기-->
		<link rel="stylesheet" href="detailenv.css">
		<link rel="stylesheet" href="tab.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.js"></script>
		<script src="http://www.outsharked.com/scripts/jquery.imagemapster.js" ></script>
		<script src="jQuery-rwdImageMaps/jquery.rwdImageMaps.min.js" ></script>
		<script type="text/javascript" src="imageMap.js"></script>
		<script type="text/javascript" src="tab.js"></script> 		
		
		
	</head>
	
	<body>
	<?php
				$analysisKategorie=$_GET[aK];
				$stationName=$_GET[sN];
				$detail=$_GET[more];
				
				function toHref($where,$array,$analysisKategorie,$stationName){
					for($i=0;$i<count($array);$i++){
						$href[$i]=$where.'.php?sN='.$stationName.'&aK='.$analysisKategorie.'&more='.$array[$i];
					}
					return $href;
				}
				
				$href1=toHref('detailenv1',$rowtitle,$analysisKategorie,$stationName);
				$href2=toHref('detailenv2',$rowtitle,$analysisKategorie,$stationName);?>
		<?php include"header.php"?>
		
		<div class="maintext">
		<?php include"aside.html"?>
		<section>
			<div class="headline">
				<h1>환경 요인 세부 분석</h1><!--입력한 지사에대한 정보-->
				<div class ="nav"><!--메뉴네비게이션흠,,,, 어케 ,,,, 하지  ,   ?? ? 다른 파일에도 추가해야함-->
					<p>home > 지사정보 > <?php echo $stationName;?> > <?php echo $detail;?></p>
				</div>
			</div>
			
			
	
		
		</section>
		</div>
		<?php include"footer.html"?>
	</body>
</html>