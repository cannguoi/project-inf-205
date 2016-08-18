<?php
	chongphahoai();
?>
<?php
	function upload()
	{
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		$duongdan_upload="../hinhanh_flash/quangcao/$ten_file_anh";
		//thongbao("$duongdan_upload");
		move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload);
	}
	function xacdinh_upload_khong_trung_ten_anh()
	{
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		$mang_so_dem_so_anh=mysql_fetch_row(mysql_query("select count(*) from quangcao_1 where ten_file in ('$ten_file_anh')"));
		$soanh_demduoc=$mang_so_dem_so_anh[0];
		if($soanh_demduoc==0)
		{
			return "co";
		}
		else
		{
			if($ten_file_anh=="")
			{
				return "co";
			}
			else
			{
				return "khong";
			}
		}
	}
?>
<?php
	if(isset($_POST['them_quangcao_1']))
	{
		//them quang cao

		$ten_file_anh=$_FILES['uploadedfile']['name'];
		if($ten_file_anh!="")
		{
			$xacdinh_upload_khong_trung_ten_anh=xacdinh_upload_khong_trung_ten_anh();
			if($xacdinh_upload_khong_trung_ten_anh=="co")
			{
				$them=
				"
					INSERT INTO `quangcao_1` 
					(
						`id` ,
						`ten_file` ,
						`link` ,
						`rong` ,
						`cao`
					)
					VALUES
					(
						NULL , 
						'$ten_file_anh', 
						'$_POST[lienket_quangcao]', 
						'$_POST[rong]', 
						'$_POST[cao]'
					);
				";
				mysql_query($them);
				upload();
			}
			else
			{
				thongbao("Filenày trùng tên , bạn hãy đổi tên file ");
			}
		}
		else
		{
			thongbao("Upload thất bại do không có file upload !");
		}
		trangtruoc();
	}
?>
<center>
	<h1 style="color:red">Thêm quãng cáo</h1>
</center>

<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td width="150px">
				Tải lên tập tin : 
			</td>
			<td>
				<input type="file" name="uploadedfile">
			</td>
		</tr>
		<tr>
			<td>
				Liên kết quãng cáo :
			</td>
			<td>
				<input name="lienket_quangcao" style="width:200px">
			</td>
		</tr>
		<tr>
			<td>
				Rộng :
			</td>
			<td>
				<input name="rong" style="width:200px" value="165px">
			</td>
		</tr>
		<tr>
			<td>
				Cao :
			</td>
			<td>
				<input name="cao" style="width:200px" value="80px">
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<input type="submit" class="nut_chapnhan" name="them_quangcao_1" value="Thêm">
			</td>
		</tr>
	</table>
</form>
<?php
	require("cumchucnang/quangcao_1/sua_xoa.php");
?>
