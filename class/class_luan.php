<?php
	class luan
	{
		function kiem_tra_tieu_de()
		{
			//thongbao($_POST['tieu_de']);
			if($_POST['tieu_de']=="")
			{
				thongbao("Không được bỏ trống ô nhập liệu");
				trangtruoc();
				exit;
			}

		}
		function fck_editor__20($nd,$rong,$cao)
		{
			$nd = str_replace("'","\'",$nd);
			$nd = str_replace('"','&quot;',$nd);
			$nd = str_replace("\t","",$nd);
			$nd = str_replace("\n","",$nd);
			$nd = str_replace("\r","",$nd);
			echo "
			<script>
				var nd = \"$nd\";
			</script>\n
			";
			?>
				<script type="text/javascript">
				var oFCKeditor = new FCKeditor('noidung');
				oFCKeditor.BasePath = "giaodien/fckeditor/";
				oFCKeditor.Width	= <?php echo $rong; ?> ;
				oFCKeditor.Height	= <?php echo $cao; ?>;
				oFCKeditor.Value=nd;
				oFCKeditor.Config["EnterMode"]		= "br" ;
				oFCKeditor.Create();
				document.getElementById('xEnter').value = "br" ;
				</script>
			<?php
		}
		function fck_editor__21($nd,$rong,$cao)
		{
			$nd = str_replace("'","\'",$nd);
			$nd = str_replace('"','&quot;',$nd);
			$nd = str_replace("\t","",$nd);
			$nd = str_replace("\n","",$nd);
			$nd = str_replace("\r","",$nd);
			echo "
			<script>
				var nd = \"$nd\";
			</script>\n
			";
			?>
				<script type="text/javascript">
				var oFCKeditor = new FCKeditor('noidung_en');
				oFCKeditor.BasePath = "giaodien/fckeditor/";
				oFCKeditor.Width	= <?php echo $rong; ?> ;
				oFCKeditor.Height	= <?php echo $cao; ?>;
				oFCKeditor.Value=nd;
				oFCKeditor.Config["EnterMode"]		= "br" ;
				oFCKeditor.Create();
				document.getElementById('xEnter').value = "br" ;
				</script>
			<?php
		}
		function nut_chap_nhan__cach_trai_50px()
		{
			echo "<input type=\"submit\" name=\"chap_nhan\" value=\"Chấp nhận\" class=\"nut_chapnhan\" style=\"margin-left:50px\"/>";
		}
		function nut_chap_nhan__cach_trai_50px___001($ten)
		{
			echo "<input type=\"submit\" name=\"$ten\" value=\"Chấp nhận\" class=\"nut_chapnhan\" style=\"margin-left:50px\"/>";
		}
		function xuat($nd)
		{
			echo "$nd \n";;
		}
	}
	$luan=new luan;
?>