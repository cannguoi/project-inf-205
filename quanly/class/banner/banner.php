<?php
	chong_pha_hoai();
	//echo "dfsdsdf";
	class class__banner
	{
		function mang_banner_sql()
		{
			$chuoi="select * from banner_phu where id in ('1')";
			$truyvan_chuoi=mysql_query($chuoi);
			$mang=mysql_fetch_array($truyvan_chuoi);
			return $mang;
		}
		function upload_anh()
		{
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			$duongdan_upload_anh="../hinhanh_flash/banner_phu/$ten_file_anh";
			move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
		}
		function xoa_file_cu()
		{
			$mang_banner_sql=$this->mang_banner_sql();
			$ten_file=$mang_banner_sql['ten_file'];
			$link_xoa="../hinhanh_flash/banner_phu/$ten_file";
			if($ten_file!="")
			{
				unlink($link_xoa);
			}
		}
		function thaydoi_mot_dong_trong_sql()
		{
			$mang_banner_sql=$this->mang_banner_sql();
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			$cao=$_POST['cao'];
			$rong=$_POST['rong'];
			$up="
				UPDATE `banner_phu` SET 
				
					`ten_file` = '$ten_file_anh',
					`rong` = '$rong',
					`cao` = '$cao' 
					
				WHERE `id` ='1';
			";
			return mysql_query($up);
		}
		function thaydoi_banner_phu()
		{
			$this->xoa_file_cu();
			$this->thaydoi_mot_dong_trong_sql();
			$this->upload_anh();
		}
		function kiem_tra_anh__va__thaydoi_banner_phu()
		{
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			if($ten_file_anh!="")
			{
				$this->thaydoi_banner_phu();
			}
			else
			{
				thongbao("Bạn chưa chọn hình ảnh hoặc flash để thay thế !");
			}
		}
	}
?>