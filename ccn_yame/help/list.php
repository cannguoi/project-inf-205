<?php 
	chong_pha_hoai();

?>
<div class="container">
    <div class="twoColumnContainer clearfix">        
        <div class="columnOne">
<?php 
	/*$tv="";
	$tv_1=mysql_query($tv);
	while($tv_2=mysql_fetch_array($tv_1))
	{
		h_y_1($ten_menu);
		$e="thuoc_menu";
		$e_1=mysql_query($e);
		echo '<ul class="side_small_list">';
			while($e_2=mysql_fetch_array($e_1))
			{
				$link=$base_url."";
				echo "<li>";
					echo "<a href=\"$link\" >";
						echo $ten_menu;
					echo "</a>";
				echo "</li>";
			}	
		echo '</ul>';		
	}*/
	
?>
<div class="side_small_list">
<?php 
	function h_y_1($c)
	{
		echo '<div class="nav_title_maincat">
			'.$c.'
		</div>';
	}
	//$tv="select * from help where dang=2";
	$tv="select * from help";
	$tv_1=mysql_query($tv);
	while($tv_2=mysql_fetch_array($tv_1))
	{
		$ten_menu=$tv_2['ten_menu'];
		if($tv_2['dang']==2)
		{
			h_y_1($ten_menu);
		}
		else 
		{
			$link=$base_url."?thamso=help&id=$tv_2[id]";
			//echo "<li>";
					echo "<a href=\"$link\" >";
						echo $ten_menu;
					echo "</a>";
				//echo "</li>";
		}
		$e="select * from help where thuoc_menu=$tv_2[id]";
		$e_1=mysql_query($e);
		/*echo '<ul class="side_small_list">';
			while($e_2=mysql_fetch_array($e_1))
			{
				$ten_menu=$e_2['ten_menu'];
				$link=$base_url."?thamso=help&id=$e_2[id]";
				echo "<li>";
					echo "<a href=\"$link\" >";
						echo $ten_menu;
					echo "</a>";
				echo "</li>";
			}	
		echo '</ul>';		*/
		//echo '<br />';		
	}
	
?>
</div>
<?php 
	if($_GET['id']!="")
	{
		$tv="select * from help where id='$_GET[id]'";
	}
	else 
	{
		$tv="select * from help order by id limit 0,1";
	}
	//test($tv);
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);	
?>
      </div>
        <div class="columnTwo">             
             <!--<div class="breadcrumb">
            
               <a href="/Help">Hướng dẫn</a>
                <span>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;</span>
            </div>-->
            <div class="middlerail_style">
	            <span><?php echo $tv_2['ten']; ?></span>
            </div>
            <div class="usercontent">
               <?php echo $tv_2['noi_dung']; ?>
</div>
            </div>
        </div>       
    </div>

</div>