<?php
	chongphahoai();
?>
<?php
	function upload()
	{
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		$duongdan_upload="../hinhanh_flash/quangcao/$ten_file_anh";
		//thongbao("$duongdan_upload");
		move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$duongdan_upload);
	}
?>
<?php
	if(isset($_POST['sua__quangcao_1']))
	{
		$ten_file_anh=$_FILES['uploadedfile']['name'];
		if($ten_file_anh=="")
		{
			$ten_file_anh=$_POST['ten_file'];
			$xacdinh_up="co";
		}
		else
		{
			$d="select count(*) from quangcao_1 where ten_file in ('$ten_file_anh')";
			$d1=mysql_query($d);
			$d2=mysql_fetch_row($d1);
			if($d2[0]==0)
			{
				$xacdinh_up="co";
			}
			else
			{
				$xacdinh_up="khong";
			}
		}
		if($xacdinh_up=="co")
		{
			$up=
			"
				UPDATE `quangcao_1` SET 
				`ten_file` = '$ten_file_anh',
				`link` = '$_POST[link]',
				`rong` = '$_POST[rong]',
				`cao` = '$_POST[cao]'
				
				 WHERE `id` ='$_GET[id]';
			
			";
			mysql_query($up);
			upload();
		}
		else
		{
			thongbao("Trùng tên ảnh !");
		}
		trangtruoc();
	}
?>
<?php
	$sql="select * from quangcao_1 where id in ('$_GET[id]')";
	$q_sql=mysql_query($sql);
	$r_sql=mysql_fetch_array($q_sql);
	
	$link_1=$r_sql['link'];
	$rong=$r_sql['rong'];
	$cao=$r_sql['cao'];
?>
<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td width="150px" valign="top">Hình ảnh hoặc flash</td>
			<td>
				<input type="file" name="uploadedfile"><br>
				<input type="hidden" name="ten_file" value="<?php echo $r_sql['ten_file'] ?>">
				<?php
					$ten_file=$r_sql['ten_file'];
					$mang=explode(".",$ten_file);
					$v=count($mang)-1;
					$link="../hinhanh_flash/quangcao/$ten_file";
					//echo "$link \$link <hr>";
					switch($mang[$v])
					{
						case "swf":
							 echo "<embed menu=\"true\" loop=\"true\" play=\"true\" src=\"$link\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" 
							 width=\"$rong\" height=\"$cao\">";					
						break;
						default:
							echo "<img src=\"$link\" width=\"$rong\" height=\"$cao\" border=\"0\">";
					}
				?>				
			</td>
		</tr>
		<tr>
			<td>Liên kết quãng cáo</td>
			<td>
				<?php
					//echo $r_sql['link'];
					echo "<input style=\"width:200px\" value=\"$r_sql[link]\" name=\"link\">";
				?>			
			</td>
		</tr>
		<tr>
			<td>Rộng</td>
			<td>
				<?php
					//echo $r_sql['rong'];
					echo "<input style=\"width:200px\" value=\"$r_sql[rong]\" name=\"rong\">";
				?>
			</td>
		</tr>
		<tr>
			<td>Cao</td>
			<td>
				<?php
					//echo $r_sql['cao'];
					echo "<input style=\"width:200px\" value=\"$r_sql[cao]\" name=\"cao\">";
				?>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<input type="submit" value="Sữa" name="sua__quangcao_1" class="nut_chapnhan">
			</td>
		</tr>
	</table>
</form>
