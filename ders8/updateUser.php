<?php
session_start();
include "yetkiControl.php";
include "menu.php";
//1. Adım - Veritabanı bağlantı cümlesi
	include "conn.php";
if(isset($_GET["i"])){
	//2. Adım - SQL cümlesini Yaz
	$sql = "update users set					
				name='".$_POST["ad"]."',
				user_name='".$_POST["kad"]."',
				password='".$_POST["parola"]."',
				role='".$_POST["rol"]."'
				where id=".$_GET["id"];
	// 3. Adım - SQL Cümleni sunucuya gönder
	$result = $conn->query($sql);
	
	header('location:users.php?i=1');
}

//2. Adım 
$sql = "select * from users where id =".$_GET["id"];
//3.Adım
$result = $conn->query($sql);
//4. Adım 
if($result->num_rows>0){
	//5. Adım
	$rs = $result->fetch_object();
	
}else {
	header("location:users.php");
}

?>
<form name="addUser" action="updateUser.php?i=true&id=<?php echo $rs->id?>" method="post">
	<table>
		<tr>
			<td>Ad</td>
			<td><input value="<?php echo $rs->name?>" type="text" name="ad" /></td>
		</tr>
		<tr>
			<td>Kullanıcı Adı</td>
			<td ><input value="<?php echo $rs->user_name?>" type="text" name="kad" /></td>
		</tr>
		<tr>
			<td>Parola</td>
			<td><input value="<?php echo $rs->password?>" type="text" name="parola" /></td>
		</tr>
		<tr>
			<td>Rol</td>
			<td>
				<select name="rol" required>
					<option>Seçiniz</option>
					<option <?php if($rs->role==1) echo "selected"?> value="1">Admin</option>
					<option <?php if($rs->role==2) echo "selected"?> value="2">Yazar</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Kaydet" /></td>
			
		</tr>
</form>

