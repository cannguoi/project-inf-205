<?php

//echo $_GET['id_menu'];
//nowrap=\"nowrap\"
chongphahoai();

?>
<style type="text/css">
	table.xqldltmn_khung
	{
        border: 1px #6B8E23 solid;
        border-collapse: collapse;
        width: 100%;
	}
	table.xqldltmn_khung td
	{
	    border: 1px #6B8E23 solid;
	    border-collapse: collapse;
	}

	tr.xqldltmn_hangdau
	{
		background:#F0FFFF;
	}
	a.xqldltmn_hangdau:link {  text-decoration: none;  color: #000080; font-weight: bold;}
	a.xqldltmn_hangdau:visited {  color: #000080; text-decoration: none; font-weight: bold;}
	a.xqldltmn_hangdau:hover { text-decoration: none; color:#000080; font-weight: bold; font-style: normal; }

	a.xqldltmn_tieude:link {  text-decoration: none;  color: #800080; font-weight: bold;}
	a.xqldltmn_tieude:visited {  color: #800080; text-decoration: none; font-weight: bold;}
	a.xqldltmn_tieude:hover { text-decoration: underline; color:#800080; font-weight: bold; font-style: normal; }

</style>
<?php
class phantrang_xuatlink
{
	function tu_khoa_get()
	{
		return "page";
	}
	function link_url()
	{
		$tu_khoa_get=$this->tu_khoa_get();
		return "?thamso=quanly_dulieu_menu_ngang&id_menu=$_GET[id_menu]&$tu_khoa_get=";
	}
	function trang_truoc()
	{
		$link_url=$this->link_url();
		$tu_khoa_get=$this->tu_khoa_get();
		if($_GET[$tu_khoa_get]=="" or $_GET[$tu_khoa_get]==1){$a=1;}else{$a=($_GET[$tu_khoa_get]-1);}
		$link_url_1=$link_url."$a";
		echo "<a href=\"$link_url_1\" class=\"phantrang\">";
			echo "Trang trước ";
		echo "</a>";
	}
	function trang_sau($st)
	{
		$link_url=$this->link_url();
		$tu_khoa_get=$this->tu_khoa_get();
		
		if($_GET[$tu_khoa_get]==$st){$a=$st;}else{$a=($_GET[$tu_khoa_get]+1);}
		if($_GET[$tu_khoa_get]=="" or $_GET[$tu_khoa_get]==1){$a=2;}
		$link_url_1=$link_url."$a";
		echo "<a href=\"$link_url_1\" class=\"phantrang\">";
			echo " Trang sau ";
		echo "</a>";
	}
	function cham_cham_duoi($gioi_han_tren,$st)
	{
		$link_url=$this->link_url();
		$tu_khoa_get=$this->tu_khoa_get();
		$link_url_1=$link_url."$st";
		if($gioi_han_tren<$st)
		{
			$a=$st-1;
			if($a!=$gioi_han_tren)
			{
				echo " ... ";
			}
			echo "<a href=\"$link_url_1\" class=\"phantrang\">";
				echo "$st ";
			echo "</a>";
		}
	}
	function cham_cham_tren($gioi_han_duoi)
	{
		$link_url=$this->link_url();
		$tu_khoa_get=$this->tu_khoa_get();
		$link_url_1=$link_url."1";
		if($gioi_han_duoi>2)
		{
			echo "<a href=\"$link_url_1\" class=\"phantrang\">";
				echo "1 ";
			echo "</a>";
			echo " ... ";
		}
		if($gioi_han_duoi==2)
		{
			echo "<a href=\"?$tu_khoa_get=1\" class=\"phantrang\">";
				echo "1 ";
			echo "</a>";
		}
	}
	function gioi_han_tren($trang_hien_tai)
	{
		$link_url=$this->link_url();
		$tu_khoa_get=$this->tu_khoa_get();
		$gioi_han_tren=$trang_hien_tai+4;
		if($gioi_han_tren>=5 and $gioi_han_tren<9)
		{
			$gioi_han_tren=9;
		}
		return $gioi_han_tren;
	}
	function gioi_han_duoi($trang_hien_tai,$st)
	{
		$link_url=$this->link_url();
		$tu_khoa_get=$this->tu_khoa_get();
		$cao_nhat=$st-8;
		$gioi_han_duoi=$trang_hien_tai-4;
		if($gioi_han_duoi>$cao_nhat)
		{
			$gioi_han_duoi=$cao_nhat;
		}
		return $gioi_han_duoi;
	}
	function xuat_link($st)
	{
		$link_url=$this->link_url();
		$tu_khoa_get=$this->tu_khoa_get();
		if($_GET[$tu_khoa_get]==""){$trang_hien_tai=1;}else{$trang_hien_tai=$_GET[$tu_khoa_get];}
		$gioi_han_tren=$this->gioi_han_tren($trang_hien_tai);
		$gioi_han_duoi=$this->gioi_han_duoi($trang_hien_tai,$st);
		$this->trang_truoc();
		$this->cham_cham_tren($gioi_han_duoi);
		
			for($i=$gioi_han_duoi;$i<=$gioi_han_tren;$i++)
			{
				$link_url_1=$link_url."$i";
				$link_phan_trang=$link_url_1;
				if($i>0 and $i<=$st)
				{
					echo "<a href=\"$link_phan_trang\" class=\"phantrang\">";
						echo "$i ";
					echo "</a>";
				}
			}
			
		$this->cham_cham_duoi($gioi_han_tren,$st);
		$this->trang_sau($st);
	}
}
$phantrang_xuatlink=new phantrang_xuatlink;
?>
<?php
$sd=15;
function xuat_cac_link_phan_trang($st){
	//echo $st;
	for($i=1;$i<=$st;$i++)
	{
		$link="?thamso=quanly_dulieu_menu_ngang&id_menu=$_GET[id_menu]&page=$i";
		echo "<a href=\"$link\" class=\"phantrang\">";
			echo $i." ";
		echo "</a>";
	}
}
function dem_dulieu_menu_ngang(){
	$dem="select count(*) from dulieu_1 where thuoc_menu in ('$_GET[id_menu]')";
	$query_dem=mysql_query($dem);
	$row_dem=mysql_fetch_row($query_dem);
	return $row_dem[0];
}
function tinh_so_trang_menu_ngang($sd){
	$dem_dulieu_menu_ngang=dem_dulieu_menu_ngang();
	$st=ceil($dem_dulieu_menu_ngang/$sd);
	return $st;
}

if($_GET['page']=="")
{
	$vtbd=0;
}
else
{
	$vtbd=($_GET['page']-1)*$sd;
}
//echo $sd."<hr>";
$st=tinh_so_trang_menu_ngang($sd);
echo "<table class=\"xqldltmn_khung\">";
	echo "<tr class=\"xqldltmn_hangdau\">";
		echo "<td width=\"450px\" align=\"center\">";
			echo "<a href=\"\" class=\"xqldltmn_hangdau\">Tiêu đề</a>";
		echo "</td>";
		echo "<td width=\"100px\" align=\"center\">";
			echo "<a href=\"\" class=\"xqldltmn_hangdau\">Sữa</a>";
		echo "</td>";
		echo "<td width=\"100px\" align=\"center\">";
			echo "<a href=\"\" class=\"xqldltmn_hangdau\">Xóa</a>";
		echo "</td>";
	echo "</tr>";




$dulieu_sp="select * from dulieu_1 where thuoc_menu in ('$_GET[id_menu]') order by id desc limit $vtbd,$sd";
//echo $dulieu_sp." \$dulieu_sp <hr>";
$query_dulieu_sp=mysql_query($dulieu_sp);
while($row_dulieu_sp=mysql_fetch_array($query_dulieu_sp))
{
	$id_tt=$row_dulieu_sp['id'];
	$link_sua="?thamso=quanly_dulieu_menu_ngang&sua_dulieu_menu_ngang=co&id_mnn=$id_tt";
	$link_xoa="?thamso=quanly_dulieu_menu_ngang&xoa_dulieu_menu_ngang=co&id_menu=$_GET[id_menu]&id_mnn=$id_tt";
	echo "<tr class=\"mau_dong\">";
		echo "<td nowrap=\"nowrap\" align=\"left\">";
			echo "<a href=\"$link_sua\" class=\"xqldltmn_tieude\">";
				echo "$row_dulieu_sp[tieu_de]";
			echo "</a>";
		echo "</td>";
		echo "<td align=\"center\">";
			echo "<a href=\"$link_sua\" class=\"sua_xoa\">";
				echo "Sữa";
			echo "</a>";
		echo "</td>";
		echo "<td align=\"center\" >";
			echo "<a href=\"$link_xoa\" class=\"sua_xoa\">";
				echo "Xóa";
			echo "</a>";
		echo "</td>";
	echo "</tr>";
}
echo "</table>";
//xuat_cac_link_phan_trang($st);
//echo $st."<hr>";
$phantrang_xuatlink->xuat_link($st);
?>