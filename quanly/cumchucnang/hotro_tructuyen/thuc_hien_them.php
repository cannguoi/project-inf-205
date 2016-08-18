<?php
	chong_pha_hoai();
	if($_POST['ten']!="")
	{

		$chen="INSERT INTO `hotro_tructuyen` ( `nickname` , `id`,`loai_nick`,`mo_ta`,`mo_ta__en`)
			VALUES (
			'$_POST[ten]', NULL,'$_POST[loai_nick]','$_POST[noidung]','$_POST[noidung_en]'
			);";

		mysql_query($chen);
	}
	else
	{
		thongbao("Không được bỏ trống tên nick");
	}
	trangtruoc();
	exit();
?>
