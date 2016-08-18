<?php
	chong_pha_hoai();
?>
<?php
	$id_menu_sua = $_GET['id_menu'];
	$sql = "select * from menu where id = '$id_menu_sua'";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
?>
<form action="" method="post" style="margin:0">
	<table width="970px" border="0" id="er" style="margin:6px">
		<tr>
			<td colspan="2">
				<span style="float:left">Sữa menu</span>
				<a href="?thamso=xoa_sua_leftmenu&page=<?php echo $_GET['page'] ?>" style="text-decoration: none;color:#0b55c4;float:right;margin-right:5px;">
					Đóng
				</a>
			</td>
		</tr>
		<tr>
			<td width="120px"><b>Tên :</b></td>
			<td><input type="text" name="tenmenu" value="<?php echo $row['ten']?>" size="50" /></td>
		</tr>
		<tr>
			<td><b>Dạng :</b></td>
			<td>
            	<?php 
					switch($row['dang'])
					{
						case "link":
							$a_1="";$a_2='selected="selected"';
							$b="block";
						break;
						default: 
							$a_2="";$a_1='selected="selected"';
							$b="none";
					}
				?>
            	<select name="dang" onclick="hg(this.value)">
                	<option value="" <?php echo $a_1;?> >Sản phẩm</option>
                    <option value="link" <?php echo $a_2;?> >Link</option>
                </select>
                <div id="link_kkk" style="display:<?php echo $b; ?>">
                	Link : <input name="link" size="40" id="link_kkk" value="<?php echo $row['link']; ?>" />
                </div>
                <script>
					function hg(v)
					{
						var id=document.getElementById("link_kkk");
						if(v==""){id.style.display="none";}
						if(v=="link"){id.style.display="block";}
					}
				</script>
            </td>
            </tr>
            <tr>
                <td><b>Keywords :</b></td>
                <td><input type="text" name="keywords" size="50" value="<?php echo $row['keywords']; ?>"/></td>
            </tr>
            <tr>
                <td><b>Description :</b></td>
                <td><input type="text" name="description" size="50" value="<?php echo $row['description']; ?>"/></td>
            </tr>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type="submit" name="sua_left_menu" value="Sửa" class="nut_abc"/>
		</tr>
	</table>
</form>
<script type="text/javascript">
	table_css_2("er");
</script>