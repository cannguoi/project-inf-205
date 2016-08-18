<?php
	chong_pha_hoai();
	//echo "chao <hr>";
	$tv="select * from hotro_tructuyen where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$dia_chi=str_replace("<br />","",$tv_2['dia_chi']);
?>
<center>
	<form action="" method="post">
		<table id="er" width="968px" style="text-align:left;margin-top:6px">
			<tr>
				<td>
					Sữa nick yahoo
					<a href="?thamso=quanly_hotro_tructuyen&trang=<?php echo $_GET['trang']; ?>" style="display:inline-block;margin-left:815px;color:#0b55c4;outline:0;text-decoration: none" hidefocus="true">Đóng</a>
				</td>
			</tr>
			<tr>
				<td>
					<table id="er_1" style="margin:6px 6px 6px 6px" width="650px">
						<tr>
							<td width="100px"><b>Loại nick :</b></td>
							<td>
								<?php
									if($tv_2['loai_nick']=="yahoo")
									{
										$a_1="selected";
										$a_2="";
									}
									else
									{
										$a_1="";
										$a_2="selected";
									}
								?>
								<select name="loai_nick">
									<option value="yahoo" <?php echo $a_1; ?>>Yahoo</option>
									<option value="skype" <?php echo $a_2; ?>>Skype</option>
								</select>
							</td>
						</tr>
						<tr>
							<td width="120px"><b>Tên nick :</b></td>
							<td><input style="width:300px" name="ten_nick" value="<?php echo $tv_2['nickname'];?>"></td>
						</tr>
						<tr>
							<td width="120px"><b>Mô tả ngắn :</b></td>
							<td>
								<center>
									<div style="margin:6px 0px">
										<?php
											fckeditor_quanly($tv_2['mo_ta'],"noidung",500,100,"rut_gon_2");
										?>
									</div>
								</center>
							</td>
						</tr>
						<tr>
							<td width="120px"><b>Mô tả ngắn :<br>(English)</b></td>
							<td>
								<center>
									<div style="margin:6px 0px">
										<?php
											fckeditor_quanly($tv_2['mo_ta__en'],"noidung_en",500,100,"rut_gon_2");
										?>
									</div>
								</center>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="sua_nick__httt" value="sua_nick__httt">
								<input type="submit" class="nut_abc" value="Sữa">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</center>
<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
</script>