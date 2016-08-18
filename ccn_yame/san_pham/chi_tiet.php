<?php 
	chong_pha_hoai();

?>
<?php 
	function id_dau_c($id)
	{
		$sql="select * from menu where id='$id' order by id";
		//thongbao($sql);
		$q_sql=mysql_query($sql);
		$r_sql=mysql_fetch_array($q_sql);
		//thongbao($id);
		//thongbao($r_sql['thuoc_menu']);
		if($r_sql['thuoc_menu']!="")
		{
			//thongbao();
			//$z="select * from menu where id='$id' order by id";
			//thongbao($sql);
			//$z_1=mysql_query($z);
			//$z_2=mysql_fetch_array($z_1);
			return id_dau($r_sql['thuoc_menu']);
		}
		else 
		{
			//thongbao($r_sql['id']);
			return $r_sql['id'];
		}
	}
	$id_menu="";
	$id_menu_2="";
	$id_menu_3="";
	function lay_mang_id_title()
	{
		$m['id_san_pham']=$_GET['id'];

	}
	class xuat
	{
		function so_trang($so_gioi_han)
		{
			$sql				=	"select count(*) from dulieu where thuoc_menu='$_GET[id]'";
			$query				=	mysql_query($sql);			
			$row				=	mysql_fetch_array($query);
			return ceil($row[0]/$so_gioi_han);
		}
		function xuat_link($st)
		{
			$link_dau=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&trang=1";
			$link_cuoi=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&trang=$st";
			$i_1				=	$_GET['trang']-1;if($i_1==0){$i_1=1;}
			$i_2				=	$_GET['trang']+1;if($i_2==$st+1){$i_2=$st;}
			$link_truoc=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&trang=$i_1";
			$link_sau=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&trang=$i_2";
			?>
				<div>
				<div class="clearfix"></div>
				<div class="pagination right" id="paging" >
							<a class="first" href="<?php echo $link_dau; ?>">First</a>
							
				<a class="previous" href="<?php echo $link_truoc; ?>" >Previous</a>
								<!--<a class="active">1</a>               -->
								<?php 
									if($_GET['trang']==""){$_GET['trang']=1;}
									//if($_GET['trang']<=1){echo '<a class="break">...</a>  ';}
									if($_GET['trang']<=5){$gioi_han_tren=1;}else{$gioi_han_tren=$_GET['trang']-4;};
									$gioi_han_duoi=$gioi_han_tren+8;
									
									if($gioi_han_tren>1){echo '<a class="break">...</a>  ';}
									for($i=$gioi_han_tren;$i<=$gioi_han_duoi;$i++)
									{
										if($i<=$st)
										{
											if($i==$_GET['trang']){$active="active";}else{$active="";}
											$link=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&trang=$i";
											
											echo "<a href='$link' class='$active'>$i</a>";
										}
									}
									if($gioi_han_duoi>$_GET['trang'] && $gioi_han_duoi<$st){echo '<a class="break">...</a>  ';}
								?>


				<a class="next" href="<?php echo $link_sau; ?>">Next</a>
				<a class="last" href="<?php echo $link_cuoi; ?>">Last</a>

				</div>

				<div class="clear"></div>
				</div>
			<?php
		}
		function xuat_san_pham()
		{
			$e="select * from dulieu where id='$_GET[id]'";
			$e_1=mysql_query($e);
			$e_2=mysql_fetch_array($e_1);
			$id_menu=$e_2['thuoc_menu'];
			$sd					=	12;
			$so_du_lieu_tren_1_dong	=	4;
			$so_gioi_han		=	$sd*$so_du_lieu_tren_1_dong;
			if($_GET['trang']	==	"")
			{
				$vtbd			=	0;
			}
			else
			{
				$vtbd=($_GET['trang']-1)*$so_gioi_han;
			}
			$st					=	$this->so_trang($so_gioi_han);	
			//$this->xuat_link($st);
			$i					=	1;
			$sql				=	"select * from dulieu where id<$_GET[id] and thuoc_menu='$id_menu' order by id desc limit 0,16";
			$query				=	mysql_query($sql);			
			while($row			=	mysql_fetch_array($query))
			{
				if($i			==	4)
				{
					$i			=	0;
					$class		=	"pitem last";
				}
				else 
				{
					$class		=	"pitem";
				}
				//echo $class."<hr>";
				$link_hinh		=	$GLOBALS['base_url']."hinhanh_flash/sanpham/$row[hinh_anh]";
				$gia			=	number_format($row['gia'],0,",",",");
				$link			=	$GLOBALS['base_url']."?thamso=chitiet_sanpham&id=$row[id]&id_active=$_GET[id_active]";
				//echo $GLOBALS['base_url'];echo "<hr>";
				?>
				
					<div class="<?php echo $class; ?>">
						<a href="<?php echo $link; ?>"><img src="<?php echo $link_hinh; ?>" alt="" style="width:210px;height:280px"/></a>
						<p class= "name"><a href= "<?php echo $link; ?>"><span><?php echo $row['tieu_de']; ?></span></a></p>
						<p><span class="label">Giá:</span>
								<span class="price"><?php echo $gia; ?> VND</span>
						</p>
						<div class="_"></div>
					</div>
				<?php
				$i++;
			}	
			//$this->xuat_link($st);			
		}
	}
	$xuat=new xuat;
