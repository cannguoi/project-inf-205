<?php 
	chong_pha_hoai();
?>
<div id="mainbanner">
    <div class="container">
		<?php 
			//
			switch($_GET['thamso'])
			{
				case "xuat_sanpham":
				break;
				default: 
					include("ccn_yame/trang_chu/slide.php");
			}
		?>
        
    
</div>

<div class="container">

    <div id="wow">

<style>
#wow{ display:none;}
</style>    </div>
    <br />    
<div class="featured clearfix">
    <div>
    		<?php 
				$tv="select * from san_pham_trang_chu order by id limit 0,8";
				$tv_1=mysql_query($tv);
				$i=0;
				//1 0 2 3
				while($tv_2=mysql_fetch_array($tv_1))
				{
					if($i==0){$so=0;}if($i==1){$so=1;}if($i==2){$so=2;}if($i==3){$so=3;}
					if($i==4){$so=3;}if($i==5){$so=2;}if($i==6){$so=1;}if($i==7){$so=0;}
					//test($i);
					//test($so);
					if($i==3 or $i==7)
					{
						$class="fproduct-item-last";
					}
					else 
					{
						$class="fproduct-item";
					}
					$link=$tv_2['link'];
					$link_hinh=$tv_2['link_hinh'];
			?>
                    <div class="<?php echo $class; ?> bg_<?php echo $so; ?>">
                        <a href="<?php echo $link; ?>">
                            <img src="<?php echo $link_hinh; ?>" alt="" style="width:196px;height:260px"/></a>
                        <p class="name">
                            <a href= "<?php echo $link; ?>">
                                <span><?php echo $tv_2['tieu_de']; ?></span></a></p>
                        <p>
                            <span class="label">Giá:</span>
                                <span class="price"><?php echo $tv_2['gia']; ?> VND</span>
                        </p>
                        <div class="_NONE">
                        </div>
                    </div>
                   
            <?php 
				
				$i++;
				//break;
				}
			?>
            
    </div>
</div>

   
    <br />
    
    
    <div>
    <!----------------->
    <div class="retroline-3">	</div>
    	<?php 
			$tv="select * from menu where thuoc_menu='' and dang='' order by id limit 0,8";
			$tv_1=mysql_query($tv);
			$i=0;
			while($tv_2=mysql_fetch_array($tv_1))
			{
		?>
    
        <div class="hoz-categories">
            <div class="retroline-<?php echo $i;?>">		        
		        <div class="body">

<div class="side-categories" id="side-categories">
    <ul>
    		<?php 
				$z="select * from menu where thuoc_menu='$tv_2[id]'";
				$z_1=mysql_query($z);
				while($z_2=mysql_fetch_array($z_1))
				{
					$link=$base_url."?thamso=xuat_sanpham&m=1&id=$z_2[id]&id_active=$tv_2[id]";	
					echo '<li><a href='.$link.'>'.$z_2['ten'].'</a></li>';
				}
			?>

    </ul>
</div>		        </div>
	        </div>
        </div>
        <div class="lstproducts">

        <div class="clearfix">
            <div >
        <?php 
			$chuoi_union=chuoi_union_dulieu($tv_2['id'],"dulieu");
			//$e="select * from dulieu where thuoc_menu='$tv_2[id]' order by id desc limit 0,4";
			$e=$chuoi_union."limit 0,4";
			$e_1=mysql_query($e);
			$r=1;
			while($e_2=mysql_fetch_array($e_1))
			{
				$link			=	$base_url."?thamso=chitiet_sanpham&id=$e_2[id]&id_active=$tv_2[id]";
				$link_hinh		=	$GLOBALS['base_url']."hinhanh_flash/sanpham/$e_2[hinh_anh]";
				$gia			=	number_format($e_2['gia'],0,",",",");
				if($r==4){$class_2="pitem last";}else{$class_2="pitem";}
		?>
        
                        <div class="<?php echo $class_2; ?>" >
                        <a href="<?php echo $link; ?>"><img  width="210px" height="280px" class="lazy" src="<?php echo $link_hinh; ?>" alt="" /></a>
                        <p class= "name"><a href= "<?php echo $link; ?>"><span><?php echo $e_2['tieu_de']; ?></span></a></p>
                        <p><span class="label">Giá:</span>
                                <span class="price"><?php echo $gia; ?> VND</span>
                        </p>
                        <div class="_"></div>
                        </div>
                        
            
        <?php 
			$r++;
			if($r==5){$r=1;}
			}
		?>
        </div>
        </div>
                </div>
       <?php
			$i++;
			} // end while
		?>
        
        
        <!----------------->
    </div>

    
</div>
<div>
    <!--<img src="http://admin.yame.vn/wp-content/uploads/2013/01/yame-girls.jpg" alt="" />-->


</div>
<br />
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	