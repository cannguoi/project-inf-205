<?php
	chong_pha_hoai();
?>
<?php
	function option_khoangtrang_menu_ngang($capdo_menu,$cap)
	{

		$d="select count(*) from menu where id_menu in ('$capdo_menu') and loai not in ('trangchu','lienhe')";
		//echo $d."<hr>";

		$d1=mysql_query($d);
		$d2=mysql_fetch_row($d1);

		//echo $d2[0]."lllllllllllllll\n<br>";
		if($d2[0]!=0)
		{
			$cap=$cap + 1;

			$cd="select * from menu where id_menu in ('$capdo_menu') and loai not in ('trangchu','lienhe')";
			//echo $cd."\$cd ttttttttttttttt<br>";
			$cd1=mysql_query($cd);
			$cd2=mysql_fetch_array($cd1);
			$capdo_menu=$cd2['capdo'];
			//echo $cd2['capdo_menu']."vvvvvvvvvvvvvvvvv <br>";
			option_khoangtrang_menu_ngang($capdo_menu,$cap);
		}
		else
		{

			for($i=1;$i<$cap;$i++)
			{
				if(!isset($khoang_trang))
				{
					$khoang_trang="&nbsp;&nbsp;";
				}
				else
				{
					$khoang_trang=$khoang_trang."&nbsp;&nbsp;";
				}
				echo $khoang_trang;
			}
		}
	}

function option_cap_hai($id_cha)
{
	$menu="select * from menu_ngang where thuoc_menu in ('$id_cha') and loai not in ('trangchu','lienhe','toanbo_sanpham') ";
	$query_menu=mysql_query($menu);
	while($row_menu=mysql_fetch_array($query_menu))
	{
			$row_menu['ten']=stripslashes($row_menu['ten']);
			echo "<option value=\"$row_menu[id]\">";
				//option_khoangtrang_menu_ngang($row_menu['capdo'],1);
				echo "___";
				echo $row_menu['ten'];
			echo "</option>\n";
		}
	//dequy_menu();
}
function khung1()
{
	print '

	<table width="970px" id="er" style="margin:6px 0px">
	<form action="" border="1" method="post" enctype="multipart/form-data" style="margin:0">
	<tr>
		<td colspan="2">Thêm dữ liệu vào menu ngang</td>
	</tr>
	<tr>
		<td width="20%" align="left"><b>Cấp độ : </b></td>
		<td width="80%" align="left">';
		echo "<select name=\"capdo\">";
			$menu="select * from menu_ngang where thuoc_menu in ('') and loai not in ('trangchu','lienhe','toanbo_sanpham')";
			$query_menu=mysql_query($menu);

			while($row_menu=mysql_fetch_array($query_menu))
			{
				$row_menu['ten']=stripslashes($row_menu['ten']);
				echo "<option value=\"$row_menu[id]\">";
					echo $row_menu['ten'];
				echo "</option>\n";
					//echo "<br>";
					$xacdinh_menu_con="select count(*) from menu_ngang where thuoc_menu in ('$row_menu[id]') and loai not in ('trangchu','lienhe','toanbo_sanpham')";
					//echo $xacdinh_menu_con."<br>";
					$query_xacdinh_menu_con=mysql_query($xacdinh_menu_con);
					$row_xacdinh_menu_con=mysql_fetch_row($query_xacdinh_menu_con);
					//echo $row_xacdinh_menu_con[0];
					if($row_xacdinh_menu_con[0]==0)
					{

					}
					else
					{
						option_cap_hai($row_menu['id']);
					}

			}
		echo "</select>";
		print '

		</td>
	</tr>
	<tr>
		<td width="20%" align="left"><b>Tiêu đề :</b> </td>
		<td width="80%" align="left"><input name="tieude" size="70"></td>
	</tr>';
	xuat_tr("Tiêu đề : <br>(English)","<input name=\"tieude_en\" size=\"70\">");
	print '<tr>
		<td width="20%" align="left"><b>Hình ảnh :</b> </td>
		<td width="80%" align="left"><input type="file" name="uploadedfile"></td>
	</tr>



	<tr>
		<td width="20%" valign="top" align="left"><b>Nội dung :</b> </td>
		<td width="80%" valign="top" align="left">';
		xuat_select();
		?>
		<div id="div_vn_afc">

			<script type="text/javascript">
			var oFCKeditor = new FCKeditor('noidung');
			//tao ta mot textarea co name="luan" id="luan"
			oFCKeditor.BasePath = "giaodien/fckeditor/";
			oFCKeditor.Width	= 770 ;
			oFCKeditor.Height	= 350 ;
			oFCKeditor.Config["EnterMode"]		= "br" ;
			oFCKeditor.Create();
			document.getElementById('xEnter').value = "br" ;
			//document.getElementById("luan").value="<img src='http://www.vnexpress.net/Files/Subject/3B/A1/35/82/1.jpg' border='0'>";
			//var k=document.getElementById("luan").value;
			//alert(k);
			</script>
		</div>
		<div id="div_en_afc" style="display:none">
			<script type="text/javascript">
			var oFCKeditor = new FCKeditor('noidung_en');
			//tao ta mot textarea co name="luan" id="luan"
			oFCKeditor.BasePath = "giaodien/fckeditor/";
			oFCKeditor.Width	= 770 ;
			oFCKeditor.Height	= 350 ;
			oFCKeditor.Config["EnterMode"]		= "br" ;
			oFCKeditor.Create();
			document.getElementById('xEnter').value = "br" ;
			//document.getElementById("luan").value="<img src='http://www.vnexpress.net/Files/Subject/3B/A1/35/82/1.jpg' border='0'>";
			//var k=document.getElementById("luan").value;
			//alert(k);
			</script>
		</div>
		<?php
		print '</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
		<td>
			<input type="submit" class="nut_chapnhan" value="Chấp nhận" name="them_dulieu_menu_ngang">
		</td>
	</tr>
	</form>
	</table>


	';
}

khung1();

?>
<script type="text/javascript">
	table_css_2("er");
</script>