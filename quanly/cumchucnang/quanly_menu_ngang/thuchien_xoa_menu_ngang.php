<?php
	chong_pha_hoai();
?>
<?php
		$del = "DELETE FROM `menu_top` WHERE `id` = '$_GET[id_menu]'";
			//echo $del." \$del <br>";

				//thongbao($del);
				mysql_query($del);
?>