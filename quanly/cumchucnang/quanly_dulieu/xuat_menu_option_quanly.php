<?php
chongphahoai();
//echo "hhhhhhhhhhhhhhhhh <hr>";
?>
<?php
function dequy_option__mnn($id,$nhandang)
{
	$nhandang="&nbsp;&nbsp;&nbsp;".$nhandang;
	$a=mysql_query("select * from menu where thuoc_menu in('$id') order by id");
	while($b=mysql_fetch_array($a))
	{
		if($_GET['id_menu']=="")
		{
			$selected="";
		}
		else
		{
			if($_GET['id_menu']==$b['id'])
			{
				$selected="selected";
			}
			else
			{
				$selected="";
			}
		}
		echo"<option value=\"$b[id]\" $selected>$nhandang $b[ten]</option>";
		dequy_option__mnn($b['id'],$nhandang);
	}
}
class class__xuat_menu_option_quanly
{
	function javascript()
	{
		?>
		<script type="text/javascript">

		function lienket_quanly_dulieu_menu_doc(value){
			var link="?thamso=quanly_dulieu_left_menu&id_menu=" + value;
			window.location=link;
		}
		</script>
		<?php
	}
	function xuat_menu_option_quanly()
	{
		$this->javascript();

		echo "<span style=\"font-weight:bold\">Chọn chủ đề :</span>";
		echo "\n<select style=\"margin-left:20px\" onchange=\"lienket_quanly_dulieu_menu_doc(this.value)\">\n";
		echo "<option value=\"\">Toàn bộ sản phẩm</option>";
		$cap1_lan1_chuoi="select * from menu where thuoc_menu in('') order by id";
		$cap1_lan1_truyvan=mysql_query($cap1_lan1_chuoi);
		while($mang_cap1_lan1_dulieu=mysql_fetch_array($cap1_lan1_truyvan))
		{
			if($_GET['id_menu']=="")
			{
				$selected="";
			}
			else
			{
				if($_GET['id_menu']==$mang_cap1_lan1_dulieu['id'])
				{
					$selected="selected";
				}
				else
				{
					$selected="";
				}
			}
			print '<option value="'.$mang_cap1_lan1_dulieu['id'].'" '.$selected.'>'.$mang_cap1_lan1_dulieu['ten'].'</option>';
			dequy_option__mnn($mang_cap1_lan1_dulieu['id'],"");
		}
		echo "\n</select>\n";
	}
}
$class__xuat_menu_option_quanly=new class__xuat_menu_option_quanly;
$class__xuat_menu_option_quanly->xuat_menu_option_quanly();

?>