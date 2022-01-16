<?php

$database = "db_saleshonda";
$hostname = "localhost";
$username = "root";
$password = "";
//koneksi dengan server database mysql
$sambungan = new mysqli($hostname, $username, $password, $database);

if($sambungan->connect_error){
	die('koneksi gagal :'. $connect->connect_error);
}
?>