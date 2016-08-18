<?php
chong_pha_hoai();
if(isset($_GET['id_mnn']))
{
	$delete="DELETE FROM `dulieu_1` WHERE `id` = '$_GET[id_mnn]'";
	mysql_query($delete);
	//trangtruoc();
}


?>