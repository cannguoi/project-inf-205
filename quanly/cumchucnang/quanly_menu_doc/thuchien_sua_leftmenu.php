<?php
	chong_pha_hoai();
?>
<?php
	if($_POST['tenmenu'] != "")
	{
		$update = "UPDATE `menu` SET `ten` = '$_POST[tenmenu]',
		`dang`='$_POST[dang]',
		`link`='$_POST[link]',
		`keywords`='$_POST[keywords]',
		`description`='$_POST[description]'
		
		WHERE `id` ='$_GET[id_menu]'" ;
		mysql_query($update);
	}
?>