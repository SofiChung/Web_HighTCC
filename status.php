<!DOCTYPE html>
<html>
   <head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
      <title>교통관리 consulting</title>
      <link href = "img/favicon.ico" rel="shortcut icon" />
      <link rel="stylesheet" href="default.css"><!--만들어야함, 아이콘 추가하기-->
      <link rel="stylesheet" href="status.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="Nwagon.css" type="text/css">  
      <script src="Nwagon.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   </head>
   
   
   
   <body>
   <?php $stationName=$_GET[sN];
         include"dbcon.php";
      
         $color8=array("#FF5E80","#F2CC49","#FA8E24","#7C58CF","#90CA61","#49ACF8","#C26FE9","#EB4545");
         
         //query1 dayAvgvalue
         $sql ="SELECT * from day_status where lineid='".$stationName."'";
         $rs = mysql_query($sql, $con);
         $dayAvgvalue= array_slice(mysql_fetch_row($rs),1);
         
         //query2 causeAvgvalue
         $sql ="SELECT * from cause_status where lineid='".$stationName."'";
         $rs = mysql_query($sql, $con);
         $causeAvgvalue=array_slice(mysql_fetch_row($rs),1);
         
         //query3 timeAvgvalue
         $sql ="SELECT * from time_status where lineid='".$stationName."'";
         $rs = mysql_query($sql, $con);
         $timeAvgvalue=array_slice(mysql_fetch_row($rs),1);
         
////////////////////////////////////////////////////////////////////////////////////////////         
         //요일별 제일 높은 사고율 수치
         $sql = "SELECT max($stationName) FROM day_status1";
         $rs1 = mysql_query($sql, $con);
         $highestDayValue = mysql_fetch_array($rs1);
         
         
         //제일 사고율 높은 요일 
         $sql = "SELECT day from day_status1 where $stationName= $highestDayValue[0] ";
         $rs2 = mysql_query($sql, $con);
         $highestDay = mysql_fetch_row($rs2);
         
////////////////////////////////////////////////////////////////////////////////////////////   
   

         //사고원인별 제일 높은 사고율 수치
         $sql = "SELECT max($stationName) FROM cause_status1";
         $rs1 = mysql_query($sql, $con);
         $highestCauseValue = mysql_fetch_array($rs1);
         
         
         //제일 사고율 높은 사고원인
         $sql = "SELECT cause from cause_status1 where $stationName= $highestCauseValue[0] ";
         $rs2 = mysql_query($sql, $con);
         $highestCause = mysql_fetch_row($rs2);
         



////////////////////////////////////////////////////////////////////////////////////////////            
         
         //시간대별 제일 높은 사고율 수치
         $sql = "SELECT max($stationName) FROM time_status1";
         $rs1 = mysql_query($sql, $con);
         $highestTimeValue = mysql_fetch_array($rs1);
         
         
         //제일 사고율 높은 시간대
         $sql = "SELECT time from time_status1 where $stationName= $highestTimeValue[0] ";
         $rs2 = mysql_query($sql, $con);
         $highestTime = str_replace("_", "~", mysql_fetch_row($rs2));
         
   


////////////////////////////////////////////////////////////////////////////////////////////   
         
         //평균도 내야함
         ?>
         
   <?php include"header.php"?>
      
      <div class="maintext">
     <?php include"aside.php";?>

      <section>
         <div class="headline">
            <h1>사고 현황 분석</h1><!--입력한 지사에대한 정보-->
            <div class ="nav"><!--메뉴네비게이션흠,,,, 어케 ,,,, 하지  ,   ?? ? 다른 파일에도 추가해야함-->
               <p>home > 지사 분석 > <?php echo $stationName;?></p>
            </div>
         </div>
      
      
      
      
      
         <div class="sDay">
            <h1>요일별 분석</h1>
            <div>
               <div id="Day_Average_chart"></div>   
               <script>                  
                  var options = {
                     'dataset':{
                        title: 'Day_Average_chart',
                        values:<?php echo json_encode(($dayAvgvalue),JSON_NUMERIC_CHECK);?>,
                        colorset: <?php echo json_encode($color8);?>,
                        fields: ['일요일', '월요일',  '화요일', '수요일','목요일','금요일','토요일'],
                     },
                     'donut_width' : 70,
                     'core_circle_radius':0,
                     'chartDiv': 'Day_Average_chart',
                     'chartType': 'pie',
                     'chartSize': {width:400, height:300}
                  };
                  Nwagon.chart(options); 
               </script>
            </div>
         
         
         
            <p>2014년에서 2016년도 평균 요일별 사고수를 분석한 결과, <B> <?php echo $highestDay[0]; ?>요일의 평균 사고건수가 3년 평균 <?php echo $highestDayValue[0]; ?>건으로 가장 많습니다. </B> 요일별 사고건수의 차이는 미미합니다.</p>
         
         </div>
         <div class="sCause">
            <h1>교통사고 원인별 분석</h1>
            <div>
               <div id="Cause_Average_chart"></div>
               <script>   
            
             
              
                  var options = {
                     'dataset':{
                        title: 'Cause_Average_chart',
                        values:<?php echo json_encode(($causeAvgvalue),JSON_NUMERIC_CHECK);?>,
                        colorset: <?php echo json_encode($color8);?>,
                        fields: ['안전거리 미확보', '과속',  '음주', '졸음','주시태만','추월차량','차량결함','타이어파손'],
                     },
                     'donut_width' : 70,
                     'core_circle_radius':0,
                     'chartDiv': 'Cause_Average_chart',
                     'chartType': 'pie',
                     'chartSize': {width:400, height:300}
                  };
                  Nwagon.chart(options);
               </script>
               
            </div>
            <p>2014년에서 2016년도 평균 사고 원인별 사고수를 분석한 결과, <B> <?php echo $highestCause[0]; ?>이 3년 평균 <?php echo $highestCauseValue[0]; ?>건으로 가장 많습니다. </B> </p>
         </div>
         <div class="sTime">
            <h1>시간대별 분석</h1>
            <div>
               <div id="Time_Average_chart"></div>   
               <script>
                  var options = {
                     'dataset':{
                        title: 'Time_Average_chart',
                        values:   <?php echo json_encode(($timeAvgvalue),JSON_NUMERIC_CHECK);?>,
                        colorset: <?php echo json_encode($color8);?>,
                        fields: ['0-3시','3-6시','6-9시','9-12시','12-15시', '15-18시', '18-21시','21-24시'],
                     },
                     'donut_width' : 70,
                     'core_circle_radius':0,
                     'chartDiv': 'Time_Average_chart',
                     'chartType': 'pie',
                     'chartSize': {width:400, height:300}
                  };
                  Nwagon.chart(options);
               </script>
            </div>
            <p>2014년에서 2016년도 평균 시간대별 사고수를 분석한 결과, <B> <?php echo $highestTime[0]; ?>에 발생한 사고 수가 3년 평균 <?php echo $highestTimeValue[0]; ?>건으로 가장 많습니다.</B></p>
         </div>
         
         
         
      </section>
      </div>
      
      <?php include"footer.html"?>
   </body>

