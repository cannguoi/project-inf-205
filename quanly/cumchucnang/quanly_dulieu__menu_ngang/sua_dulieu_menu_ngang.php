<?php

chongphahoai();
//echo "sua san pham menu doc<hr>";

function xuly_kitu___khung_nhap_lieu___sua_sanpham_menu_ngang($giatri){
	$giatri=str_replace("\n","",$giatri);
	$giatri=str_replace("\t","",$giatri);
	$giatri=str_replace("\r","",$giatri);
	$giatri=str_replace("'","\'",$giatri);
	//$giatri=str_replace("\"","'",$giatri);
	return $giatri;
}

function khung_nhap_nhieu_sua_sanpham_menu_ngang($ten,$giatri)
{
	$giatri=xuly_kitu___khung_nhap_lieu___sua_sanpham_menu_ngang($giatri);
	//echo $giatri." \$giatri <br>";
	echo "
	<script type=\"text/javascript\">
		var giatri=\"$giatri\";
	</script>
	";
	echo "
	<script type=\"text/javascript\">

	var oFCKeditor = new FCKeditor('$ten');
	oFCKeditor.BasePath = \"giaodien/fckeditor/\";
	oFCKeditor.Width	= 770 ;
	oFCKeditor.Config[\"EnterMode\"]		= \"br\" ;
	oFCKeditor.Value='$giatri';
	oFCKeditor.Create();
	document.getElementById('xEnter').value = \"br\" ;

	</script>";

}
function khung_sua_sanpham_menu_ngang()
{

	$dulieu_sua="select * from du_lieu_mot_tin where id in ('$_GET[id_mnn]')";
	//echo $dulieu_sua." \$dulieu_sua <hr>";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row_dulieu_sua=mysql_fetch_array($query_dulieu_sua);
	$a1="$row_dulieu_sua[ten]";
	$a10="$row_dulieu_sua[tieu_de__en]";
	$a2="$row_dulieu_sua[hinh_anh]";
	$a3="$row_dulieu_sua[noi_dung]";
	$a30="$row_dulieu_sua[noi_dung]";
	$duongdan_anh="../hinhanh_flash/tintuc/$row_dulieu_sua[hinh_anh]";
	print '<table width="970px" id="er" style="margin:6px 0px">
	<form action="" border="1" method="post" enctype="multipart/form-data" style="margin:0">
	<tr>
		<td colspan="2">
			<span style="float:left">
				Sữa bài viết
			</span>
			<a href="?thamso=quanly_dulieu_menu_ngang&id_menu='.$_GET['id_menu'].'&trang='.$_GET['trang'].'" class="nut_dong_1">Đóng</a>
		</td>
	</tr>
	<tr>
		<td width="20%" align="left"><b>Tiêu đề : </b></td>
		<td width="80%" align="left"><input name="tieude" size="70" value="'.$a1.'"></td>
	</tr>
	<tr>
		<td width="20%" align="left"><b>Link : </b></td>
		<td width="80%" align="left">'.$GLOBALS['base_url'].'?thamso=xuat_mot_tin&id='.$_GET['id_mnn'].'</td>
	</tr>

	<tr>
		<td width="20%" align="left"><b>Keywords : </b></td>
		<td width="80%" align="left"><input name="keywords" size="70" value="'.$row_dulieu_sua['keywords'].'"></td>
	</tr>
	<tr>
		<td width="20%" align="left"><b>Description : </b></td>
		<td width="80%" align="left"><input name="description" size="70" value="'.$row_dulieu_sua['description'].'"></td>
	</tr>
	<tr>
		<td width="20%" valign="top" align="left"><b>Nội dung : </b></td>
		<td width="80%" valign="top" align="left">';
		//xuat_select();
		echo "<div id=\"div_vn_afc\">";
			khung_nhap_nhieu_sua_sanpham_menu_ngang("noidung",$a3);
		echo "</div>";
		echo "<div id=\"div_en_afc\" style=\"display:none\">";
			//khung_nhap_nhieu_sua_sanpham_menu_ngang("noidung_en",$a30);
		echo "</div>";

		print '</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" class="nut_chapnhan" value="Chấp nhận" name="sua_dulieu_menu_ngang">
		</td>
	</tr>
	</form>
	</table>';
}




?>
<?php
	khung_sua_sanpham_menu_ngang();
?>
<script type="text/javascript">
	table_css_2("er");
</script>
