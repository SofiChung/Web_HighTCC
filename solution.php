<div class="analysis">
   
      <?php
            $analysisKategorie=$_GET[aK]; //도로,인적,차량,환경,사고
            $stationName=$_GET[sN]; //노선이름
            $detail=$_GET[more]; //aK의 세부요인
            $moredetail=$_GET[mmore]; //more의 더 세부요인
            $solnumber =$_GET[i]; //해결안 번호
            
            include"dbcon.php";
            
            $sql2 = "SELECT solution FROM solutions WHERE problem='".$moredetail."' ";
            $rs2 = mysql_query($sql2, $con);
            $num2=mysql_num_rows($rs2);
            for($i=0;$i<$num2;$i++){
               $rowtitle2[$i]=str_replace("_"," ",mysql_fetch_array($rs2));
            }
            
      ?>
   
   <p><span class="bold"> <?php echo $analysisKategorie; ?> 요인</span> : <?php echo $detail; ?> </p>
   <p><span class="bold"> 세부 요인</span> : <?php echo str_replace("_"," ",$moredetail); ?> </p>
   <p><span class="bold"> 개선안</span> : <?php echo $rowtitle2[--$solnumber][0]; ?> </p>
</div>


<div class="improvement">
      <h2>개선전</h2>
      <img src="img/Improvement/개선전.png" height="137.89" >
      <h2>개선후</h2>
      <img src="img/Improvement/개선후.png" height="137.89"> 
</div>