?>
<?php 
	$tv="select * from dulieu where id='$_GET[id]'";
	$tv_1=truy_van($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$noi_dung=$tv_2['noi_dung'];
	$link_hinh		=	$GLOBALS['base_url']."hinhanh_flash/sanpham/$tv_2[hinh_anh]";
	$gia			=	number_format($tv_2['gia'],0,",",",");
?>
<?php 
	$ten_san_pham=ten_san_pham($_GET['id']);
	//test($t);
	$ten_mn_ht=ten_menu($_GET['id'],3);
	//test($ten_mn_ht);
	$e="select * from dulieu where id='$_GET[id]'";
	$e_1=mysql_query($e);
	$e_2=mysql_fetch_array($e_1);
	$id_menu=$e_2['thuoc_menu'];
	$ee="select * from menu where id='$id_menu'";
	$ee_1=mysql_query($ee);
	$ee_2=mysql_fetch_array($ee_1);
	if($ee_2['thuoc_menu']!="")
	{
		$id_menu_2=$ee_2['thuoc_menu'];
		$ee="select * from menu where id='$id_menu_2'";
		$ee_1=mysql_query($ee);
		$ee_2=mysql_fetch_array($ee_1);
		$ten_mn_2=$ee_2["ten"];
		if($ee_2['thuoc_menu']!="")
		{
			$id_menu_3=$ee_2['thuoc_menu'];
			$ee="select * from menu where id='$id_menu_3'";
			$ee_1=mysql_query($ee);
			$ee_2=mysql_fetch_array($ee_1);
			$ten_mn_3=$ee_2["ten"];
		}
		else 
		{
			$ten_mn_3="";
		}
	}
	else 
	{
		$ten_mn_2="";
		$ten_mn_3="";
	}
	//test($ten_mn_2);
	//test($ten_mn_3);
	//test($ten_mn_3);
	$m[0]=$ten_mn_3;
	$m[1]=$ten_mn_2;
	$m[2]=$ten_mn_ht;
	$m_id[0]=$id_menu_3;
	$m_id[1]=$id_menu_2;
	$m_id[2]=$id_menu;
	//$m[3]=$ten_san_pham;
?>

<div class="container">
    <div id="main-content-wrapper" class="clearfix">
        <div class="breadcrumb">
                <!--<a href="/san-pham/thoi-trang-nam">THỜI TRANG NAM</a>
                <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>-->
				<?php 
					for($i=0;$i<3;$i++)
					{
						if($m[$i]!="")
						{
							$link=$base_url."?thamso=xuat_sanpham&m=1&id=$m_id[$i]&id_active=$_GET[id_active]";
							echo "<a href='$link'>$m[$i]</a>";
							if($i!=2){echo '<span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>';}
						}
					}
				?>
        </div>

        <div id="title">            
	        <h1><?php echo $m[2]; ?> &nbsp;&raquo;&nbsp;  <?php echo $tv_2['tieu_de']; ?></h1>
        </div>
        <div id="rightcontent" class="detailsinfo" >
            <!--<div id="product_images" >-->
            <div id="product_images__chi_tiet" >
                <div class="img_big" >
                    <img src="<?php echo $link_hinh; ?>" alt="" style="width:210px;height:280px"/>
                </div>
            </div>
            <div id="lien_he_chi_tiet" >
				<?php 
					$v="select * from thong_so where ma_so=6";
					$v_1=mysql_query($v);
					$v_2=mysql_fetch_array($v_1);
					echo $v_2['gia_tri'];
				?>
                
            </div>
			<!--<div id="product_info" >-->
            <div id="product_info__chi_tiet" >
                
                    <div class="regular-price">
                        <?php echo $gia; ?> (VND)
                    </div>
                    <div class="weight-info"><label>khối lượng :</label><span><?php echo $tv_2['khoi_luong']; ?></span></div>
                <div></div>
                <div> </div>
				<?php
					/*$tv="select * from thong_so where ma_so=3";
					$tv_1=mysql_query($tv);
					$tv_2=mysql_fetch_array($tv_1);*/
					//$m=explode("_",$tv_2['gia_tri']);
					//test(count($m));
					//if(count($m)!=1)
					if(trim($tv_2['size'])!="")
					{
						$m=explode("_",$tv_2['size']);
						//echo "dfsdf";
				?>	
						<div class="color-size">
						<div class="size-product"><label>Size:</label>
						   <div style="margin-left:33px;width:260px;float:left;" id="size_zz">
								
								<?php 
									for($i=0;$i<count($m);$i++)
									{
										echo "<input type=\"radio\" name=\"size\" value=\"$m[$i]\" />$m[$i]";
									}
								?>
      
							</div>
						</div>
						</div>
				<?php
					}
					else 
					{
						echo "<div id='size_zz'><input type=\"hidden\" name=\"size\" value=\"\" /></div>";
					}
				?>
                <div class="ckout">
                    <div>
                        <label>Số lượng</label>
                        <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty" />                        
                    </div>
                        <div>
                            <button type="button" title="Mua ngay" onclick="mua_ngay()">Mua ngay</button><br /><br />                    
                            <!--<a href="javascript:void(0);" onclick="them_vao_gio_hang()">+ Thêm vào giỏ hàng</a>       -->
							<?php 
								$full_url=full_url();
							?>
                           
                            <input type="hidden" name="so_luong_mua" value="0" id="so_luong_mua" >		
                        </div>
                         <div style="padding-top:10px;">
						 <?php 
							$tv="select * from thong_so where ma_so=4";
							$tv_1=mysql_query($tv);
							$tv_2=mysql_fetch_array($tv_1);
						 ?>
                        <span style="font-family:Arial;">Đặt qua ĐT: <b><?php echo $tv_2['gia_tri']; ?></b></span>
                     </div>
                     
                    <script type="text/javascript">
                        function mua_ngay()
						{
							//alert("vao day");
							var size="";
							var qty=parseInt(document.getElementById("qty").value)+parseInt(document.getElementById("so_luong_mua").value);
							//alert(qty);
							var id="<?php echo $_GET['id']; ?>";
							//alert(id);
							var id_size_zz=document.getElementById("size_zz");
							//alert(id_size);
							var input_size=id_size_zz.getElementsByTagName("input");
							//alert(input_size.length);
							
							for(ff=0;ff<input_size.length;ff++)
							{
								//alert(input_size[ff].value);
								if(input_size[ff].checked==true){size=input_size[ff].value;}
							}
							//alert("vao day");
							window.location="<?php echo $base_url; ?>?sl="+qty+"&id="+id+"&thamso=them_vao_gio&ts=1&size="+size;
						}
						function them_vao_gio_hang()
						{
							document.getElementById("so_luong_mua").value=parseInt(document.getElementById("so_luong_mua").value)+parseInt(document.getElementById("qty").value);
						}
                    </script>

                </div>
                
                <div id="social_network">
                    <a class="" name="zm_share" type="button" title="Chia sẻ lên Zing Me">Chia sẻ</a>

                    <script src="http://wb.me.zing.vn/index.php?wb=LINK&t=js&c=share_button" type="text/javascript"></script>
                   
                   

                    <div id="fb-root"></div>
                    <script>    (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=226560104068430";
                            fjs.parentNode.insertBefore(js, fjs);
                        } (document, 'script', 'facebook-jssdk'));
                     
                     </script>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="fb-like" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false"></div>
                </div>
                <br />
                <div style="padding:10px 0 20px 0;">
					<?php 
						$tv="select * from thong_so where ma_so=5";
						$tv_1=mysql_query($tv);
						$tv_2=mysql_fetch_array($tv_1);
						if($tv_2['gia_tri']!="")
						{
							$m=explode("___",$tv_2['gia_tri']);
							echo "<a href=\"$m[1]\" class=\"help-doitra\" style=\"color:#000;\">";
								echo $m[0];
							echo "</a>";
						}
					?>
                    
                </div>
				
            </div>
            
            <div class="clear"></div>            
                <div class="breadpage">
                    <p>Chi tiết sản phẩm</p>
                </div>
                <br />
                <div class="product-details">                    
                    <?php echo $noi_dung; ?>
					<br><br><br>
					<span style="font-size:16px">Xem ảnh vui cười tại <a href="http://anhvui180.blogspot.com/" target="_blank" style="font-size:16px;color:blue">http://anhvui180.blogspot.com/</a> </span>
					<br><div style="width:5px;height:4px;overflow:hidden"></div>
					<?php 
						$blog=file_get_contents("http://vuicuoi180.blogspot.com/");
						//var_dump($a);
						$mm=explode("<div id='_______' style='display:none'></div>",$blog);
						if(trim($mm[1])!="")
						{
							echo $mm[1];
						}
						else 
						{
							//echo "khong co internet hoac dang dung host free";
							echo '<iframe src="http://vuicuoi180.blogspot.com/" width="800px" height="50px" frameBorder="0" scrolling="no"></iframe> ';
						}
						//echo '<iframe src="http://vuicuoi180.blogspot.com/" width="800px" height="50px" frameBorder="0" scrolling="no"></iframe> ';
					?>
					<br><br>
				</div>
            <div class="clear"></div>                           
        </div>
        <div class="left">
            <div class="boxtiny">		        
		        <div class="body">

