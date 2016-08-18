<?php
	chong_pha_hoai();

?>

<center>
	<table width="968px" id="er" style="margin:6px 6px 6px 6px">
		<tr>
			<td align="left">
				Thêm yahoo/skype
			</td>
		</tr>
		<tr>
			<td align="left">
				<form action="" border="0" method="post">
					<table width="650px" border="0" id="er_1" style="margin:6px 6px 6px 6px">
						<tr>
							<td width="100px"><b>Loại nick :</b> </td>
							<td valign="top">
								<select name="loai_nick">
									<option value="yahoo">Yahoo</option>
									<option value="skype">Skype</option>
								</select>
							</td>
						</tr>
						<tr>
							<td width="100px"><b>Tên nick :</b> </td>
							<td valign="top"><input name="ten" style="width:250px"></td>
						</tr>
						<tr>
							<td width="100px"><b>Mô tả ngắn :</b> </td>
							<td valign="top">
								<center>
									<div style="margin:6px 0px">
										<?php
											fckeditor_quanly("","noidung",500,100,"rut_gon_2");
										?>
									</div>
								</center>
							</td>
						</tr>
						<tr>
							<td width="100px"><b>Mô tả ngắn :<br>(English)</b> </td>
							<td valign="top">
								<center>
									<div style="margin:6px 0px">
										<?php
											fckeditor_quanly("","noidung_en",500,100,"rut_gon_2");
										?>
									</div>
								</center>
							</td>
						</tr>
						<tr >
							<td></td>
							<td>
								<input type="hidden" name="them_lien_lac_abc" value="them_lien_lac_abc">
								<input type="submit" class="nut_abc"  value="Thêm">
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</center>

<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
</script>