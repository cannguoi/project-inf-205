<?php
	chong_pha_hoai();
?>
<style type="text/css">
	a.thua__link_1:link { font-size: 14px; text-decoration: none;  color: #0b55c4; }
	a.thua__link_1:visited { font-size: 14px; color: #0b55c4; text-decoration: none; }
	a.thua__link_1:hover { font-size: 14px; text-decoration: none; color: #084095;  font-style: normal; }

</style>
<?php
	function img($link_hinh,$link_lien_ket="",$rong="",$cao="")
	{
		if($rong==""){$r="";}else{$r="width=\"$rong\"";}
		if($cao==""){$c="";}else{$c="height=\"$cao\"";}
		if($link_lien_ket=="")
		{
			echo "<img src=\"$link_hinh\" border=\"0\" $r $c>";
		}
		else
		{
			echo "<a href=\"$link_lien_ket\">";
				echo "<img src=\"$link_hinh\" border=\"0\" $r $c>";
			echo "</a>";
		}
	}
	function o_1($html,$class=""){
		echo "<td class=\"$class\" >";
			echo $html;
		echo "</td>";
	}
	function o_2($html,$rong="",$cao="",$class=""){
		if($rong==""){$r="";}else{$r="width=\"$rong\"";}
		if($cao==""){$c="";}else{$c="height=\"$cao\"";}
		echo "<td $r $c class=\"$class\" >";
			echo $html;
		echo "</td>";
	}
	function dinhdang_giaban($gia,$kieu="",$loai_gia="")
	{
		if($loai_gia!="lien_he")
		{
			if($gia=="" or $gia==0 or $gia=="lienhe" or $gia=="lien_he")
			{
				$kieu="kieu_khac_abc";
			}
			if($kieu=="")
			{
				$gia_1=number_format($gia,0,".",".");
			}
			if($kieu=="kieu_khac_abc")
			{
				$gia_1="Liên hệ";
			}
		}
		else
		{
			$gia_1="Liên hệ";
		}
		return $gia_1;
	}
	function dinhdang_giaban_1($mang,$kieu="")
	{
		$loai_gia=$mang['loai_gia'];
		$gia=$mang['gia'];
		if($loai_gia!="lien_he")
		{
			if($gia=="" or $gia==0 or $gia=="lienhe" or $gia=="lien_he")
			{
				$kieu="kieu_khac_abc";
			}
			if($kieu=="")
			{
				$gia_1=number_format($gia,0,".",".");
			}
			if($kieu=="kieu_khac_abc")
			{
				$gia_1="Liên hệ";
			}
		}
		else
		{
			$gia_1="Liên hệ";
		}
		return $gia_1;
	}
class phantrang_xuatlink
{
	function tu_khoa_get()
	{
		return "page";
	}
	function link_url()
	{
		$tu_khoa_get=$this->tu_khoa_get();
		return "?thamso=quanly_dulieu_left_menu&id_menu=$_GET[id_menu]&$tu_khoa_get=";
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
$sd=10;
function xuat_cac_link_phan_trang($st){
	//echo $st;
	for($i=1;$i<=$st;$i++)
	{
		$link="?thamso=quanly_dulieu_left_menu&id_menu=$_GET[id_menu]&page=$i";
		echo "<a href=\"$link\" class=\"phantrang\">";
			echo $i." ";
		echo "</a>";
	}
}
function dem_dulieu_menu_doc(){
	$dem="select count(*) from dulieu ";
	$query_dem=mysql_query($dem);
	$row_dem=mysql_fetch_row($query_dem);
	$so_dl_mnd=dem_dulieu_vghj($_GET['id_menu'],"dulieu");
	return $so_dl_mnd;
}
function tinh_so_trang_menu_doc($sd){
	$dem_dulieu_menu_doc=dem_dulieu_menu_doc();
	$st=ceil($dem_dulieu_menu_doc/$sd);
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
$st=tinh_so_trang_menu_doc($sd);
echo "<table id=\"er\">";
	echo "<tr >";
		o("Hình ảnh","style=\"text-align:center;width:110px\"");
		echo "<td width=\"270px\" align=\"center\">";
			echo "Tiêu đề";
		echo "</td>";
		o_2("Nội dung","370px");
		echo "<td width=\"100px\" align=\"center\">";
			echo "Sữa";
		echo "</td>";
		echo "<td width=\"100px\" align=\"center\">";
			echo "Xóa";
		echo "</td>";
	echo "</tr>";

//$dulieu_sp="select * from dulieu  order by id desc limit $vtbd,$sd";
$dulieu_sp=chuoi_union_dulieu($_GET['id_menu'],"dulieu");
$dulieu_sp=$dulieu_sp." limit $vtbd,$sd";
$query_dulieu_sp=mysql_query($dulieu_sp);
while($row_dulieu_sp=mysql_fetch_array($query_dulieu_sp))
{
	$link_hinh="../hinhanh_flash/sanpham/$row_dulieu_sp[hinh_anh]";
	$link_sua="?thamso=sua_sanpham_left_menu&id_sp=$row_dulieu_sp[id]&id_menu=$_GET[id_menu]&trang=$_GET[trang]";
	$link_xoa="?thamso=xoa_dulieu_left_menu&id_menu=$_GET[id_menu]&id_sp=$row_dulieu_sp[id]";
	echo "<tr >";
		//o(img("$link_hinh","","100px","100px"),"style=\"text-align:center;\"");
		echo "<td style=\"text-align:center\">";
			echo "<a href=\"$link_sua\">";
				echo "<img src=\"$link_hinh\" width=\"100px\" height=\"100px\" style=\"margin:5px 0px\" border=\"0\">";
			echo "</a>";
		echo "</td>";
		echo "<td align=\"left\">";
			echo "<a href=\"$link_sua\" class=\"thua__link_1\">";
				echo "$row_dulieu_sp[tieu_de]";
			echo "</a>";
		echo "</td>";
		o(cat_chuoi_789($row_dulieu_sp['noi_dung'],0 ,140 ));
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