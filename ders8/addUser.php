<?php
session_start();
include "yetkiControl.php";
include "menu.php";
if(isset($_GET["i"])){
	//1. Adım - Veritabanı bağlantı cümlesi
	include "conn.php";
	//2. Adım - SQL cümlesini Yaz
	$sql = "insert into users set
				name='".$_POST["ad"]."',
				user_name='".$_POST["kad"]."',
				password='".$_POST["parola"]."',
				role='".$_POST["rol"]."'
			";
	// 3. Adım - SQL Cümleni sunucuya gönder
	$result = $conn->query($sql);
	
	header('location:users.php?i=1');
}
?>
<form name="addUser" action="addUser.php?i=true" method="post">
	<table>
		<tr>
			<td>Ad</td>
			<td><input type="text" name="ad" /></td>
		</tr>
		<tr>
			<td>Kullanıcı Adı</td>
			<td><input type="text" name="kad" /></td>
		</tr>
		<tr>
			<td>Parola</td>
			<td><input type="password" name="parola" /></td>
		</tr>
		<tr>
			<td>Rol</td>
			<td>
				<select name="rol" required>
					<option>Seçiniz</option>
					<option value="1">Admin</option>
					<option value="2">Yazar</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Kaydet" /></td>
			
		</tr>
</form>

