<?php 	chong_pha_hoai();?><?phpif(isset($_POST['form_3']))	{		$row_footer['html']			=	$_POST['noidung'];		//$row_footer['html'] = str_replace("'",'',$row_footer['html']);		up_thong_so(4,$row_footer['html']);				trangtruoc();	}	$row_footer['html']=thong_so(4);?><form action="" method="post" style="margin:0">	<table width="970px" style="margin:6px 0px" id="er_9">		<tr>			<td>Điện thoại liên hệ ở trang chi tiết</td>		</tr>		<tr>			<td >				<?php //xuat_select();?>								<div id="div_vn_afc">						Điện thoại : <input value="<?php echo $row_footer['html']; ?>" style="padding:3px;margin:6px" name="noidung"> 											</div>					</div>							</td>		</tr>		<tr>			<td ><input type="submit" name="form_3" value="Thay Đổi" style="margin:3px;padding:3px;margin-left:78px;"/></td>		</tr>	</table></form><script type="text/javascript">	table_css_2("er_9");</script>