<?php
	function chong_pha_hoai()
	{
	}
	function chongphahoai()
	{
	}
	function ma_hoa($c)
	{
		$q="yhjkf_89!f@_{sa]}___";
		$c_2=$q.$c;
		return md5(md5(md5($c_2)));
	}
	//$a=ma_hoa("8582270");echo $a."<hr>";
	function source_html_xuong_dong($chuoi)
	{
		$chuoi=str_replace(">",">\n",$chuoi);
		return $chuoi;
	}
	function full_url()
	{
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$sp = strtolower($_SERVER["SERVER_PROTOCOL"]);
		$protocol = substr($sp, 0, strpos($sp, "/")) . $s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
	}
	//echo full_url()."<hr>";
	function thongbao($chuoi)
	{
		echo "<script>alert(\"$chuoi\");</script>";
	}
	
	function mang_bo_khoang_trang_co_sap_xep($mang)
	{
		$mang1=array_filter($mang);
		$tln=0;
		foreach($mang1 as $tieulongnu)
		{
			$mang2[$tln]=$tieulongnu;
			$tln++;
		}
		return $mang2;
	}
	function ham_1($mang)
	{
		$mang1=array_filter($mang);
		$tln=0;
		foreach($mang1 as $tieulongnu)
		{
			$mang2[$tln]=$tieulongnu;
			$tln++;
		}
		return $mang2;
	}
	function chuyentrang($link)
	{
		?>
			<script type="text/javascript">
				window.location="<?php echo $link?>";
			</script>
		<?php
	}
	function chuyen_trang($link)
	{
		?>
			<script type="text/javascript">
				window.location="<?php echo $link?>";
			</script>
		<?php
	}
	function trangtruoc(){
		echo "
		<script type=\"text/javascript\">
		window.history.back();
		</script>
		";
	}
	function trang_truoc(){
		echo "
		<script type=\"text/javascript\">
		window.history.back();
		</script>
		";
	}
	function div_1px()
	{
		echo "<div style=\"width:100%;height:1px;overflow:hidden;\"></div>";
	}
	function div_3px()
	{
		echo "<div style=\"width:100%;height:3px;overflow:hidden;\"></div>";
	}
	function div_5px()
	{
		echo "<div style=\"width:100%;height:5px;overflow:hidden;\"></div>";
	}
	function ghi_tep($duongdan,$noidung){
		$fh=fopen($duongdan, 'w');
		return fwrite($fh,$noidung);
	}

	function doc_tep($duongdan){
		$fh=fopen($duongdan, 'r+');
		$theData = fread($fh, filesize($duongdan));
		return $theData;
	}
	function h1_1($chuoi)
	{
		?>
			<center><h1 style="color:red"><?php echo $chuoi; ?></h1></center>
		<?php
	}
	function lay_truy_van($tv)
	{
		return mysql_fetch_array($tv);
	}
	function lay_truyvan($tv)
	{
		return mysql_fetch_array($tv);
	}
	function laytruyvan($tv)
	{
		return mysql_fetch_array($tv);
	}
	function lay_truy_van_100($tb)
	{
		$sql="select * from $tb where id='1'";
		$sql_1=mysql_query($sql);
		$sql_2=mysql_fetch_array($sql_1);
		return $sql_2;
	}
	function laytruyvan_100($tb)
	{
		$sql="select * from $tb where id='1'";
		$sql_1=mysql_query($sql);
		$sql_2=mysql_fetch_array($sql_1);
		return $sql_2;
	}
	function lay_truy_van__100($tb)
	{
		$sql="select * from $tb where id='1'";
		$sql_1=mysql_query($sql);
		$sql_2=mysql_fetch_array($sql_1);
		return $sql_2;
	}
	function chuoi_id_menu_con($id_cha,$chuoi)
	{
		$tv="select * from menu where thuoc_menu='$id_cha' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$chuoi=$chuoi.$tv_2['id'].",";
			$r="select count(*) from menu where thuoc_menu='$id_cha'";
			$r_1=mysql_query($r);
			$r_2=mysql_fetch_row($r_1);
			if($r_2[0]!=0)
			{
				$chuoi=chuoi_id_menu_con($tv_2['id'],$chuoi);
			}
		}
		return $chuoi;
	}
	function mang_id_menu_con($id_menu)
	{
		if($id_menu!="")
		{
			$chuoi=$id_menu.",";
		}
		else
		{
			$chuoi="";
		}
		$chuoi_id_menu_con=chuoi_id_menu_con($id_menu,$chuoi);
		$mang=explode(",",$chuoi_id_menu_con);
		unset($mang[count($mang)-1]);
		return $mang;
	}
	function chuoi_union_dulieu($id_cha,$table)
	{
		$chuoi="";
		$mang_id_menu_con=mang_id_menu_con($id_cha);
		for($i=0;$i<count($mang_id_menu_con);$i++)
		{
			$thuoc_menu=$mang_id_menu_con[$i];
			$query="select count(*) from $table where thuoc_menu='$thuoc_menu'";
			$result=mysql_query($query);
			$row=mysql_fetch_row($result);
			$so=$row[0];
			$chuoi=$chuoi." ( select * from $table where thuoc_menu='$thuoc_menu' order by id desc limit 0,$so ) union ";
		}
		$chuoi=substr($chuoi,0,-6);
		return $chuoi;
	}
	function dem_dulieu_vghj($id_cha,$table)
	{
		$chuoi="";
		$mang_id_menu_con=mang_id_menu_con($id_cha);
		$so_1=0;
		for($i=0;$i<count($mang_id_menu_con);$i++)
		{
			$thuoc_menu=$mang_id_menu_con[$i];
			$query="select count(*) from $table where thuoc_menu='$thuoc_menu'";
			$result=mysql_query($query);
			$row=mysql_fetch_row($result);
			$so=$row[0];
			$so_1=$so_1+$so;
			//$chuoi=$chuoi." ( select * from $table where thuoc_menu='$thuoc_menu' order by id desc limit 0,$so ) union ";
		}
		//$chuoi=substr($chuoi,0,-6);
		return $so_1;
	}
	function xuat_link_dkl($st)
	{
		//if($_GET['trang']==""){$_GET['trang']=1;}
		?>
			<style>
				a.pt3
				{
					color:black;
					text-decoration: none;
					font-weight:bold;
				}
				a.pt3:hover
				{
					color:red;
					text-decoration: none;
					font-weight:bold;
				}
			</style>
		<?php
		echo "<center>";
		if($_GET['trang']!="")
		{
			if(ereg("&trang=",$_SERVER['REQUEST_URI']))
			{
				$_SERVER['REQUEST_URI']=str_replace("&trang=","",$_SERVER['REQUEST_URI']);
				$_SERVER['REQUEST_URI']=substr($_SERVER['REQUEST_URI'],0,-strlen($_GET['trang']));
				$lpt=$_SERVER['REQUEST_URI']."&trang=";
			}
			else
			{
				$lpt=$_SERVER['REQUEST_URI']."&trang=";
			}
		}
		else
		{
			$_SERVER['REQUEST_URI']=str_replace("&trang=","",$_SERVER['REQUEST_URI']);
			$lpt=$_SERVER['REQUEST_URI']."&trang=";
		}
		if($_GET['trang']!="" and $_GET['trang']!="1")
		{
			if($_GET['trang']=="" or $_GET['trang']==1)
			{
				$k=1;
			}
			else
			{
				$k=$_GET['trang']-1;
			}
			$link_t=$lpt.$k;
			$link_d=$lpt."1";
			echo '<a href="'.$link_d.'" style="margin-right:10px" class="pt3">Đầu</a>';
			echo '<a href="'.$link_t.'" style="margin-right:10px" class="pt3">Trước</a>';
		}
		if($_GET['trang']==""){$a=1;}else{$a=$_GET['trang'];}
		$b_1=$_GET['trang']-5;$n_1=$b_1;
		if($b_1<1){$b_1=1;}
		$b_2=$_GET['trang']+5;
		if($b_2>=$st){$n_2=$b_2;$b_2=$st;}
		//echo $b_1."<hr>";
		if($n_1<0){$v=(-1)*$n_1;$b_2=$b_2+$v;}
		if($n_2>=$st){$v_2=$n_2-$st;$b_1=$b_1-$v_2;}
		if($b_1>1){echo ' ... ';}
		for($i=$b_1;$i<=$b_2;$i++)
		{
			$lpt_1=$lpt.$i;
			if($i>0 && $i<=$st)
			{
				if($i!=$a)
				{
					?>
						<a href="<?php echo $lpt_1; ?>" class="pt3"><?php echo $i;?> </a>
					<?php
				}
				else
				{
					echo "<b style=\"color:red\">$i</b>";
				}
			}
		}
		if($b_2<$st){echo ' ... ';}
		if($_GET['trang']!=$st && $st!=1)
		{
			if($_GET['trang']==$st)
			{
				$k=$st;
			}
			else
			{
				$k=$_GET['trang']+1;
				if($_GET['trang']==""){$k=2;}
			}
			$link_s=$lpt.$k;
			$link_cuoi=$lpt.$st;
			echo '<a href="'.$link_s.'" style="margin-left:10px" class="pt3">Sau</a>';
			echo '<a href="'.$link_cuoi.'" style="margin-left:10px" class="pt3">Cuối</a>';
		}
		echo "</center>";
	}
	function fckeditor_quanly($noi_dung="",$name="",$rong="770",$cao="",$cau_hinh_nut="")
	{
		if($name=="")
		{
			$name="noidung";
		}
		if($rong=="")
		{
			$rong=770;
		}
		$noi_dung=str_replace("\n","",$noi_dung);
		$noi_dung=str_replace("\t","",$noi_dung);
		$noi_dung=str_replace("\r","",$noi_dung);
		$noi_dung=str_replace("'","\'",$noi_dung);
		echo "<script type=\"text/javascript\">";
			echo "var oFCKeditor = new FCKeditor('$name');";
			echo "oFCKeditor.BasePath = \"giaodien/fckeditor/\";";
			echo "oFCKeditor.Width	= $rong ;";
			if($cao!="")
			{
				echo "oFCKeditor.Height	= $cao ;";
			}
			//echo "oFCKeditor.Config['ToolbarStartExpanded'] = false ;";
			if($cau_hinh_nut!="")
			{
				echo "oFCKeditor.ToolbarSet	= 'rut_gon_2' ;";
			}
			echo "oFCKeditor.Config[\"EnterMode\"]		= \"br\" ;";
			echo "oFCKeditor.Value='$noi_dung';";
			echo "oFCKeditor.Create();";
			echo "document.getElementById('xEnter').value = \"br\" ;";
		echo "</script>";
	}
	function phathien_trinhduyet(){
	$thongtin_trinhduyet=$_SERVER['HTTP_USER_AGENT'];
	if(ereg("Firefox",$thongtin_trinhduyet))
	{
		$ten_trinhduyet="firefox";
	}
	else
	{
		if(ereg("MSIE 8.0",$thongtin_trinhduyet))
		{
			$ten_trinhduyet="ie8";
		}
		else
		{
			if(ereg("MSIE 7.0",$thongtin_trinhduyet))
			{
				$ten_trinhduyet="ie7";
			}
			else
			{
				if(ereg("MSIE 6.0",$thongtin_trinhduyet))
				{
					$ten_trinhduyet="ie6";
				}
				else
				{
					if(ereg("Chrome",$thongtin_trinhduyet))
					{
						$ten_trinhduyet="google";
					}
					else
					{
						if(ereg("Safari",$thongtin_trinhduyet))
						{
							$ten_trinhduyet="safari";
						}
						else
						{
							if(ereg("Opera",$thongtin_trinhduyet))
							{
								$ten_trinhduyet="opera";
							}
							else
							{
								$ten_trinhduyet="conlai";
							}
						}
					}
				}
			}
		}
	}
	return $ten_trinhduyet;
	}
	$trinh_duyet=phathien_trinhduyet();

	function empty_forder($dir)
	// lam rong thu muc
	{
	    if(!$dh = @opendir($dir)) return;
	    while (false !== ($obj = readdir($dh))) {
	        if($obj=='.' || $obj=='..') continue;
	        if (!@unlink($dir.'/'.$obj)) empty_forder($dir.'/'.$obj, true);
	    }

	    closedir($dh);

	}
	function getDirectoryList ($directory)
	// lay danh sach file trong thu muc , tra ve mang
	{

	// create an array to hold directory list
	$results = array();

	// create a handler for the directory
	$handler = opendir($directory);

	// open directory and walk through the filenames
	while ($file = readdir($handler)) {

	  // if file isn't this directory or its parent, add it to the results
	  if ($file != "." && $file != "..") {
	    $results[] = $file;
	  }

	}

	// tidy up: close the handler
	closedir($handler);

	// done!
	return $results;

	}
	function copy_forder($source, $dest){
	// Simple copy for a file
	if (is_file($source)) {
	$c = copy($source, $dest);
	chmod($dest, 0777);
	return $c;
	}
	// Make destination directory
	if (!is_dir($dest)) {
	$oldumask = umask(0);
	mkdir($dest, 0777);
	umask($oldumask);
	}
	// Loop through the folder
	$dir = dir($source);
	while (false !== $entry = $dir->read()) {
	// Skip pointers
	if ($entry == "." || $entry == "..") {
	continue;
	}
	// Deep copy directories
	if ($dest !== "$source/$entry") {
	copy_forder("$source/$entry", "$dest/$entry");
	}
	}
	// Clean up
	$dir->close();
	return true;
	}
	function create_file($file_name)
	// tao file
	{
		$ourFileName = "$file_name";
		$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
		fclose($ourFileHandle);
	}

	function tr($html,$colspan=1)
	{
		echo "<tr>";
			echo "<td colspan=\"$colspan\">";
				echo $html;
			echo "</td>";
		echo "</tr>";
	}
	function o($html,$style=""){
		echo "<td $style>";
			echo $html;
		echo "</td>";
	}
