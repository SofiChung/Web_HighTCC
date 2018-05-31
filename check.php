	<?php
			
			include "dbcon.php";
				
				//값이 안넘어감 ...... 
				$stationName=$_GET[sN];
				
				$sql="SELECT COUNT(*) FROM lineinfo WHERE lineid='".$stationName."'";
				$rs = mysql_query($sql,$con);
				$check=mysql_result($rs,0,0);
				
				if($check!=0)
					echo("<script>location.replace('stationinfo.php?sN=$stationName');</script>"); 
				else
				{
					echo "<script>alert(\"올바른 지사명을 입력해 주세요.\");</script>";
					echo("<script>location.replace('main.php');</script>");
					

				}
					

	?>