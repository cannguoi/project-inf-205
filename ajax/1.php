<?php
	session_start();
?>
<?php 
	//echo $_GET['id'];
	for($i=0;$i<count($_SESSION['id_giohang']);$i++)
	{
		$id=$_SESSION['id_giohang'][$i];
		if($id==$_GET['id'])
		{
			if($_GET['ts']=="cong")
			{
				$_SESSION['soluong_giohang'][$i]=$_SESSION['soluong_giohang'][$i]+1;
			}
			else 
			{
				$_SESSION['soluong_giohang'][$i]=$_SESSION['soluong_giohang'][$i]-1;
			}
			break;
		}
	}
?>
