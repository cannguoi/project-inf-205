<?php 
	chong_pha_hoai();
?>
<?php 
	function ham_jj_82($vi_tri,$rong,$cao)
	{
		$tv="select * from slide where vi_tri='$vi_tri' ";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			if(trim($tv_2['link_hinh'])!="")
			{
				echo "<li>";
					echo "<a href='$tv_2[link]'>";
						echo "<img src='$tv_2[link_hinh]' width='$rong' height='$cao' />";
					echo "</a>";
				echo "</li>";
			}
		}
	}
?>
<div class="left" style="margin-right:10px; width:440px; height:440px;">
            <div class="flexslider" id="banner440x440" style="">

<ul class="slides">
<?php 
	ham_jj_82(1,440,440);
?>

</ul>       

     </div>
        </div> 
		
		
		
		
		
		
        <div class="left" style="margin-right:10px; width:410px; height:440px;">
            <div class="flexslider" id="banner410x220" style="margin-bottom:10px;">

<ul class="slides">

<?php 
	ham_jj_82(2,410,220);
?>
</ul>            </div>
            <div class="flexslider" id="banner410x210" style="">

<ul class="slides">

<?php 
	ham_jj_82(3,410,210);
?>
</ul>            </div>
        </div>   
		
		
		
		
        <div class="left">
<?php 
	$tv="select * from slide where vi_tri='4' ";
	$tv_1=mysql_query($tv);
	$em=1;
	while($tv_2=mysql_fetch_array($tv_1))
	{
		if(trim($tv_2['link_hinh'])!="")
		{
			if($em<4)
			{
				echo "<div style=\"margin-bottom:7px;\">";
					echo "<a href='$tv_2[link]'>";
						echo "<img src='$tv_2[link_hinh]' width='110px' height='110px' />";
					echo "</a>";
				echo "</div>";
			}
			else 
			{
				if($em==4)
				{
					echo "<div>";
						echo "<a href='$tv_2[link]'>";
							echo "<img src='$tv_2[link_hinh]' width='110px' height='80px' />";
						echo "</a>";
					echo "</div>";
					break;
				}
			}
		}
		$em++;
	}
?>
        </div>    
    </div>
	
	<script type="text/javascript" charset="utf-8">
        $(window).load(function () {
            $('#banner440x440').flexslider({
                directionNav: true,
                controlNav: false,
                animation: "slide",
                itemWidth: 440,
                itemMargin: 0,
                animationSpeed:700,
                slideshowSpeed:4000
            });

            $('#banner410x220').flexslider({
                directionNav: true,
                controlNav: false,
                animation: "slide",
                itemWidth: 410,
                itemMargin: 0,
                animationSpeed: 300,
                slideshowSpeed: 5000
            });

            $('#banner410x210').flexslider({
                directionNav: true,
                controlNav: false,
                animation: "slide",
                itemWidth: 410,
                itemMargin: 0,
                animationSpeed: 400,
                slideshowSpeed: 7000
            });
            

        });
    </script>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	