<?php
	chong_pha_hoai();
?>
<style type="text/css">
	a.a_vvv { font-size: 14px; text-decoration: none;  color: #0b55c4; }
	a.a_vvv:visited { font-size: 14px; color: #0b55c4; text-decoration: none; }
	a.a_vvv:hover { font-size: 14px; text-decoration: none; color: #084095;  font-style: normal; }

</style>
<?php
	function khoangcach($cap_csdl)
	{
		include("cumchucnang/bien/bien.php");
		$sql = "select count(*) from $tb__menu_ngang where $tb__menu_ngang__f__id in ('$cap_csdl')";
		$query = mysql_query($sql);
		$rows = mysql_fetch_row($query);
		if($rows[0] != 0)
		{
			echo "&nbsp;&nbsp;&nbsp;";
		}
	}

function lay_chuoi_menu_con($chuoi_menu,$id_cha)
{
	include("cumchucnang/bien/bien.php");
	$sql = "select * from $tb__menu_ngang where $tb__menu_ngang__f__thuoc_menu='$id_cha' order by id";
	$query = mysql_query($sql);
	while($rows = mysql_fetch_array($query))
	{
		$chuoi_menu = $chuoi_menu." ( select * from $tb__menu_ngang where $tb__menu_ngang__f__id = '$rows[id]') union";
	}
	return $chuoi_menu;

}
function lay_chuoi_menu($chuoi_menu)
{
	include("cumchucnang/bien/bien.php");
	$sql = "select * from $tb__menu_ngang where $tb__menu_ngang__f__thuoc_menu='' order by id";
	$query = mysql_query($sql);
	while($rows = mysql_fetch_array($query))
	{
		$chuoi_menu = $chuoi_menu." ( select * from $tb__menu_ngang where $tb__menu_ngang__f__id = '$rows[id]') union";
		$chuoi_menu = lay_chuoi_menu_con($chuoi_menu,$rows['id']);
	}
	$chuoi_menu = substr($chuoi_menu,0,-6);
	return $chuoi_menu;

}
$chuoi_menu="";

///ky thuat phan trang
$sd = 15;
if($_GET['page'] == "")
{
	$vtbd = 0;
}
else
{
	$vtbd = ($_GET['page']-1)*$sd;
}
$sql_tsd = "select count(*) from menu_top";
$tsd1 = mysql_query($sql_tsd);
$tsd = mysql_fetch_row($tsd1);
$st = ceil($tsd[0]/$sd);
//echo "$st <br />";
$menu=lay_chuoi_menu($chuoi_menu);
$menu="select * from menu_top order by id";
$menu = $menu." limit $vtbd,$sd";
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
echo "<form action='' method='post' style='margin:0'>";
		echo "<table width='620px' id='er' style='margin:6px 0px'>";
			echo "<tr>";
				echo "<td width=\"50px\" align=\"center\">STT</td>";
				echo "<td width=\"350px\">Tiêu Đề</td>";

				echo "<td width=\"100px\" align=\"center\">Sửa</td>";
				echo "<td width=\"100px\" align=\"center\">Xóa</td>";
			echo "</tr>";
while($rows = mysql_fetch_array($query))
{
	$ten_menu=$rows['ten'];
	$ten_menu_1=$rows['ten_en'];
	$thuoc_menu=$rows['thuoc_menu'];
	$id_menu=$rows['id'];
	$link_sua="?thamso=xoa_sua_menungang_chitiet&id_menu=$id_menu&page=$_GET[page]";
	$link_xoa="?thamso=xoa_sua_menungang&xoa_menu_ngang=xoa&id_menu=$id_menu";
	echo "<tr class=\"mau_dong\">";
		echo "<td align=\"center\">$stt</td>";
		echo "<td nowrap=\"nowrap\">";
			khoangcach($thuoc_menu);
			echo "<a href=\"$link_sua\" class=\"a_vvv\">$ten_menu</a>";
		echo "</td>";

		echo "<td align=\"center\"><a href=\"$link_sua\" class=\"sua_xoa\" >Sửa</a></td>";
		echo "<td align=\"center\"><a href=\"$link_xoa\" class=\"sua_xoa\" >Xóa</a></td>";
	echo "</tr>";
	$stt++;
}
		echo "</table>";
echo "</form>";

for($i=1; $i<=$st; $i++)
{
	$link ="?thamso=xoa_sua_menungang&page=$i";
		echo "<a href=\"$link\" class=\"phantrang\"> $i  </a>";
}
?>
<script type="text/javascript">
	table_css_2("er");
</script>