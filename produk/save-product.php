<?php
include("../database.php");
$nama=$_POST["nama"];
$harga=$_POST["harga"];
$jenis=$_POST["jenis"];
$spek=$_POST["spek"];
// $image1=$_POST["image1"];
// $image2=$_POST["image2"];
// $image3=$_POST["image3"];
// $image4=$_POST["image4"];

if (!isset($_POST["id"])){
	$img1 = $_FILES["image1"]["name"];
	$img2 = $_FILES["image2"]["name"];
	$img3 = $_FILES["image3"]["name"];
	$img4 = $_FILES["image4"]["name"];

	$dst = "../asset/img/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm;
	echo($img1);
	echo($img2);
	$query = "INSERT INTO honda
	(nama,harga,spek,jenis)";
	$query .= "VALUES
	('$nama','$harga','$spek','$jenis')";
	$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
	$pesan = "data berhasil ditambahkan";
}else{
	$id = $_POST["id"];
	$query = "UPDATE honda SET nama='$nama',jenis='$jenis',";
	$query .= "harga='$harga',spek='$spek'";
	$query .= "WHERE id = $id";

	$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
	$pesan = "data berhasil diubah";
}



// header("Location: admin.php");

?>