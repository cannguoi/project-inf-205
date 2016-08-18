<?php 
	chong_pha_hoai();
?>
<?php
if(isset($_POST['form_4']))
	{
		$row_footer['html']			=	$_POST['noidung_1']."___".$_POST['noidung_2']."___".$_POST['noidung_3'];
		//$row_footer['html'] = str_replace("'",'',$row_footer['html']);
		up_thong_so(7,$row_footer['html']);
		
		trangtruoc();
	}

	$row_footer['html']=thong_so(7);
	$m=explode("___",$row_footer['html']);




?>
<form action="" method="post" style="margin:0">
	<table width="970px" style="margin:6px 0px" id="er_10">
		<tr>
			<td>Tên web</td>
		</tr>
		<tr>
			<td >
				<?php //xuat_select();?>
			
					<div id="div_vn_afc">
						<table id="er_p" style="margin:6px">
							<tr>
								<td width="120px">
									Title web :
								</td>
								<td>
									<input size="70" value="<?php echo $m[0]; ?>" style="padding:3px;margin:6px" name="noidung_1"><br>
								</td>
							</tr>
							<tr>
								<td>
									Keywords : 
								</td>
								<td>
									<input size="70" value="<?php echo $m[1]; ?>" style="padding:3px;margin:6px" name="noidung_2">
								</td>
							</tr>
							<tr>
								<td>
									Description web : 
								</td>
								<td>
									<input size="70" value="<?php echo $m[2]; ?>" style="padding:3px;margin:6px" name="noidung_3">
								</td>
							</tr>
							<tr>
								<td>
									&nbsp; 
								</td>
								<td>
									<input type="submit" name="form_4" value="Thay Đổi" style="margin:6px;padding:3px;"/>
								</td>
							</tr>
						</table>
						 
						
						 
						
					</div>
					</div>

				
			</td>
		</tr>

	</table>
</form>
<script type="text/javascript">
	table_css_1("er_10");
	table_css("er_p");
</script>
