<?php
	chong_pha_hoai();
	//thongbao("vao day hahaahah");
	//thongbao($_POST['hd_dkl']);
	//thongbao("vao day");exit();
?>
<?php
class class__kiemtra_va_sua_du_lieu
{
	function up_lai_nhieu_hinh()
	{
		$id								=	$_GET['id_sp'];
		for($i=0;$i<$_POST['hd_dkl']-1;$i++)
	 	{
	 		$o_1=$i+1;
			$name_1						=	"nhieu_hinh_abc__$o_1";
			$name_2						=	"hidden_nhieu_hinh_abc__$o_1";
			$name_3						=	"tuy_chon_abc__$o_1";
			$post_1						=	$_FILES[$name_1]['name'];
			$post_2						=	$_POST[$name_2];
			$post_3						=	$_POST[$name_3];
			if($post_1!="")
			{
				//$hinh_hop_le=kiem_tra_hinh_hop_le($post_1);
				$ten_file_anh_1			=	$post_1;
				$duongdan_upload_anh	="../hinhanh_flash/sanpham/$id/$ten_file_anh_1";
				move_uploaded_file($_FILES[$name_1]['tmp_name'],$duongdan_upload_anh);
				unlink("../hinhanh_flash/sanpham/$id/$post_2");
			}
		}
	}
	function up_nhieu_hinh()
	{
		$id								=	$_GET['id_sp'];
		$mang							=	getDirectoryList("../hinhanh_flash/upload_tam/");
	 	// ham getDirectoryList :lay danh sach file trong thu muc , tra ve mang
	 	if(count($mang)!=0)
	 	{
	 		if(!is_dir("../hinhanh_flash/sanpham/$id"))
	 		{
			 	mkdir("../hinhanh_flash/sanpham/$id", 0700);
			}
	 		for($i=0;$i<count($mang);$i++)
	 		{
				$hinh=$mang[$i];
				$file_cu					=	"../hinhanh_flash/upload_tam/$hinh";
				$file_moi					=	"../hinhanh_flash/sanpham/$id/$hinh";
				copy($file_cu, $file_moi);
			}
		}
	}
	function nhieu_hinh_anh()
	{
		$chuoi							=	"";
		for($i=0;$i<$_POST['hd_dkl']-1;$i++)
	 	{
	 		$o_1=$i+1;
			$name_1						=	"nhieu_hinh_abc__$o_1";
			$name_2						=	"hidden_nhieu_hinh_abc__$o_1";
			$name_3						=	"tuy_chon_abc__$o_1";
			$post_1						=	$_FILES[$name_1]['name'];
			$post_2						=	$_POST[$name_2];
			$post_3						=	$_POST[$name_3];
			if($post_3!="xoa")
			{
				if($post_1!="")
				{
					$chuoi				=	$chuoi.$post_1."____";
				}
				else
				{
					$chuoi				=	$chuoi.$post_2."____";
				}
			}
		}
	 	$mang=getDirectoryList("../hinhanh_flash/upload_tam/");
	 	// ham getDirectoryList :lay danh sach file trong thu muc , tra ve mang
	 	if(count($mang)!=0)
	 	{
		 	for($i=0;$i<count($mang);$i++)
		 	{
				$chuoi=$chuoi.$mang[$i]."____";
			}
		}

		return $chuoi;
	}
	function xacdinh_ten_anh_update()
	{
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
	function sua_mot_dong_mysql()
	{
		//$nhieu_hinh_anh=$this->nhieu_hinh_anh();
		//$this->up_nhieu_hinh();
		//$this->up_lai_nhieu_hinh();
		include("cumchucnang/bien/bien.php");
		//$ten_anh=$this->xacdinh_ten_anh_update();
		$update="UPDATE `help` SET `ten_menu` = '$_POST[tieude]',
				`ten` = '$_POST[ten_bai_viet]',
				
				`noi_dung`='$_POST[noidung]',
				`dang`='$_POST[dang]'		

				 WHERE `id` ='$_GET[id_sp]';";
		mysql_query($update);
		empty_forder("../hinhanh_flash/upload_tam/");
		// ham empty_forder : lam rong thu muc
	}
	function upload()
	{
		$ten_file_anh_1=$_FILES['uploadedfile']['name'];
		$duongdan_upload_anh="../hinhanh_flash/sanpham/$ten_file_anh_1";
		move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
	}
	function kiemtra_tieude()
	{
		if($_POST['tieude']!="")
		{
			//$this->upload();
			$this->sua_mot_dong_mysql();
		}
		else
		{
			thongbao("Không được bỏ trống tiêu đề");
		}
	}
	function kiemtra_hinhanh__co_khong()
	{
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		if($ten_file_anh=="")
		{
			return "co";
		}
		else
		{
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			if($ten_file_anh=="")
			{
				$ten_file_anh="bo_trong";
			}
			$dem_anh=mysql_fetch_row(mysql_query("select count(*) from dulieu where hinh_anh in ('$ten_file_anh')"));
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
	function kiemtra_hinhanh()
	{

			$this->kiemtra_tieude();


		trangtruoc();
	}
	function kiemtra_va_sua_du_lieu()
	{
		//if(isset($_POST['sua_dulieu_menu_doc']))
		//{
			//echo "sua du lieu";
			$this->kiemtra_hinhanh();
		//}
	}
}
$class__kiemtra_va_sua_du_lieu=new class__kiemtra_va_sua_du_lieu;
	$class__kiemtra_va_sua_du_lieu->kiemtra_va_sua_du_lieu();
?>