<?php 
	chong_pha_hoai();
?>
<?php 
	//print_r($_GET);
	//exit();
	$trung_lap="";
	for($i=0;$i<count($_SESSION['id_giohang']);$i++)
	{
		// cap nhat gio hang va kiem tra trung lap
		$id=$_SESSION['id_giohang'][$i];
		if($id==$_GET['id'])
		{
			$trung_lap="co";
				$sl_cu=$_SESSION['soluong_giohang'][$i];
				$_SESSION['soluong_giohang'][$i]=$sl_cu + $_GET['sl'];
				$_SESSION['size'][$i]=$_GET['size'];
			break;
		}
	}
	$dem_giohang=count($_SESSION['id_giohang']);
	if($trung_lap=="")
	{
		$_SESSION['id_giohang'][$dem_giohang]=$_GET['id'];
		$_SESSION['size'][$dem_giohang]=$_GET['size'];
		$_SESSION['soluong_giohang'][$dem_giohang]=$_GET['sl'];
	}
	
	chuyen_trang("?thamso=gio_hang");
?>