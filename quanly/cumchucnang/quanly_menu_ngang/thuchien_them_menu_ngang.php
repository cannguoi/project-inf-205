<?php
	chong_pha_hoai();
?>
<?php
		if(trim($_POST['link'])=="no_link")
		{
			$dang="no_link";
		}
		$sql = "INSERT INTO `menu_top` ( `id` , `ten`,`link`,`dang`)
VALUES (
NULL , '$_POST[txttd]','$_POST[link]', '$dang'
)";
	//echo $sql." \$sql <br>";
//die($sql);
		if($_POST['txttd'] != "")
		{
			mysql_query($sql);
		}
		else
		{
			echo "Không được bỏ trống tiêu đề !";
		}
		//thongbao("da vao day");
?>