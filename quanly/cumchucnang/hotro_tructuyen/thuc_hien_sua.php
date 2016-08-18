<?php
	chong_pha_hoai();
	if($_POST['ten_nick']!="")
	{
		$chuoi="UPDATE `hotro_tructuyen` SET `nickname` = '$_POST[ten_nick]',
			`loai_nick`='$_POST[loai_nick]',
			`mo_ta`='$_POST[noidung]',
			`mo_ta__en`='$_POST[noidung_en]'
			WHERE `hotro_tructuyen`.`id` ='$_GET[id]' LIMIT 1 ;";
			mysql_query($chuoi);
			//echo $chuoi;exit();
	}
	else
	{
		thongbao("Không được bỏ trống tên nick");
	}
?>