<?php
require_once("../../../koneksi/config.php");

$id_pemesanan = $_GET['id_pemesanan'];

$sql_delete = "DELETE FROM data_reservasi WHERE id_pemesanan = '$id_pemesanan'";
mysqli_query($koneksi, $sql_delete);
header("location:../index.php");
?>