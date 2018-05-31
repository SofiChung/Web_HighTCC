<header>
<div>

<a href="main.php"><img src="img/logo.png"></a>
<div class="searchbar">
<!--0530아침.. 이거 폼 좀 바꿨으니까 다른 파일도 바꾸셈-->
	<form action="check.php" name=sSearch method="get" ><!--php삽입/검색어 넘김/환경으로 넘어감-->
		<input type="text" name="sN" placeholder="<?php echo $stationName;?> 지사" />
		<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>		
	</form>

</div>
</div>
</header>
