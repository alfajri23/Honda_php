<?php

include("../database.php");

$id=$_POST["id"];

$query = "SELECT * FROM gambar WHERE id = 1";
$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
$data = mysqli_fetch_row($hasil_mysql);
$foto = $data[$id];


?>

<form action="save-gambar.php" enctype="multipart/form-data" method="POST" id="formKey">

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Foto</label>
        <img src="<?= $foto?>" style="width: 100px;" alt="">
        <input type="file" name="image">
        <input type="hidden" name="id" value="<?= $id ?>">
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>