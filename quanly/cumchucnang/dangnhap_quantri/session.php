<?php
	chong_pha_hoai();
	$_SESSION['ky_danh__bcd']=$_POST['ky_danh'];
	$_SESSION['mat_khau__bcd']=ma_hoa(trim($_POST['mat_khau']));
	

	$kd = $_SESSION['ky_danh__bcd'];
	$mk = $_SESSION['mat_khau__bcd'];
	//thongbao($mk);
	$sql = "select * from thongtin_quantri where ky_danh='$kd' and mat_khau='$mk'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) == 0)
	{
		//return "khong";
		thongbao("Sai user hoặc pass");
	}
	else
	{
		//return "co";
	}

?>