<?php
	chong_pha_hoai();
?>
<?php
	if(trim($_POST['link'])=="no_link")
		{
			$dang="no_link";
		}
		//die($dang);
	if($_POST['tenmenu'] != "")
	{
		$update = "UPDATE `menu_top` SET `ten` = '$_POST[tenmenu]'
			,`link` = '$_POST[link]',`dang`='$dang'
		 WHERE `id` ='$_GET[id_menu]'" ;
		mysql_query($update);
	}
	else
	{
		thongbao("Không được bỏ trống tên menu !");
	}
?>