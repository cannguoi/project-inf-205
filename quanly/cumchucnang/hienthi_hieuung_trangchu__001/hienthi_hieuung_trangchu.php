<?php	
	chong_pha_hoai();
?>
<script type="text/javascript">
	function gh(vl)
	{
		//alert(vl);
		document.getElementById("bat_tat_hieu_ung").value=vl;
	}
	function up_lll()
	{
		//alert("ddddddd");
		document.getElementById("up").value="up";
	}
</script>
<?php
	if(isset($_POST['lll']))
	{
		if($_POST['a']=="bat"){$_POST['a']="co";}else{$_POST['a']="khong";}
		ghi_tep("../cumchucnang/hieuung_trangchu/1.txt",$_POST['a']);
		trangtruoc();
	}
	if(isset($_POST['lll_1']))
	{
		function dem_ppp()
		{
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			$e="select count(*) from hieuung_trangchu where ten_anh in ('$ten_file_anh')";
			$e1=mysql_query($e);
			$e2=mysql_fetch_array($e1);
			return $e2[0];
		}
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		chong_90($ten_file_anh);
		//echo $ten_file_anh."<hr>";
		if($ten_file_anh!="")
		{
			$duongdan_upload_anh="../hinhanh_flash/abc/$ten_file_anh";
			//echo $duongdan_upload_anh;echo "<hr>";
			$dem=dem_ppp();
			if($dem==0)
			{
				
				move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
				$c="
					INSERT INTO `hieuung_trangchu` 
					(
						`id` ,
						`ten_anh`
					)
					VALUES 
					(
						NULL , '$ten_file_anh'
					)
					;"
				;
				mysql_query($c);
				//thongbao("Đã thêm ảnh");
			}
			else
			{
				thongbao("Đã trùng file ảnh cũ");
			}
		}
		trangtruoc();		
	}

	
	class class__hienthi_hieuung_trangchu
	{
		function mang_anh()
		{
			$sql="select * from hieuung_trangchu order by id";
			$sql_1=mysql_query($sql);
			$sql_2=mysql_fetch_array($sql_1);
			return $sql_2;
		}
		function bat_tat_hieu_ung()
		{
			$bat_hieu_ung=doc_tep("../cumchucnang/hieuung_trangchu/1.txt");
			switch($bat_hieu_ung)
			{
				case "co":
					$a2="";$a1="selected";
				break;
				default:
					$a1="";$a2="selected";
			}
			?>
				<div id="mainContainer" ></div>
				<div id="formResponse" style="height:0px;overflow:hidden"></div>
					
					<table>
						<form action="" method="post" name="myForm">
							<tr>
								<td width="250px"><span class="chu_dam" valign="top">Bật hoặc tắt hiệu ứng ảnh trang chủ : </span></td>
								<td>
									<input type="hidden" id="bat_tat_hieu_ung" value="" />
									<select name="a" onchange="gh(this.value)">
										<option value="bat" <?php echo $a1; ?>>bat</option>
										<option value="tat" <?php echo $a2; ?>>tat</option>
									</select>
									<input type="submit" value="Chấp nhận" style="margin-left:12px;color:white;background:red;font-weight:bold" name="lll">
								</td>
							</tr>
						</form>
					</table>
					
				
				
				
				<script type="text/javascript">
				var formObj = new DHTMLSuite.form({ formRef:'myForm',action:'cumchucnang/hienthi_hieuung_trangchu/ajax___009.php',responseEl:'formResponse'});
				</script>
			<?php
		}
		function them_hieu_ung_anh()
		{
			echo "<center><h1 class=\"chu_do\">Thêm ảnh để làm hiệu ứng</h1></center>";
			echo "<table>\n";
				echo "<form action=\"\" method=\"post\" name=\"myForm_1\" enctype=\"multipart/form-data\">";
					echo "<input type=\"hidden\" id=\"up\" value=\"\" />\n";
					echo "<tr>\n";
						echo "<td width=\"150px\">\n";
							echo "<span class=\"chu_dam\">Chọn ảnh :</span>";
							
						echo "</td>";
						echo "<td>";
							echo "<input type=\"file\" name=\"uploadedfile\" onchange=\"up_lll()\">";
						echo "</td>";
					echo "</tr>\n";
					echo "<tr>";
						echo"<td colspan=\"2\">";
							echo"<input type=\"submit\" value=\"Tải lên\" name=\"lll_1\" onclick=\"tai_len.submit()\" style=\"margin-left:62px;color:white;background:red;font-weight:bold\">";
						echo "</td>";
					echo "</tr>";
				echo "</form>";
			echo "</table>\n";
		}
		function sua_xoa_hieu_ung_anh()
		{
			echo "<center><h1 class=\"chu_do\">Sữa , xóa ảnh hiệu ứng</h1></center>";
			$sql="select * from hieuung_trangchu order by id";
			$sql_1=mysql_query($sql);
			echo "<div id=\"ccc\">";
				echo "<table class=\"table_1px\">";
				?>
					<tr>
						<td width="610px" ><b style="color:red;font-size:20px;margin-left:50px">Hình ảnh</b></td>
						<td width="100px" align="center"><b style="color:red;font-size:20px">Sữa</b></td>
						<td width="100px" align="center"><b style="color:red;font-size:20px">Xóa</b></td>
					</tr>
				<?php
				while($mang_anh=mysql_fetch_array($sql_1))
				{
				$id=$mang_anh['id'];
				$ten_hinh=$mang_anh['ten_anh'];
				$link_hinh="../hinhanh_flash/abc/$ten_hinh";
				$link_sua="?thamso=$_GET[thamso]&sua=sua&id=$id";
				$link_xoa="?thamso=$_GET[thamso]&xoa=xoa&id=$id";
				?>
					<tr>
						<td><img src="<?php echo $link_hinh; ?>" border="0" width="600px" height="217px"</td>
						<td align="center"><a href="<?php echo $link_sua; ?>" class="sua_xoa_1">Sữa</a></td>
						<td align="center"><a href="<?php echo $link_xoa; ?>" class="sua_xoa_1">Xóa</a></td>
					</tr>
				<?php
				}
				echo "</table>";
			echo "</div>";
		}
	}
	
	class class___hienthi_hieuung_trangchu__sua
	{
		function khung_sua()
		{
			$sql="select * from hieuung_trangchu where id='$_GET[id]' order by id";
			$sql_1=mysql_query($sql);
			$m=mysql_fetch_array($sql_1);
			$id=$m['id'];
			$ten_hinh=$m['ten_anh'];
			$link_hinh="../hinhanh_flash/abc/$ten_hinh";
			?>
				<center><h1 style="color:red">Sữa ảnh</h1></center>
				<table>
					<form action="" method="post" enctype="multipart/form-data">
						<tr>
							<td width="100px" valign="top"><b>Chọn ảnh :</b></td>
							<td>
								<input type="file" name="uploadedfile" /><br />
								<img src="<?php echo $link_hinh; ?>" width="600px" height="217px" />
								<input type="hidden" name="rrr" value="<?php echo $id; ?>" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Sữa" class="nut_chapnhan" name="lll_sua" style="margin-left:60px">
							</td>
						</tr>
					</form>
				</table>
			<?php
		}
		function dem_ppp()
		{
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			$e="select count(*) from hieuung_trangchu where ten_anh in ('$ten_file_anh')";
			$e1=mysql_query($e);
			$e2=mysql_fetch_array($e1);
			return $e2[0];
		}
		
		//echo $ten_file_anh."<hr>";

		function thuc_hien_sua()
		{
			$ten_file_anh=$_FILES['uploadedfile']['name'];
			chong_90($ten_file_anh);
			if($ten_file_anh!="")
			{
				$duongdan_upload_anh="../hinhanh_flash/abc/$ten_file_anh";
				//echo $duongdan_upload_anh;echo "<hr>";
				$dem=$this->dem_ppp();
				if($dem==0)
				{
					
					move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload_anh);
					$c="
						UPDATE `hieuung_trangchu` SET `ten_anh` = '$ten_file_anh' WHERE `id` ='$_POST[rrr]';
					";
					mysql_query($c);
					//thongbao("Đã thêm ảnh");
				}
				else
				{
					thongbao("Đã trùng file ảnh cũ");
				}
			}
			trangtruoc();
		}
	}
	class class___hienthi_hieuung_trangchu__xoa
	{
		function xoa()
		{
			$sql="DELETE FROM `hieuung_trangchu` WHERE `id` = '$_GET[id]'";
			mysql_query($sql);
			trangtruoc();
		}
	}
	$class__hienthi_hieuung_trangchu=new class__hienthi_hieuung_trangchu;
	$class___hienthi_hieuung_trangchu__sua=new class___hienthi_hieuung_trangchu__sua;
	$class___hienthi_hieuung_trangchu__xoa=new class___hienthi_hieuung_trangchu__xoa;
	if(!isset($_GET['xoa']))
	{
		if(!isset($_GET['sua']))
		{
			$class__hienthi_hieuung_trangchu->bat_tat_hieu_ung();
			
			$class__hienthi_hieuung_trangchu->them_hieu_ung_anh();
		
			$class__hienthi_hieuung_trangchu->sua_xoa_hieu_ung_anh();
		}
		else
		{
			if(!isset($_POST['lll_sua']))
			{
				$class___hienthi_hieuung_trangchu__sua->khung_sua();
			}
			else
			{
				$class___hienthi_hieuung_trangchu__sua->thuc_hien_sua();
			}
		}
	}
	else
	{
		$class___hienthi_hieuung_trangchu__xoa->xoa();
	}
?>