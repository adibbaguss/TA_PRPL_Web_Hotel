<?php   
session_start();

require_once("../koneksi/config.php");

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){
    $data= mysqli_fetch_assoc($login);

    if($data['level']=="admin"){
        $_SESSION['username']= $username;
        $_SESSION['level']= "admin";

        header("location:admin/index.php?pesan=login");
        
    }else if($data['level']=="user"){
        $_SESSION['username']= $username;
        $_SESSION['level']= "user";

        header("location:user/index.php?pesan=login");
    }
}else{
    header("location:../index.php?pesan=gagal");
}
?>