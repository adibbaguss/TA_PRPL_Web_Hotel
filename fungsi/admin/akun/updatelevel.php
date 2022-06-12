<?php 
session_start();
require_once("../../../koneksi/config.php");
$level = $_POST['level'];
$username = $_POST['username'];
$sql_insert = "UPDATE akun SET level='$level' WHERE username='$username'";           
mysqli_query($koneksi, $sql_insert);
header("location:info.php?username=$_POST[username]");
?>