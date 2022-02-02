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

	//echo $_FILES["image1"]["tmp_name"];
	//"../assets/img/produk/".

	if($_FILES["image1"]['error'] == 0){
		$dsts1 = "../assets/img/produk/".$_FILES["image1"]["name"]; 
		$dst1 = $_FILES["image1"]["name"]; 
		move_uploaded_file($_FILES["image1"]["tmp_name"],$dsts1);
	}else{
		$dst1 = '';
	}

	if($_FILES["image2"]['error'] == 0){
		$dsts2 = "../assets/img/produk/".$_FILES["image2"]["name"];  
		$dst2 = $_FILES["image2"]["name"]; 
		move_uploaded_file($_FILES["image2"]["tmp_name"],$dsts2);
	}else{
		$dst2 = '';
	}

	if($_FILES["image3"]['error'] == 0){
		$dsts3 = "../assets/img/produk/".$_FILES["image3"]["name"]; 
		$dst3 = $_FILES["image3"]["name"];  
		move_uploaded_file($_FILES["image3"]["tmp_name"],$dsts3);
	}else{
		$dst3 = '';
	}

	if($_FILES["image4"]['error'] == 0){
		$dsts4 = "../assets/img/produk/".$_FILES["image4"]["name"];  
		$dst4 = $_FILES["image4"]["name"]; 
		move_uploaded_file($_FILES["image4"]["tmp_name"],$dsts4);
	}else{
		$dst4 = '';
	}
	

	$query = "INSERT INTO honda
	(nama,harga,spek,jenis,gambar1,gambar2,gambar3,gambar4)";
	$query .= "VALUES
	('$nama','$harga','$spek','$jenis','$dst1','$dst2','$dst3','$dst4')";
	$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
	$pesan = "data berhasil ditambahkan";
}else{
	$id = $_POST["id"];
	$query = "UPDATE honda SET nama='$nama',jenis='$jenis',";
	if($_FILES["image1"]['error'] == 0){
		$dsts1 = "../assets/img/produk/".$_FILES["image1"]["name"];
		$dst1 = $_FILES["image1"]["name"];   
		move_uploaded_file($_FILES["image1"]["tmp_name"],$dsts1);
		$query .= "gambar1='$dst1',";
	}
	if($_FILES["image2"]['error'] == 0){
		$dsts2 = "../assets/img/produk/".$_FILES["image2"]["name"];  
		$dst2 = $_FILES["image2"]["name"];   
		move_uploaded_file($_FILES["image2"]["tmp_name"],$dsts2);
		$query .= "gambar2='$dst2',";
	}
	if($_FILES["image3"]['error'] == 0){
		$dsts3 = "../assets/img/produk/".$_FILES["image3"]["name"]; 
		$dst3 = $_FILES["image3"]["name"];   
		move_uploaded_file($_FILES["image3"]["tmp_name"],$dsts3);
		$query .= "gambar3='$dst3',";
	}
	if($_FILES["image4"]['error'] == 0){
		$dsts4 = "../assets/img/produk/".$_FILES["image4"]["name"];  
		$dst4 = $_FILES["image4"]["name"];   
		move_uploaded_file($_FILES["image4"]["tmp_name"],$dsts4);
		$query .= "gambar4='$dst4',";
	}
	$query .= "harga='$harga',spek='$spek'";
	$query .= "WHERE id = $id";

	//echo $query;

	$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
	$pesan = "data berhasil diubah";
}



header("Location: admin.php");

?>