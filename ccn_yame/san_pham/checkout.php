<?php 
	chong_pha_hoai();
?>
<?php 
	//$_SESSION['txtNotes']=$_POST['txtNotes'];
	//$_POST['txtNotes']=str_replace("/n","<br>",$_POST['txtNotes']);
	//if(trim($_POST['txtNotes'])!=''){$_SESSION['txtNotes']=trim($_POST['txtNotes']);}
?>

<div class="container">
    <div id="main-content-wrapper">
        <div class="breadcrumb">
            <a href="/">YaMe</a>
            <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>           
            <a href="/ThanhToan/CheckOut">Giỏ hàng/Thanh toán</a>
            <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>            
        </div>

        <div id="title">            
	        <h1>Xác nhận giỏ hàng và thông tin người nhận hàng</h1>
        </div>
        
        <div >
  <form action="<?php echo $base_url;?>?thamso=xacnhan_chuyen" class="regisform" method="post" id="form_ac">            <div class="title-info-customer">
                Thông tin người mua
            </div>
             <div class="info-customer">
                 <table cellpadding="0" cellspacing="0" class="form">
                    <tr>
                        <td class="label">Họ và Tên</td>
                        <td><input name="ho_ten" type="text" class="textbox" id="ho_ten" value="<?php echo $_SESSION['xacnhan']['ho_ten']; ?>" data-val="true" data-val-required="Vui l&#242;ng điền th&#244;ng tin người nhận" />
                            <span class="field-validation-valid" data-valmsg-for="CustomerName" data-valmsg-replace="true"></span>
                        </td>
                    </tr>
                    <tr>
                       <td class="label">Tỉnh/Thành phố</td>
                       <td><input class="textbox" data-val="true" data-val-required="Vui l&amp;#242;ng điền địa chỉ giao nhận" id="tinh" name="tinh" type="text" value="<?php echo $_SESSION['xacnhan']['tinh']; ?>" /></td>
                    </tr>
                    <tr>
                       <td class="label">Quận/Huyện</td>
                       <td>
                       <input class="textbox" data-val="true" data-val-required="Vui l&amp;#242;ng điền địa chỉ giao nhận" id="district" name="quan" type="text" value="<?php echo $_SESSION['xacnhan']['quan']; ?>" /></td>
                    </tr>
                    <tr>
                        <td class="label">Địa chỉ</td>
                        <td>
                            <input class="textbox" data-val="true" data-val-required="Vui l&amp;#242;ng điền địa chỉ giao nhận" id="dia_chi" name="dia_chi" type="text" value="<?php echo $_SESSION['xacnhan']['dia_chi']; ?>" />
                            <span class="field-validation-valid" data-valmsg-for="ShippingAddress" data-valmsg-replace="true"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Số điện thoại liên hệ</td>
                        <td>
                            <input class="textbox" data-val="true" data-val-required="Vui l&amp;#242;ng để lại số điện thoại, ph&amp;#242;ng khi ch&amp;#250;ng t&amp;#244;i kh&amp;#244;ng t&amp;#236;m được bạn." id="dien_thoai" name="dien_thoai" type="text" value="<?php echo $_SESSION['xacnhan']['dien_thoai']; ?>" />
                            <span class="field-validation-valid" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
                        </td>
                    </tr>
                      <tr>
                        <td class="label">Email</td>
                        <td>
                            <input class="textbox" data-val="true" data-val-required="Vui l&amp;#242;ng điền Email" id="email" name="email" type="text" value="<?php echo $_SESSION['xacnhan']['email']; ?>" />
                            <span class="field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="choice" type="radio" checked="checked" name="nguoinhanhang" value="1" />Người nhận là quý khách
                        <input class="choice" type="radio" name="nguoinhanhang" value="2" />Địa chỉ khác</td>
                    </tr>
                </table>
             </div>
             <div id="thongtinnguoinhan">
            <div class="title-info-received">
                Thông tin người nhận
            </div>
            <div class="info-received">
                <table cellpadding="0" cellspacing="0" class="form">
                    <tr>
                        <td class="label">Tên người nhận</td>
                        <td>
                            <input name="ho_ten_2" type="text" value="<?php echo $_SESSION['xacnhan']['ho_ten_2']; ?>" id="ho_ten_2" />
                        </td>
                    </tr>
                    <tr>
                       <td class="label">Tỉnh/Thành phố</td>
                       <td><input type="text" name="tinh_2" id="tinh_2" value="<?php echo $_SESSION['xacnhan']['tinh_2']; ?>" /></td>
                    </tr>
                    <tr>
                       <td class="label">Quận/Huyện</td>
                       <td><input type="text" name="quan_2" value="<?php echo $_SESSION['xacnhan']['quan_2']; ?>" id="districtreceived" /></td>
                    </tr>
                    <tr>
                        <td class="label">Địa chỉ giao nhận</td>
                        <td>
                            <input type="text" name="dia_chi_2" value="<?php echo $_SESSION['xacnhan']['dia_chi_2']; ?>" id="dia_chi_2" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Số điện thoại liên hệ</td>
                        <td>
                           <input name="dien_thoai_2" type="text" id="dien_thoai_2" value="<?php echo $_SESSION['xacnhan']['dien_thoai_2']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Email</td>
                        <td>
                           <input name="email_2" type="text" id="email_2" value="<?php echo $_SESSION['xacnhan']['email_2']; ?>" />
                        </td>
                    </tr>
                </table>
            </div>
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
                            <td nowrap="nowrap"><b><?php echo $ten_sp;?></b></td>
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
                        <td><b><span><?php echo $tonglon_1;?></span></b> (VND)</td>
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
                                <td><input type="button" name="cmd" value="TIẾP TỤC" class="button narrow-aleft" /></td>
                            </tr>
                        </table>                                                                                                  
                    </td>
                </tr>
            </table>
