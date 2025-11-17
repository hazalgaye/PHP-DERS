<?php
if($_SESSION["yetki"]!="1"){
	//abord(403);
	echo "Bu sayfayı görmeye yetkiniz bulunmamaktadır.";
	echo "<br><a href='index.php'>Geri Dön</a>";
	exit;
}
?>