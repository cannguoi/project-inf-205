<?php
	chong_pha_hoai();
?>
<?php

	
	if(isset($_POST['them_left_menu']))
	{
		//thongbao($_POST['them_left_menu']);
		include_file("cumchucnang/quanly_menu_doc/thuchien_them_leftmenu.php");
		trangtruoc();
	}
	if(isset($_POST['sua_left_menu']))
	{
		include_file("cumchucnang/quanly_menu_doc/thuchien_sua_leftmenu.php");
		trangtruoc();
	}
	if(isset($_POST['them_dulieu_menu_doc']))
	{
		include_file("cumchucnang/quanly_dulieu/thuchien_them_sanpham_vao_leftmenu.php");
		trangtruoc();
	}
	if(isset($_POST['sua_dulieu_menu_doc']))
	{
		include_file("cumchucnang/quanly_dulieu/thuchien_sua_sanpham_left_menu.php");
		trangtruoc();
	}
	if(isset($_POST['them_menu_ngang']))
	{
		include_file("cumchucnang/quanly_menu_ngang/thuchien_them_menu_ngang.php");
		trangtruoc();
	}
	if(isset($_POST['sua_menu_ngang']))
	{
		include_file("cumchucnang/quanly_menu_ngang/thuchien_sua_menu_ngang.php");
		trangtruoc();
	}
	if(isset($_POST['them_dulieu_menu_ngang']))
	{
		include_file("cumchucnang/quanly_dulieu__menu_ngang/thuchien_them_dulieu_menu_ngang.php");
		trangtruoc();
	}
	if(isset($_POST['sua_dulieu_menu_ngang']))
	{
		include_file("cumchucnang/quanly_dulieu__menu_ngang/thuchien_sua_dulieu_menu_ngang.php");
		trangtruoc();
	}
	if(isset($_POST['thaydoi_banner']))
	{
		include_file("cumchucnang/banner/thuchien__sua_banner.php");
		trangtruoc();
	}
	if(isset($_POST['thaydoi_banner_phu']))
	{
		//$class__banner=new class__banner;
		//$class__banner->kiem_tra_anh__va__thaydoi_banner_phu();
		include_file("cumchucnang/banner/thuchien__sua_banner_phu.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['them_nhac']))
	{
		include_file("cumchucnang/nhac/thuc_hien_them.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['sua_nhac']))
	{
		include_file("cumchucnang/nhac/thuc_hien_sua.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['sua_thanh_vien']))
	{
		include_file("cumchucnang/thanhvien/thuc_hien_sua.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['thay_doi__quyen_loi_thanh_vien']))
	{
		include_file("cumchucnang/thanhvien/sua_qltv.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['them_lien_lac_abc']))
	{
		include_file("cumchucnang/hotro_tructuyen/thuc_hien_them.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['sua_nick__httt']))
	{
		include_file("cumchucnang/hotro_tructuyen/thuc_hien_sua.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['sua_ty_gia_tien']))
	{
		include_file("cumchucnang/ty_gia_tien/thuc_hien_sua.php");
		trangtruoc();
		exit();
	}
	if(isset($_POST['them_menu_help']))
	{
		include_file("cumchucnang/menu_help/thuchien_them_sanpham_vao_leftmenu.php");
		trangtruoc();
	}
	if(isset($_POST['sua_menu_help']))
	{
		include_file("cumchucnang/menu_help/thuchien_sua_sanpham_left_menu.php");
		trangtruoc();
	}
	if(trim($_POST['sua_slide_chinh'])=="sua_slide_chinh")
	{
		include_file("cumchucnang/slide/slide_chinh/thuc_hien_sua.php");
		trangtruoc();
	}
	if(trim($_POST['sua_slide_2'])=="sua_slide_2")
	{
		include_file("cumchucnang/slide/slide_2/thuc_hien_sua.php");
		trangtruoc();
	}
	if(trim($_POST['sua_slide_3'])=="sua_slide_3")
	{
		include_file("cumchucnang/slide/slide_3/thuc_hien_sua.php");
		trangtruoc();
	}
	if(trim($_POST['sua_icon_trang_chu'])=="sua_icon_trang_chu")
	{
		include_file("cumchucnang/slide/icon/thuc_hien_sua.php");
		trangtruoc();
	}
	if(trim($_POST['sua_san_pham_trang_chu'])=="sua_san_pham_trang_chu")
	{
		include_file("cumchucnang/san_pham_trang_chu/thuc_hien_sua.php");
		trangtruoc();
	}
?>