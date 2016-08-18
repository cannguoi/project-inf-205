<?php 
	chong_pha_hoai();
?>
<?php 
	//test($xac_dinh_dang_nhap_thanh_vien);
	if($_GET['xoa']=='xoa')
	{
		for($i=0;$i<count($_SESSION['id_giohang']);$i++)
		{
			$id=$_SESSION['id_giohang'][$i];
			if($id==$_GET['id'])
			{
				$_SESSION['soluong_giohang'][$i]=0;
				break;
			}
		}	
		trangtruoc();
		exit();
	}
?>
<script type="text/javascript">

    function number_format( number, decimals, dec_point, thousands_sep ) {
    // http://kevin.vanzonneveld.net
    // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // + bugfix by: Michael White (http://crestidg.com)
    // + bugfix by: Benjamin Lupton
    // + bugfix by: Allan Jensen (http://www.winternet.no)
    // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
     
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
     
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }
//var tt=number_format(123456.789, 2, '.', ',');;alert(tt);
</script>
<div class="container">
    <div id="main-content-wrapper">
        <div class="breadcrumb">
            <a href="/">YaMe</a>
            <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>           
            <a href="/ThanhToan">Giỏ hàng/Thanh toán</a>
            <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>            
        </div>

        <div id="title">            
	        <h1>Giỏ hàng của bạn</h1>
        </div>
        <div>
            <?php 
				function gio_hang_trong()
				{
					//test(count($_SESSION['id_giohang']));
					$so=count($_SESSION['id_giohang']);
					if($so==0)
					{	
						//test("haha");
						return "co";
					}
					//test(count($_SESSION['id_giohang']));
					$tsl=0;				   
					for($i=0;$i<count($_SESSION['id_giohang']);$i++)
					{
						$sl=$_SESSION['soluong_giohang'][$i];
						$tsl=$tsl+$sl;
					}
					//test(count($_SESSION['id_giohang']));
										 //test($tsl);
					if($tsl==0){return "co";}
					return "khong";
				}
				$gio_hang_trong=gio_hang_trong();
			if($gio_hang_trong!="co"){
				?>
            <table cellpadding="0" cellspacing="0" width="100%" id="yourcartdetails">
                <thead>
                    <tr>
                        <th>Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán (1 SP)</th>
                        <th>Số lượng đặt mua</th>
                        <th colspan="2" style="width:330px;">Thành tiền</th>
                        
                    </tr>
                </thead>
				<?php
					//print_r($_SESSION['soluong_giohang']);
					//print_r($_SESSION['id_giohang']);
					$tonglon=0;
					for($i=0;$i<count($_SESSION['id_giohang']);$i++)
					{
						$j=$i+1;
						$sl=$_SESSION['soluong_giohang'][$i];
						//echo $i." \$i <br>";
						//echo $sl." \$sl <br>";
						$id=$_SESSION['id_giohang'][$i];
						$size=$_SESSION['size'][$i];
						if(trim($size)==""){$size="Không chọn";}
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
				
				
							$id_span="id_span__".$i;
							
				?>
							 <tr>
								<td><img src="<?php echo $link_hinh; ?>" alt="" width="60px" height="60px" /></td>
								<td><b style="color:#444;margin-left:10px;"><?php echo $ten_sp; ?> </b><br />

										<div style="color:#888;float:left;margin-left:10px;margin-top:5px;"> Size: <?php echo $size; ?></div>
								</td>
								<td style="color:#3A9504;">
                                <span ><?php echo $gia_1; ?></span>
                                <input type="hidden" name="" id="id_span_20__<?php echo $id; ?>" value="<?php echo $gia; ?>" />
                                </td>
								<td class="acenter">
									<a class="minus" title="Giảm 1" href="javascript:;" rel="<?php echo $id; ?>"><span><img src="hinhanh_flash/less.png" alt="Giảm" class="cong_tru"/></span></a>
									<b>&nbsp;<span class="qty" id="id_span__<?php echo $id; ?>"> <?php echo $sl; ?></span>&nbsp;</b>
									<a class="plus" title="Cộng thêm 1"  href="javascript:;" rel="<?php echo $id; ?>"><span><img src="hinhanh_flash/add.png" alt="Cộng" class="cong_tru"/></span></a>
								</td>
								
								
								<td>
										<b><span id="id_span_tong2__<?php echo $id; ?>" ><?php echo $tong_1; ?></span></b>
                                        <input type="hidden" id="id_span_tong__<?php echo $id; ?>" value="<?php echo $tong; ?>" />
								</td>
								<td align="center" style="width:100px;"  >
			<form action="/ThanhToan/RemoveFromCart/17381" id="form_17381" method="post" name="name_17381">                            <a class="remove" href="<?php echo $base_url; ?>?thamso=gio_hang&xoa=xoa&id=<?php echo $id; ?>" rel="form_17381"><span><img src="hinhanh_flash/delete.png" alt="Xóa" /></span></a>       
			</form>                    </td>
							</tr>                       
							
				<?php
							$tonglon=$tonglon+$tong;
							//$tonglon_1=number_format($tonglon,0,",",".");
						}

					}
					$tonglon_1=number_format($tonglon,0,",",",");
				?>
               
                    <tfoot>

                    <tr>
                      
                         <td style="border-right:none"></td>
                        <td colspan="4" align="right" style="border-right:1px solid #cdcdcd;text-align:right;"><b>Tổng cộng</b></td>
                        <td colspan="2">
                        	<b><span data-bind="text: lastTotal" id="tong_lon_1"></span></b>
                           <input type="hidden" name="" id="tong_lon" value="<?php echo $tonglon; ?>" />
                        </td>
                    </tr>
                </tfoot>   
            </table>
