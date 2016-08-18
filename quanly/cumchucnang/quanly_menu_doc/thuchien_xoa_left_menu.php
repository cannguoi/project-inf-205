<?php
	chong_pha_hoai();
?>
<?php
	$sql = "select count(*) from dulieu where thuoc_menu = '$_GET[id_menu]'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_row($query);
	if($rows[0] == 0)
	{
		$suc="select count(*) from menu where thuoc_menu='$_GET[id_menu]'";
		$suc_1=mysql_query($suc);
		$suc_2=mysql_fetch_row($suc_1);
		if($suc_2[0]==0)
		{
			$del = "DELETE FROM `menu` WHERE `menu`.`id` = '$_GET[id_menu]'";
			mysql_query($del);
		}
		else
		{
			thongbao("Vẫn còn menu con nằm trong menu này\\nMuốn xóa menu này hãy xóa các menu con của nó");
		}
	}
	else
	{
		thongbao("Menu này vẫn còn dữ liệu !\\nXin hãy xóa dữ liệu trong menu này hoặc đổi tên menu !");
	}
?>