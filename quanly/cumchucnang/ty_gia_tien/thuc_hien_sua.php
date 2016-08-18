<?php
	chong_pha_hoai();
	$up="UPDATE `thong_so` SET `gia_tri` = '$_POST[so]' WHERE ma_so='2' LIMIT 1 ;";
	mysql_query($up);
?>