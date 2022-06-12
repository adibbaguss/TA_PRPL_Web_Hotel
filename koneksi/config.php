<?php 
  $koneksi = mysqli_connect("localhost", "root", "","db_hotel");

  if(!$koneksi){
  	echo "tidak terkoneksi";
  }
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah; 
  }
 ?>
 