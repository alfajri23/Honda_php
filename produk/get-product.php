<?php
include("../database.php");

$id=$_POST["id"];

$query = "SELECT * FROM honda WHERE id = $id";
$hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
$data = mysqli_fetch_row($hasil_mysql);

//$data = json_decode (json_encode ($data), FALSE);
//$data = json_encode($data);
//echo $data;

?>

<form action="save-product.php" id="formBarang" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="hidden" class="form-control" value="<?= $data[0]?>" name="id" aria-describedby="emailHelp">
        <input type="text" class="form-control" value="<?= $data[1]?>" name="nama" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Harga</label>
        <input type="text" class="form-control" value="<?= $data[2]?>" name="harga" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Spesifikasi</label>
        <textarea class="form-control" name="spek" value="<?= $data[3]?>" id="mytextarea">
        <?= $data[3]?>
    </textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Jenis</label>
        <input type="text" class="form-control" value="<?= $data[4]?>" name="jenis" id="jenis">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">gambar1</label><br>
        <input type="file" name="image1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">gambar2</label><br>
        <input type="file" name="image2">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">gambar3</label><br>
        <input type="file" name="image3">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">gambar4</label><br>
        <input type="file" name="image4">
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>