<?php
include("../database.php");
$id=$_POST["id"];



	$id = $_POST["id"];
	$query = "UPDATE gambar SET ";

    $dsts = "../assets/img/gambar/".$_FILES["image"]["name"];  
    $dst = $_FILES["image"]["name"];  
	move_uploaded_file($_FILES["image"]["tmp_name"],$dsts);

    switch ($id) {
        case 1:
          $query .= "header1='$dst'";
          break;
        case 2:
          $query .= "header2='$dst'";
          break;
        case 3:
            $query .= "konten1='$dst'";
            break;
        case 4:
            $query .= "konten2='$dst'";
            break;
        case 5:
            $query .= "konten4='$dst'";
            break;
        case 6:
            $query .= "konten5='$dst'";
            break;
    }
	
	$query .= "WHERE id = 1";

    

	$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
	$pesan = "data berhasil diubah";




header("Location: admin.php");

?>