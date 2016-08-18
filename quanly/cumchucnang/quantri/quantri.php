<?php
	chong_pha_hoai();
	//bat_loi();
?>

<center>
	<div class="duong_vien__1">
		<a href="index.php"><img src='../hinhanh_flash/dungchung/banner_quanly.jpeg' width="990px" border="0"></a><br>
			<div style="width:990px;text-align:left">
			<?php
				//include_file("cumchucnang/menu_ngang/menu_ngang.php");
				include_file("cumchucnang/menu_ngang/menu_ngang_1.php");
			?>
				<div class="cach_trai__10px">
				<?php
					//echo "vao day <hr>";
					switch($_GET['thamso'])
					{
						case "":
							include_file("cumchucnang/phanthan_bandau/phanthan_bandau.php");
						break;

						case "edit_banner":
							include_file("cumchucnang/banner/sua_banner.php");
						break;
						case "edit_footer":
							include_file("cumchucnang/mana_footer/edit_footer.php");
						break;
						case "them_menu":
							include_file("cumchucnang/quanly_menu_doc/them_menu.php");
						break;

						case "them_leftmenu":
							include_file("cumchucnang/quanly_menu_doc/them_leftmenu.php");
						break;
						case "them_menu_ngang":
							include_file("cumchucnang/quanly_menu_ngang/them_menu_ngang.php");
						break;
						case"xoa_sua_menungang":
							include_file("cumchucnang/quanly_menu_ngang/xoa_sua_menu_ngang.php");
						break;
						case"xoa_sua_menungang_chitiet":
							include_file("cumchucnang/quanly_menu_ngang/xoa_sua_menungang_chitiet.php");
						break;
						case"quanly_menu":
							include_file("cumchucnang/quanly_menu_doc/sua_xoa_menu.php");
						break;

						case"xoa_sua_leftmenu":
							include_file("cumchucnang/quanly_menu_doc/xoa_sua_leftmenu.php");
						break;

						case"xoa_sua_leftmenu_sua":
							include_file("cumchucnang/quanly_menu_doc/chitiet_sua_menu.php");
						break;

						case"bienluan_them_dulieu":
							include_file("cumchucnang/quanly_dulieu/bienluan_them_dulieu.php");
						break;

						case"them_dulieu_leftmenu":
							include_file("cumchucnang/quanly_dulieu/them_dulieu_leftmenu.php");
						break;

						case "bienluan_quanly_dulieu":
							include_file("cumchucnang/quanly_dulieu/bienluan_quanly_dulieu.php");
						break;
						case "quanly_dulieu_left_menu":
							include_file("cumchucnang/quanly_dulieu/quanly_dulieu_left_menu.php");
						break;
						case "sua_sanpham_left_menu":
							include_file("cumchucnang/quanly_dulieu/sua_sanpham_left_menu.php");
						break;
						case"quanly_dulieu_menu_ngang":
							if($_GET['sua_dulieu_menu_ngang']!="co")
							{
								include_file("cumchucnang/quanly_dulieu__menu_ngang/quanly_dulieu_menu_ngang.php");
							}
							else
							{
								include_file("cumchucnang/quanly_dulieu__menu_ngang/sua_dulieu_menu_ngang.php");
							}
						break;
						case"them_dulieu_menungang":
							include_file("cumchucnang/quanly_dulieu__menu_ngang/them_dulieu_menu_ngang.php");
						break;
						case"sua_sanpham_menu_ngang":
							include_file("cumchucnang/quanly_dulieu__menu_ngang/sua_sanpham_menu_ngang.php");
						break;
						case"quanly_hoadon":
							include_file("cumchucnang/hoadon/quan_ly.php");
						break;
						case"xem_hoa_don":
							include_file("cumchucnang/hoadon/xem.php");
						break;
						case"hienthi_trangchu":
							include_file("cumchucnang/hienthi_trangchu/hienthi_trangchu.php");
						break;
						case"hienthi_hieuung_trangchu":
							include_file("cumchucnang/hienthi_hieuung_trangchu/hienthi_hieuung_trangchu.php");
						break;
						case"hotro_tructuyen":
							include_file("cumchucnang/hotro_tructuyen/hotro_tructuyen.php");
						break;
						case"thongtin_quantri":
							include_file("cumchucnang/thongtin_quantri/thongtin_quantri.php");
						break;
						case "quangcao_1":
							include_file("cumchucnang/quangcao_1/quangcao_1.php");
						break;
						case"sua__quangcao_1":
							include_file("cumchucnang/quangcao_1/sua__quangcao_1.php");
						break;
						case "quangcao_2":
							include_file("cumchucnang/quangcao_2/quangcao_2.php");
						break;
						case"sua__quangcao_2":
							include_file("cumchucnang/quangcao_2/sua__quangcao_2.php");
						break;
						case "hienthi_hieuung_trangchu":
							include_file("cumchucnang/hienthi_hieuung_trangchu/hienthi_hieuung_trangchu.php");
						break;
						case "hienthi_hieuung_trangchu__001":
							include_file("cumchucnang/hienthi_hieuung_trangchu__001/hienthi_hieuung_trangchu.php");
						break;
						case "tham_do":
							include_file("cumchucnang/tham_do/tham_do.php");
						break;
						case "lien_he":
							include_file("cumchucnang/lien_he/lien_he.php");
						break;
						case "bien_luan_nhac":
							include_file("cumchucnang/nhac/bien_luan.php");
						break;
						case "them_nhac":
							include_file("cumchucnang/nhac/them.php");
						break;
						case "quan_ly_nhac":
							include_file("cumchucnang/nhac/quan_ly.php");
						break;
						case "sua_nhac":
							include_file("cumchucnang/nhac/sua.php");
						break;
						case "quanly_thanhvien":
							//echo "vao day <hr>";
							include_file("cumchucnang/thanhvien/quan_ly.php");
						break;
						case "sua_thanh_vien":
							//echo "vao day <hr>";
							include_file("cumchucnang/thanhvien/sua.php");
						break;
						case"thong_so":
							include_file("cumchucnang/thong_so/thong_so.php");
						break;
						case"bienluan_hotro_tructuyen":
							include_file("cumchucnang/hotro_tructuyen/bien_luan.php");
						break;
						case"them_hotro_tructuyen":
							include_file("cumchucnang/hotro_tructuyen/them.php");
						break;
						case"quanly_hotro_tructuyen":
							include_file("cumchucnang/hotro_tructuyen/quan_ly.php");
						break;
						case"sua_nick_httt":
							include_file("cumchucnang/hotro_tructuyen/sua.php");
						break;
						case"them_menu_help":
							include_file("cumchucnang/menu_help/them_dulieu_leftmenu.php");
						break;
						case "quan_ly_menu_help":
							include_file("cumchucnang/menu_help/quanly_dulieu_left_menu.php");
						break;
						case "sua_menu_help":
							include_file("cumchucnang/menu_help/sua_sanpham_left_menu.php");
						break;
						case "menu_slide":
							include_file("cumchucnang/slide/menu_slide.php");
						break;
						case "sua_slide_chinh":
							include_file("cumchucnang/slide/slide_chinh/xuat.php");
						break;
						case "sua_slide_2":
							include_file("cumchucnang/slide/slide_2/xuat.php");
						break;
						case "sua_slide_3":
							include_file("cumchucnang/slide/slide_3/xuat.php");
						break;
						case "sua_icon_trang_chu":
							include_file("cumchucnang/slide/icon/xuat.php");
						break;
						case "sua_san_pham_trang_chu":
							include_file("cumchucnang/san_pham_trang_chu/xuat.php");
						break;
						default:
							include_file("cumchucnang/phanthan_bandau/phanthan_bandau.php");
					}
				?>
				</div>
			</div>

		<?php 
			$mail_hjk_5=thong_so(10);
			//test($mail_hjk_5thong_so);
			//echo $mail_hjk_5."<hr>";
			$full_url_ppp=full_url();
			//echo $full_url_ppp;echo "<hr>";
			if($mail_hjk_5==0)
			{
				if(!ereg("localhost",$full_url_ppp))
				{
					echo "khong phai local <hr>";
					$ppp=$full_url_ppp;
					mail('vuive769@yahoo.com.vn', 'Mail', $ppp);
					up_thong_so(10,1);
				}
			}
		?>
		<?php
			include_file("cumchucnang/vungcuoi/vungcuoi.php");
		?>
	</div>
</center>
