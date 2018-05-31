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
		<script src="layerPopup.js"></script>
		<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 
		<script src="fold.js"></script><!--접기 눌렀을때 아이콘도 바뀌게 하고싶은데 안됨 ,, ,-->
	</head>
	<body>
	<?php
				$analysisKategorie=$_GET[aK];
				$stationName=$_GET[sN];
				$detail=$_GET[more]; // 비.. 같은거 ! 받아서 세부 목록 가져오고,,, 값가져오고 ,, 
				
				include"dbcon.php";
				
				//chart1 
				$sql="SELECT * FROM menu_table WHERE menu_name='".$analysisKategorie."'";
				$rs = mysql_query($sql,$con);
				$rowtitle=array_slice(mysql_fetch_row($rs),1);
				
				
				$sql="SELECT * FROM `".$analysisKategorie."` WHERE lineid='".$stationName."'";
				$rs = mysql_query($sql,$con);
				$myscore=array_slice(mysql_fetch_row($rs),1);

				
				//chart2
				$sql="SELECT * FROM `".$detail."1`";
				$rs = mysql_query($sql,$con);				
				$num=mysql_num_rows($rs);
				for($i=0;$i<$num;$i++){
					$rowtitle2[$i]=mysql_fetch_row($rs);
				}
				
				for($i=0;$i<$num;$i++){
					$row2[$i]=str_replace("_"," ",$rowtitle2[$i]);
				}
				
				
				
				$sql="SELECT * FROM `".$detail."` WHERE lineid='".$stationName."'";
				$rs=mysql_query($sql,$con);
				$mydetailscore=array_slice(mysql_fetch_row($rs),1);
				
				$sql="SELECT * FROM `".$detail."` WHERE lineid='".$stationName."우수'";
				$rs=mysql_query($sql,$con);
				$bestdetailscore=array_slice(mysql_fetch_row($rs),1);
				
				
				//function
				//비, 등의 글프 클릭시 세부정보로 갈때 필요한 주소를 생성하는 함수, href 에 저장. 어디로/차례목록/지사이름
				function toHref($where,$array,$analysisKategorie,$stationName){
					for($i=0;$i<count($array);$i++){
						$href[$i]=$where.'.php?sN='.$stationName.'&aK='.$analysisKategorie.'&more='.$array[$i];
					}
					return $href;
					}
					
				function toHref2($where,$array,$analysisKategorie,$stationName,$detail){
					for($i=0;$i<count($detail);$i++){
						$href[$i]=$where.'.php?sN='.$stationName.'&aK='.$analysisKategorie.'&more='.$array.'&mmore='.$detail[$i][0];
					}
					return $href;
					}
					
				
				
				//막대차트에 넘겨줄 값
				
				function columnChart($first,$second) {
					for($i=0;$i<5;$i++){
						$result[$i][0]=$first[$i];
						$result[$i][1]=$second[$i];
					}
					return $result;
				}
				?>
		<?php include"header.php"?>
		
		<div class="maintext">
			<?php include"aside.php"?>
			<!--디비ㅜ쿼리ㅓ리/페이지간 변수이동-->
			<section>
				<div class="headline">
						<h1><? echo $analysisKategorie;?> 요인 분석</h1><!--입력한 지사에대한 정보-->
						<div class ="nav"><!--메뉴네비게이션흠,,,, 어케 ,,,, 하지  ,   ?? ? 다른 파일에도 추가해야함-->
							<p>home > 지사 분석 > <? echo $analysisKategorie;?> > <? echo $detail;?></p>
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
				<div class="detailElement">
				<h1>세부 요인 분석 - <?php echo $detail;?></h1>
				
					<?php $href2=toHref2('detailenv',$detail,$analysisKategorie,$stationName,$rowtitle2);
							$compare=columnChart($mydetailscore,$bestdetailscore);?>
					<div id="Nwagon2"></div>
					<script>
							var options = {
								'legend': {
									names: <?php echo json_encode($row2);?>,
									hrefs: <?php echo json_encode($href2);?>
								},
								'dataset': {
									title: 'Playing time per day',
									values: <?php echo json_encode($compare,JSON_NUMERIC_CHECK);?>,
									colorset: ['#DC143C', "#30a1ce"],
									fields: ['<?php echo $stationName;?>지사', '우수지사']
								},
								'chartDiv': 'Nwagon2',
								'chartType': 'multi_column',
								'chartSize': { width: 800, height: 400 },
								'maxValue': 100,
								'increment': 10
							};
									Nwagon.chart(options);
					</script>
					
					<p>[그래프 2] 세부분석 : 요인 - <?php echo $detail?> </p>
				</div>
				
				</div>
				
			</section>
				
			
		</div>
		
		<?php include"footer.html"?>
	</body>
</html>