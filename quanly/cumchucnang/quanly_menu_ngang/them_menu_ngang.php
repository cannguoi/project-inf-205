<?php
	chong_pha_hoai();
?>
<form action="" method="post">
	<table border="0" id="er" width="970px" style="margin:6px 0px">
		<tr>
			<td colspan="2">
				Thêm menu 
			</td>
		</tr>
		

		<tr>
			<td><b>Tên : </b></td>
			<td><input type="text" name="txttd" size="50"/></td>
		</tr>
		<tr>
			<td><b>Link : </b></td>
			<td><input type="text" name="link" size="50"/> <span style="margin-left:15px;font-size:14px">Nhập 'no_link' nếu không muốn để liên kết</span></td>
		</tr>
		<tr>
			<td colspan="2">

				<input type="submit" name="them_menu_ngang" class="nut_chapnhan" value="Thêm Menu" />
			</td>
		</tr>
	</table>
</form>
<?php
//khoangtrang_p(10);
?>
<script type="text/javascript">
	table_css_2("er");
</script>