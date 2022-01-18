<?php
    include("../database.php");
    $nama=$_POST["nama"];
    $tanggal=$_POST["tanggal"];
    $keterangan=$_POST["keterangan"];
    //$spek=$_POST["spek"];

    if (!isset($_POST["id"])){
        //$img = $_FILES["foto"]["name"];

        if($_FILES["foto"]['error'] == 0){
            $dst1 = "../assets/img/testimoni/".$_FILES["foto"]["name"];  
            move_uploaded_file($_FILES["foto"]["tmp_name"],$dst1);
        }else{
            $dst1 = '';
        }

        $query = "INSERT INTO honda
        (nama,tanggal,keterangan,gambar)";
        $query .= "VALUES
        ('$nama','$tanggal','$keterangan','$dst1')";
        $hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
    }else{
        // $img = $_FILES["foto"];
        // echo $img;
        $id = $_POST["id"];
        $query = "UPDATE testimoni SET nama='$nama',tanggal='$tanggal',";
        if($_FILES["foto"]['error'] == 0){
            $dst1 = "../assets/img/testimoni/".$_FILES["foto"]["name"];  
            move_uploaded_file($_FILES["foto"]["tmp_name"],$dst1);
            $query .= "gambar='$dst1',";
        }
        $query .= "ket='$keterangan'";
        $query .= "WHERE id = $id";

        $hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
    }

    header("Location: admin.php");

?>