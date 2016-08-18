<?php
chong_pha_hoai();
//echo "vao day <hr>";
empty_forder("../hinhanh_flash/upload_tam/");
// ham empty_forder : lam rong thu muc


?>
<script type="text/javascript" >
	function ddd5()
	{
		var id=document.getElementById("ddd5");
		id.style.display="block";
	}

</script>
<?php
function dequy_option__mnn($id,$nhandang)
{
	$nhandang="   ".$nhandang;
	$a=mysql_query("select * from help where thuoc_menu in('$id') order by id");
	while($b=mysql_fetch_array($a))
	{
		echo"<option value=\"$b[id]\">$nhandang $b[ten_menu]</option>";
		dequy_option__mnn($b['id'],$nhandang);
	}
}
class class__khung_them_du_lieu
{
	function khung_nhap_lieu_fckeditor($name)
	{
		echo "<script type=\"text/javascript\">";
			echo "var oFCKeditor = new FCKeditor('$name');";
			echo "oFCKeditor.BasePath = \"giaodien/fckeditor/\";";
			echo "oFCKeditor.Width	= 770 ;";
			echo "oFCKeditor.Height	= 350 ;";
			echo "oFCKeditor.Config[\"EnterMode\"]		= \"br\" ;";
			echo "oFCKeditor.Create();";
			//echo "document.getElementById('xEnter').value = \"br\" ;";
		echo "</script>";
	}
	function hop_chon_capdo(){
			echo "<select name=\"capdo\" id=\"hop_chon_5\">";
				echo "<option value='' >Cấp đầu</option>";
				$cap1_lan1_chuoi="select * from help where thuoc_menu in('') order by id";
				$cap1_lan1_truyvan=mysql_query($cap1_lan1_chuoi);
				while($mang_cap1_lan1_dulieu=mysql_fetch_array($cap1_lan1_truyvan))
				{

					print '<option value="'.$mang_cap1_lan1_dulieu['id'].'">'.$mang_cap1_lan1_dulieu['ten_menu'].'</option>';
					dequy_option__mnn($mang_cap1_lan1_dulieu['id'],"");
				}
			echo "</select>";
	}
	function khung_them_du_lieu()
	{
		echo "<table width=\"970px\" id=\"er\" style=\"margin:6px 0px\">";
			echo "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" style=\"margin:0\">";
				tr("Thêm menu help",2);
				echo "<tr>";
					echo "<td width=\"20%\" align=\"left\"><b>Cấp độ : </b></td>";
					echo "<td width=\"80%\" align=\"left\">";
					$this->hop_chon_capdo();
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td width=\"20%\" align=\"left\"><b>Tên menu : </b></td>";
					echo "<td width=\"80%\" align=\"left\"><input name=\"tieude\" size=\"25\"></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td width=\"20%\" align=\"left\"><b>Tên bài viết : </b></td>";
					echo "<td width=\"80%\" align=\"left\"><input name=\"ten_bai_viet\" size=\"25\"></td>";
				echo "</tr>";
				//xuat_tr("Tiêu đề : <br>(English)","<input name=\"tieude_en\" size=\"70\">");


				echo "<tr>";
					echo "<td width=\"20%\" align=\"left\"><b>Dạng : </b></td>";
					if($_SESSION['dang_help']==1){$a_1="selected='selected'";}else{$a_2="selected='selected'";}
					echo "<td width=\"80%\" align=\"left\">
					<select name='dang'>
						<option value='1' $a_1 >Bình thường</option>
						<option value='2' $a_2 >Không link</option>
					</select>
					";
					echo '<br>';
					echo '<div style="width:5px;height:5px;overflow:hidden"></div>';	
					echo 'Chọn menu "Không link" nếu như muốn tạo menu cha ';

					echo "</td>";
				echo "</tr>";
				

				//xuat_tr("Khuyến mãi : <br>(English)","<input name=\"khuyen_mai__en\" size=\"70\">");
				echo "<tr>";
					echo "<td width=\"20%\" valign=\"top\" align=\"left\"><b>Nội dung : </b></td>";
					echo "<td width=\"80%\" valign=\"top\" align=\"left\">";
					//xuat_select("luan","suc");
					echo "<div id=\"div_vn_afc\">";
						//echo "tieng viet";
						$this->khung_nhap_lieu_fckeditor("noidung");
					echo "</div>";
					echo "<div id=\"div_en_afc\" style=\"display:none\">";
						//echo "tieng anh";
						//$this->khung_nhap_lieu_fckeditor("noidung_en");
					echo "</div>";
					echo "</td>";
				echo "</tr>";

				echo "<tr>";
					o(" ");
					o("<input type=\"submit\" class=\"nut_chapnhan\" value=\"Chấp nhận\" name=\"them_menu_help\">");
				echo "</tr>";
			echo "</form>";
		echo "</table>";

	}
}
$class__khung_them_du_lieu=new class__khung_them_du_lieu;
	$class__khung_them_du_lieu->khung_them_du_lieu();
?>
<script type="text/javascript">
	table_css_2("er");
	var ss_cap_do="<?php echo $_SESSION['capdo_help']; ?>";
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