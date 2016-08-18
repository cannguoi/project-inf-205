<?php
chong_pha_hoai();
class class__xacdinh_dangnhap
{
	function xacdinh_dangnhap()
	{
		if($_SESSION['ky_danh__bcd'] && $_SESSION['mat_khau__bcd'])
		{
			$kd = $_SESSION['ky_danh__bcd'];
			$mk = $_SESSION['mat_khau__bcd'];
			$sql = "select * from thongtin_quantri where ky_danh='$kd' and mat_khau='$mk'";
			$query = mysql_query($sql);
			if(mysql_num_rows($query) == 0)
			{
				return "khong";
			}
			else
			{
				return "co";
			}
		}
	}
}


$class_xacdinh_dangnhap=new class__xacdinh_dangnhap;
$xacdinh_dangnhap=$class_xacdinh_dangnhap->xacdinh_dangnhap();
?>