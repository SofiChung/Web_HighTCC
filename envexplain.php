<div class="explain">
            
            
         <?php
            include"dbcon.php";
            
            $sql = "SELECT max($stationName) FROM `".$analysisKategorie."2`";
            $rs = mysql_query($sql, $con);
            $tmp = mysql_fetch_array($rs);
            
            $sql = "SELECT cause FROM `".$analysisKategorie."2` WHERE $stationName = $tmp[0] ";
            $rs = mysql_query($sql, $con);
            $cause1 = mysql_fetch_row($rs);
         
         ?>
         
         

         <p><?php echo $stationName;?> 지사에 대한 분석 결과입니다.</p>
		 <p>분석 결과 <?php echo $analysisKategorie;?> 요인 중 '<?php echo $cause1[0]; ?>' 요소가 
		 가장 높은 비율을 차지하는것으로 나타났습니다.</p>
         <p>그래프의 각 세부 요소를 클릭할시 해당 세부 요인 분석 그래프를 볼 수 있습니다.</p>
            
         </div>