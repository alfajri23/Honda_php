<?php

include("database.php");

$username = $_POST["nama"];
$password = $_POST["password"];

$query = "SELECT * FROM user WHERE nama='$username' and password='$password'";
$data = mysqli_query($sambungan, $query) or die (mysqli_error($sambungan));
$result = mysqli_fetch_assoc($data);
//print_r($result);

if($result>0){
    session_start();
    $_SESSION["user"]=$result["nama"];
    header("Location: dashboard/dashboard.php");
}
else{
    header("Location: login.php?status=gagal");

}

?>



