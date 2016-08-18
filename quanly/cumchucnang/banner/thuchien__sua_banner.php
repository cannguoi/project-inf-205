<?php
	chong_pha_hoai();
?>
<?php
	//$_POST['noidung'] = str_replace('&quot;','"',$_POST['noidung']);
	$str	=	$_POST['noidung'];
	$str_en	=	$_POST['noidung_en'];
	//$str=str_replace("'","\'",$str);
	$sql = "update banner set html='$str',html_en='$str_en',cao='$_POST[chieu_cao]' where id='1'";
	//thongbao($sql);
	mysql_query($sql);
?>