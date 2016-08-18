<?php
	chong_pha_hoai();
?>
<?php
	$tv="select * from nhac where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$link_dong="?thamso=quan_ly_nhac&id=$_GET[id]&trang=$_GET[trang]";
	$link_nhac="../nhac/$tv_2[file]";
?>
<form action="" method="post" enctype="multipart/form-data">
	<table id="a" width="970px" style="margin-top:6px;margin-bottom:6px">
		<tr>
			<td>
				<span style="float:left">Sữa nhạc</span>
				<a href="<?php echo $link_dong; ?>" style="float:right;margin-right:5px;text-decoration: none;color:#0b55c4">Đóng</a>
			</td>
		</tr>
		<tr>
			<td>
				<table id="b" width="600px" style="margin:6px 6px 6px 6px">
					<tr>
						<td width="120px">
							<b>Tên bài hát :</b>
						</td>
						<td>
							<input style="width:400px" name="ten_bai_hat" value="<?php echo $tv_2['tieu_de']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<b>File nhạc :</b>
						</td>
						<td>
							<input type="hidden" name="ten_nhac_hd" value="<?php echo $tv_2['file']; ?>">
							<input type="file" name="upload"><br>
							<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="328" height="200">
								<param name="movie" value="../nhac_swf/mediaplayer-5.3-viral/player.swf" />
								<param name="allowfullscreen" value="true" />
								<param name="allowscriptaccess" value="always" />
								<param name="flashvars" value="file=<?php echo $link_nhac; ?>&image=" />
								<embed
									type="application/x-shockwave-flash"
									id="player2"
									name="player2"
									src="../nhac_swf/mediaplayer-5.3-viral/player.swf"
									width="328"
									height="200"
									allowscriptaccess="always"
									allowfullscreen="true"
									flashvars="file=<?php echo $link_nhac; ?>&image="
								/>
							</object>
						</td>
					</tr>
					<tr>
						<td>
							<b>&nbsp;</b>
						</td>
						<td>
							<input type="hidden" name="sua_nhac" value="sua_nhac">
							<input type="submit" value="Sữa" class="nut_abc">

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	table_css_1("a");
	table_css("b");
</script>