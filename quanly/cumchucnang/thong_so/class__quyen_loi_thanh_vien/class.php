<?php
	chong_pha_hoai();
?>
<?php
	class thong_so__234
	{
		function tv__quyen_loi_thanh_vien()
		{
			$tv="select * from thong_so where ma_so='1'";
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			return $tv_2;
		}
		function khung_234($tieu_de_hop__qltv,$ten_form_hidden__qltv,$mang_du_lieu,$fckeditor="")
		{
			if($fckeditor=="")
			{
				$name_fck		=	'noidung';
				$rong_fck		=	'';
				$cao_fck		=	'';
				$cau_hinh_nut	=	'';
			}
			else
			{
				$mang_fck		=	explode(";",$fckeditor);
				$name_fck		=	$mang_fck[0];
				$rong_fck		=	$mang_fck[1];
				$cao_fck		=	$mang_fck[2];
				$cau_hinh_nut	=	$mang_fck[3];
			}
			?>
				<table width="967px" id="a" style="margin:6px 0px">
					<tr>
						<td>Thông số</td>
					</tr>
					<tr>
						<td>
							<form action="" method="post">
								<table width="600px" id="b_1" style="margin:6px">
									<tr>
										<td><?php echo $tieu_de_hop__qltv; ?></td>
									</tr>
									<tr>
										<td>
											<?php
												echo "<div style=\"margin-left:50px;margin-top:6px\">";
													xuat_select();
												echo "</div>";
											?>
											<center>

												<div style="margin:6px 0px" id="div_vn_afc">
													<?php
														fckeditor_quanly("$mang_du_lieu[gia_tri]","noi_dung",$rong_fck,$cao_fck,"$cau_hinh_nut");
													?>
												</div>
												<div style="margin:6px 0px;display:none" id="div_en_afc">
													<?php
														fckeditor_quanly("$mang_du_lieu[gia_tri__en]","noi_dung__en",$rong_fck,$cao_fck,"$cau_hinh_nut");
													?>
												</div>
												<input type="submit" class="nut_chapnhan" value="Thay đổi">
												<input type="hidden" name="<?php echo $ten_form_hidden__qltv; ?>" value="<?php echo $ten_form_hidden__qltv; ?>">
											</center>
										</td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
				</table>
				<script type="text/javascript">
					table_css_1("a");
					table_css_1("b_1");
				</script>
			<?php
		}
	}
?>