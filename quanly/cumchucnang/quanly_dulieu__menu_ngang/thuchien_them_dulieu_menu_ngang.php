<?php
	chong_pha_hoai();
?>
<?php
	$ten_file_anh=$_FILES['uploadedfile']['name'];
	if($ten_file_anh=="")
	{
		$ten_file_anh="bo_trong";
	}
	$dem_anh=mysql_fetch_row(mysql_query("select count(*) from dulieu_1 where hinh_anh in ('$ten_file_anh')"));
	if($dem_anh[0]==0)
	{
		if($_POST['tieude']!="")
		{
			$ten_file_anh_1=$_FILES['uploadedfile']['name'];

			$duongdan_upload_anh="../hinhanh_flash/tintuc/$ten_file_anh_1";
			move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
			$insert="
			INSERT INTO `dulieu_1`
			(
				`id` ,
				`tieu_de` ,
				`hinh_anh` ,
				`noi_dung` ,
				`thuoc_menu`,
				`tieu_de__en`,
				`noi_dung__en`
			 )
			VALUES
			(
				NULL ,
				'$_POST[tieude]',
				'$ten_file_anh_1',
				'$_POST[noidung]',
				'$_POST[capdo]',
				'$_POST[tieude_en]',
				'$_POST[noidung_en]'
			);";
		mysql_query($insert);
		}
		else
		{
			thongbao("Không được bỏ trống tiêu đề");
		}
	}
	else
	{
		thongbao("File ảnh này trùng tên với tên file ảnh đã up len , xin bạn hãy đổi tên file ảnh !");
	}
?>