<?php 
require_once("../../../koneksi/config.php");

if(isset($_POST['submit'])){
    $kode_kamar = $_POST['kode_kamar'];
    $judul = $_POST['judul'];
    $kasur = $_POST['kasur'];
    $wifi = $_POST['wifi'];
    $tv = $_POST['tv'];
    $mineral = $_POST['mineral'];
    $kamar_mandi = $_POST['kamar_mandi'];
    $perlengkapan_mandi = $_POST['perlengkapan_mandi'];
    $sarapan = $_POST['sarapan'];
    $harga = $_POST['harga'];


    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
    header("location:index.php?alert=gagal_ekstensi"); 
    }else{
        if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../../img/kamar/'.$rand.'_'.$filename);
            $sql_insert = "INSERT INTO kamar VALUES ('$kode_kamar', '$judul', '$kasur', '$wifi', '$tv', '$mineral', '$kamar_mandi', '$perlengkapan_mandi', '$sarapan', '$harga', '$xx')";
            mysqli_query($koneksi, $sql_insert);
            header("location:index.php?alert=berhasil");
        }else{
            header("location:index.php?alert=gagal_ukuran");
        }
    }
}
?>
