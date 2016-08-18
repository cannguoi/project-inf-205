<?php
	chong_pha_hoai();
	$delete="DELETE FROM `dulieu` WHERE `id` = '$_GET[id_sp]'";
	mysql_query($delete);
?>