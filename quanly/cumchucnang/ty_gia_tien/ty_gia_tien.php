<?php
	chong_pha_hoai();
?>
<?php
	$tv="select * from thong_so where ma_so=2";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
?>
<form style="margin:0" method="post">
	<table style="margin:6px 0px" id="er_5" width="600px">
		<tr>
			<td >Tỷ giá USD so với VNĐ</td>
		</tr>
		<tr>
			<td>
				<table id="er_6" style="margin:6px">
					<tr>
						<td width="100px">1 USD =</td>
						<td width="150px"><input name="so" size="10" value="<?php echo $tv_2['gia_tri']; ?>">		 VNĐ</td>
						<td>
						<input type="hidden" name="sua_ty_gia_tien" value="sua_ty_gia_tien">
						<input type="submit" class="nut_abc" value="Sữa">

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	table_css_2("er_5");
	table_css("er_6");
</script>