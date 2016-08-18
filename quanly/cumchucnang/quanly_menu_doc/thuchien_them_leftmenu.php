<?php
	chong_pha_hoai();
?>
<?php
		if($_POST['chon_menu']=="")
		{
			$tv="select * from thong_so where ma_so='8'";
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			$rel="menu-".$tv_2['gia_tri'];
			$t_1=$tv_2['gia_tri']+1;
			$up="UPDATE `thong_so` SET `gia_tri` = '$t_1' WHERE `ma_so` = '8'";
			//die($up);
			mysql_query($up);
		}
		$_SESSION['dang']=$_POST['dang'];
		$_SESSION['chon_menu']=$_POST['chon_menu'];
		if($_POST['keywords']=="")
		{
			$_POST['keywords']=$_POST['txttd'];
		}
		$sql = "
		INSERT INTO `menu`
		(
			`id` ,
			`ten`,
			`thuoc_menu`,
			`ten_en`,
			`dang`,
			`keywords`,
			`description`,
			`link`,
			`rel`
		)
		VALUES
		(
			NULL ,
			'$_POST[txttd]',
			'$_POST[chon_menu]',
			'$_POST[txttd_en]',
			'$_POST[dang]',
			'$_POST[keywords]',
			'$_POST[description]',
			'$_POST[link]',
			'$rel'
		)";
		if(trim($_POST['txttd']) != "")
		{
			mysql_query($sql);
		}
		else
		{
			thongbao("Không được bỏ trống tiêu đề !");
		}
?>