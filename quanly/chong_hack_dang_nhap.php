<?php 
	if($_SESSION['ky_danh__bcd'] && $_SESSION['mat_khau__bcd'])
	{
		$kd = $_SESSION['ky_danh__bcd'];
		$mk = $_SESSION['mat_khau__bcd'];
		$sql = "select * from thongtin_quantri where ky_danh='$kd' and mat_khau='$mk'";
		$query = mysql_query($sql);
		if(mysql_num_rows($query) == 0)
		{
			echo "chong hack";
			exit();
		}
		else
		{
		}
	}
	else 
	{
		echo "chong hack";
		exit();
	}
?>