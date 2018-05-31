<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>교통관리 consulting</title>
		<link href = "img/favicon.ico" rel="shortcut icon" />
		<link rel="stylesheet" href="default.css"><!--만들어야함, 아이콘 추가하기-->
		<link rel="stylesheet" href="environment.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="Nwagon.css" type="text/css">
		<script src="Nwagon.js"></script>
		<script src="chartcolor.js"></script>
		<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 
		<script src="fold.js"></script><!--접기 눌렀을때 아이콘도 바뀌게 하고싶은데 안됨 ,, ,-->
	</head>
	<body>
	<?php
	
	
				$analysisKategorie=$_GET[aK];
				$stationName=$_GET[sN];
				
				include"dbcon.php";
				
				//query1
				$sql="SELECT * FROM menu_table WHERE menu_name='".$analysisKategorie."'";
				$rs = mysql_query($sql,$con);
				$rowtitle=array_slice(mysql_fetch_row($rs),1);
				
				
				$sql="SELECT * FROM `".$analysisKategorie."` WHERE lineid='".$stationName."'";
				$rs = mysql_query($sql,$con);
				$myscore=array_slice(mysql_fetch_row($rs),1);
			
			
				
				//비, 등의 글프 클릭시 세부정보로 갈때 필요한 주소를 생성하는 함수, href 에 저장.
				function toHref($where,$array,$analysisKategorie,$stationName){
					for($i=0;$i<count($array);$i++){
						$href[$i]=$where.'.php?sN='.$stationName.'&aK='.$analysisKategorie.'&more='.$array[$i];
					}
					return $href;
				}
								
			
				?>
		<?php include"header.php"?>
		
		<div class="maintext">
				
		<?php include"aside.php"?>
			<section>
			
				<div class="headline">
						<h1><? echo $analysisKategorie;?> 요인 분석</h1><!--입력한 지사에대한 정보-->
						<div class ="nav"><!--메뉴네비게이션흠,,,, 어케 ,,,, 하지  ,   ?? ? 다른 파일에도 추가해야함-->
							<p>home > 지사 분석 > <? echo $analysisKategorie;?></p>
						</div>
				</div>
		
				<div class="basicElement">
					<h1>요인 분석</h1>
					<?php $href=toHref('environment2chart',$rowtitle,$analysisKategorie,$stationName);?>
					<div id="Nwagon"></div>
					<script>
						var options = {
							'legend':{
								names: <?php echo json_encode($rowtitle);?>,
								hrefs: <?php echo json_encode($href);?>
							},
							'dataset': {
								title: 'Web accessibility status',
								values: [<?php echo json_encode($myscore,JSON_NUMERIC_CHECK);?>],
								bgColor: '#f9f9f9',
								fgColor: '#F96C76',
							},
							'chartDiv': 'Nwagon',
							'chartType': 'radar',
							'chartSize': { width: 400, height: 300 }
						};
						Nwagon.chart(options);
					</script>
					<p>[그래프 1] <?php echo $analysisKategorie?> 요인</p>
					
				</div>
				
				<?php include"envexplain.php"?>

				</div>
				
			</section>
		</div>
		
		<?php include"footer.html"?>
	</body>
</html>