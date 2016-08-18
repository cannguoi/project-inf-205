<?php
	chongphahoai();
?>
<?php
	if(isset($_GET['xoa']))
	{
		$tep_xoa="select * from quangcao_1 where id in ('$_GET[id]')";
		$tep_xoa_1=mysql_query($tep_xoa);
		$tep_xoa_2=mysql_fetch_array($tep_xoa_1);
		$ten_tep=$tep_xoa_2['ten_file'];
		$dd_tep="../hinhanh_flash/quangcao/$ten_tep";
		unlink($dd_tep);

		$xoa="DELETE FROM `quangcao_1` WHERE `id` = '$_GET[id]'";
		mysql_query($xoa);
		trangtruoc();
	}
?>
<center>
	<h1 style="color:red">Sữa xóa quãng cáo</h1>
</center>
<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td width="250px">Hình ảnh hoặc flash</td>
			<td width="250px">Liên kết quãng cáo</td>
			<td width="100px">Rộng </td>
			<td width="100px">Cao</td>
			<td width="100px">Sữa</td>
			<td width="100px">Xóa</td>
		</tr>
		<?php
			$sql_qc="select * from quangcao_1 order by id desc";
			$q_sql_qc=mysql_query($sql_qc);
			while($r_sql_qc=mysql_fetch_array($q_sql_qc))
			{
				$link_1=$r_sql_qc['link'];
				$rong=$r_sql_qc['rong'];
				$cao=$r_sql_qc['cao'];
				$link_sua="?thamso=sua__quangcao_1&id=$r_sql_qc[id]";
				$link_xoa="?thamso=quangcao_1&xoa=xoa&id=$r_sql_qc[id]"
				?>
					<tr>
						<td align="center">
							<?php
								$ten_file=$r_sql_qc['ten_file'];
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
						<td>
							<?php
								echo "<a href=\"$r_sql_qc[link]\" target=\"_blank\" >";
									echo $r_sql_qc['link'];
								echo "</a>";
							?>	
						</td>
						<td>
							<?php
								echo $r_sql_qc['rong'];
							?>
						</td>
						<td>
							<?php
								echo $r_sql_qc['cao'];
							?>
						</td>
						<td>
							<a href="<?php echo $link_sua ?>" class="sua_xoa">
								Sữa
							</a>
						</td>
						<td>
							<a href="<?php echo $link_xoa ?>" class="sua_xoa">
								Xóa
							</a>
						</td>
					</tr>
				<?php
			}
		?>

	</table>
</form>