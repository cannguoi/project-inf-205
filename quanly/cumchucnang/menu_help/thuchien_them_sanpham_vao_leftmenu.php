<?php
chong_pha_hoai();
//thongbao("vao day");
//exit();
class class__kiem_tra_form_de_them_du_lieu
{
	function chuoi_nhieu_hinh_anh()
	{
		$mang=getDirectoryList("../hinhanh_flash/upload_tam/");
		// ham getDirectoryList :lay danh sach file trong thu muc , tra ve mang
		$chuoi="";
		for($i=0;$i<count($mang);$i++)
		{
			$chuoi=$chuoi.$mang[$i]."____";
		}
		if($chuoi=="____")
		{
			$chuoi="";
		}
		return $chuoi;
	}
	function them_vao_co_so_du_lieu_mot_dong(){
		//chong_90($ten_file_anh);
		// ham empty_forder : lam rong thu muc
		//$chuoi_nhieu_hinh_anh=$this->chuoi_nhieu_hinh_anh();
		$_SESSION['dang_help']=trim($_POST['dang']);
		$_SESSION['capdo_help']=trim($_POST['capdo']);
		//$ten_file_anh=$_FILES['uploadedfile']['name'];
		//$_POST['size']=trim($_POST['size']);
		//if(trim($_POST['keywords'])==""){$_POST['keywords']=trim($_POST['tieude']);}
		$chuoi_dulieu_themvao="
		INSERT INTO `help`
		(
			 `id` , `ten_menu` , `ten` ,`noi_dung`, `dang` ,
			 `sap_xep` , `thuoc_menu`)
		VALUES
		(
			NULL , '$_POST[tieude]', '$_POST[ten_bai_viet]','$_POST[noidung]', '$_POST[dang]',
			 '$sap_xep', '$_POST[capdo]'
		);";
		//die($chuoi_dulieu_themvao);
		//thongbao("dd");
			mysql_query($chuoi_dulieu_themvao);

	}
	function upload_anh(){
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		$duongdan_upload_anh="../hinhanh_flash/sanpham/$ten_file_anh";
		chong_90($ten_file_anh);
		move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
	}
	function them_du_lieu(){
		//$this->upload_anh();
		$this->them_vao_co_so_du_lieu_mot_dong();
	}
	function kiem_tra_tieu_de_form(){
			if($_POST['tieude']!="")
			{
				$this->them_du_lieu();
			}
			else
			{
				thongbao("Không được bỏ trống tiêu đề");
			}
	}
	function xacdinh_upload_khong_trung_ten_anh(){
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		$chuoi_tv="select count(*) from dulieu where hinh_anh in ('$ten_file_anh')";
		//thongbao($chuoi_tv);
		$mang_so_dem_so_anh=mysql_fetch_row(mysql_query($chuoi_tv));
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
	function kiem_tra_hinh_anh_form(){
		$xacdinh_upload_khong_trung_ten_anh=$this->xacdinh_upload_khong_trung_ten_anh();
		if($xacdinh_upload_khong_trung_ten_anh=="co")
		{
			$this->kiem_tra_tieu_de_form();
		}
		else
		{
			thongbao("File ảnh này trùng tên với tên file ảnh đã up len , xin bạn hãy đổi tên file ảnh !");
		}
	}
	function kiem_tra_form_de_them_du_lieu()
	{

			$this->kiem_tra_tieu_de_form();

	}
}
$class__kiem_tra_form_de_them_du_lieu=new class__kiem_tra_form_de_them_du_lieu;
	$class__kiem_tra_form_de_them_du_lieu->kiem_tra_form_de_them_du_lieu();
?>