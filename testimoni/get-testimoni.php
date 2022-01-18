<?php

include("../database.php");

$id=$_POST["id"];

$query = "SELECT * FROM testimoni WHERE id = $id";
$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
$data = mysqli_fetch_row($hasil_mysql);


?>

<form action="save-testimoni.php" enctype="multipart/form-data" method="POST" id="formKey">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="number" class="form-control" value="<?= $data[0]?>" name="id" aria-describedby="emailHelp">
        <input type="text" class="form-control" name="nama" value="<?= $data[1]?>" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Foto</label>
        <img src="<?= $data[2]?>" style="width: 100px;" alt="">
        <input type="file" name="foto">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
        <input type="text" class="form-control" value="<?= $data[3]?>" name="keterangan" id="kodes">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tanggal</label>
        <input type="date" class="form-control" value="<?= $data[4]?>" name="tanggal" id="kodes">
    </div>

    


    <button type="submit" class="btn btn-primary">Tambah</button>
</form>