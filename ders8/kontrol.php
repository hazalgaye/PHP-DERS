<?php
	session_start();
	// 1. Adım - Veritabanı Bağlantı Cümlesi
	include "conn.php";
	
	$username = $_POST["username"];
	$pass = $_POST["pass"];
	
	// 2. Adım - SQL Cümleni yazar
	$sql = "select * from users 
			where 
			user_name='".$username."' 
			and 
			password='".$pass."'";
	//select * from users where user_name='admin' and pass = "123123";
	
	// 3. Adım - SQL Cümleni Sunuda Çalıştır
	$result = $conn->query($sql);
	
	// 4. Adım - Dönen kayıt kümesini kontrol et
	if($result->num_rows>0){
		// 5. Adım - Dönen veri kümesinin okunması
		$rs = $result->fetch_object();
		
		$_SESSION["login"]=1;
		$_SESSION["user"]=$rs->name;
		$_SESSION["yetki"] = $rs->role;
	
		header('location:index.php');
	}else {
		header('location:login.php?hata=1');
	}
?>