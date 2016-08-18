<?php
	chong_pha_hoai();
?>
<script type="text/javascript">

function lienket_quanly_dulieu_menu_ngang(value){
	var link="?thamso=quanly_dulieu_menu_ngang&id_menu=" + value;
	window.location=link;
}
</script>
<?php
function option_cap_hai($id_cha)
{
	$menu="select * from menu_ngang where thuoc_menu in ('$id_cha') and loai not in ('trang_chu','lien_he','toanbo_sanpham') order by id";
	//thongbao($menu);
	$query_menu=mysql_query($menu);
	while($row_menu=mysql_fetch_array($query_menu))
	{
			$row_menu['ten']=stripslashes($row_menu['ten']);
			if($_GET['id_menu']=="")
			{
				$selected="";
			}
			else
			{
				if($_GET['id_menu']==$row_menu['id'])
				{
					$selected="selected";
				}
				else
				{
					$selected="";
				}
			}
			echo "<option value=\"$row_menu[id]\" $selected> \n";
				echo "___";
				echo $row_menu['ten'];
			echo "</option>\n";
		}
}

$menu="select * from menu_ngang where thuoc_menu in ('')  and loai not in ('trang_chu','lien_he','toanbo_sanpham') order by id";
$query_menu=mysql_query($menu);
echo "<span style=\"font-weight:bold\">Chọn chủ đề :</span>";
echo "\n<select style=\"margin-left:20px\" onchange=\"lienket_quanly_dulieu_menu_ngang(this.value)\">\n";
echo "<option value=\"\">Chọn chủ đề </option>";
while($row_menu=mysql_fetch_array($query_menu))
{
	if($_GET['id_menu']=="")
	{
		$selected="";
	}
	else
	{
		if($_GET['id_menu']==$row_menu['id'])
		{
			$selected="selected";
		}
		else
		{
			$selected="";
		}
	}
	echo "<option value=\"$row_menu[id]\" $selected>$row_menu[ten]</option>\n";

	$xacdinh_menu_con="select count(*) from menu_ngang where thuoc_menu in ('$row_menu[id]')  and loai not in ('trangchu','lienhe','toanbo_sanpham')";
	//thongbao($xacdinh_menu_con);
	$query_xacdinh_menu_con=mysql_query($xacdinh_menu_con);
	$row_xacdinh_menu_con=mysql_fetch_row($query_xacdinh_menu_con);
	if($row_xacdinh_menu_con[0]==0)
	{

	}
	else
	{
		//thongbao($row_menu['ten']);
		//thongbao("da vao day");
		option_cap_hai($row_menu['id']);
	}
}
echo "\n</select>\n";
?>