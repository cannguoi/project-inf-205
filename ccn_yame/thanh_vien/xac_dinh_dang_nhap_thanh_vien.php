<?php
	chong_pha_hoai();
?>
<?php 
	$kd_lll=$_SESSION[$ten_danh_dau__kkk.'ky_danh__zzz'];
	$mk_lll=$_SESSION[$ten_danh_dau__kkk.'mat_khau__zzz'];
	if($kd_lll!="" and $mk_lll!="")
	{
		$tv="select count(*) from thanh_vien where ky_danh='$kd_lll' and mat_khau='$mk_lll'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		if($tv_2!=0)
		{
			$xac_dinh_dang_nhap_thanh_vien="co";	
		}
		else 
		{
			$xac_dinh_dang_nhap_thanh_vien="khong";	
		}
	}
	else 
	{
		$xac_dinh_dang_nhap_thanh_vien="khong";
	}
?>