<?php
	chong_pha_hoai();
?>
<?php
	function mang_lien_he()
	{
		$sql="select * from lien_he where id='1'";
		$sql_1=mysql_query($sql);
		$sql_2=mysql_fetch_array($sql_1);
		return $sql_2;
	}
?>
<?php
	if(isset($_POST['thaydoi_thongtin_lienhe']))
	{
		$_POST['noidung'] = str_replace('&quot;','"',$_POST['noidung']);
		$_POST['noidung'] = str_replace("'","\'",$_POST['noidung']);
		$up="UPDATE `lien_he` SET `thongtin_lienhe` = '$_POST[noidung]',
			`thongtin_lienhe__en` = '$_POST[noidung_en]'
		 WHERE `id` ='1';";
		mysql_query($up);
		trangtruoc();
	}
	if(isset($_POST['thaydoi_email_lienhe']))
	{
		$luan->kiem_tra_tieu_de();
		$_POST['tieu_de'] = str_replace("'","\'",$_POST['tieu_de']);
		$up="UPDATE `lien_he` SET `email` = '$_POST[tieu_de]' WHERE `id` ='1';";
		mysql_query($up);
		trangtruoc();
	}
?>
<?php
	//h1_1("Thay đổi thông tin liên hệ");
	//$luan->xuat("kiem tra class luan");
	echo "<form action =\"\" method=\"post\" style=\"margin:0\">";
		echo "<table id=\"er\" width=\"970px\" style=\"margin:6px 0px\">";
			echo "<tr>";
				echo "<td>";
					echo "Thay đổi thông tin liên hệ";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><div style=\"width:5px;height:6px;overflow:hidden\"></div>";
					xuat_select();
					$mang_lien_he=mang_lien_he();
					echo "<center>";
						echo "<div id=\"div_vn_afc\">";
							$luan->fck_editor__20($mang_lien_he['thongtin_lienhe'],950,300);
						echo "</div>";
						echo "<div id=\"div_en_afc\" style=\"display:none\">";
							$luan->fck_editor__21($mang_lien_he['thongtin_lienhe__en'],950,300);
						echo "</div>";

					echo "<br><br>";
					$luan->nut_chap_nhan__cach_trai_50px___001("thaydoi_thongtin_lienhe");
					echo "</center>";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	echo "</form>";
	h1_1("Thay đổi email liên hệ");
	echo "<form action=\"\" method=\"post\">";
		echo "<input style=\"width:200px\" name=\"tieu_de\" value=\"$mang_lien_he[email]\" />";

		echo "<input type=\"submit\" class=\"gui\" name=\"thaydoi_email_lienhe\" value=\"Sữa\" style=\"margin-left:50px\"/>";
	echo "</form>";
?>
<script type="text/javascript">
	table_css_2("er");
</script>