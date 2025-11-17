<?php
session_start();
include "yetkiControl.php";
//1.Adım
include "conn.php";
//2.Adım
$sql = "delete from users where id=".$_GET["id"];
//3.Adım
$conn->query($sql);
header('location:users.php?i=3');