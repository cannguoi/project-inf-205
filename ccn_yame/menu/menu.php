   <?php 
		chong_pha_hoai();
   ?>
   <?php 
		function ten_menu_hien_tai()
		{
			$tv="select * from menu where id='$_GET[id]'";
			//thongbao($tv);
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			return $tv_2['ten'];
		}
		function menu_cha($id)
		{
			$tv="select * from menu where id='$id'";
			//thongbao($tv);
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			return $tv_2['thuoc_menu'];
		}
		function cap_con()
		{
			$tv="select count(*) from menu where thuoc_menu='$_GET[id]'";
			//thongbao($tv);
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_row($tv_1);
			//thongbao($tv_2[0]);
			if($tv_2[0]!=0){return "co";}else {return "khong";}
		}
		function id_dau_a($id)
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
   ?>
	<div class="clearfix" id="navigation">
      <div id="layerOne">
        <ul id="root" style="visibility: visible;">
		<?php 
			function menu_cap_1($base_url)
			{
				//rel="yamehot"
				$sql="select * from menu where thuoc_menu='' order by id";
				$q_sql=mysql_query($sql);
				while($r_sql=mysql_fetch_array($q_sql))
				{
					$link=$base_url."?thamso=xuat_sanpham&m=1&id=$r_sql[id]";
					
					if($r_sql['dang']=="link"){$link=$r_sql['link'];}
					$link=$link."&id_active=$r_sql[id]";
					?>
						<li class="navLink" >
							<a href="<?php echo $link; ?>" class="mainNav" rel="<?php echo $r_sql['rel'] ?>"><span><?php echo $r_sql['ten'] ?></span></a>
						</li>
					<?php
				}
			}
			menu_cap_1($base_url);
		?>

        </ul>        
      </div> 

      <div class="subnav clearfix" id="subcontainer">

 
	<?php 
		function menu_cap_2($base_url)
		{

			$sql="select * from menu where thuoc_menu='' order by id";
			$q_sql=mysql_query($sql);
			$i=1;
			while($r_sql=mysql_fetch_array($q_sql))
			{
				$tv="select * from menu where thuoc_menu='$r_sql[id]'";
				$tv_1=mysql_query($tv);
				$tv_1a=mysql_query($tv);
				//if($i==1){$a="block";}else{$a="none";}
				if($_GET['m']==1)
				{
					if($r_sql['id']==$_GET['id'])
					{$a="block";}
					else
					{					
						$a="none";
						//thongbao("vao day");
						while($c2=mysql_fetch_array($tv_1a))
						{
							if($c2['id']==$_GET['id']){$a="block";}
							else 
							{
								$a="none";
								//thongbao("vao day");
								//thongbao($c2['ten']);
								// $c2['id'] la dãy các id cấp 2 trong while
								/*$e="select * from menu where thuoc_menu='$c2[id]' order by id";
								$e_1=mysql_query($e);
								while($e_2=mysql_fetch_array($e_1))
								{
									if($_GET['id']==$e_2['id'])
									{
										$a="block";
									}
								}*/
							}
						}
						
					}
				}
				else 
				{
					if($i==1){$a="block";}else{$a="none";}
				}
				if(mysql_num_rows($tv_1)!=0)
				{
					
					//echo "<ul id=\"$r_sql[rel]\" style=\"display:$a\">";
					echo "<ul id=\"$r_sql[rel]\" style=\"display:none\">";
						while($tv_2=mysql_fetch_array($tv_1))
						{		
							$link=$base_url."?thamso=xuat_sanpham&m=1&id=$tv_2[id]";
							
							if($tv_2['dang']=="link"){$link=$tv_2['link'];}
							$link=$link."&id_active=$r_sql[id]";
							?>
								<li>
									<a href="<?php echo $link ?>"><?php echo $tv_2['ten'] ?></a>
								</li>
							<?php
						}
					echo "</ul>";
				}
				$i++;
			}
			
			if(trim($_GET['id_active'])=="")
			{
				$rr="select * from menu order by id limit 0,1 ";
				//thongbao($rr);
				$rr_1=mysql_query($rr);
				$rr_2=mysql_fetch_array($rr_1);
				//thongbao($rr_2['rel']);
				if($rr_2['rel']!="")
				{
				?>
					<script>
						document.getElementById("<?php echo $rr_2['rel'];?>").style.display="block";
					</script>
				<?php
				}
			}
			else 
			{
				$id_dau_a=$_GET['id_active'];
				$rr="select * from menu where id='$id_dau_a'";
				//thongbao($rr);
				$rr_1=mysql_query($rr);
				$rr_2=mysql_fetch_array($rr_1);
				//thongbao($rr_2['rel']);
				if($rr_2['rel']!="")
				{
				?>
					<script>
						document.getElementById("<?php echo $rr_2['rel'];?>").style.display="block";
					</script>
				<?php
				}
				
			}		
			
			
		}
		menu_cap_2($base_url);
	?>


      </div>
    </div>
