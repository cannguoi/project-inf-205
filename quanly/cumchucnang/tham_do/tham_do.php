<?php
	chong_pha_hoai();
?>
<?php
	//echo "tham do";
	class class___tham_do__bien_db extends luan
	{
		var $tb="tham_do";
		var $f_id="id";
		var $f__cau_hoi="cau_hoi";
		var $f__cac_cau_tra_loi="cac_cau_tra_loi";
		var $f__vote="vote";
	}
	class class___mang_tham_do extends class___tham_do__bien_db
	{
		function mang_tham_do()
		{
			$tb=$this->tb;
			$f_id=$this->f_id;
			$tv="select * from $tb where $f_id in ('1') ";
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_array($tv_1);
			return $tv_2;
		}
	}
	class class___giao_dien__sua_xoa__thamdo extends class___mang_tham_do
	{
		function giao_dien__sua_xoa__thamdo()
		{
			$mang_tham_do=$this->mang_tham_do();
			$cac_cau_tra_loi			=	$mang_tham_do['cac_cau_tra_loi'];
			$cac_cau_tra_loi__en		=	$mang_tham_do['cac_cau_tra_loi__en'];
			$vote						=	$mang_tham_do['vote'];
			$mang__cac_cau_tra_loi		=	explode("_____",$cac_cau_tra_loi);
			$mang__cac_cau_tra_loi__en	=	explode("_____",$cac_cau_tra_loi__en);
			$mang__vote 		  		=	explode("_____",$vote);
			//print_r($mang__vote);
			//echo count($mang__vote);
			h1_1("Sữa xóa các đáp án");
			echo "<table>\n";

			echo "<tr>		\n";
				echo "<td width=\"265px\">						<b>Nội dung đáp án</b>		</td>	\n";
				echo "<td width=\"265px\">						<b>Nội dung đáp án(English)</b>		</td>	\n";
				echo "<td width=\"100px\" align=\"center\">		<b>Sữa</b>					</td>	\n";
				echo "<td width=\"100px\" align=\"center\">		<b>Xóa</b>					</td>	\n";
			echo "</tr>		\n";
			for($i=0;$i<count($mang__vote);$i++)
			{
				$nd_dap_an	=	$mang__cac_cau_tra_loi[$i];
				$nd_dap_an__en	=	$mang__cac_cau_tra_loi__en[$i];
			?>
				<tr>
					<form action="" method="post"  style="margin:0"/>
						<input type="hidden" name="<?php echo "i";?>" value="<?php echo $i; ?>">
						<td>
							<input type="text" name="tieu_de" value="<?php echo $nd_dap_an; ?>" class="rong_250px"/>
						</td>
						<td>
							<input type="text" name="tieu_de__en" value="<?php echo $nd_dap_an__en; ?>" class="rong_250px"/>
						</td>
						<td align="center">
							<input type="submit" class="gui" value="Sữa" name="sua_dap_an_tham_do">
						</td>
						<td align="center">
							<input type="submit" class="gui" value="Xóa" name="xoa_dap_an_tham_do">
						</td>
					</form>
				</tr>
			<?php
			}

			echo "</table>\n";
		}
		function thuc_hien_sua_dap_an()
		{
			//print_r($_POST);
			$em=$_POST['i'];
			$this->kiem_tra_tieu_de();
			$mang_tham_do=$this->mang_tham_do();
			$cac_cau_tra_loi							=	$mang_tham_do['cac_cau_tra_loi'];
			$cac_cau_tra_loi__en						=	$mang_tham_do['cac_cau_tra_loi__en'];
			$vote										=	$mang_tham_do['vote'];
			$tong										=	$mang_tham_do['tong'];
			$mang__cac_cau_tra_loi						=	explode("_____",$cac_cau_tra_loi);
			$mang__cac_cau_tra_loi__en					=	explode("_____",$cac_cau_tra_loi__en);
			$mang__vote 		  						=	explode("_____",$vote);
			for($i=0;$i<count($mang__vote);$i++)
			{
				if($i==$em)
				{
						$u								=	$mang__vote[$i];

					if($mang__cac_cau_tra_loi[$i]		!=	$_POST['tieu_de'])
					{
						$mang__vote[$i]					=	0;
						$tong							=	$tong - $u;
					}
						$mang__cac_cau_tra_loi[$i]		=	$_POST['tieu_de'];
						$mang__cac_cau_tra_loi__en[$i]	=	$_POST['tieu_de__en'];
				}
			}

			$vote__update=implode("_____",$mang__vote);
			$cac_cau_tra_loi__update					=	implode("_____",$mang__cac_cau_tra_loi);
			$cac_cau_tra_loi__update_en					=	implode("_____",$mang__cac_cau_tra_loi__en);
				$cap_nhat=
				"
					UPDATE `tham_do`
					SET
						`tong` 							= 	'$tong',
						`cac_cau_tra_loi` 				= 	'$cac_cau_tra_loi__update',
						`cac_cau_tra_loi__en` 			= 	'$cac_cau_tra_loi__update_en',
						`vote` 							= 	'$vote__update'
					WHERE
						`id`							=	'1';
				";
			mysql_query($cap_nhat);
			trangtruoc();
		}
		function thuc_hien_xoa_dap_an()
		{
			//print_r($_POST);
			$em=$_POST['i'];
			$this->kiem_tra_tieu_de();
			$mang_tham_do=$this->mang_tham_do();
			$cac_cau_tra_loi						=	$mang_tham_do['cac_cau_tra_loi'];
			$cac_cau_tra_loi__en					=	$mang_tham_do['cac_cau_tra_loi__en'];
			$vote									=	$mang_tham_do['vote'];
			$tong									=	$mang_tham_do['tong'];
			$mang__cac_cau_tra_loi					=	explode("_____",$cac_cau_tra_loi);
			$mang__cac_cau_tra_loi__en				=	explode("_____",$cac_cau_tra_loi__en);
			$mang__vote 		  					=	explode("_____",$vote);
			if(count($mang__vote)==1 or count($mang__vote)==0)
			{
				$cap_nhat=
				"
					UPDATE `tham_do`
					SET
						`tong` 					= 	'0',
						`cac_cau_tra_loi` 		= 	'',
						`cac_cau_tra_loi__en` 	= 	'',
						`vote` 					= 	''
					WHERE
						`id`					=	'1';
				";
			}
			else
			{
				for($i=0;$i<count($mang__vote);$i++)
				{
					if($i==$em)
					{
							$u								=	$mang__vote[$i];
							$mang__vote[$i]					=	0;
							$tong							=	$tong - $u;
							$mang__cac_cau_tra_loi[$i]		=	"";
							$mang__cac_cau_tra_loi__en[$i]	=	"";
					}
				}
			//$vote__update=implode("_____",$mang__vote);
			//$cac_cau_tra_loi__update=implode("_____",$mang__cac_cau_tra_loi);
			$vote__update									=	"";
			$cac_cau_tra_loi__update						=	"";
			$cac_cau_tra_loi__update_en						=	"";
			$dem=1;
			for($i=0;$i<count($mang__vote);$i++)
			{
				//echo $dem."<hr>";

					if($mang__cac_cau_tra_loi[$i]!="")
					{
						if($i!=0)
						{
							$k=$i-1;
							$vote__update=$vote__update."_____".$mang__vote[$i];
							$cac_cau_tra_loi__update=$cac_cau_tra_loi__update."_____".$mang__cac_cau_tra_loi[$i];
							$cac_cau_tra_loi__update_en=$cac_cau_tra_loi__update_en."_____".$mang__cac_cau_tra_loi__en[$i];
						}
						else
						{
							$vote__update=$vote__update.$mang__vote[$i];
							$cac_cau_tra_loi__update=$cac_cau_tra_loi__update.$mang__cac_cau_tra_loi[$i];
							$cac_cau_tra_loi__update_en=$cac_cau_tra_loi__update_en.$mang__cac_cau_tra_loi__en[$i];
						}
					}


			}
			$r=explode("_____",$cac_cau_tra_loi__update);
			$r_en=explode("_____",$cac_cau_tra_loi__update_en);
			$r1=explode("_____",$vote__update);

			if($r[0]=="")
			{
				$cac_cau_tra_loi__update="";
				$cac_cau_tra_loi__update_en="";
				$vote__update="";
				for($z=1;$z<count($r);$z++)
				{
					if($z!=1)
					{
						$cac_cau_tra_loi__update=$cac_cau_tra_loi__update."_____".$r[$z];
						$cac_cau_tra_loi__update_en=$cac_cau_tra_loi__update_en."_____".$rEn[$z];
						$vote__update=$vote__update."_____".$r1[$z];
					}
					else
					{
						$cac_cau_tra_loi__update=$cac_cau_tra_loi__update."".$r[$z];
						$cac_cau_tra_loi__update_en=$cac_cau_tra_loi__update_en."".$r[$z];
						$vote__update=$vote__update."".$r1[$z];
					}
				}
			}
				if($cac_cau_tra_loi__update=="_____"){$cac_cau_tra_loi__update="";}
				if($cac_cau_tra_loi__update_en=="_____"){$cac_cau_tra_loi__update_en="";}
				if($vote__update=="_____"){$vote__update="";}
				$cap_nhat=
				"
					UPDATE `tham_do`
					SET
						`tong` 					= 	'$tong',
						`cac_cau_tra_loi` 		= 	'$cac_cau_tra_loi__update',
						`cac_cau_tra_loi__en` 	= 	'$cac_cau_tra_loi__update_en',
						`vote` 					= 	'$vote__update'
					WHERE
						`id`					=	'1';
				";
			}
			//echo $cap_nhat."<hr>";
			//thongbao($cap_nhat);
			mysql_query($cap_nhat);
			trangtruoc();
		}
	}
	class class___them_dap_an extends class___giao_dien__sua_xoa__thamdo
	{
		function khung_them_dap_an()
		{
			h1_1("Thêm đáp án");
			?>
				<table>
					<form action="" method="post">
						<tr>
							<td width="120px"><b>Nội dung đáp án :</b></td>
							<td><input type="text" class="rong_250px" value="" name="tieu_de"></td>
						</tr>
						<tr>
							<td width="120px"><b>Nội dung đáp án :<br>(English)</b></td>
							<td valign="top"><input type="text" class="rong_250px" value="" name="tieu_de__en"></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="them_dap_an" value="Thêm" class="gui" style="margin-left:75px">
							</td>
						</tr>
					</form>
				</table>
			<?php
		}
		function thuc_hien_them_dap_an()
		{
			$tb=$this->tb;
			$f__cac_cau_tra_loi=$this->f__cac_cau_tra_loi;
			$f_id=$this->f_id;
			$f__vote=$this->f__vote;
			$this->kiem_tra_tieu_de();
			//thongbao("hihi");
			$tieu_de			=	$_POST['tieu_de'];
			$tieu_de__en		=	$_POST['tieu_de__en'];
			$mang_tham_do=$this->mang_tham_do();
			$cac_cau_tra_loi=$mang_tham_do['cac_cau_tra_loi'];
			$cac_cau_tra_loi__en=$mang_tham_do['cac_cau_tra_loi__en'];
			$vote=$mang_tham_do['vote'];
			if($cac_cau_tra_loi!="")
			{
				$g				=	$cac_cau_tra_loi."_____".$tieu_de;
				$g_1			=	$vote."_____0";
				$g_en			=	$cac_cau_tra_loi__en."_____".$tieu_de__en;
			}
			else
			{
				$g				=	$cac_cau_tra_loi."".$tieu_de;
				$g_1			=	$vote."0";
				$g_en			=	$cac_cau_tra_loi__en."".$tieu_de__en;
			}
			$up="UPDATE `tham_do` SET `cac_cau_tra_loi` = '$g',`cac_cau_tra_loi__en` = '$g_en',`vote`='$g_1' WHERE `id` ='1';";
			//echo $up;
			//exit();
			mysql_query($up);
			trangtruoc();
		}
	}
	class class___tham_do extends class___them_dap_an
	{
		function khung_cau_hoi()
		{
			//echo $this->tb;
			$tb=$this->tb;
			//echo $tb;
			$mang_tham_do=$this->mang_tham_do();
			$cau_hoi=$mang_tham_do['cau_hoi'];
			$cau_hoi__en=$mang_tham_do['cau_hoi__en'];
			echo "<center><h1 class=\"chu_do\">Sữa câu hỏi thăm dò</h1></center>";
			?>
				<table>
					<form action="" method="post">
						<tr>
							<td width="120px"><b>Câu hỏi :</b></td>
							<td><input type="text" class="rong_250px" value="<?php echo $cau_hoi; ?>" name="cau_hoi"></td>
						</tr>
						<tr>
							<td width="120px"><b>Câu hỏi :<br>(English)</b></td>
							<td valign="top"><input type="text" class="rong_250px" value="<?php echo $cau_hoi__en; ?>" name="cau_hoi__en"></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="sua_cau_hoi" value="Sữa" class="gui" style="margin-left:75px">
							</td>
						</tr>
					</form>
				</table>
			<?php
		}
		function thuc_hien_sua_cau_hoi()
		{
			$tb=$this->tb;
			$f_id=$this->f_id;
			$f__cau_hoi=$this->f__cau_hoi;
			$cau_hoi=$_POST['cau_hoi'];
			$cau_hoi__en=$_POST['cau_hoi__en'];
			if($cau_hoi!="")
			{
				$up="UPDATE `$tb` SET `cau_hoi` = '$cau_hoi',`cau_hoi__en` = '$cau_hoi__en' WHERE `$f_id` =1;";
				//thongbao($up);
				mysql_query($up);
			}
			else
			{
				thongbao("Không được bỏ trống câu hỏi");
			}
			trangtruoc();
		}

	}
	$class___tham_do= new class___tham_do;
	if(!isset($_POST['xoa_dap_an_tham_do']))
	{
		if(!isset($_POST['sua_dap_an_tham_do']))
		{
			if(!isset($_POST['them_dap_an']))
			{
				if(!isset($_POST['sua_cau_hoi']))
				{
					$class___tham_do->khung_cau_hoi();
					$class___tham_do->khung_them_dap_an();
					$class___tham_do->giao_dien__sua_xoa__thamdo();
				}
				else
				{
					$class___tham_do->thuc_hien_sua_cau_hoi();
				}
			}
			else
			{
				//thongbao("da vao day");
				$class___tham_do->thuc_hien_them_dap_an();
			}
		}
		else
		{
			//print_r($_POST);
			$class___tham_do->thuc_hien_sua_dap_an();
		}
	}
	else
	{
		$class___tham_do->thuc_hien_xoa_dap_an();
	}
?>