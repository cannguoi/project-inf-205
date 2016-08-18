<?php
	chong_pha_hoai();
	//echo "chao <hr>";
	$tv="select * from hoadon where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$tv_2['khach_mua']=$tv_2['khach_mua']."______";
	$mang_don_hang=explode("______",$tv_2['khach_mua']);
	//print_r($mang_don_hang);echo "<hr>";
?>
<style type="text/css">
	a.sua_xoa:link { font-size: 16px; text-decoration: none;  color: #FF00FF; font-weight: bold}
	a.sua_xoa:visited { font-size: 16px; color: #FF00FF; text-decoration: none; font-weight: bold}
	a.sua_xoa:hover { font-size: 16px; text-decoration: underline; color: #FF8C00; font-weight: bold; font-style: normal; }

</style>
<center>
	<div class="tbg">
		<table width="968px" style="text-align:left;margin-top:6px" id="er" class="tbg">
			<tr>
				<td>
					Chi tiết hóa đơn
					<a href="?thamso=quanly_hoadon&trang=<?php echo $_GET['trang']; ?>" style="margin-left:815px;color:#0b55c4;outline:0;text-decoration:none" hidefocus="true">Đóng</a>
				</td>
			</tr>
			<tr>
				<td>
					<div class="bao_abc">

					<table  class="tbg" id="tb__1" style="margin:6px 6px 6px 6px">
						<tr>
							<td width="50px" align="center">Stt</td>
							<td width="300px">Tên</td>
							<td width="150px">Giá bán (VNĐ)</td>
							<td width="100px">Số lượng</td>
							<td width="100px">Size</td>
							<td width="200px">Tổng cộng (VNĐ)</td>
						</tr>
						<?php
							$k=1;
							$tc_1=0;
							for($i=0;$i<count($mang_don_hang)-1;$i++)
							{
								$mang_hoa_don_1=explode("___",$mang_don_hang[$i]);
								$id=$mang_hoa_don_1[0];
								$sl=$mang_hoa_don_1[1];
								$size=$mang_hoa_don_1[2];
								$a_tv="select * from dulieu where id='$id'";
								$a_tv_1=mysql_query($a_tv);
								$a_tv_2=mysql_fetch_array($a_tv_1);
								$gia=number_format($a_tv_2['gia'],0,".",".");
								$tc=$a_tv_2['gia']*$sl;
								$tc_dd=number_format($tc,0,".",".");
								$tc_1=$tc_1+$tc;
								if($sl!=0 and $a_tv_2['tieu_de']!="")
								{
									?>
										<tr>
											<td align="center"><?php echo $k;?></td>
											<td><?php echo $a_tv_2['tieu_de'];?></td>
											<td><?php echo $gia; ?></td>
											<td><?php echo $sl; ?></td>
											<td><?php echo $size; ?></td>
											<td><?php echo $tc_dd; ?></td>
										</tr>
									<?php
									$k++;
								}
								
							}
							$tc_1_dd=number_format($tc_1,0,".",".");
						?>
						<tr>
							<td colspan="5">&nbsp;</td>
							<td><?php echo $tc_1_dd; ?></td>
						</tr>
					</table>
					<table width="600px" id="tc__1" style="margin:0px 6px 6px 6px">
						<tr>
							<td colspan="2"><b style="padding:3px;display:block">Thông tin người mua :</b></td>
				
						</tr>
						<tr>
							<td width="120px">Họ tên :</td>
							<td><?php echo $tv_2['ho_ten']; ?></td>
						</tr>
						<tr>
							<td>Email :</td>
							<td><?php echo $tv_2['email']; ?></td>
						</tr>
						<tr>
							<td>Điện thoại : </td>
							<td><?php echo $tv_2['dien_thoai']; ?></td>
						</tr>
						<tr>
							<td>Tỉnh :</td>
							<td><?php echo $tv_2['tinh']; ?></td>
						</tr>
						<tr>
							<td>Quận :</td>
							<td><?php echo $tv_2['quan']; ?></td>
						</tr>
						<tr>
							<td>Địa chỉ :</td>
							<td><?php echo $tv_2['dia_chi']; ?></td>
						</tr>
						


					</table>
					
					<table width="600px" id="tc__2" style="margin:0px 6px 6px 6px">
						<tr>
							<td colspan="2"><b style="padding:3px;display:block">Thông tin người nhận :</b></td>
				
						</tr>
						<tr>
							<td width="120px">Họ tên :</td>
							<td><?php echo $tv_2['ho_ten_2']; ?></td>
						</tr>
						<tr>
							<td>Email :</td>
							<td><?php echo $tv_2['email_2']; ?></td>
						</tr>
						<tr>
							<td>Điện thoại : </td>
							<td><?php echo $tv_2['dien_thoai_2']; ?></td>
						</tr>
						<tr>
							<td>Tỉnh :</td>
							<td><?php echo $tv_2['tinh_2']; ?></td>
						</tr>
						<tr>
							<td>Quận :</td>
							<td><?php echo $tv_2['quan_2']; ?></td>
						</tr>
						<tr>
							<td>Địa chỉ :</td>
							<td><?php echo $tv_2['dia_chi_2']; ?></td>
						</tr>
						


					</table>
					<table width="600px" id="tc__3" style="margin:12px 12px 12px 6px">
						
						
						<tr>
							<td valign="top" width="120px">Ghi chú :</td>
							<td>
								<?php echo $tv_2['noi_dung']; ?>
							</td>
						</tr>

					</table>
					<a href="?thamso=xoa_hoa_don_1&trang=<?php echo $_GET['trang']; ?>&id=<?php echo $tv_2['id']; ?>" class="sua_xoa" style="margin-left:132px">Xóa</a>
					<div style="height:6px;width:5px;overflow:hidden"></div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</center>
<script type="text/javascript">
	table_css_1("er");
</script>
<script type="text/javascript">
	table_css_2("tb__1");
	table_css("tc__1");
	table_css("tc__2");
	table_css("tc__3");
</script>