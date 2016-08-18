<?php
chongphahoai();
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
<style type="text/css">
	div.div_input_file__999
	{
		overflow:hidden;
		width:100px;

	}
	input.input_file__fff___opera
	{

		border:1px solid #cccccc;
		width:76px
	}
	input.input_file__fff___mac_dinh
	{
		margin-left:-170px;
	}

</style>
<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#upload_button');
		var status=$('#status_message');
		new AjaxUpload(btnUpload, {
			action: 'jquerymultiplefileupload/upload-file_1.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif|bmp)$/.test(ext))){
                    // extension is not allowed
					status.text('Only JPG, PNG , GIF or BMP files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				//On completion clear the status
				//alert("chao");

				status.text('');
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files_list').html('<img src="../hinhanh_flash/upload_tam/'+file+'" alt="" width="135px" height="135px"/><br />').addClass('success');
				} else{
					$('<li></li>').appendTo('#files_list').text(file).addClass('error');
				}
				var id=document.getElementById("files_list");
				var img=id.getElementsByTagName("img");
				//alert(id.offsetHeight);
				if(img.length>8)
				{
					id.style.height="350px";
					id.style.overflow="scroll";
				}
			}
		});

	});
</script>
<?php
function nut_tai($name="")
{
	$trinh_duyet=phathien_trinhduyet();
	switch($trinh_duyet)
	{
		case"abc":
			$class="abc";
		break;
		case "opera":
			$class="input_file__fff___opera";
		break;
		default:
			$class="input_file__fff___mac_dinh";
	}
	echo "<div class=\"div_input_file__999\">";
		echo "<input type=\"file\" name=\"$name\" class=\"$class\">";
	echo "</div>";
}
?>
<style type="text/css">
	table.e_jjj img
	{
		width:150px;
		height:150px;
		margin :10px 10px 10px 10px;
		padding :5px 5px 5px 5px;
		border:1px solid #fc0884;
	}
	img.zzz453
	{
		width:150px;
		height:150px;
		margin :10px 10px 10px 10px;
		padding :5px 5px 5px 5px;
		border:1px solid #fc0884;
	}
	img.zzz453__hover
	{
		width:150px;
		height:150px;
		margin :10px 10px 10px 10px;
		padding :4px 4px 4px 4px;
		border:2px solid #fc0884;
	}
	div.e_jjj_1
	{
		height:320px;
		overflow:scroll;
	}
