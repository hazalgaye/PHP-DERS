<?php 
session_start();
include "yetkiControl.php";
include "menu.php";
if(isset($_GET["i"])){
	if($_GET["i"]==1){
		echo "<br><br>Kayıt Başarı İle Oluşturuldu...";
	}
	elseif($_GET["i"]==2){
		echo "<br><br>Kayıt Başarı İle Güncellendi...";
	}
	elseif($_GET["i"]==3){
		echo "<br><br>Kayıt Başarı İle Silindi...";
	}
}
// 1. Adım - Bağlantı Cümlesi
include "conn.php";
// 2. Adım - SQL Cümlesi oluştur
$sql = "select * from users order by role,name";
// 3. Adım - SQL Cümleni Sunucuya Gönder
$result = $conn->query($sql);
// 4. Adım - Veri Kümesi dönen değer kontrolü
if($result->num_rows>0){
	//5. Adım - Kayıt Kümesini oku
	echo "<br><br><a style='margin-top:20px' href='addUser.php'>Yeni Ekle</a>";
	echo "
	<table style='width:500px;margin-top:20px' border='1'>
		<tr>
			<td>Ad</td>
			<td>Kullanıcı Adı</td>
			<td>Rol</td>
			<td>#</td>
		</tr>
	";
	while ($rs = $result->fetch_object()){
		echo "
		<tr>
			<td>".$rs->name."</td>
			<td>".$rs->user_name."</td>
			<td>".($rs->role==1?"Admin":"Yazar")."</td>
			<td><a href='updateUser.php?id=".$rs->id."'>Düzenle</a> | <a href='deleteUser.php?id=".$rs->id."'>Sil</a></td>
		</tr>";
	}
	echo "</table>";
	
}else {
	
	echo  "Kayıt yok";
}