</div>
<?php 
	function xac_dinh_cap_2()
	{
		$tv="select * from menu where id='$_GET[id]'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		if($tv_2['thuoc_menu']=="")
		{
			return 1;
		}
		else 
		{
			$z="select * from menu where id='$tv_2[thuoc_menu]";
			$z_1=mysql_query($z);
			$z_2=mysql_fetch_array($z_1);
			if($z_2['thuoc_menu']=="")
			{
				return 2;
				
			}
			else 
			{
				return 3;
			}
		}
	}
	function xac_dinh_cap()
	{
		$i=0;
		$tv="select * from menu where id='$_GET[id]'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		if($tv_2['thuoc_menu']!="")
		{
			$i=1;
		}
		else 
		{
			return 1;
		}
			//thongbao($tv_2['thuoc_menu']);
			$z="select * from menu where id='$tv_2[thuoc_menu]'";
			//thongbao($z);
			$z_1=mysql_query($z);
			$z_2=mysql_fetch_array($z_1);
			//thongbao($z_2['thuoc_menu']);
			if($z_2['thuoc_menu']!="")
			{
				$i=2;
				
			}
			else 
			{
				return 2;
			}

		return 3;
	}
	if($_GET['m']=="1")
	{
		//echo "hehe";
		$cap=xac_dinh_cap();
		//thongbao($cap);
		?>
<div class="container">
<div id="main-content-wrapper">
        
        <div class="product-categories clearfix">    
			<?php 
				$ten_menu_hien_tai=ten_menu_hien_tai();
			?>			
	        <h4><?php echo $ten_menu_hien_tai; ?></h4>
            

<div class="side-categories" id="side-categories">
    <ul>
			<?php 
				function hh_1($base_url)
				{
					$id_dau=id_dau_a($_GET['id']);
					$sql="select * from menu where thuoc_menu='$_GET[id]' order by id";
					$q_sql=mysql_query($sql);
					
					while($r_sql=mysql_fetch_array($q_sql))
					{
						$link=$base_url."?thamso=xuat_sanpham&m=1&id=$r_sql[id]";
						if($r_sql['dang']=="link"){$link=$r_sql['link'];}
						$link=$link."&id_active=$id_dau";
						echo "<li>";
							echo "<a href=\"$link\">";
								echo "".$r_sql['ten'];
							echo "</a>";
						echo "</li>";
					}
				}
				function hh_2($base_url,$id)
				{
					$sql="select * from menu where thuoc_menu='$id' order by id";
					$q_sql=mysql_query($sql);
					
					while($r_sql=mysql_fetch_array($q_sql))
					{
						$id_dau=id_dau_a($id);
						$link=$base_url."?thamso=xuat_sanpham&m=1&id=$r_sql[id]";
						if($r_sql['dang']=="link"){$link=$r_sql['link'];}
						$link=$link."&id_active=$id_dau";
						echo "<li>";
							echo "<a href=\"$link\">";
								echo $r_sql['ten'];
							echo "</a>";
						echo "</li>";
					}
				}
				if($cap==1)
				{
					hh_1($base_url);					
				}				
				if($cap==2)
				{
					$cap_con=cap_con();
					//thongbao($cap_con);
					if($cap_con=="co")
					{
						//thongbao("d");
						hh_1($base_url);
					}
					else 
					{
					
						$menu_cha=menu_cha($_GET['id']);
						//thongbao($menu_cha);
						hh_2($base_url,$menu_cha);
					}
				}
				if($cap==3)
				{
					$menu_cha=menu_cha($_GET['id']);
					//thongbao($menu_cha);
					hh_2($base_url,$menu_cha);
				}
			?>

    </ul>
</div>            <span class="clear"></span>               
		</div>
        
			
		<?php
	}
?>