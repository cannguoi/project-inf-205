<?php 
	chong_pha_hoai();
?>
<?php 
	$tv="select * from du_lieu_mot_tin where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
?>
<style type="text/css">
<!--
.container p strong {
	color: #00F;
}
-->
</style>

<div style="width:5px;height:20px;overflow:hidden"></div>
<div class="container">
  <div class="middlerail_style">
	    <span><?php echo $tv_2['ten']; ?></span>
  </div>
<div style="width:5px;height:3px;overflow:hidden"></div>
  <p><?php echo $tv_2['noi_dung']; ?></p>
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
					<br><br><br>
    
    
 
</div>

