<?php 
require_once("../../../koneksi/config.php");

if(isset($_POST['submit'])){
    $kode_kamar = $_POST['kode_kamar'];
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    //mengubah tanggal menjadi angka untuk dihitung selisih
    //lalu mengkalikan dengan harga/malam
    $tgl1= new DateTime($_POST['checkin']);
    $tgl2= new DateTime($_POST['checkout']);
    $hari =$tgl2->diff($tgl1)->days + 1;
    $total_harga= ($_POST['harga_malam']) *$hari;

    //memmbuat id_pemesanan secara random
    // dan mengubah tanggal agar tidak ada strip "-"
function randomId($length){
    $str ="";
    $character = $_POST['kode_kamar'].$_POST['password'].$_POST['tempat_lahir'].$_POST['level'].$_POST['username'].date("DFL", strtotime($_POST['checkin'])). date("DFL", strtotime($_POST['checkout']));
    $max        = strlen($character) - 5;
    for($i=0; $i<$length; $i++){
        $rand = mt_rand(0,$max);
        $str .=($character[$rand]);
    }
    return $str;
}
    $id_pemesanan = "ph".randomId(8);
    $konfirmasi="INSERT INTO data_reservasi VALUES ('$id_pemesanan', '$kode_kamar','$username','$checkin','$checkout','$total_harga')";
    mysqli_query($koneksi,$konfirmasi);
    header("location:konfirmasi.php?id_pemesanan=$id_pemesanan");

}
?>