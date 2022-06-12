<?php 
session_start();
require_once("../../../koneksi/config.php");

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../../../../index.php?pesan=gagal");
}else if($_SESSION['level']!="user"){
  header("location:../../../index.php?pesan=gagal");
}
  $id_pemesanan = $_GET['id_pemesanan'];

  $kode = mysqli_query($koneksi,"SELECT * FROM data_reservasi WHERE id_pemesanan='$id_pemesanan'");
  while($d_code = mysqli_fetch_array($kode)){
  $kode_kamar = $d_code['kode_kamar'];
  }
  $username=$_SESSION['username'];
  $data = mysqli_query($koneksi,"SELECT * FROM data_reservasi WHERE id_pemesanan='$id_pemesanan'");
  $data1= mysqli_query($koneksi,"SELECT * FROM akun INNER JOIN data_reservasi ON akun.username=data_reservasi.username WHERE akun.username='$username'");
  $data2= mysqli_query($koneksi,"SELECT * FROM kamar INNER JOIN data_reservasi ON kamar.kode_kamar=data_reservasi.kode_kamar WHERE kamar.kode_kamar='$kode_kamar'");
  while($d_akun = mysqli_fetch_array($data1)){
  while($d_kamar = mysqli_fetch_array($data2)){
  while($d_pemesanan = mysqli_fetch_array($data)){
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="../../../fontawesome-free-5.15.3-web/css/all.css" type="text/css" rel="stylesheet" />
    <link href="../../../css/style.css" type="text/css" rel="stylesheet" />
    <title>Konfirmasi</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-inverse position-sticky sticky-top" style="background-color: #126e82">
      <div class="container">
        <a class="navbar-brand" href="../index.php">
          <img src="../../../img/logo/logo.png" alt="" width="" height="40" />
        </a>
        <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fas fa-concierge-bell"></i></span>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../profile/index.php"><i class="fas fa-user"></i> Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href=" https://api.whatsapp.com/send?phone=6285201117231&text=Saya%20menghubungi%20anda%20melalui%20contact%20yang%20tersedia%20di%20Paradise%20hotel"
                ><i class="fas fa-phone-alt"></i> Contact</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- form konfirmasi -->
    <!-- card -->
    <div class="container">
      <div class="card my-5 mx-auto shadow" style="width: 400px">
        <img class="card-img-top" src="../../../img/kamar/<?php echo $d_kamar['foto'] ?>" />
        <div class="card-body mx-5 d-grid">
          <div class="row text-center">
            <div class="col-12">
              <h1 class="text-blue"><?= $d_pemesanan['id_pemesanan'];?></h1>
            </div>
            <div class="col-12">
              <h6 style="font-size: 13px">
                Kode Kamar :
                <?= $d_pemesanan['kode_kamar'];?>
              </h6>
            </div>
            <div class="col-12">
              <h6>
                Pemesan :
                <?= $d_akun['nama_lengkap'];?>
              </h6>
            </div>

            <div class="col-6 text-blue fw-bold">Check-in</div>
            <div class="col-6 text-blue fw-bold">Check-out</div>
            <div class="col-6 mb-3">
              <?= date('d F Y', strtotime($d_pemesanan['checkin']));?>
            </div>
            <div class="col-6 mb-3">
              <?=  date('d F Y', strtotime($d_pemesanan['checkout']));?>
            </div>
            <div class="col-12 text-blue mb-3">
              <h5 class="fw-bold"><?= rupiah($d_pemesanan['total_harga']);?></h5>
            </div>

            <div class="col-sm-6 d-grid">
              <a class="btn btn-lightblue" href="cancel.php?id_pemesanan=<?=$d_pemesanan['id_pemesanan'];?>" role="button">Cancel</a>
            </div>
            <div class="col-sm-6 d-grid">
              <a class="btn btn-fillblue" href="../profile/index.php?berhasil_pesan" role="button">Submit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end card -->
    <!-- akhir form konfirmasi -->
    <?php
  }
    }
  }
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
