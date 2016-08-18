<?php
	chong_pha_hoai();
	//echo "vao day <hr>";
?>
<?php
	function dequy_option__mnn($id,$nhandang)
	{
		$nhandang="&nbsp;&nbsp;&nbsp;".$nhandang;
		$a=mysql_query("select * from menu where thuoc_menu in('$id') order by id");
		while($b=mysql_fetch_array($a))
		{
			echo"<option value=\"$b[id]\">$nhandang $b[ten]</option>";
			dequy_option__mnn($b['id'],$nhandang);
		}
	}
?>
<table id="er" width="970px" style="margin:6px 0px"><tr><td>Thêm menu</td></tr><tr><td>
<form action="" method="post">
	<table border="0" id="er_1" width="600px" style="margin:6px">
		<tr>
			<td width="100px"><b>Cấp độ : </b></td>
			<td>
			<select name="chon_menu" id="hop_chon_5" >
				<option value="">Cấp đầu</option>
				<?php
					$cap1_lan1_chuoi="select * from menu where thuoc_menu in('') order by id";
					$cap1_lan1_truyvan=mysql_query($cap1_lan1_chuoi);
					while($mang_cap1_lan1_dulieu=mysql_fetch_array($cap1_lan1_truyvan))
					{

						print '<option value="'.$mang_cap1_lan1_dulieu['id'].'">'.$mang_cap1_lan1_dulieu['ten'].'</option>';
						dequy_option__mnn($mang_cap1_lan1_dulieu['id'],"");
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td><b>Tên :</b></td>
			<td><input type="text" name="txttd" size="50"/></td>
		</tr>
        <tr>
			<td><b>Dạng :</b></td>
			<td>
            	<?php 
					switch($_SESSION['dang'])
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
                	Link : <input name="link" size="40" id="link_kkk" />
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
                <td><input type="text" name="keywords" size="50"/></td>
            </tr>
            <tr>
                <td><b>Description :</b></td>
                <td><input type="text" name="description" size="50"/></td>
            </tr>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td >

				<input type="submit" name="them_left_menu" class="nut_chapnhan" value="Thêm Menu" />
			</td>
		</tr>
	</table>
</form>
</td></tr></table>
<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
	var ss_cap_do="<?php echo $_SESSION['chon_menu']; ?>";
	var hop_chon_5=document.getElementById("hop_chon_5");
	var option_55=hop_chon_5.getElementsByTagName("option");
	//alert(option_55[0].value);
	//alert(ss_cap_do);
	for(i=0;i<option_55.length;i++)
	{
		if(option_55[i].value==ss_cap_do)
		{
			option_55[i].selected=true;
			//alert("selected");
		}
	}
</script>