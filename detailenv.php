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

      <script type="text/javascript" src="tab.js"></script>
      
      <script type="text/javascript">
         $(document).ready(function(){
            $(".tab_face *").click(function(){
               var href =$(this).attr('href');
               $("#content").load(href);
               return false; 
            });
         });
      </script>
   
      
   </head>
   
   <body>
   <?php
            $analysisKategorie=$_GET[aK];
            $stationName=$_GET[sN];
            $detail=$_GET[more];
            $moredetail=$_GET[mmore];
            
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
            <h1>환경 요인 세부 분석</h1><!--입력한 지사에대한 정보-->
            <div class ="nav"><!--메뉴네비게이션흠,,,, 어케 ,,,, 하지  ,   ?? ? 다른 파일에도 추가해야함-->
               <p>home > 지사정보 > <?php echo $analysisKategorie?> > <?php echo $detail?></p>
            </div>
         </div>
         
         <div class="tab_face m1 s1">
            <ul>
            <li class="m1"><a href="#"><span>세부 지도 분석</span></a>
               <ul>
               <li class="s1"><a href="map.php?mmore=<?php echo $moredetail;?>">지도보기</a></li>
               </ul>
            </li> 
            
            <li class="m2"><a href="#"><span>세부 문제점 및 개선안</span></a>
               <ul>
               
               <?php
                  include"dbcon.php";
                  
                  $sql="SELECT * FROM solutions WHERE problem='".$moredetail."'";
                  $rs = mysql_query($sql,$con);      
                  $num=mysql_num_rows($rs);
                  
                  
                  // solution.php 뒤에 변수전달해서 n번쨰의 해결방안이 나오도록!
                  for($i=1; $i<=$num; $i++){
                     echo "<li class='s".$i."'><a href='solution.php?sN=".$stationName."&aK=".$analysisKategorie."&more=".$detail."&mmore=".$moredetail."&i=".$i."'> 해결안".$i." </a> <li>"; 
                  }
               ?>
               </ul>
            </li>
            </ul>      
         </div>
         
         <div id="content">
         </div>
   
      
      </section>
      </div>
      
      <?php include"footer.html"?>
   
   </body>
</html>