<?php
chongphahoai();
//duoi day la 3 duong dan dc include lai o file php nay

//echo $duongdan_1."<hr>";
//echo $duongdan_2."<hr>";
//echo $duongdan_3."<hr>";
class class__quanly_dulieu_left_menu
{
	function quanly_dulieu_left_menu($duongdan_1,$duongdan_2,$duongdan_3)
	{
		echo "<table >";
			echo "<tr>";
				echo "<td >";
					include_file("cumchucnang/quanly_dulieu/xuat_menu_option_quanly.php");
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td valign=\"top\" align=\"left\">";
					//include($duongdan_3);
					include_file("cumchucnang/quanly_dulieu/xuat_quanly_dulieu_toanbo_menu.php");
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	}
}
$class__quanly_dulieu_left_menu=new class__quanly_dulieu_left_menu;
$class__quanly_dulieu_left_menu ->quanly_dulieu_left_menu($duongdan_1,$duongdan_2,$duongdan_3);
?>
