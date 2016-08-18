<?php
	chong_pha_hoai();
?>
<?php
if(isset($_POST['thongtin_quantri']))
{
	if(trim($_POST['matkhau'])=="khong_thay_doi")
	{
		//,`mat_khau`='$mk'
		$chuoi_mk="";
	}
	else 
	{
		$mk=ma_hoa($_POST['matkhau']);
		$chuoi_mk=",`mat_khau`='$mk'";
	}
	
	$tv="UPDATE `thongtin_quantri` SET `ky_danh` = '$_POST[kydanh]' $chuoi_mk  WHERE `id` =1 LIMIT 1 ;";
	mysql_query($tv);
	$_SESSION['ky_danh__bcd']=$_POST['kydanh'];
	if(trim($_POST['matkhau'])!="khong_thay_doi")
	{
		$mk=ma_hoa($_POST['matkhau']);
		$_SESSION['mat_khau__bcd']=$mk;
	}

	trangtruoc();
}

$thongtin_quantri_chuoi="select * from thongtin_quantri where id in ('1')";
$thongtin100=mysql_query($thongtin_quantri_chuoi);
$thongtin_quantri=mysql_fetch_array($thongtin100);
echo "<table  width=\"990px\"><tr><td >";
echo "<form action=\"\" method=\"post\">
<table border=\"0\" width=\"600px\">
	<tr>
		<td width=\"120px\">
			<b>Ký danh : </b>
		</td>
		<td width=\"480px\">
			<input name=\"kydanh\" value=\"$thongtin_quantri[ky_danh]\">
		</td>
	</tr>
	<tr>
		<td width=\"120px\" valign='top'>
			<b>Mật khẩu : </b>
		</td>
		<td width=\"480px\">
			<input name=\"matkhau\" type=\"password\" value=\"khong_thay_doi\"><br>
			<div style='height:6px;width:5px;overflow:hidden'></div>
			<span style='font-size:14px'>Nhập 'khong_thay_doi' nếu không muốn đổi pass</span><br>
			<div style='height:6px;width:5px;overflow:hidden'></div>
			<span style='font-size:14px'>Mặc định mật khẩu không thay đổi</span>
		</td>
	</tr>
	<tr>
		<td colspan=\"2\">
			<span style=\"margin-left:20%\"><input type=\"submit\" value=\"Chấp nhận\" name=\"thongtin_quantri\"></span>
		</td>
	</tr>
</table>
</form>";
echo"</td></tr></table>";

?>