</form></div>
    </div>   
</div>

<script>
    function checkvalidate() {
        if ($("select[name='city']").val() == "") {
            $("select[name='city']").css("border", "1px solid red");
            return false
        } else {
            $("select[name='city']").css("border", "1px solid #cdcdcd");
        }
        if ($("#district").val() == "") {
            $("#district").css("border", "1px solid red");
            return false
        } else {
            $("#district").css("border", "1px solid #cdcdcd");
        }
        if ($("input[name='nguoinhanhang']:checked").val() == 2) {
            if ($("input[name='received']").val() == "") {
                $("input[name='received']").css("border", "1px solid red");
                return false
            } else {
                $("input[name='received']").css("border", "1px solid #cdcdcd");
            }
            if ($("select[name='cityreceived']").val() == "") {
                $("select[name='cityreceived']").css("border", "1px solid red");
                return false
            } else {
                $("select[name='cityreceived']").css("border", "1px solid #cdcdcd");
            }
            if ($("#districtreceived").val() == "") {
                $("#districtreceived").css("border", "1px solid red");
                return false
            } else {
                $("#districtreceived").css("border", "1px solid #cdcdcd");
            }
            if ($("input[name='receivedaddress']").val() == "") {
                $("input[name='receivedaddress']").css("border", "1px solid red");
                return false
            } else {
                $("input[name='receivedaddress']").css("border", "1px solid #cdcdcd");
            }
            if ($("input[name='receivedphone']").val() == "") {
                $("input[name='receivedphone']").css("border", "1px solid red");
                return false
            } else {
                $("input[name='receivedphone']").css("border", "1px solid #cdcdcd");
            }
            if ($("input[name='EmailReceived']").val() == "") {
                $("input[name='EmailReceived']").css("border", "1px solid red");
                return false
            } else {
                $("input[name='EmailReceived']").css("border", "1px solid #cdcdcd");
            }

        }
        return true;
    }
    $(document).ready(function () {
        $("#thongtinnguoinhan").hide();
        $(".choice").click(function () {
            if ($("input[name='nguoinhanhang']:checked").val() == 2) {
                $("#thongtinnguoinhan").show("slow");
            } else {
                if ($("input[name='nguoinhanhang']:checked").val() == 1) {
                    $("#thongtinnguoinhan").hide("slow");
                }
            }
        });
        $("input[name='cmd']").click(function () {
			/* ------------ */
            /*if (checkvalidate()) {
                $(".regisform").submit();
            }*/
			//alert("click");
			var nguoinhanhang=$("input[name='nguoinhanhang']:checked").val();
			//alert(nguoinhanhang);
			var form_ac=document.getElementById("form_ac");
			var loi="khong";
			var loi_2="khong";
			if(nguoinhanhang==1)
			{
				for(i=0;i<=5;i++)
				{
					var input_v=form_ac.getElementsByTagName("input")[i];
					//alert($.trim(input_v.value));
					//alert(input_v.value);
					if($.trim(input_v.value)==""){loi="co";}
				}
				if(loi=="co"){alert("Hãy điền đầy đủ thông tin người mua vào , có 1 hoặc vài trường chưa được điền thông tin");}//return false;}
				
				
				else {form_ac.submit();}
			}
			else 
			{
				for(i=0;i<=5;i++)
				{
					var input_v=form_ac.getElementsByTagName("input")[i];
					//alert($.trim(input_v.value));
					//alert(input_v.value);
					if($.trim(input_v.value)==""){loi="co";}
				}
				if(loi=="co"){alert("Hãy điền đầy đủ thông tin người mua vào , có 1 hoặc vài trường chưa được điền thông tin");return;}//return false;}
				
				
				for(i=8;i<=13;i++)
				{
					var input_v2=form_ac.getElementsByTagName("input")[i];
					//alert(input_v2.value);
					//alert($.trim(input_v.value));
					//alert(input_v.value);
					if($.trim(input_v2.value)==""){loi_2="co";}
				}
				if(loi_2=="co"){alert("Hãy điền đầy đủ thông tin người nhận vào , có 1 hoặc vài trường chưa được điền thông tin");}//return false;}
				else {form_ac.submit();}
			}
        });
        $("#city").change(function () {
            $.ajax({
                type: "Get",
                url: "/AjaxData/GetDistrictByCityId/" + $("#city").val(),
                success: function (data) {
                    $('#district').html(data);
                }

            });
        });
        $("#cityreceived").change(function () {
            $.ajax({
                type: "Get",
                url: "/AjaxData/GetDistrictByCityId/" + $("#cityreceived").val(),
                success: function (data) {
                    $('#districtreceived').html(data);
                }

            });
        });
    })
</script>