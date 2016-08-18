<?php
	chong_pha_hoai();
	//thongbao("vao day");
	//$up="UPDATE `thong_so` SET `gia_tri` = '$_POST[so]' WHERE ma_so='2' LIMIT 1 ;";
	//mysql_query($up);
?>
<?php 
	for($r=1;$r<=10;$r++)
	{
		$name_link_hinh="link_hinh_".$r;
		$name_link_lien_ket="link_lien_ket_".$r;
		$name_id_abc="id_abc_".$r;
		
		$link_hinh=$_POST[$name_link_hinh];
		$link_lien_ket=$_POST[$name_link_lien_ket];
		$id_abc=$_POST[$name_id_abc];
		
		$up="update `slide` set `link_hinh`='$link_hinh',
		`link`='$link_lien_ket',`vi_tri`='1' 
		
		where id='$id_abc'

		";
		mysql_query($up);
		//echo $up."<hr>";
		
	}
	//exit();
?>