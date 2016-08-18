<?php
	chong_pha_hoai();
?>
<?php
	$id_menu_sua = $_GET['id_menu'];
	$sql = "select * from menu_top where id = '$id_menu_sua'";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	$ten_menu=$row['ten'];
	$ten_menu_1=$row['ten_en'];
	if(trim($row['dang'])=="no_link"){$link="no_link";}else{$link=$row['link'];}
?>
<form action="" method="post" style="margin:0">
	<table width="970px" border="0" id="ir" style="margin:6px 0px">
		<tr>
			<td colspan="2">
				<span style="float:left">Sữa menu </span>
				<a href="?thamso=xoa_sua_menungang&page=<?php echo $_GET['page'] ?>" style="text-decoration: none;color:#0b55c4;float:right;margin-right:5px;">
					Đóng
				</a>
			</td>
		</tr>
		<tr>
			<td width="100px"><b>Tên : </b></td>
			<td><input type="text" name="tenmenu" value="<?php echo $ten_menu?>" size="50"/></td>
		</tr>
		<tr>
			<td width="100px"><b>Link :</b></td>
			<td valign="top"><input type="text" name="link" value="<?php echo $link?>" size="50"/><span style="margin-left:15px;font-size:14px">Nhập 'no_link' nếu không muốn để liên kết</span></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="sua_menu_ngang" value="Sửa" class="nut_abc"/></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	table_css_2("ir");
</script>