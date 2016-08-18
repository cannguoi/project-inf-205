<?php
	chong_pha_hoai();
?>
<form action="" method="post" enctype="multipart/form-data">
	<table id="a" width="970px" style="margin-top:6px;margin-bottom:6px">
		<tr>
			<td>
				Thêm nhạc
			</td>
		</tr>
		<tr>
			<td>
				<table id="b" width="600px" style="margin:6px 6px 6px 6px">
					<tr>
						<td width="120px">
							<b>Tên bài hát :</b>
						</td>
						<td>
							<input style="width:400px" name="ten_bai_hat">
						</td>
					</tr>
					<tr>
						<td>
							<b>File nhạc :</b>
						</td>
						<td>
							<input type="file" name="upload">
						</td>
					</tr>
					<tr>
						<td>
							<b>&nbsp;</b>
						</td>
						<td>
							<input type="hidden" name="them_nhac" value="them_nhac">
							<input type="submit" value="Thêm" class="nut_abc">
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	table_css_1("a");
	table_css("b");
</script>