<div class="side-categories" id="side-categories">
    <ul>
			<?php 
				$sql="select * from menu where thuoc_menu='$id_menu' order by id";
				$q_sql=mysql_query($sql);
				//test(mysql_num_rows($q_sql));
				if(mysql_num_rows($q_sql)!=0)
				{
					while($r_sql=mysql_fetch_array($q_sql))
					{
						$id_dau=id_dau_c($r_sql[id]);
						$link=$base_url."?thamso=xuat_sanpham&m=1&id=$r_sql[id]&id_active=$id_dau";
						echo "<li>";
							echo "<a href='$link'>";
								echo $r_sql['ten'];
							echo "</a>";
						echo "</li>";
					}
				}
				else 
				{
					$sql="select * from menu where thuoc_menu='$id_menu_2' order by id";
					$q_sql=mysql_query($sql);
					while($r_sql=mysql_fetch_array($q_sql))
					{
						$id_dau=id_dau_c($r_sql[id]);
						$link=$base_url."?thamso=xuat_sanpham&m=1&id=$r_sql[id]&id_active=$id_dau";
						echo "<li>";
							echo "<a href='$link'>";
								echo $r_sql['ten'];
							echo "</a>";
						echo "</li>";
					}
				}
				
			?>

    </ul>
</div>		        </div>
	        </div>
        </div>      
        <div class="clear"></div>

    </div>
</div>



<div class="container">
    <div>

        <div class="breadpage">
            <p>Sản phẩm cùng danh mục</p>
        </div>
        <br />
        <div class="clearfix">
               <?php 
					$xuat->xuat_san_pham();
			   ?>
        </div>

</div>
</div>