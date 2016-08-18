<?php 
	chong_pha_hoai();
	
?>
<?php 
	//test($_GET['id']);
	$chuoi_union=chuoi_union_dulieu($_GET['id'],"dulieu");
	//echo $chuoi_union;echo "<hr>";
	$dem_dulieu_vghj=dem_dulieu_vghj($_GET['id'],"dulieu");
	//test($dem_dulieu_vghj);
?>
<?php 
	class xuat
	{
		function so_trang($so_gioi_han)
		{
			/*$sql				=	"select count(*) from dulieu where thuoc_menu='$_GET[id]'";
			$query				=	mysql_query($sql);			
			$row				=	mysql_fetch_array($query);*/
			$dem_dulieu_vghj=dem_dulieu_vghj($_GET['id'],"dulieu");
			return ceil($dem_dulieu_vghj/$so_gioi_han);
		}
		function xuat_link($st)
		{
			$link_dau=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&id_active=$_GET[id_active]&trang=1";
			$link_cuoi=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&id_active=$_GET[id_active]&trang=$st";
			$i_1				=	$_GET['trang']-1;if($i_1==0){$i_1=1;}
			$i_2				=	$_GET['trang']+1;if($i_2==$st+1){$i_2=$st;}
			$link_truoc=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&id_active=$_GET[id_active]&trang=$i_1";
			$link_sau=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&id_active=$_GET[id_active]&trang=$i_2";
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
											$link=$GLOBALS['base_url']."?thamso=xuat_sanpham&id=$_GET[id]&m=1&id_active=$_GET[id_active]&trang=$i";
											
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
			$this->xuat_link($st);
			$i					=	1;
			//$sql				=	"select * from dulieu where thuoc_menu='$_GET[id]' order by id desc limit $vtbd,$so_gioi_han";
			$chuoi_union=chuoi_union_dulieu($_GET['id'],"dulieu");
			$sql				=	$chuoi_union."limit $vtbd,$so_gioi_han";
			//test($sql);
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
			$this->xuat_link($st);			
		}
	}
	$xuat=new xuat;
	//$xuat->xuat_san_pham();
?>
<div class="clear"></div>
<div class="clearfix">

         <?php 
			$xuat->xuat_san_pham();
		?>	
</div>
<div class="clear"></div>
</div></div>