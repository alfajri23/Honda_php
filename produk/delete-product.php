<?php
    include("../database.php");

    $id=$_GET["id"];

    $query = "DELETE FROM honda WHERE id like $id";
    $hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
    $pesan = "data berhasil dihapus";

    header("Location: admin.php");

?>