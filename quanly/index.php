<?php
	session_start();
	ini_set('display_errors','0');
	include("../ketnoi.php");
	include("../ham/ham.php");
?>

<?php
	include_file("../class/class_luan.php");
	include_file("cumchucnang/bien/bien.php");
	include_file("class/class.php");
	include_file("class/include_class.php");
	include("cumchucnang/xacdinh_dangnhap/xacdinh_dangnhap.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quan ly</title>


<link rel="stylesheet" type="text/css" media="screen" href="giaodien/css/css.css">
<script type="text/javascript" src="../giaodien/chung.js"></script>


<script type="text/javascript" src="giaodien/fckeditor/fckeditor.js"></script>
<script type="text/javascript" src="cumchucnang/ajax_submit_form/js/form-submit.js"></script>
<script type="text/javascript" src="cumchucnang/ajax_submit_form/js/ajax.js"></script>
<script type="text/javascript" src="../jquery.min.js"></script>

<!--                  menu ngang quan tri                                        -->
<link rel="stylesheet" type="text/css" href="../giaodien/smooth_menu_js/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="../giaodien/smooth_menu_js/ddsmoothmenu-v.css" />
<script type="text/javascript" src="../giaodien/smooth_menu_js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
<!--                  menu ngang quan tri                                        -->
<style>
	div#sua_file{z-index:100;}
</style>
<script type="text/javascript" src="jquerymultiplefileupload/js/ajaxupload.3.5.js" ></script>
<link rel="stylesheet" type="text/css" href="jquerymultiplefileupload/styles.css" />

</head>

<body bgcolor="#ececec">

<?php
	//include_file("cumchucnang/xuly_form/xuly_form.php");
	//include_file("cumchucnang/xuly_bien_get/xuly_bien_get.php");
?>
<?php 
	if(isset($_POST['dangnhap_quantri']))
	{
		include("cumchucnang/dangnhap_quantri/session.php");
		//trangtruoc();
		chuyentrang("index.php");
		exit();
	}
?>
<?php
	if($xacdinh_dangnhap=="co")
	{
		include_file("cumchucnang/xuly_form/xuly_form.php");
		include_file("cumchucnang/xuly_bien_get/xuly_bien_get.php");
		include_file("cumchucnang/quantri/quantri.php");
	}
	else
	{
		include_file("cumchucnang/dangnhap_quantri/form_dang_nhap.php");
	}
	
	
?>
<?php 
	function h_jjj()
	{
		?>
        <hr />
        <select onchange="window.location='?thamso=test_include&v='+this.value" style="padding:20px;margin-left:200px;margin-bottom:30px" >
            <option value="abc">abc</option>
            <option value="co">co</option>
            <option value="khong">khong</option>
        </select>
        <?php 
            if($_GET['thamso']=="test_include")
            {
                $up="update thong_so set gia_tri='$_GET[v]' where ma_so='9' ";
                mysql_query($up);
            }
        
	}
	//h_jjj();
	
?>
<?php 
	function h_jjj_2()
	{
		if(trim($_GET['sua_file_php'])=="co")	
		{
			$noi_dung_file=read_file(trim($_GET['file']));
			if($_POST['sua_file_php']=="sua_file_php")
			{
				write_file($_GET['file'],$_POST['noi_dung']);
				trangtruoc();
				exit();
			}
			?>
				<script>
					function dong_sua_file()
					{
						var id_sua_file=document.getElementById("sua_file");
						//alert(id_sua_file);
						id_sua_file.style.display="none";
					}
					function insertTab(o, e)
					{
						var kC = e.keyCode ? e.keyCode : e.charCode ? e.charCode : e.which;
						if (kC == 9 && !e.shiftKey && !e.ctrlKey && !e.altKey)
						{
							var oS = o.scrollTop;
							if (o.setSelectionRange)
							{
								var sS = o.selectionStart;
								var sE = o.selectionEnd;
								o.value = o.value.substring(0, sS) + "\t" + o.value.substr(sE);
								o.setSelectionRange(sS + 1, sS + 1);
								o.focus();
							}
							else if (o.createTextRange)
							{
								document.selection.createRange().text = "\t";
								e.returnValue = false;
							}
							o.scrollTop = oS;
							if (e.preventDefault)
							{
								e.preventDefault();
							}
							return false;
						}
						return true;
					}

				</script>
				<div style="width:900px;border:3px solid blue;position:absolute;display:<?php echo $ddd; ?>;left:50px;top:50px;background:white;z-index:100" id="sua_file">
					<h1 tyle="margin-left:25px" >Sữa file</h1>
					<form action="" method="post">
						<input name="ten_file" size="80" style="margin-left:25px" id="tf_111" value="<?php echo trim($_GET['file']); ?>"/><br /><br />
					 <textarea style="width:850px;height:500px;margin-left:25px" name="noi_dung" id="textarea_90" onkeydown="insertTab(this, event);" ><?php echo $noi_dung_file; ?></textarea> 
					 <br /><br />
                     <input type="hidden" name="sua_file_php" value="sua_file_php"  />
					 <input type="submit" value="Sửa" style="margin-left:831px"/>
					</form>
					<input type="button" value="Đóng" style="margin-left:831px" onclick="dong_sua_file()"/>
					<br /><br />
				</div>
			<?php
		}
	}
	//h_jjj_2();
?>

</body>
</html>
