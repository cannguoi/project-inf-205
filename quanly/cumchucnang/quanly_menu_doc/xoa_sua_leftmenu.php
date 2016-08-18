<?php
	chong_pha_hoai();
	function cap_menu_asd_de_quy($thuoc_menu,$so)
	{
		$so++;
		$tv="select * from menu where id='$thuoc_menu'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		if($tv_2['thuoc_menu']=="")
		{
			return $so;
		}
		else
		{
			return cap_menu_asd_de_quy($tv_2['thuoc_menu'],$so);
		}
	}
	function cap_menu_asd($id)
	{
		$tv="select * from menu where id='$id'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		if($tv_2['thuoc_menu']=="")
		{
			return 1;
		}
		else
		{
			return cap_menu_asd_de_quy($tv_2['thuoc_menu'],1);
		}
	}
	//$cap_menu_asd=cap_menu_asd(54);
	//echo $cap_menu_asd."<hr>";
	function xac_dinh_menu_con_asd($id)
	{
		$mang=mysql_fetch_row(mysql_query("select count(*) from menu where thuoc_menu='$id'"));
		if($mang[0]!=0)
		{
			return "co";
		}
		else
		{
			return "khong";
		}
	}
	function chuoi_union_asd_de_quy($id,$chuoi)
	{
		$tv="select * from menu where thuoc_menu='$id' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$xac_dinh_menu_con_asd=xac_dinh_menu_con_asd($tv_2['id']);
			$chuoi=$chuoi."( select * from menu where id='$tv_2[id]') union ";
			if($xac_dinh_menu_con_asd=="co")
			{
				$chuoi=chuoi_union_asd_de_quy($tv_2['id'],$chuoi);
			}
		}
		return $chuoi;
	}
	function tinh_chuoi_union_asd()
	{
		$tv="select * from menu where thuoc_menu='' order by id";
		$tv_1=mysql_query($tv);
		$chuoi="";
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$xac_dinh_menu_con_asd=xac_dinh_menu_con_asd($tv_2['id']);
			$chuoi=$chuoi."( select * from menu where id='$tv_2[id]') union ";
			if($xac_dinh_menu_con_asd=="co")
			{
				$chuoi=chuoi_union_asd_de_quy($tv_2['id'],$chuoi);
			}
		}
		$chuoi=substr($chuoi,0,-6);
		return $chuoi;
	}
	$chuoi_union=tinh_chuoi_union_asd();
	//echo $chuoi_union."<hr>";
?>
<style type="text/css">
	a.a_vvv { font-size: 14px; text-decoration: none;  color: #0b55c4; }
	a.a_vvv:visited { font-size: 14px; color: #0b55c4; text-decoration: none; }
	a.a_vvv:hover { font-size: 14px; text-decoration: none; color: #084095;  font-style: normal; }

</style>
<?php
	if(isset($_GET['xoa_menu']))
	{
		$sql = "select count(*) from menu where capdo = '$_GET[id_menu]'";
		//echo $sql."<br>";
		$query = mysql_query($sql);
		$rows = mysql_fetch_row($query);
		//echo $rows[0]."<br>";
		if($rows[0] == 0)
		{
			$del = "DELETE FROM `menu` WHERE `menu`.`id_menu` = '$_GET[id_menu]' ";
			//echo $del." \$del <br>";
			mysql_query($del);
			trangtruoc();
		}
		else
		{
			trangtruoc();
		}
	}
?>
<?php
$sd = 15;
if($_GET['page'] == "")
{
	$vtbd = 0;
}
else
{
	$vtbd = ($_GET['page']-1)*$sd;
}
$tsd=mysql_num_rows(mysql_query($chuoi_union));

$st = ceil($tsd/$sd);


//$menu="select * from menu order by id";
$menu = $chuoi_union." limit $vtbd,$sd";
//echo $menu."<hr />";
$query = mysql_query($menu);


if($_GET['page'] == "" or $_GET['page'] == 1)
{
	$stt = 1;
}
else
{
	$stt=$vtbd + 1;
}
echo "<form action='' method='post' style=\"margin:0\">";
		echo "<table id=\"er\" style=\"margin:6px 0px\" width=\"720px\">";
			echo "<tr bgcolor=\"green\">";
				echo "<td width=\"50px\" align=\"center\">STT</td>";
				echo "<td width=\"350px\">Tiêu Đề</td>";
				echo "<td width=\"100px\">Dạng</td>";
				echo "<td width=\"100px\" align=\"center\">Sửa</td>";
				echo "<td width=\"100px\" align=\"center\">Xóa</td>";
			echo "</tr>";
while($rows = mysql_fetch_array($query))
{
	$id=$rows['id'];
	$cap_menu_asd=cap_menu_asd($id);
	$kt="";
	for($i=1;$i<$cap_menu_asd;$i++)
	{
		$kt=$kt."&nbsp;&nbsp;&nbsp;";
	}
	if(trim($rows['dang'])!=""){$dang="Link";}else {$dang="Sản phẩm";}
	$tieu_de=$rows['ten'];
	$tieu_de_1=$rows['ten_en'];
	$link_sua="?thamso=xoa_sua_leftmenu_sua&id_menu=$id&page=$_GET[page]";
	$link_xoa="?thamso=xoa_sua_leftmenu&xoa_left_menu=xoa&id_menu=$id";
	echo "<tr class=\"mau_dong\">";
		echo "<td align=\"center\">$stt</td>";
		echo "<td nowrap=\"nowrap\">";
			echo $kt."<a href=\"$link_sua\" class=\"a_vvv\">$tieu_de</a>";
		echo "</td>";
		echo "<td nowrap=\"nowrap\">";
			echo "<span style='font-size:14px'>".$dang."</span>";
		echo "</td>";
		echo "<td align=\"center\"><a href=\"$link_sua\" class=\"sua_xoa\">Sửa</a></td>";
		echo "<td align=\"center\"><a href=\"$link_xoa\" class=\"sua_xoa\">Xóa</a></td>";
	echo "</tr>";
	$stt++;
}
		echo "</table>";
echo "</form>";

for($i=1; $i<=$st; $i++)
{
	$link ="?thamso=xoa_sua_leftmenu&page=$i";
		echo "<a href=\"$link\" class=\"phantrang\"> $i  </a>";
}
?>
<script type="text/javascript">
	table_css_2("er");
</script>