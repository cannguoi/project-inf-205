<?php
	chong_pha_hoai();
	//$as=substr("sdadasdsasadadaskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk",0,20);
	//echo $as."<hr>";
	$sd=20;
	if($_GET['trang']=="")
	{
		$vtbd=0;
	}
	else
	{
		$vtbd=($_GET['trang']-1)*$sd;
	}
	$a_tv="select count(*) from nhac";
	$a_tv_1=mysql_query($a_tv);
	$a_tv_2=mysql_fetch_row($a_tv_1);
	$st=ceil($a_tv_2[0]/$sd);
?>
<center>
	<table width="968px" id="a" style="margin-top:6px;margin-bottom:6px;color:#666666;font-size:14px">
		<tr>
			<td width="658px" align="left">Tên bài hát</td>
			<td width="200px" style="overflow:hidden" align="left">Tên file bài hát</td>
			<td width="100px" align="center" >Sữa</td>
			<td width="100px" align="center" >Xóa</td>
		</tr>
		<?php
			$tv="select * from nhac order by id desc limit $vtbd,$sd";
			$tv_1=mysql_query($tv);
			while($tv_2=mysql_fetch_array($tv_1))
			{
				$file=substr($tv_2['file'],0,25);
				$link_sua="?thamso=sua_nhac&id=$tv_2[id]&trang=$_GET[trang]";
				$link_xoa="?thamso=xoa_nhac&id=$tv_2[id]";
				?>
					<tr>
						<td  align="left">
							<a href="<?php echo $link_sua; ?>" style="color:#666666;text-decoration: none;">
								<?php echo $tv_2['tieu_de']; ?>
							</a>
						</td>
						<td  style="overflow:hidden" align="left"><?php echo $file; ?></td>
						<td  align="center">
							<a href="<?php echo $link_sua; ?>" class="sua_xoa">Sữa</a>
						</td>
						<td  align="center">
							<a href="<?php echo $link_xoa; ?>" class="sua_xoa">Xóa</a>
						</td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td colspan="4">
				<?php
					xuat_link_dkl($st);
				?>
			</td>
		</tr>

	</table>
</center>
<script type="text/javascript">
	table_css_2("a");
</script>