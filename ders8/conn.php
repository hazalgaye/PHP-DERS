<?php 
$username = "root";
$password = "";
$host = "127.0.0.1";
$database = "ogrenci_bilgi_sistemi";

$conn = new mysqli($host,$username,$password,$database);
if($conn->connect_error){
	die("Bağlantı Hatası : ".$conn->connect_error);
}