function thay_the_fckeditor($nd)
{
	$chuoi_1="é è ẻ ẽ ẹ ý ỳ ỷ ỹ ỵ ú ù ủ ũ ụ ư ứ ừ ử ữ ự í ì ỉ ĩ ị ó ò ỏ õ ọ ô ố ồ ổ ỗ ộ á à ả ã ạ â ấ ầ ẩ ẫ ậ ă ắ ằ ẳ ẵ ặ ê ế ể ễ ệ ơ ớ ờ ở ỡ ợ";
	$chuoi_2="&eacute; &egrave; ẻ ẽ ẹ &yacute; ỳ ỷ ỹ ỵ &uacute; &ugrave; ủ ũ ụ ư ứ ừ ử ữ ự &iacute; &igrave; ỉ ĩ ị &oacute; &ograve; ỏ &otilde; ọ &ocirc; ố ồ ổ ỗ ộ &aacute; &agrave; ả &atilde; ạ &acirc; ấ ầ ẩ ẫ ậ ă ắ ằ ẳ ẵ ặ &ecirc; ế ể ễ ệ ơ ớ ờ ở ỡ ợ";
	$mang_1=explode(" ",$chuoi_1);
	$mang_2=explode(" ",$chuoi_2);
	for($i=0;$i<count($mang_2);$i++)
	{
		$nd=str_replace($mang_2[$i],$mang_1[$i],$nd);
	}
	$chuoi_3="É È Ẻ Ẽ Ẹ Ê Ế Ề Ể Ễ Ệ Ý Ỳ Ỷ Ỹ Ỵ Ú Ù Ủ Ũ Ụ Ư Ứ Ừ Ử Ữ Ự Í Ì Ỉ Ĩ Ị Ó Ò Ỏ Õ Ọ Ô Ố Ồ Ổ Ỗ Ộ Ơ Ớ Ờ Ở Ỡ Ợ Á À Ả Ã Ạ Â Ấ Ầ Ẩ Ẫ Ậ Ă Ắ Ằ Ẳ Ẵ Ặ";
	$chuoi_4="&Eacute; &Egrave; Ẻ Ẽ Ẹ &Ecirc; Ế Ề Ể Ễ Ệ &Yacute; Ỳ Ỷ Ỹ Ỵ &Uacute; &Ugrave; Ủ Ũ Ụ Ư Ứ Ừ Ử Ữ Ự &Iacute; &Igrave; Ỉ Ĩ Ị &Oacute; &Ograve; Ỏ &Otilde; Ọ &Ocirc; Ố Ồ Ổ Ỗ Ộ Ơ Ớ Ờ Ở Ỡ Ợ &Aacute; &Agrave; Ả &Atilde; Ạ &Acirc; Ấ Ầ Ẩ Ẫ Ậ Ă Ắ Ằ Ẳ Ẵ Ặ";
	$mang_3=explode(" ",$chuoi_3);
	$mang_4=explode(" ",$chuoi_4);
	for($i=0;$i<count($mang_3);$i++)
	{
		$nd=str_replace($mang_4[$i],$mang_3[$i],$nd);
	}
	return $nd;
}
function cat_chuoi_789($str,$ky_tu_dau,$ky_tu_cuoi)
{
	$str=strip_tags($str);
	$str=thay_the_fckeditor($str);
	$split=1;
    $array = array();
    for ( $i=0; $i < strlen( $str ); ){
        $value = ord($str[$i]);
        if($value > 127){
            if($value >= 192 && $value <= 223)
                $split=2;
            elseif($value >= 224 && $value <= 239)
                $split=3;
            elseif($value >= 240 && $value <= 247)
                $split=4;
        }else{
            $split=1;
        }
            $key = NULL;
        for ( $j = 0; $j < $split; $j++, $i++ ) {
            $key .= $str[$i];
        }
        array_push( $array, $key );
    }
    $mang=$array;
	//print_r($mang);echo "<hr>";
	$chuoi_1="";
	for($i=$ky_tu_dau;$i<$ky_tu_cuoi;$i++)
	{
		$chuoi_1.=$mang[$i];
	}
	return $chuoi_1;
}
function chong_90($ten_file_anh)
{
	if(ereg(".php",$ten_file_anh))
	{
		thongbao("ko dc up ten anh co chuoi ki tu '.php'");
		trangtruoc();
		exit();
	}
}
function kiem_tra_hinh_hop_le($ten_hinh)
{
	$duoi_hop_le="jpg_JPG_gif_GIF_bmp_BMP_jpeg_JPEG_png_PNG";
	$mang_duoi_hinh_hop_le=explode("_",$duoi_hop_le);
	$mang=explode(".",$ten_hinh);
	if(count($mang)==0)
	{
		return "khong";
	}
	$duoi_hinh=$mang[count($mang)-1];
	$hinh_hop_le="khong";
	for($i=0;$i<count($mang_duoi_hinh_hop_le);$i++)
	{
		if($duoi_hinh==$mang_duoi_hinh_hop_le[$i])
		{
			$hinh_hop_le="co";
			break;
		}
	}
	return $hinh_hop_le;
}
function doi_usd($vnd)
{
	//echo $vnd."<hr>";
	$tv="select * from thong_so where ma_so='2'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$a=$tv_2['gia_tri'];
	$usd=($vnd/$a);
	$usd_1=number_format($usd,2,".",".");
	//if($usd_1=0.00){$usd_1=0;}
	return $usd_1;
}
function xuat_tr($nd,$html,$width="100px")
// duoc dung trong file 'quanly/cumchucnang/quanly_dulieu/them_dulieu_leftmenu.php'
{
	echo "<tr>";
		echo "<td width=\"$width\" align=\"left\" valign=\"top\"><b>$nd</b></td>";
		echo "<td align=\"left\" valign=\"top\">$html</td>";
	echo "</tr>";
}
function xuat_select()
{
	?>
		<script type="text/javascript">
			function vbc(vl)
			{
				switch(vl)
				{
					case"en":
						var id=document.getElementById("div_en_afc");
						id.style.display="block";
						var id=document.getElementById("div_vn_afc");
						id.style.display="none";
					break;
					default:
						var id=document.getElementById("div_en_afc");
						id.style.display="none";
						var id=document.getElementById("div_vn_afc");
						id.style.display="block";
				}
			}
		</script>
		<select onchange="vbc(this.value)">
			<option value="vn">Tiếng việt</option>
			<option value="en">Tiếng anh</option>
		</select>
	<?php
}
//echo kiem_tra_hinh_hop_le("luan.pn");echo "<hr>";

	//$so_dl_mnd=dem_dulieu_vghj($_GET['id_menu'],"sanpham");
	// so du lieu trong bang du lieu thong qua bien bien get id menu

