<?php 
	chong_pha_hoai();
?>
<?php 
	//print_r($_POST);
	/*if(trim($_POST['ho_ten'])!=''){$_SESSION['xacnhan']['ho_ten']=trim($_POST['ho_ten']);}
	if(trim($_POST['tinh'])!=''){$_SESSION['xacnhan']['tinh']=trim($_POST['tinh']);}
	if(trim($_POST['quan'])!=''){$_SESSION['xacnhan']['quan']=trim($_POST['quan']);}
	if(trim($_POST['dia_chi'])!=''){$_SESSION['xacnhan']['dia_chi']=trim($_POST['dia_chi']);}
	if(trim($_POST['dien_thoai'])!=''){$_SESSION['xacnhan']['dien_thoai']=trim($_POST['dien_thoai']);}
	if(trim($_POST['email'])!=''){$_SESSION['xacnhan']['email']=trim($_POST['email']);}
	
	if(trim($_POST['ho_ten_2'])!=''){$_SESSION['xacnhan']['ho_ten_2']=trim($_POST['ho_ten_2']);}
	if(trim($_POST['tinh_2'])!=''){$_SESSION['xacnhan']['tinh_2']=trim($_POST['tinh_2']);}
	if(trim($_POST['quan_2'])!=''){$_SESSION['xacnhan']['quan_2']=trim($_POST['quan_2']);}
	if(trim($_POST['dia_chi_2'])!=''){$_SESSION['xacnhan']['dia_chi_2']=trim($_POST['dia_chi_2']);}
	if(trim($_POST['dien_thoai_2'])!=''){$_SESSION['xacnhan']['dien_thoai_2']=trim($_POST['dien_thoai_2']);}
	if(trim($_POST['email_2'])!=''){$_SESSION['xacnhan']['email_2']=trim($_POST['email_2']);}*/
	
	
?>

    <script src="<?php echo $base_url; ?>giaodien/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url; ?>giaodien/jquery.validate.unobtrusive.min.js" type="text/javascript"></script>

<div class="container">
    <div id="main-content-wrapper">
        <div class="breadcrumb">
            <a href="/">YaMe</a>
            <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>           
            <a href="/ThanhToan/XacNhan">Giỏ hàng/Thanh toán</a>
            <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>            
        </div>
        
        <div id="title">            
	        <h1>Xác nhận thông tin khách hàng và người nhận hàng</h1>
        </div>
        <?php 
			//print_r($_POST);
		?>
<form action="<?php echo $base_url; ?>?thamso=xong" method="post">        <div>
        <div class="customer-info">
          <div class="customer-title">Thông tin Quý khách</div>
            <table>
                <tr>
                    <td class="label">Họ và Tên :</td>
                    <td><?php echo $_SESSION['xacnhan']['ho_ten']; ?>&nbsp;</td>
                </tr>
                 <tr>
                    <td class="label">Tỉnh/Thành phố :</td>
                    <td><?php echo $_SESSION['xacnhan']['tinh']; ?></td>
                </tr>
                 <tr>
                    <td class="label">Quận/Huyện :</td>
                    <td><?php echo $_SESSION['xacnhan']['quan']; ?></td>
                </tr>
                 <tr>
                    <td class="label">Địa chỉ :</td>
                    <td><?php echo $_SESSION['xacnhan']['dia_chi']; ?></td>
                </tr>
                 <tr>
                    <td class="label">Số điện thoại :</td>
                    <td><?php echo $_SESSION['xacnhan']['dien_thoai']; ?></td>
                </tr>
                <tr>
                    <td class="label">Email :</td>
                    <td><?php echo $_SESSION['xacnhan']['email']; ?></td>
                </tr>
            </table>
          </div>
            
        <div class="customer-info2">
          <div class="customer-title">
                Thông tin người nhận
            </div>
            <table cellpadding="0" cellspacing="0" class="form">
                <tr>
                    <td class="label">Họ và tên :</td>
                    <td><?php echo $_SESSION['xacnhan']['ho_ten_2']; ?></td>
                </tr>
                 <tr>
                    <td class="label">Tỉnh/Thành Phố :</td>
                    <td><?php echo $_SESSION['xacnhan']['tinh_2']; ?></td>
                </tr>
                 <tr>
                    <td class="label">Quận/Huyện :</td>
                    <td><?php echo $_SESSION['xacnhan']['quan_2']; ?></td>
                </tr>
                <tr>
                    <td class="label">Địa chỉ :</td>
                    <td><?php echo $_SESSION['xacnhan']['dia_chi_2']; ?></td>
                </tr>
                <tr>
                    <td class="label">Số điện thoại :</td>
                    <td><?php echo $_SESSION['xacnhan']['dien_thoai_2']; ?></td>
                </tr>
                 <tr>
                    <td class="label">Email :</td>
                    <td><?php echo $_SESSION['xacnhan']['email_2']; ?></td>
                </tr>
            </table>
          </div>
            <br />
            
            <table cellpadding="0" cellspacing="0" width="100%" id="yourcartdetails">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán (1 SP)</th>
                        <th class="acenter">Số lượng đặt mua</th>
                        <th style="width:410px;">Thành tiền</th>
                    </tr>
                </thead>
                <?php 
					$tonglon=0;
					for($i=0;$i<count($_SESSION['id_giohang']);$i++)
					{
						$sl=$_SESSION['soluong_giohang'][$i];
						//echo $i." \$i <br>";
						//echo $sl." \$sl <br>";
						$id=$_SESSION['id_giohang'][$i];
						if($sl!=0)
						{
							$truyvan="select * from dulieu where id in ('$id')";
							$truyvan_1=mysql_query($truyvan);
							$truyvan_2=mysql_fetch_array($truyvan_1);

							$gia=$truyvan_2['gia'];
							$gia_1=number_format($gia,0,",",",");
							$tong=$sl*$gia;
							$tong_1=number_format($tong,0,",",",");
							$ten_sp=$truyvan_2['tieu_de'];
							$link="?thamso=chitiet_sanpham&id_chitiet=$id";
							$link_hinh		=	$GLOBALS['base_url']."hinhanh_flash/sanpham/$truyvan_2[hinh_anh]";
							$tonglon=$tonglon+$tong;
				?>
                        <tr>
                            <td nowrap="nowrap"><?php echo $ten_sp;?></td>
                            <td><?php echo $gia_1; ?></td>
                            <td class="acenter">                        
                                <b><span class="qty" id="qty_13871">&nbsp;<?php echo $sl;?>&nbsp;</span></b>                        
                            </td>
                            <td>
                                    <b><span id="pTotal_13871"><?php echo $tong_1;?></span></b> (VND)
                            </td>
                        </tr>   
                <?php 
						}
					}
					$tonglon_1=number_format($tonglon,0,",",",");
				?> 
                <tfoot>

 

                    <tr>
                        <td colspan="3" class="aright"><b>Tính tổng</b></td>
                        <td><b><span><?php echo $tonglon_1; ?></span></b> (VND)</td>
                    </tr>                    
                </tfoot>          
            </table>
            <table cellpadding="0" cellspacing="0" width="100%" style="width:100%;">
                <tr>
                    <td align="right" style=" padding:10px 0;">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="bottom"><span><a href="<?php echo $base_url;?>?thamso=gio_hang">Trở lại trang giỏ hàng</a></span>   </td>
                                <td><span>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                                <td><input type="submit" name="cmd" value="Thanh toán" class="button narrow-aleft" /></td>
                            </tr>
                        </table>                                                                                                  
                    </td>
                </tr>
            </table>
                       
        </div>
</form>    </div>   
</div>

