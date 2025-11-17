<?php
	session_start();
	if(isset($_SESSION["login"]) && $_SESSION["login"]==1){
		$username = $_SESSION["user"];
	}else {
		header('location:login.php');
	}

?>