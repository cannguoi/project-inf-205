<?php
chong_pha_hoai();
function xuly_query_upload_anh(){
	$tb_tintuc="tintuc";
	$feild_anh_tt="hinh_anh";
	$ten_file_anh=$_FILES['uploadedfile']['name'];
	if($ten_file_anh=="")
	{
		return "co";
	}
	else
	{
		//xu ly khi co file upload
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		$chuoi_dem_anh="select count(*) from dulieu_1 where hinh_anh in ('$ten_file_anh')";
		$dem_anh=mysql_fetch_row(mysql_query($chuoi_dem_anh));
		$dem_anh=mysql_fetch_row(mysql_query($chuoi_dem_anh));
		if($dem_anh[0]==0)
		{
			return "co";
		}
		else
		{
			return "khong";
		}
	}
}
function xacdinh_ten_anh_update(){
	$ten_file_anh=$_FILES['uploadedfile']['name'];
	if($ten_file_anh!="")
	{
		return $ten_file_anh;
	}
	else
	{
		return $_POST['ten_anh'];
	}

}
function upanh(){
	$ten_file_anh_1=$_FILES['uploadedfile']['name'];

	$duongdan_upload_anh="../hinhanh_flash/tintuc/$ten_file_anh_1";
	move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
}
function thuchien_sua_dulieu_sanpham()
{
	//$xuly_query_upload_anh=xuly_query_upload_anh();
	//thongbao("$xuly_query_upload_anh");
	//if($xuly_query_upload_anh=="co")
	//{
		if($_POST['tieude']!="")
		{
			$ten_file_anh_1=$_FILES['uploadedfile']['name'];
			upanh();
			$ten_anh=xacdinh_ten_anh_update();
			$update="UPDATE `du_lieu_mot_tin` SET `ten` = '$_POST[tieude]',`noi_dung`='$_POST[noidung]',
			`keywords`='$_POST[keywords]',`description`='$_POST[description]'
					WHERE `id` ='$_GET[id_mnn]';";
		mysql_query($update);
		}
		else
		{
			thongbao("Không được bỏ trống tiêu đề");
		}
	//}
	//else
	//{
		//thongbao("File ảnh này trùng tên với tên file ảnh đã up len , xin bạn hãy đổi tên file ảnh !");
	//}
	//trangtruoc();
}
thuchien_sua_dulieu_sanpham();
//thongbao("dung lai");
?>