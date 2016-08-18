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
		$name_tieu_de="tieu_de_".$r;
		$name_gia="gia_".$r;
		$name_id_abc="id_abc_".$r;
		
		$link_hinh=$_POST[$name_link_hinh];
		$link_lien_ket=$_POST[$name_link_lien_ket];
		$tieu_de=$_POST[$name_tieu_de];		
		$gia=$_POST[$name_gia];		
		$id_abc=$_POST[$name_id_abc];
		
		$up="update `san_pham_trang_chu` set `link_hinh`='$link_hinh',
		`link`='$link_lien_ket',
		`tieu_de`='$tieu_de',
		`gia`='$gia'
		
		where id='$id_abc'

		";
		mysql_query($up);
		//echo $up."<hr>";
		
	}
	//exit();
?>