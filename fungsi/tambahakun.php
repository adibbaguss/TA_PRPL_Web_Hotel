<?php 
require_once("../koneksi/config.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];


    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','JPG','JPEG','PNG');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
    header("location:register.php?pesan=gagal_ekstensi"); 
    }else{
        if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../img/profile/'.$rand.'_'.$filename);
            $sql_insert = "INSERT INTO akun VALUES ('$username', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$telp', '$email', '$password','$xx','$level')";
            mysqli_query($koneksi, $sql_insert);
            header("location:../index.php?pesan=berhasil_registrasi");
        }else{
            header("location:register.php?pesan=gagal_ukuran");
        }
    }
}
?>
