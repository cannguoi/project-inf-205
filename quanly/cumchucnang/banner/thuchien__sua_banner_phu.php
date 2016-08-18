<?php
	chong_pha_hoai();
	class class___thuchien_sua_banner_phu
	{
		function upload_anh()
		{
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			$duongdan_upload_anh="../hinhanh_flash/banner_phu/$ten_file_anh";
			if($ten_file_anh!="")
			{
				move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
			}
			$ten_file_anh=$_FILES['uploadedfile_en']['name'];
			$duongdan_upload_anh="../hinhanh_flash/banner_phu/$ten_file_anh";
			if($ten_file_anh!="")
			{
				move_uploaded_file($_FILES['uploadedfile_en']['tmp_name'],$duongdan_upload_anh);
			}
		}
		function thaydoi_banner_phu()
		{
			$de							=	"select * from banner_phu where id in ('1')";
			$de_1						=	mysql_query($de);
			$de_2						=	mysql_fetch_array($de_1);
			$ten_file					=	$de_2['ten_file'];
			$ten_file__en				=	$de_2['ten_file__en'];
			$cao						=	$de_2['cao'];
			$rong						=	$de_2['rong'];
			$link_xoa					=	"../hinhanh_flash/banner_phu/$ten_file";
			//unlink($link_xoa);
			$ten_file_anh				=	$_FILES['uploadedfile']['name'];
			if($ten_file_anh==""){$ten_file_anh=$ten_file;}
			$ten_file_anh__en			=	$_FILES['uploadedfile_en']['name'];
			if($ten_file_anh__en==""){$ten_file_anh__en=$ten_file__en;}
			$up="
				UPDATE `banner_phu` SET

					`ten_file` = '$ten_file_anh',
					`ten_file__en` = '$ten_file_anh__en',
					`rong` = '$rong',
					`cao` = '$cao'

				WHERE `id` ='1';
			";
			mysql_query($up);
			$this->upload_anh();
		}
		function kiem_tra_anh__va__thaydoi_banner_phu()
		{
			//thongbao("vao day");
			$this->thaydoi_banner_phu();
		}
	}
	$class___thuchien_sua_banner_phu=new class___thuchien_sua_banner_phu;
	$class___thuchien_sua_banner_phu->kiem_tra_anh__va__thaydoi_banner_phu();
?>