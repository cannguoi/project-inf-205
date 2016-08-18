<?php
chong_pha_hoai();
switch($_GET['id_menu'])
{
	case"":
		//echo "gggggggggg";
		include("cumchucnang/quanly_dulieu/xuat_quanly_dulieu_toanbo_menu.php");
	break;
	default:

		include("cumchucnang/quanly_dulieu/xuat_quanly_dulieu_tung_menu.php");
}


?>