<form action="<?php echo $base_url; ?>?thamso=checkout_chuyen" method="post">            <table cellpadding="0" cellspacing="0" width="100%" style="width:100%;">
                <tr>
                    
                    <td colspan="6">
                        <div>
                            <p>Ghi chú về đơn hàng</p>
                            <textarea class="notearea" cols="20" id="txtNotes" name="txtNotes" rows="2"><?php $ttt=str_replace("<br>","\n",$_SESSION['txtNotes']);$ttt=str_replace("<br />","\n",$ttt);echo $ttt; ?> 
</textarea>
                        </div>                       
                    </td>                    
                </tr>
                <tr>
                    <td align="right" style=" padding:10px 0;">
                       		<?php 
								if($xac_dinh_dang_nhap_thanh_vien!="co")
								{
									//$a="alert('Chưa đăng ký thành viên , hãy đăng ký thành viên để mua hàng');return false;";	
								}
								else 
								{
									$a="";
								}
							?>
                            <input type="submit" value="Thực hiện thanh toán" class="button narrow-aleft" onclick="<?php echo $a; ?>"/>
                       
                    </td>
                </tr>
            </table>     
</form>        </div>
		 <?php }else {echo "<br>Chưa có sản phẩm nào trong giỏ hàng<br><br><br>";}?>
        <div><a  class="tieptucmuahang" href="<?php echo $GLOBALS['base_url'];?>">Tiếp tục mua hàng</a></div>
    </div>   
</div>

<script type="text/javascript">
    //MVC
    var viewModel = {
        total: ko.observable('255,000'),
        sales: ko.observable('0'),
        lastTotal: ko.observable('<?php echo $tonglon_1; ?>'),
        totalweight: ko.observable('50')
    };
    ko.applyBindings(viewModel);
</script>
<script>
/*$(document).ready(function(){
  $("img.cong_tru").click(function(){
								   //alert("dasa");
    $("#haha33").load("ajax/1.php");
  });
});*/

//var p=getContent("ajax/1.php");
//var jqxhr = $.get("ajax/1.php");
//alert(jqxhr);


</script>
<script type="text/javascript">
    $(function () {
        $('.plus').click(function () {
			var id_sp=this.rel;		
			var gia_tung_san_pham=ep_so(document.getElementById("id_span_20__"+this.rel).value);
			var tong_hien_tai=ep_so(document.getElementById("id_span_tong__"+this.rel).value);			
			var tong=tong_hien_tai+gia_tung_san_pham;
			
			var tong_lon_hien_tai=ep_so(document.getElementById("tong_lon").value);
			var tong_lon_2=tong_lon_hien_tai+gia_tung_san_pham;
			
			var tong_dd=number_format(tong,0,".",",");
			var tong_lon_2_dd=number_format(tong_lon_2,0,".",",");
			//alert(tong_dd);
			document.getElementById("tong_lon_1").innerHTML=tong_lon_2_dd;
			document.getElementById("tong_lon").value=tong_lon_2;
			//alert(tong_hien_tai);
			//var tong_hien_tai=
			var id_a1=document.getElementById("id_span__"+this.rel);
			id_a1.innerHTML=ep_so(id_a1.innerHTML)+1;
			document.getElementById("id_span_tong2__"+this.rel).innerHTML=tong_dd;
			document.getElementById("id_span_tong__"+this.rel).value=tong;
			ajax_load("<?php echo $base_url; ?>ajax/1.php?id="+id_sp+"&ts=cong","haha33");
			//alert("chao");


			
        });

        $('.minus').click(function () {
			var id_sp=this.rel;	
			var id_a1=document.getElementById("id_span__"+this.rel);
			if((ep_so(id_a1.innerHTML)-1)<=0){return;}
			var gia_tung_san_pham=ep_so(document.getElementById("id_span_20__"+this.rel).value);
			var tong_hien_tai=ep_so(document.getElementById("id_span_tong__"+this.rel).value);			
			var tong=tong_hien_tai-gia_tung_san_pham;
			
			var tong_lon_hien_tai=ep_so(document.getElementById("tong_lon").value);
			var tong_lon_2=tong_lon_hien_tai-gia_tung_san_pham;
			
			var tong_dd=number_format(tong,0,".",",");
			var tong_lon_2_dd=number_format(tong_lon_2,0,".",",");
			
			document.getElementById("tong_lon_1").innerHTML=tong_lon_2_dd;
			document.getElementById("tong_lon").value=tong_lon_2;
			//alert(tong_hien_tai);
			//var tong_hien_tai=
			
			id_a1.innerHTML=ep_so(id_a1.innerHTML)-1;
			document.getElementById("id_span_tong2__"+this.rel).innerHTML=tong_dd;
			document.getElementById("id_span_tong__"+this.rel).value=tong;
			ajax_load("<?php echo $base_url; ?>ajax/1.php?id="+id_sp+"&ts=tru","haha33");
        });

        $('.remove').click(function () {
            var _id = $(this).attr("rel");
            $('#' + _id).submit();
        });
    });

</script>
