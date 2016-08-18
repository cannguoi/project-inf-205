<?php
	chong_pha_hoai();
?>
<style>
	input.oo89
	{
		padding:3px;
		margin:3px;
		width:500px
	}
</style>
<?php
	$tv="select * from slide where vi_tri='4' order by id limit 0,10";
	$tv_1=mysql_query($tv);
	//$tv_2=mysql_fetch_array($tv_1);
	$so=mysql_num_rows($tv_1);
?>
<form style="margin:0" method="post">
	<table style="margin:6px 0px" id="er_5" width="970px" id="jk899">
		<tr>
			<td>Sữa slide</td>
		</tr>
		<tr>
			<td>
				<?php 
					$i=1;
					$z=6;
					//while($tv_2=mysql_fetch_array($tv_1))
					for($r=1;$r<=10;$r++)
					{
					$tv_2=mysql_fetch_array($tv_1);
					//print_r($tv_2);
				?>
						<table id="er_<?php echo $z; ?>" style="margin:6px">
							<tr>
								<td width="110px">Link hình <?php echo $i; ?> :</td>
								<td width="600px"><input name="link_hinh_<?php echo $r; ?>" value="<?php echo $tv_2['link_hinh']; ?>" class="oo89"></td>

							</tr>
							<tr>
								<td>Link liên kết <?php echo $i; ?> :</td>
								<td ><input name="link_lien_ket_<?php echo $r; ?>" value="<?php echo $tv_2['link']; ?>" class="oo89" ></td>
								<input type="hidden" name="id_abc_<?php echo $r; ?>" value="<?php echo $tv_2['id']; ?>">
							</tr>

						</table>
				<?php 
					$i++;
					$z++;
					}
				?>
				<input type="hidden" name="sua_icon_trang_chu" value="sua_icon_trang_chu">
							<input type="submit" class="nut_chapnhan" value="Sữa" style="margin-left:124px"><br>
							<div style="width:5px;height:6px;overflow:hidden"></div>
							<span style="font-size:14px;margin-left:124px">Kích cỡ hình nên chọn là 110x110</span>
							<div style="width:5px;height:6px;overflow:hidden"></div>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	table_css_1("er_5");
	//table_css("er_6");
	var so=<?php echo $so; ?>;
	var so_1=6+so;
	for(i=6;i<=16;i++)
	{
		table_css("er_"+i);
	}
</script>