<?php
	chong_pha_hoai();
	//echo "dasd";
	if(isset($_POST['thaydoi_footer']))
	{
		$row_footer['html']			=	$_POST['noidung'];
		//$row_footer['html'] = str_replace("'",'',$row_footer['html']);
		//$row_footer['html_en']		=	$_POST['noidung_en'];
		//$row_footer['html']			=	$class__thay_the->fckeditor($row_footer['html'],"submit");
		//$row_footer['html_en']		=	$class__thay_the->fckeditor($row_footer['html_en'],"submit");
		$str						=	$row_footer['html'];
		$str_en						=	$row_footer['html_en'];
		$sql = "update banner set link='$str',html_en='$str_en' where id='1'";
		//thongbao("$sql");
		//echo $sql;
		mysql_query($sql);
		trangtruoc();
	}
	$sql = "select * from banner where id = '1'";
	$query = mysql_query($sql);
	$row_footer = mysql_fetch_array($query);
	//echo $row_footer['html'];
	//$row_footer['html'] = str_replace('"','\"',$row_footer['html']);
	//$row_footer['html'] = str_replace("'",'',$row_footer['html']);
	//$row_footer['html'] = str_replace("\t","",$row_footer['html']);
	//$row_footer['html'] = str_replace("\n","",$row_footer['html']);
	//$row_footer['html'] = str_replace("\r","",$row_footer['html']);



?>
<form action="" method="post" style="margin:0">
	<table width="970px" style="margin:6px 0px" id="er">
		<tr>
			<td>Thay đổi banner</td>
		</tr>
		<tr>
			<td >
				<?php //xuat_select();?>
	
					<div id="div_vn_afc">
						Link : <input size="70" value="<?php echo $row_footer['link']; ?>" style="padding:3px;margin:6px" name="noidung"> 
						<span style="margin-left:6px;font-size:14px">Kích cỡ nên chọn : 140x40</span>
					</div>

		
			</td>
		</tr>
		<tr>
			<td ><input type="submit" name="thaydoi_footer" value="Thay Đổi" style="margin:3px;padding:3px;margin-left:44px;"/></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	table_css_2("er");
</script>