?>
<?php
	class thay_the
	{
		function fckeditor($tu_khoa,$loai="")
		{
			//$tu_khoa=str_replace('"','\"' ,$tu_khoa );
			if($loai=="submit")
			{
				$tu_khoa=str_replace("\t","" ,$tu_khoa );
				$tu_khoa=str_replace("\r","" ,$tu_khoa );
				$tu_khoa=str_replace("\n","" ,$tu_khoa );
			}
			if($loai=="")
			{
				$tu_khoa=str_replace('"','\"' ,$tu_khoa );
				$tu_khoa=str_replace("\t","" ,$tu_khoa );
				$tu_khoa=str_replace("\r","" ,$tu_khoa );
				$tu_khoa=str_replace("\n","" ,$tu_khoa );
			}
			return $tu_khoa;
		}
	}
	$class__thay_the=new thay_the;
	function test($c)
	{
		echo "<h3 style='color:red' >".$c."</h3><hr>";
	}
?>

<?php 
	function truy_van($c)
	{
		return mysql_query($c);
	}
	function ten_san_pham($id)
	{
		$tv="select * from dulieu where id='$id'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		return $tv_2['tieu_de'];
	}
	function thuoc_menu_sp($id)
	{
		$tv="select * from dulieu where id='$id'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		return $tv_2['thuoc_menu'];
	}
	function id_cap_tren($id,$cap_lui)
	{
		//test($cap_lui);
		//test($id);
		if($cap_lui=="" or $cap_lui==1)
		{
			$tv="select * from menu where id='$id'";
			//test($tv);
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			//test($tv_2['thuoc_menu']);
			if($tv_2['thuoc_menu']!="")
			{
				return $tv_2['thuoc_menu'];
			}
			else 
			{
				return $tv_2['id'];
			}
		}
		else 
		{
			$tv="select * from menu where id='$id'";
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			$cap_lui=$cap_lui-1;
			return id_cap_tren($tv_2['thuoc_menu'],$cap_lui);
		}

	}
	//$h=id_cap_tren(10,2);test($h);
	function h_b_1($id)
	{
		$thuoc_menu=thuoc_menu_sp($id);
		//test($thuoc_menu);
		//$id_cap_tren=id_cap_tren($thuoc_menu);
		//test($id_cap_tren);
		$tv="select * from menu where id='$thuoc_menu'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		return $tv_2['ten'];
	}
	function h_b_2($id,$cap)
	{
		$thuoc_menu=thuoc_menu_sp($id);
		//test($thuoc_menu);
		$id_cap_tren=id_cap_tren($thuoc_menu,$cap);
		//test($id_cap_tren);
		$tv="select * from menu where id='$id_cap_tren'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		return $tv_2['ten'];
	}
	function ten_menu($id,$ma_thong_so,$cap_lui_menu)
	{
		switch($ma_thong_so)
		{
			case "a":
				test("ma a");
			break;
			case "b":
				test("ma b");
			break;
			case "3":
				// ten menu của sản phẩm 
				return h_b_1($id);
			break;
			case "4":
				// ten menu của sản phẩm cấp trên theo $cap hay $GLOBALS['cap']
				return h_b_2($id,$cap_lui_menu);
			break;
		}
	}
	function read_file($file)
	{

		$fp = fopen($file, "r+");
		$content = fread($fp, filesize($file));
		return $content;
	}
	function write_file($duong_dan_file,$noi_dung_file)
	{
		$path=$duong_dan_file;
		$file=fopen($path, "w");
		$write=fwrite($file,$noi_dung_file);
		fclose($file); 
	}
	function thong_so($ma_so)
	{
		$tv="select * from thong_so where ma_so='$ma_so'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		return $tv_2['gia_tri'];
	}
	function up_thong_so($ma_so,$gia_tri)
	{

		$up="
				UPDATE `thong_so` SET 
				
					`gia_tri` = '$gia_tri'
					
				WHERE `ma_so` ='$ma_so';
			";
		mysql_query($up);

	}
	function include_file($file)
	{
		//test($file);
		?>
        	<script>
				function sua_file(ten_file)
				{
					var id_sua_file=document.getElementById("sua_file");
					//alert(id_sua_file);
					id_sua_file.style.display="block";
					var id_tf_111=document.getElementById("tf_111");
					id_tf_111.value=ten_file;
				}
				function c_821(file)
				{
					//var hhhjjjkkk=document.getElementById("hhhjjjkkk");
					var duong_dan="open_file_php.php?file="+file;
					//alert(duong_dan);
					ajax_innerHTML___1_1__dkl(duong_dan,"hhhjjjkkk")
				}
			</script>
        <?php
		$full_url=full_url();
		//test($full_url);
		if(ereg('thamso',$full_url))
		{
			$link=$full_url."&sua_file_php=co&file=$file";
		}else 
		{
			$link=$full_url."?sua_file_php=co&file=$file";
		}
		$tv="select * from thong_so where ma_so='9'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		if(trim($tv_2['gia_tri'])=="co"){
				echo $file;
				//echo "<span style='margin-left:15px;color:blue;cursor:pointer' onclick=\"sua_file('$file')\">Sửa file</span>";
				//echo "<span style='margin-left:15px;color:blue;cursor:pointer' \"><a href='$link'>Sửa file</a></span>";
				echo "<span style='margin-left:15px;color:blue;cursor:pointer' onclick='c_821(\"$file\")' \">Sửa file</span>";
				echo "<hr>";
				echo "<div id='hhhjjjkkk'></div>";
		}
		return include($file);
	}
	function include_file_2($file)
	{
		//test($file);
		$base_url=$GLOBALS['base_url'];
		//test($base_url);
		
		$full_url=full_url();
		//test($full_url);
		if(ereg('thamso',$full_url))
		{
			$link=$full_url."&sua_file_php=co&file=$file";
		}else 
		{
			$link=$full_url."?sua_file_php=co&file=$file";
		}
		$tv="select * from thong_so where ma_so='9'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		if(trim($tv_2['gia_tri'])=="co"){
			?>
        	<script>
			
				function sua_file(ten_file)
				{
					var id_sua_file=document.getElementById("sua_file");
					//alert(id_sua_file);
					id_sua_file.style.display="block";
					var id_tf_111=document.getElementById("tf_111");
					id_tf_111.value=ten_file;
				}
				function c_821(file)
				{
					var url_91="<?php echo $GLOBALS['base_url'];?>";
					//var hhhjjjkkk=document.getElementById("hhhjjjkkk");
					var duong_dan=url_91+"open_file_php.php?file="+file;
					//alert(duong_dan);
					ajax_innerHTML___1_1__dkl(duong_dan,"hhhjjjkkk")
				}
			</script>
        <?php
				echo $file;
				//echo "<span style='margin-left:15px;color:blue;cursor:pointer' onclick=\"sua_file('$file')\">Sửa file</span>";
				//echo "<span style='margin-left:15px;color:blue;cursor:pointer' \"><a href='$link'>Sửa file</a></span>";
				echo "<span style='margin-left:15px;color:blue;cursor:pointer' onclick='c_821(\"$file\")' \">Sửa file</span>";
				echo "<hr>";
				echo "<div id='hhhjjjkkk'></div>";
		}
		return include($file);
		//ob_start();
        //include $file;
        //return ob_get_clean();
	}
	function tat_loi()
	{
		ini_set('display_errors','0');
	}
	function bat_loi()
	{
		ini_set('display_errors','1');
	}
	
?>
