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


<?php       $analysisKategorie=$_GET[aK];
            $stationName=$_GET[sN];
            $detail=$_GET[more];
            $moredetail=$_GET[mmore];?>
<body>
		<div class="map">
				<img id="highway" src="img/Map/map.png" usemap="#highway">
								<map id="high_way_map" name="highway">
								
									<area href="detailenv1.php" name="route1" shape="poly" coords="
									79,40,75,42,77,48,79,54,83,58,91,72,93,76,94,79,93,93,91,107,91,113,89,137,
									91,139,93,139,94,137,98,98,98,93,100,77,93,66,84,49,80,37,82,43">
									
									<area href="detailenv2.php" name="route2" shape="poly" coords="
									140,548,138,550,139,559,140,568,139,610,138,647,140,649,
									141,649,143,647,146,564,145,556,144,552,143,547,141,549">
									
									<area href="#" name="allroute" shape="poly" coords="70,19,75,41,77,48,79,54,83,58,91,72,93,
									76,94,79,93,93,91,107,91,113,87,177,87,182,96,222,97,260,98,266,102,272,131,314,133,
									318,135,323,149,386,149,391,144,420,139,443,127,482,126,485,126,491,134,529,139,559,
									140,568,139,610,138,654,139,665,142,673,149,680,155,688,157,691,160,697,162,704,164,
									712,164,716,164,721,163,725,161,729,161,734,160,756,162,759,165,762,178,771,180,772,
									181,776,183,780,184,806,183,812,180,821,179,823,175,828,170,833,157,841,154,844,151,
									847,139,863,137,866,116,885,112,889,108,895,94,922,72,956,71,959,69,965,68,997,67,1016,
									66,1022,59,1050,58,1056,59,1063,61,1073,62,1081,60,1100,62,1129,66,1139,69,1139,70,1138,
									71,1136,68,1128,66,1123,65,1096,67,1080,67,1076,63,1054,72,1017,74,971,74,965,76,960,82,
									950,110,905,115,896,118,891,123,885,142,866,146,861,153,853,158,847,164,842,180,832,182,
									829,185,823,189,809,188,776,185,770,183,767,168,757,166,756,166,754,166,732,169,726,170,
									720,169,711,167,701,165,692,162,686,147,669,146,665,145,662,143,658,146,564,145,556,144,
									552,143,547,140,531,135,502,132,492,132,488,131,485,133,479,145,440,155,394,155,388,153,
									380,146,350,143,335,139,318,134,310,106,267,103,262,103,256,102,228,101,217,93,180,93,176,
									93,172,98,98,98,93,100,77,93,66,84,49,80,37,78,28,76,19,73,18,73,18">

								</map>
				</div>
				<div class="explain">
				<h2>도움말</h2> <!--- 아래의 글 중 따옴표 부분은 php로 처리하도록 수정하기 나중에 br태그 빼야됨 -->
					<p><span class="bold">'<?php echo str_replace("_"," ",$moredetail);?>'</span> 요인에 대한 세부 지도 그래프입니다.</p>
					<p>지도의 <span class="bold"><span class="red"> 빨간 구간</span></span>은 사고율 nn% 이상의 위험한 구간이며, 
					<span class="bold"><span class="green">초록 구간</span></span>은 사고율 nn% 이상의 주의 구간입니다.
					지도 내 좌표 클릭 시 세부 지도를 확인할 수 있습니다.</p> 
					<p>세부 지도의 <span class="bold"><span class="green">초록 점</span></span> 위에 마우스를 올려놓으시면 세부 이정값을 확인할 수 있습니다. </p>
				</div>
</body>

</html>