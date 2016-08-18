<?php 
	chong_pha_hoai();
?>
<?php 
	$tv="select * from banner where id='1'";
	$tv_1=truy_van($tv);
	$tv_2=mysql_fetch_array($tv_1);
?>
<h1 id="logo"><a href="<?php echo $GLOBALS['base_url']; ?>" title="">
	<img src="<?php echo $tv_2['link']; ?>" alt="" width="140px" height="40px"/></a>
</h1>