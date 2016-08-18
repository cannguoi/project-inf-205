<?php
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
function rem($id)
{
	$v="select count(*) from dulieu_1 where thuoc_menu in ('$id')";
	$v1=mysql_query($v);
	$v2=mysql_fetch_row($v1);
	return $v2[0];
}
function dulieu_sp()
{
	if($_GET['id_menu']!="")
	{
		$rem=rem($_GET['id_menu']);
		$c=$c." ( select * from dulieu_1 where thuoc_menu in ('$_GET[id_menu]') order by id desc limit $rem ) union ";
	}
	else
	{
		$c="";
	}
	$tv="select * from menu_ngang where thuoc_menu in ('$_GET[id_menu]') and loai not in ('trang_chu','lien_he','toanbo_sanpham')";
	$tv_1=mysql_query($tv);
	while($tv_2=mysql_fetch_array($tv_1))
	{
		$id_menu_cap_mot=$tv_2['id'];
		$rem=rem($id_menu_cap_mot);
		$c=$c." ( select * from dulieu_1 where thuoc_menu in ('$id_menu_cap_mot') order by id desc limit $rem ) union ";
		$r="select count(*) from menu_ngang where thuoc_menu in ('$id_menu_cap_mot')";
		$r_1=mysql_query($r);
		$r_2=mysql_fetch_row($r_1);
		if($r_2[0]!=0)
		{
			$b="select * from menu_ngang where thuoc_menu in ('$id_menu_cap_mot')";
			$b1=mysql_query($b);
			while($b2=mysql_fetch_array($b1))
			{
				$rem=rem($b2['id']);
				$c=$c." ( select * from dulieu_1 where thuoc_menu in ('$b2[id]') order by id desc limit $rem ) union ";
			}
		}
	}
	$c=substr($c,0,-6);
	//echo $c."<hr>";
	return $c;
}
class phantrang_xuatlink
{
	function tu_khoa_get()
	{
		return "trang";
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
$sd=20;
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
	$dem="select count(*) from dulieu_1 ";
	$query_dem=mysql_query($dem);
	$row_dem=mysql_fetch_row($query_dem);
	return $row_dem[0];
}
function tinh_so_trang_menu_ngang($sd){
	$dem_dulieu_menu_ngang=dem_dulieu_menu_ngang();
	$st=ceil($dem_dulieu_menu_ngang/$sd);
	return $st;
}

if($_GET['trang']=="")
{
	$vtbd=0;
}
else
{
	$vtbd=($_GET['trang']-1)*$sd;
}

//$st=tinh_so_trang_menu_ngang($sd);
echo "<table id=\"er\">";
	echo "<tr >";

		echo "<td width=\"270px\" >";
			echo "Tiêu đề";
		echo "</td>";
		echo "<td width=\"480px\">";
			echo "Link liên kết";
		echo "</td>";
		echo "<td width=\"100px\" align=\"center\">";
			echo "Sữa";
		echo "</td>";

	echo "</tr>";
//$dulieu_sp="select * from dulieu_1  order by id desc limit $vtbd,$sd";
$dulieu_sp_1=dulieu_sp();

//$dulieu_sp=dulieu_sp();
$dulieu_sp="select * from du_lieu_mot_tin order by id limit $vtbd,$sd";
//$dulieu_sp=$dulieu_sp." limit $vtbd,$sd";
//$row=mysql_num_rows(mysql_query("select * from du_lieu_mot_tin"));
//$st=ceil($row/$sd);
$st=5;
$query_dulieu_sp=mysql_query($dulieu_sp);
while($row_dulieu_sp=mysql_fetch_array($query_dulieu_sp))
{
	$id_tt=$row_dulieu_sp['id'];
	$link_sua="?thamso=quanly_dulieu_menu_ngang&sua_dulieu_menu_ngang=co&id_menu=$_GET[id_menu]&id_mnn=$id_tt&trang=$_GET[trang]";
	$link_xoa="?thamso=quanly_dulieu_menu_ngang&xoa_dulieu_menu_ngang=co&id_menu=$_GET[id_menu]&id_mnn=$id_tt";
	echo "<tr>";
		echo "<td  align=\"left\">";
			echo "<a href=\"$link_sua\" class=\"thua__link_10\">";
				echo "$row_dulieu_sp[ten]";
			echo "</a>";
		echo "</td>";
		echo "<td  align=\"left\" style='font-size:14px'>";

				//echo cat_chuoi_789($row_dulieu_sp['noi_dung'],0,150);
				echo $base_url."?thamso=xuat_mot_tin&id=".$row_dulieu_sp['id'];

		echo "</td>";
		echo "<td align=\"center\">";
			echo "<a href=\"$link_sua\" class=\"sua_xoa\">";
				echo "Sữa";
			echo "</a>";
		echo "</td>";

	echo "</tr>";
}
echo "<tr>";
	echo "<td colspan=\"5\">";
		xuat_link_dkl($st);
	echo "</td>";
echo "</tr>";
echo "</table>";
//xuat_cac_link_phan_trang($st);
//$phantrang_xuatlink->xuat_link($st);
?>
<script type="text/javascript">
	table_css_2("er");
</script>