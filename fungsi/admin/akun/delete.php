<?php
require_once("../../../koneksi/config.php");

$username = $_GET['username'];

$sql_delete = "DELETE FROM akun  WHERE username='$username'";
mysqli_query($koneksi, $sql_delete);

header("location:index.php");
?>