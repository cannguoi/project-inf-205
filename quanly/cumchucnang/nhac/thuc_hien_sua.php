<?php
	chong_pha_hoai();
?>
<?php
	function tao_xml_nhac()
	{
		$tv="select * from nhac order by id desc";
		$tv_1=mysql_query($tv);
		$xml="";
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$xml=$xml."\t<track>\n";
				$xml=$xml."\t\t<title>$tv_2[tieu_de]</title>\n";
				$xml=$xml."\t\t<location>nhac/$tv_2[file]</location>\n";
			$xml=$xml."\t</track>\n";
		}
		$c_1="<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
		$c_1=$c_1."<playlist version=\"1\" xmlns=\"http://xspf.org/ns/0/\">\n";
		$c_1=$c_1."<trackList>\n";
		$c_2="</trackList>\n";
		$c_2=$c_2."</playlist>\n";
		$ghi_xml=$c_1.$xml.$c_2;
		unlink("../nhac_swf/3/playlist.xml");
		$ourFileName = "../nhac_swf/3/playlist.xml";
		$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
		fclose($ourFileHandle);

		$path="../nhac_swf/3/playlist.xml";
		$file=fopen($path, "w");
		$write=fwrite($file,$ghi_xml);
		fclose($file);
	}
?>
<?php
	if($_POST['ten_bai_hat']!="")
	{
		$up_hinh="co";
		$ten_bai_hat=$_FILES['upload']['name'];
		if($ten_bai_hat=="")
		{
			$ten_bai_hat=$_POST['ten_nhac_hd'];
			$up_hinh="khong";
		}
		$mang_vvv=explode(".",$ten_bai_hat);
		$duoi_bai_hat=$mang_vvv[count($mang_vvv)-1];
		$chuoi_ten_bai_hat_hop_le="mp3,MP3,mp4,MP4,flv,FLV,wma,WMA,wav,WAV";
		$mang_th_hl=explode(",",$chuoi_ten_bai_hat_hop_le);
		$bai_hat_hop_le="khong";

			for($r=0;$r<count($mang_th_hl);$r++)
			{
				if($duoi_bai_hat==$mang_th_hl[$r])
				{
					$bai_hat_hop_le="co";
					break;
				}
			}
			if($bai_hat_hop_le=="co")
			{
				$tv="select count(*) from nhac where file='$ten_bai_hat'";
				$tv_1=mysql_query($tv);
				$tv_2=mysql_fetch_row($tv_1);
				if($tv_2[0]==0 or $up_hinh=="khong")
				{
					if($up_hinh=="co")
					{
						$duong_dan_upload="../nhac/".$ten_bai_hat;
						move_uploaded_file($_FILES['upload']['tmp_name'],$duong_dan_upload);
					}

					$chuoi="UPDATE `nhac` SET `tieu_de` = '$_POST[ten_bai_hat]',
							`file` = '$ten_bai_hat' WHERE `nhac`.`id` ='$_GET[id]' LIMIT 1 ;";
					mysql_query($chuoi);
					tao_xml_nhac();
				}
				else
				{
					thongbao("Tên file nhạc này đã bị trùng , xin bạn đổi tên file nhạc khác");
				}
			}
			else
			{
				thongbao("Đuôi file nhạc upload không hợp lệ\\nCác đuôi hợp lệ là $chuoi_ten_bai_hat_hop_le\\nBạn hãy đổi đuôi file nhạc");
			}

	}
	else
	{
		thongbao("Không được bỏ trống tên bài hát");
	}
?>