</style>
<?php
function xuat_td__jjj($hinh,$o_1)
{
	$name_1="nhieu_hinh_abc__$o_1";
	$name_2="hidden_nhieu_hinh_abc__$o_1";
	$name_3="tuy_chon_abc__$o_1";
	$link_hinh="../hinhanh_flash/sanpham/$_GET[id_sp]/$hinh";
	echo "<td>";
		if($hinh!="")
		{
			echo "<center>";
				echo "<img src=\"$link_hinh\" class=\"zzz453\" ><br>";

						//nut_tai();
						echo "<input type=\"file\" style=\"margin:0px 6px\" name=\"$name_1\"><br>";
						echo "<input type=\"hidden\" name=\"$name_2\" value=\"$hinh\">";
						echo "<select style=\"margin:6px 0px\" name=\"$name_3\">";
							echo "<option value=\"\">Tùy chọn</option>";
							echo "<option value=\"xoa\">Xóa</option>";
						echo "</select>";

					//echo "<input type=\"file\" style=\"width:10px;\">";
			echo "</center>";
		}
		else
		{
			echo " ";
		}
	echo "</td>";

}
function xuat_tr_td__jjj($mang_dkl)
{
	$so_k=count($mang_dkl)-1;
	//print_r($mang_dkl);echo "<hr>";
	$o=0;
	$k=3;
	$r=1;
	while(1>0)
	{
		$o_1=$o+1;
		$hinh=$mang_dkl[$o];
		//echo $i."<hr>";
		if($r==1)
		{
			echo "<tr>";
		}
		xuat_td__jjj($hinh,$o_1);

		if($r==$k)
		{
			echo "</tr>";
			$r=1;
		}
		else
		{
			$r++;
		}
		$o++;
		if($hinh=="")
		{
			break;
		}
	}
	echo "<input type=\"hidden\" name=\"hd_dkl\" value=\"$o\">";
}
function echo_hinh_jjj($mang_dkl)
{
	$so_k=count($mang_dkl)-1;
	echo "<center>";
		if($so_k<7)
		{
			echo "<table class=\"e_jjj\" id=\"e_jjj\">";
				xuat_tr_td__jjj($mang_dkl);
			echo "</table>";
		}
		else
		{
			echo "<div class=\"e_jjj_1\">";
				echo "<table class=\"e_jjj\" id=\"e_jjj\">";
					xuat_tr_td__jjj($mang_dkl);
				echo "</table>";
			echo "</div>";
		}
	echo "</center>";
}
class class__khung_sua_sanpham_menu_doc
{
	function xuly_kitu___khung_nhap_lieu___sua_sanpham_menu_doc($giatri)
	{
		$giatri=str_replace("\n","",$giatri);
		$giatri=str_replace("\t","",$giatri);
		$giatri=str_replace("\r","",$giatri);
		$giatri=str_replace("'","\'",$giatri);
		//$giatri=str_replace("\"","'",$giatri);
		return $giatri;
	}
	function khung_nhap_nhieu_sua_sanpham_menu_doc($ten,$giatri)
	{
		$giatri=$this->xuly_kitu___khung_nhap_lieu___sua_sanpham_menu_doc($giatri);
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
		oFCKeditor.Width	= 760 ;
		oFCKeditor.Height	= 350 ;
		oFCKeditor.Config[\"EnterMode\"]		= \"br\" ;
		oFCKeditor.Value='$giatri';
		oFCKeditor.Create();
		//document.getElementById('xEnter').value = \"br\" ;

		</script>";

	}
	function khung_sua_sanpham_menu_doc()
	{
		$dulieu_sua					=	"select * from help where id in ('$_GET[id_sp]')";
		$query_dulieu_sua			=	mysql_query($dulieu_sua);
		$row_dulieu_sua				=	mysql_fetch_array($query_dulieu_sua);
		$ten_hinh					=	$row_dulieu_sua['hinh_anh'];
		$gia						=	$row_dulieu_sua['gia'];
		$trang_thai					=	$row_dulieu_sua['trang_thai'];
		$khuyen_mai					=	$row_dulieu_sua['khuyen_mai'];
		$noi_dung					=	$row_dulieu_sua['noi_dung'];
		$noi_dung__en				=	$row_dulieu_sua['noi_dung__en'];
		$loai_gia					=	$row_dulieu_sua['loai_gia'];
		$size						=	$row_dulieu_sua['size'];
		$khoi_luong					=	$row_dulieu_sua['khoi_luong'];
		$keywords					=	$row_dulieu_sua['keywords'];
		$description				=	$row_dulieu_sua['description'];
		if($loai_gia=="lien_he")
		{
			$gia="";
			$ra2="selected";$ra1="";
		}
		else
		{
			$ra1="selected";$ra2="";
		}
		echo "<table width=\"970px\" id=\"er\" style=\"margin:6px 0px\">";
		echo "<form action=\"\" style=\"margin:0\" method=\"post\" enctype=\"multipart/form-data\">";
		echo "<tr>";
			echo "<td colspan=\"2\">";
				echo "<span style=\"float:left\">Sữa menu help</span>";
				echo "<a href=\"?thamso=quan_ly_menu_help&id_menu=$_GET[id_menu]&trang=$_GET[trang]\"
				 style=\"float:right;margin-right:5px;color:#0b55c4;text-decoration: none;\" >";
					echo "Đóng";
				echo "</a>";
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td width=\"20%\" align=\"left\"><b>Tên menu : </b></td>";
			echo "<td width=\"80%\" align=\"left\"><input name=\"tieude\" size=\"25\" value=\"$row_dulieu_sua[ten_menu]\"></td>";
		echo "</tr>";
		//xuat_tr("Tiêu đề :<br>(English)","<input name=\"tieude_en\" size=\"70\" value=\"$row_dulieu_sua[tieu_de__en]\">");
		//echo "<tr>";
		//<!---------------1---------->
		echo "<tr>";
					echo "<td width=\"20%\" align=\"left\"><b>Tên bài viết : </b></td>";
					echo "<td width=\"80%\" align=\"left\"><input name=\"ten_bai_viet\" size=\"25\" value=\"$row_dulieu_sua[ten]\"></td>";
				echo "</tr>";
				//xuat_tr("Tiêu đề : <br>(English)","<input name=\"tieude_en\" size=\"70\">");


				echo "<tr>";
					echo "<td width=\"20%\" align=\"left\"><b>Dạng : </b></td>";
					if($row_dulieu_sua['dang']==1){$a_1="selected='selected'";}else{$a_2="selected='selected'";}
					echo "<td width=\"80%\" align=\"left\">
					<select name='dang'>
						<option value='1' $a_1 >Bình thường</option>
						<option value='2' $a_2 >Không link</option>
					</select>
					";

					echo "</td>";
				echo "</tr>";
				
		
		echo "<tr>";
			echo "<td width=\"20%\" valign=\"top\" align=\"left\"><b>Nội dung : <b></td>";
			echo "<td width=\"80%\" valign=\"top\" align=\"left\">";
			//xuat_select();
			echo "<div id=\"div_vn_afc\">";
				//echo "tieng viet";
				$this->khung_nhap_nhieu_sua_sanpham_menu_doc("noidung",$noi_dung);
				//2	
			echo "</div>";



			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td >";
				echo " ";
			echo "</td >";
			echo "<td >";
				echo "<input type=\"submit\" class=\"nut_chapnhan\" value=\"Chấp nhận\" name=\"sua_menu_help\">";
			echo "</td>";
		echo "</tr>";
		echo "</form>";
		echo "</table>";
	}
}


$class__khung_sua_sanpham_menu_doc=new class__khung_sua_sanpham_menu_doc;
	$class__khung_sua_sanpham_menu_doc->khung_sua_sanpham_menu_doc();

?>
<script type="text/javascript">
	table_css_2("er");
	function yyy_ze()
	{
		var id=document.getElementById("e_jjj");
		var id_td=id.getElementsByTagName("td");
		for(f=0;f<id_td.length;f++)
		{
			id_td[f].style.border="0px solid red";
			if(id_td[f].getElementsByTagName("img").length!=0)
			{
				var img_jem=id_td[f].getElementsByTagName("img")[0];
				img_jem.onmouseover=function()
				{
					//alert("vao day");
					this.style.border="2px solid #fc0884";
					this.style.padding="4px";
					//this.className="zzz453__hover";
				}
				img_jem.onmouseout=function()
				{
					this.style.border="1px solid #fc0884";
					this.style.padding="5px";
					//this.className="zzz453";
				}
			}
		}
		id.style.border="0px solid red";
	}
	yyy_ze();
</script>
<script type="text/javascript">
	table_css_2("er");
	var ss_cap_do="<?php echo $_SESSION['capdo']; ?>";
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