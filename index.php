<?php
	session_start();	
	ini_set('display_errors','0');
	
	function bao_mat()
	{
		//for($i=0;$i<count)
		//str_replace("/n","<br>",$_POST['txtNotes']);
	}
	//include_file_2('cache/top-cache.php');
	//echo $_SERVER["SCRIPT_NAME"];
	//$html=ob_get_contents();
	//echo $html;
	date_default_timezone_set('Asia/Saigon');
	include("ketnoi.php");
	include("ham/ham.php");
	include_file_2("ham/catchuoi.php");
	include_file_2("ccn_yame/thanh_vien/xac_dinh_dang_nhap_thanh_vien.php");
	//include_file_2("cumchucnang/ngon_ngu/chon.php");
	if($_GET['thamso']=="them_vao_gio")
	{
		include_file_2("ccn_yame/san_pham/them_vao_gio.php");
		trangtruoc();
		//thongbao("dung lai");
		exit();
	}
	if($_GET['thamso']=="checkout_chuyen")
	{
		if($_SESSION['thamso']!="checkout")
		{
			//echo $_POST['txtNotes'];
			//$_POST['txtNotes']=str_replace("/n","<br>",$_POST['txtNotes']);
			$_POST['txtNotes']=str_replace("\n","<br>",$_POST['txtNotes']);
			if(trim($_POST['txtNotes'])!=''){$_SESSION['txtNotes']=trim($_POST['txtNotes']);}
			chuyentrang($base_url."?thamso=checkout");
		}
		else 
		{
			chuyentrang($base_url."?thamso=giohang");
		}
		exit();
	}
	if($_GET['thamso']=="xacnhan_chuyen")
	{
		if($_SESSION['thamso']!="xacnhan")
		{
			if(trim($_POST['ho_ten'])!=''){$_SESSION['xacnhan']['ho_ten']=trim($_POST['ho_ten']);}
			if(trim($_POST['tinh'])!=''){$_SESSION['xacnhan']['tinh']=trim($_POST['tinh']);}
			if(trim($_POST['quan'])!=''){$_SESSION['xacnhan']['quan']=trim($_POST['quan']);}
			if(trim($_POST['dia_chi'])!=''){$_SESSION['xacnhan']['dia_chi']=trim($_POST['dia_chi']);}
			if(trim($_POST['dien_thoai'])!=''){$_SESSION['xacnhan']['dien_thoai']=trim($_POST['dien_thoai']);}
			if(trim($_POST['email'])!=''){$_SESSION['xacnhan']['email']=trim($_POST['email']);}
			
			if(trim($_POST['ho_ten_2'])!=''){$_SESSION['xacnhan']['ho_ten_2']=trim($_POST['ho_ten_2']);}
			if(trim($_POST['tinh_2'])!=''){$_SESSION['xacnhan']['tinh_2']=trim($_POST['tinh_2']);}
			if(trim($_POST['quan_2'])!=''){$_SESSION['xacnhan']['quan_2']=trim($_POST['quan_2']);}
			if(trim($_POST['dia_chi_2'])!=''){$_SESSION['xacnhan']['dia_chi_2']=trim($_POST['dia_chi_2']);}
			if(trim($_POST['dien_thoai_2'])!=''){$_SESSION['xacnhan']['dien_thoai_2']=trim($_POST['dien_thoai_2']);}
			if(trim($_POST['email_2'])!=''){$_SESSION['xacnhan']['email_2']=trim($_POST['email_2']);}
			chuyentrang($base_url."?thamso=xacnhan");
		}
		else 
		{
			chuyentrang($base_url."?thamso=checkout");
		}
		exit();
	}
	function gio_hang_trong__zzz()
	{
		//test(count($_SESSION['id_giohang']));
		$so=count($_SESSION['id_giohang']);
		//test($so);
		if($so==0)
		{	
			//test("haha");
			return "co";
		}
		//test(count($_SESSION['id_giohang']));
		$tsl=0;				   
		for($i=0;$i<count($_SESSION['id_giohang']);$i++)
		{
			$sl=$_SESSION['soluong_giohang'][$i];
			$tsl=$tsl+$sl;
		}
		//test(count($_SESSION['id_giohang']));
							 //test($tsl);
		if($tsl==0){return "co";}
		return "khong";
	}
	$gio_hang_trong__zzz=gio_hang_trong__zzz();
	if($_GET['thamso']=="checkout" or $_GET['thamso']=="xacnhan")
	{
		if($gio_hang_trong__zzz=="co")
		{
			die("Khong co san pham trong gio hang");
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head id="Head1" runat="server">
	<base href="<?php echo $base_url; ?>" >
    <!--<link rel="icon" type="image/png" href="/yame-fav.png" />-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=980, initial-scale=1"> 
    <meta name="google-site-verification" content="44R-hmQ9w32M8toAiYqWWrhwYv-no4MpWl5gWBmAhec" />

    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>giaodien/01.css?rnd=17122012_3" media="all" />
     -->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>giaodien/flexslider.css?rnd=09112012" media="all" />        
	
    <!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>-->
    <script src="<?php echo $base_url;?>giaodien/chung.js" type="text/javascript"></script>    
    <script src="<?php echo $base_url;?>giaodien/jquery-1.6.1.min.js" type="text/javascript"></script>    
    <script src="<?php echo $base_url;?>giaodien/modernizr-1.7.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>giaodien/jquery.flexslider.js" type="text/javascript"></script>  
    <script src="<?php echo $base_url;?>giaodien/knockout-1.2.1.js" type="text/javascript"></script>      
    <script src="<?php echo $base_url;?>giaodien/jail.min.js" type="text/javascript"></script>   
    <script src="<?php echo $base_url;?>giaodien/jquery.easing.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>giaodien/jquery.mousewheel.js" type="text/javascript"></script>

    	<?php 
			$tv="select * from thong_so where ma_so='7'";
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			$m=explode("___",$tv_2['gia_tri']);
			$title=$m[0];
			$keywords=$m[1];
			$description=$m[2];
			switch($_GET['thamso'])
			{
				case "xuat_sanpham":
					$tv="select * from menu where id='$_GET[id]'";
					$tv_1=mysql_query($tv);
					$tv_2=mysql_fetch_array($tv_1);
					
					$title=$tv_2['ten'];
					if(trim($tv_2['keywords'])!=""){$keywords=$tv_2['keywords'];}
					if(trim($tv_2['description'])!=""){$description=$tv_2['description'];}
				break;
				case "chitiet_sanpham":
					$tv="select * from dulieu where id='$_GET[id]'";
					$tv_1=mysql_query($tv);
					$tv_2=mysql_fetch_array($tv_1);
					
					$title=$tv_2['tieu_de'];
					if(trim($tv_2['keywords'])!=""){$keywords=$tv_2['keywords'];}
					if(trim($tv_2['description'])!=""){$description=$tv_2['description'];}
				break;
				case "xuat_mot_tin":
					$tv="select * from du_lieu_mot_tin where id='$_GET[id]'";
					$tv_1=mysql_query($tv);
					$tv_2=mysql_fetch_array($tv_1);
					
					$title=$tv_2['ten'];
					if(trim($tv_2['keywords'])!=""){$keywords=$tv_2['keywords'];}
					if(trim($tv_2['description'])!=""){$description=$tv_2['description'];}
				break;
				default:
					
			}
		?>
        <title><?php echo $title; ?></title>
        
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <meta name="description" content="<?php echo $description; ?>" />
    
	<script type="text/javascript">
		function ep_so(so)
		{
			return parseInt(so);
		}
		function getXMLHttp()
		{
		  var xmlHttp
		
		  try
		  {
			//Firefox, Opera 8.0+, Safari
			xmlHttp = new XMLHttpRequest();
		  }
		  catch(e)
		  {
			//Internet Explorer
			try
			{
			  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
			  try
			  {
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  catch(e)
			  {
				alert("Your browser does not support AJAX!")
				return false;
			  }
			}
		  }
		  return xmlHttp;
		}
		function HandleResponse(response,id)
		{
				//alert(id);
				//alert(response);
		  document.getElementById(id).innerHTML = response;
		}
		function ajax_load(file,id)
		{
		  var xmlHttp = getXMLHttp();
		
		  xmlHttp.onreadystatechange = function()
		  {
			if(xmlHttp.readyState == 4)
			{
				//alert(xmlHttp.responseText);
			  HandleResponse(xmlHttp.responseText,id);
			}
		  }
		
		  xmlHttp.open("GET", file, true); 
		  //xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
		  xmlHttp.send(null);
		  
		}
	</script>
    

    <?php //die("</head><body><div id=\"haha34\">hehe</div><script>ajax_innerHTML___1_1__dkl(\"ajax/1.php\",\"haha34\");</script></body></html>");?>
    <!--<link href="/Content/halloween.css" rel="stylesheet" type="text/css" />    -->
    <style type="text/css">
            .fbbutton {
               border: 2px solid #0a3c59;
               background: #3e779d;
               background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
               background: -webkit-linear-gradient(top, #65a9d7, #3e779d);
               background: -moz-linear-gradient(top, #65a9d7, #3e779d);
               background: -ms-linear-gradient(top, #65a9d7, #3e779d);
               background: -o-linear-gradient(top, #65a9d7, #3e779d);
               background-image: -ms-linear-gradient(top, #65a9d7 0%, #3e779d 100%);
               padding: 6px 12px;
               -webkit-border-radius: 2px;
               -moz-border-radius: 2px;
               border-radius: 2px;
               -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
               -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
               box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
               text-shadow: #7ea4bd 0 1px 0;
               color: #06426c;
               font-size: 14px;
               font-family: helvetica, serif;
               text-decoration: none;
               vertical-align: middle;
               }
            .fbbutton:hover {
               border: 2px solid #0a3c59;
               text-shadow: #1e4158 0 1px 0;
               background: #3e779d;
               background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
               background: -webkit-linear-gradient(top, #65a9d7, #3e779d);
               background: -moz-linear-gradient(top, #65a9d7, #3e779d);
               background: -ms-linear-gradient(top, #65a9d7, #3e779d);
               background: -o-linear-gradient(top, #65a9d7, #3e779d);
               background-image: -ms-linear-gradient(top, #65a9d7 0%, #3e779d 100%);
               color: #fff;
               }
            .fbbutton:active {
               text-shadow: #1e4158 0 1px 0;
               border: 2px solid #0a3c59;
               background: #65a9d7;
               background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#3e779d));
               background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
               background: -moz-linear-gradient(top, #3e779d, #65a9d7);
               background: -ms-linear-gradient(top, #3e779d, #65a9d7);
               background: -o-linear-gradient(top, #3e779d, #65a9d7);
               background-image: -ms-linear-gradient(top, #3e779d 0%, #65a9d7 100%);
               color: #fff;
               }
               
               a.location-new {
                    background: url(hinhanh_flash/new_ico.png) no-repeat top left;
                    padding-left: 22px !important;
                }
    </style>
    
    <script type="text/javascript">        var _sf_startpt = (new Date()).getTime()</script>
</head>

<body>
<?php 
	if($_GET['thamso']=="xong")
	{
		//bat_loi();
		$ho_ten=$_SESSION['xacnhan']['ho_ten'];
		$dia_chi=$_SESSION['xacnhan']['dia_chi'];
		$dien_thoai=$_SESSION['xacnhan']['dien_thoai'];
		$tinh=$_SESSION['xacnhan']['tinh'];
		$quan=$_SESSION['xacnhan']['quan'];
		$email=$_SESSION['xacnhan']['email'];
		
		$ho_ten_2=$_SESSION['xacnhan']['ho_ten_2'];
		$dia_chi_2=$_SESSION['xacnhan']['dia_chi_2'];
		$dien_thoai_2=$_SESSION['xacnhan']['dien_thoai_2'];
		$tinh_2=$_SESSION['xacnhan']['tinh_2'];
		$quan_2=$_SESSION['xacnhan']['quan_2'];
		$email_2=$_SESSION['xacnhan']['email_2'];
		
		$khach_mua="";
		for($i=0;$i<count($_SESSION['id_giohang']);$i++)
		{
			$sl=$_SESSION['soluong_giohang'][$i];
			$id=$_SESSION['id_giohang'][$i];
			$size=$_SESSION['size'][$i];
			if($size==""){$size="khongchon";}
			$khach_mua=$khach_mua.$id."___".$sl."___".$size."______";
			
		}
		$khach_mua=substr($khach_mua,0,-6);
		$c="
			INSERT INTO `hoadon` (
			`id` ,
			`khach_mua` ,
			`ho_ten` ,
			`dia_chi` ,
			`email` ,
			`dien_thoai` ,
			`noi_dung` ,
			`ky_danh` ,
			`tinh` ,
			`quan` ,
			`ho_ten_2` ,
			`tinh_2` ,
			`quan_2` ,
			`dia_chi_2` ,
			`dien_thoai_2` ,
			`email_2`
			
			)
			VALUES (
			NULL , '$khach_mua', '$ho_ten', '$dia_chi', '$email', '$dien_thoai', '$_SESSION[txtNotes]', '', '$tinh', '$quan', 
			'$ho_ten_2', '$tinh_2', '$quan_2', '$dia_chi_2', '$dien_thoai_2', '$email_2'
			);
		";
		mysql_query($c);
		thongbao("Cảm ơn bạn đã mua hàng tại website chúng tôi \\nChúng tôi sẽ kiểm tra đơn hàng và giao hàng cho bạn");
		unset($_SESSION['xacnhan']);
		unset($_SESSION['id_giohang']);
		unset($_SESSION['soluong_giohang']);
		unset($_SESSION['txtNotes']);
		chuyentrang($base_url."index.php");
		exit();
	}
?>
<div class="container_wrapper">



<div id="container">
<div class="container">
   
    <div id="header" class="">
        <div id="header_nav">
            <div class="left">
                <div id="global-links" style="font-size:0.8em;padding-top:10px;">
                	<?php 
						$full_url=full_url();
						$m_89_t=explode("thamso",$full_url);
						//print_r($m_89_t);
						$tv="select * from menu_top order by id";
						$tv_1=mysql_query($tv);
						$io=1;
						while($tv_2=mysql_fetch_array($tv_1))
						{
							if(trim($tv_2['dang'])=="no_link")
							{
								echo " <span>".$tv_2['ten']."</span> ";
								//echo '<span>&nbsp;|&nbsp;</span>';
							}
							else 
							{
									$rep=explode("thamso",$tv_2['link']);
									if(ereg("xuat_mot_tin",$rep[1]))
									{
										//test("trung");
										//echo "trung";
										//echo $rep[1];
										$y8=trim($rep[1]);
										$rrr="select * from menu where link like '%$y8%'";
										//test($rrr);
										$rrr_1=mysql_query($rrr);
										$rrr_2=mysql_fetch_array($rrr_1);
										$thuoc_menu=$rrr_2['thuoc_menu'];
										$link=$tv_2['link']."&id_active=$thuoc_menu";
;									}
									else 
									{
										$link=$tv_2['link'];
									}
									echo " <span><a href='$link'>".$tv_2['ten']."</a></span> ";
									//echo '<span>&nbsp;|&nbsp;</span>';
							}
							//echo $io."___".mysql_num_rows($tv_1);echo "<hr>";
							if($io!=mysql_num_rows($tv_1))
							{
								echo '<span>&nbsp;|&nbsp;</span>';
							}
							$io++;
						}
					?>
     
                </div>
            </div>
            <div class="right" style="text-align:right;">
		        <div id="global-links" style="font-size:0.8em;padding-top:10px;">
                     
                        <span><a href="http://anhvui180.blogspot.com/" target="_blank">Thư giản</a></span>
                        <span>&nbsp;|&nbsp;</span>
                    <span><a href="<?php echo $base_url; ?>?thamso=help">Trợ giúp</a></span>
		        </div>
                
            </div>
	    </div>
        <div class="clear">
            <div class="left">
				<?php 
					include_file_2("ccn_yame/logo.php");
				?>
                
            </div>
            <div class="left">
                <div class="search">
                    <form action="<?php echo $base_url;?>" method="get" id="topSearchForm" name="topSearchForm">
                    	<input type="hidden" name="thamso" value="tim_kiem"  />
                        <span>Bạn đang cần tìm </span>
                        <input type="text" class="searchinput" id="searchKeyword" name="tu_khoa" value="<?php echo trim($_GET['tu_khoa']); ?>" />
                        <a class="submit" href="javascript:void(0);" id="topSearchCmd" name="topSearchCmd">Tìm kiếm</a>
                    </form>
                    <script type="text/javascript">
                        $(function () {
                            $('#topSearchCmd').click(function () {
                                $('#topSearchForm').submit();
                            });
                        });
                    </script>
                </div>
            </div>        
            <div class="right">
                <div id="shopping_cart_summary">
		            <div id="display_cart_summary">
                    <div class="cartsummary_full">
                    <?php 
						$tsl=0;
						if(count($_SESSION['id_giohang'])==0)
						{
							$tsl=0;
						}
						else 
						{
							for($gem=0;$gem<count($_SESSION['id_giohang']);$gem++)
							{
	
								$sl=$_SESSION['soluong_giohang'][$gem];
								$tsl=$tsl+$sl;
							}
						}
					?>
                    Sản phẩm trong giỏ hàng: <b><span id="spcart">
 <?php echo $tsl; ?></span></b> - <a href="<?php echo $base_url; ?>?thamso=gio_hang">Thanh toán / Check out</a></div></div>
	            </div>
            </div>
        </div>
        
	
	    	
    </div>

<?php 
	include_file_2("ccn_yame/menu/menu.php");
?>



<?php 
	//include_file_2("ccn_yame/trang_chu/trang_chu.php");
	switch($_GET['thamso'])
	{
		case "xuat_sanpham":
			//echo "xuat";
			include_file_2("ccn_yame/san_pham/xuat.php");
		break;
		case "chitiet_sanpham":
			include_file_2("ccn_yame/san_pham/chi_tiet.php");
		break;
		case "help":
			include_file_2("ccn_yame/help/list.php");
		break;
		case "gio_hang":
			include_file_2("ccn_yame/san_pham/gio_hang.php");
		break;
		case "checkout":
			include_file_2("ccn_yame/san_pham/checkout.php");
		break;
		case "xacnhan":
			include_file_2("ccn_yame/san_pham/xacnhan.php");
		break;
		case "xuat_mot_tin":
			include_file_2("ccn_yame/xuat_mot_tin.php");
		break;
		case "tim_kiem":
			include_file_2("ccn_yame/tim_kiem.php");
		break;
		default: 
			//echo "trang chu";
			include_file_2("ccn_yame/trang_chu/trang_chu.php");
	}
?>


<?php 
	function id_dau($id)
	{
		$sql="select * from menu where id='$id' order by id";
		//thongbao($sql);
		$q_sql=mysql_query($sql);
		$r_sql=mysql_fetch_array($q_sql);
		//thongbao($id);
		//thongbao($r_sql['thuoc_menu']);
		if($r_sql['thuoc_menu']!="")
		{
			//thongbao();
			//$z="select * from menu where id='$id' order by id";
			//thongbao($sql);
			//$z_1=mysql_query($z);
			//$z_2=mysql_fetch_array($z_1);
			return id_dau($r_sql['thuoc_menu']);
		}
		else 
		{
			//thongbao($r_sql['id']);
			return $r_sql['id'];
		}
	}
	function activeTab_2()
	{
		if($_GET['m']!=1)
		{
			$sql="select * from menu where thuoc_menu='' order by id";
			$q_sql=mysql_query($sql);
			$r_sql=mysql_fetch_array($q_sql);
			$activeTab=$r_sql["rel"];
		}
		else 
		{
			$id=$_GET['id'];
			$id_dau=id_dau($id);
			//thongbao($id_dau);
			$sql="select * from menu where id='$id_dau' order by id";
			//thongbao($sql);
			$q_sql=mysql_query($sql);
			$r_sql=mysql_fetch_array($q_sql);
			//thongbao($r_sql["rel"]);
			$activeTab=$r_sql["rel"];
		}
		if($_GET['thamso']=="chitiet_sanpham")
		{
			$rr="select * from dulieu where id='$_GET[id]' ";$rr_1=mysql_query($rr);$rr_2=mysql_fetch_array($rr_1);
			$id=$rr_2['thuoc_menu'];
			//thongbao($id);
			$id_dau=id_dau($id);
			//thongbao($id_dau);
			$sql="select * from menu where id='$id_dau' order by id";
			//thongbao($sql);
			$q_sql=mysql_query($sql);
			$r_sql=mysql_fetch_array($q_sql);
			//thongbao($r_sql["rel"]);
			$activeTab=$r_sql["rel"];
		}
		return $activeTab;
	}
	function activeTab()
	{
		if(trim($_GET['id_active'])=="")
		{
			$rr="select * from menu order by id limit 0,1 ";
			//thongbao($rr);
			$rr_1=mysql_query($rr);
			$rr_2=mysql_fetch_array($rr_1);
			//thongbao($rr_2['rel']);
			return $rr_2['rel'];
		}
		else 
		{
			$id_dau_a=$_GET['id_active'];
			$rr="select * from menu where id='$id_dau_a'";
			//thongbao($rr);
			$rr_1=mysql_query($rr);
			$rr_2=mysql_fetch_array($rr_1);
			return $rr_2['rel'];
			
		}	
	}
	//echo $activeTab;echo "<hr>";
	
	$activeTab=activeTab();
	//thongbao($activeTab);
	
?>
<script type="text/javascript">
    var activeTab = "<?php echo $activeTab; ?>";
    var t;

    $(document).ready(function () {
        $('#root a[rel="' + activeTab + '"]').addClass('current');

        $(".mainNav").hover(function () {
            var currentTab = $(this).attr("rel");
            clearTimeout(t);
            if ($('#' + currentTab).is(':visible')) {
                //nothing
            }
            else {
                $('#subcontainer ul:visible').hide();
                $('#root a.current').removeClass('current');
                $('#' + currentTab).show();
                $(this).addClass('current');
            }
        }, function () {
            clearTimeout(t);
            t = setTimeout('resetNav()', 2000);
        });

        $(".new").hover(function () {
            var currentTab = $(this).attr("rel");
            clearTimeout(t);
            if ($('#' + currentTab).is(':visible')) {
                //nothing
            }
            else {
                $('#subcontainer ul:visible').hide();
                $('#root a.current').removeClass('current');
                $('#' + currentTab).show();
                $(this).addClass('current');
            }
        }, function () {
            clearTimeout(t);
            t = setTimeout('resetNav()', 2000);
        });

        $("#subcontainer").find('ul, li, a').hover(function () {
            clearTimeout(t);
        }, function () {
            clearTimeout(t);
            t = setTimeout('resetNav()', 2000);
        });

        $("#subcontainer").hover(function () {
            clearTimeout(t);
        }, function () {
            clearTimeout(t);
            t = setTimeout('resetNav()', 2000);
        });
    });

    function resetNav() {
        $('#subcontainer ul:visible').hide();
        $('#root a.current').removeClass('current');
        $('#' + activeTab).show();
        $('#root a[rel="' + activeTab + '"]').addClass('current');
    }  

</script>
<div id="footer">

<?php 
	$tv="select * from footer where id='1'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	echo $tv_2['html'];
?>
</div>
</div>


<!-- Google Code for Th&#7867; ti&#7871;p th&#7883; l&#7841;i -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 996225958;
var google_conversion_label = "dWNnCLrO5QMQpueE2wM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<!--<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>-->
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/996225958/?value=0&amp;label=dWNnCLrO5QMQpueE2wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>

</html>
<script type="text/javascript">
    f/*unction isAppleDevice(){
        return (
            (navigator.userAgent.toLowerCase().indexOf("ipad") > -1) ||
            (navigator.userAgent.toLowerCase().indexOf("iphone") > -1) ||
            (navigator.userAgent.toLowerCase().indexOf("ipod") > -1)
        );
    }


    $(function () {
        //if (!isAppleDevice()) {
            $('img.lazy').jail();
        //}
    });
	document.getElementById("product_info").style.marginLeft="-200px";*/
</script>

<script type="text/javascript">
    /*var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-2205398-24']);
    _gaq.push(['_setDomainName', '.yame.vn']);
    _gaq.push(['_trackPageview']);
</script>
<script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>*/
<?php 
	//include_file_2('cache/bottom-cache.php');
	//$html=ob_get_contents();
	//echo $html;
	
	//$cachefile="1.html";
	//$cached = fopen($cachefile, 'w');
	//fwrite($cached, file_get_contents($cachefile));
	//include_file_2($cachefile);
	$_SESSION['thamso']=$_GET['thamso'];
?>