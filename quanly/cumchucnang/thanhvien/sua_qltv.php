<?php
	chong_pha_hoai();
	$table				=	"thong_so";
	$f_1				=	"ma_so";
	$f_2				=	"gia_tri";
	$noi_dung			=	$_POST['noi_dung'];
	$noi_dung__en		=	$_POST['noi_dung__en'];
	$tv="UPDATE `thong_so` SET `gia_tri` = '$noi_dung',`gia_tri__en` = '$noi_dung__en' WHERE ma_so='1' LIMIT 1 ;";
	mysql_query($tv);
?>