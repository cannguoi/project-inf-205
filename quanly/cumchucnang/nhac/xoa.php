<?php
	chong_pha_hoai();
	$a_tv="select * from nhac where id='$_GET[id]'";
	$a_tv_1=mysql_query($a_tv);
	$a_tv_2=mysql_fetch_array($a_tv_1);
	unlink("../nhac/$a_tv_2[file]");
	$tv="DELETE FROM `nhac` WHERE `nhac`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($tv);
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
	tao_xml_nhac();
?>