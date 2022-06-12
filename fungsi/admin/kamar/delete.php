<?php
require_once("../../../koneksi/config.php");

$kode_kamar = $_GET['kode_kamar'];

$sql_delete = "DELETE FROM kamar  WHERE kode_kamar='$kode_kamar'";
mysqli_query($koneksi, $sql_delete);
 
?>