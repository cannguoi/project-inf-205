<?php
	chong_pha_hoai();
	$chuoi="DELETE FROM `hoadon` WHERE `hoadon`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
	//chuyentrang("?thamso=quanly_hoadon&trang=$_GET[trang]");
?>